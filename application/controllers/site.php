<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index( $page = null )
	{
		// Load default configuration
		$this->load->config( 'site' );								// Style, footer, site name, default page.
		// Load pagedb
		$this->load->model( 'pagedb');
		// Load numbers library
		$this->load->library( 'numbers' );

		// If a page isn't set
		if( is_null($page) ) {
			$page = $this->config->item( 'default_page' ); 	 	  	 // Set it to 'Default_page' defined in site config
		}

		// Configurations
		$data['style']     = 	$this->config->item('style');	     // Set style
		$data['footer']    = 	$this->config->item('footer'); 	     // Set footer text
		$data['page']  	   = 	str_replace('_',' ',ucfirst($page)); // Current page (used for title)
		$data['site_name'] =    $this->config->item('site_name');    // Set site name ( used for title aswell)

		//Is it closed or doesn't exist?
		if($this->pagedb->page_closed($page)){ show_404(); } 	     // if page is closed; Show 404

		// Menu
		$data['menu_items'] = $this->numbers->fixMenu( $this->pagedb->getMenuItems() );

		// Widgets
		$data['widgets'] = $this->pagedb->getWidgets(); 

		// What type is this page?
		switch( $this->pagedb->pagetype($page) ) {
			case 1: // Plain html
				$data['content'] = $this->pagedb->pageContent($page);
				 break;
			case 2: // Blog
				$this->load->library('blogify');
				$data['content'] = $this->blogify->setBlog( $this->pagedb->getBlogPosts() );
				break;
			case 3: // iFrame
				$data['content'] = $this->pagedb->iframe( $page );
				break;
			case 4: // Redirect
				header( 'Location: ' . $this->pagedb->pageContent( $page ) );
				break;
			case 5: // Custom php
				$data['content']['php'] = $this->pagedb->pageContent( $page );
				break;
			case 6: //Gallery -->
				$this->load->library('gallery');
				$data['content'] = $this->gallery->createGallery(); // DEMO END -->
				break;
			default:
				show_404();
		}

		// Load page
		$this->load->view('template', $data);
	}
}