<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        if(!isset($_SESSION['admin'])){
        	header('location: ' . base_url()  . 'admin/login');
        	die(); // If header doesn't redirect correctly, kill the page instead.
        }
    }

	public function index(){

		// load pages instead
		$this->pages();
	}

	public function pages(){

		// pagedb model
		$this->load->model('pagedb');

		// numbers
		$this->load->library('numbers');

		if( isset($_GET['pname']) ){  				// if trying to add page
			$this->pagedb->addPage( $_GET['pname'] );
		}

		if( isset($_GET['dpage']) ){				// if trying to delete page
			$this->pagedb->deletePage( $_GET['dpage'] );
			header('location: ' . base_url() . 'admin');
		}

		// get all pages
		$data['pages'] = $this->numbers->set( $this->pagedb->getAllPages() );

		// Load views
		$this->load->view( 'admin/templates/head' );

		$this->load->view( 'admin/contents/pages', $data );

		$this->load->view( 'admin/templates/bottom' );

	}

	public function edit_page( $page = null ) {

		if(is_null( $page )){
			show_404();
		}		


		$this->load->model('pagedb');
		$this->load->library('numbers');

		// Does the page exists?
		if (!$this->pagedb->page_exists($page)) {
			show_404();
		}

		// If trying to update
		if ( isset( $_POST['name']) ) { // v--- Reverse
			$this->pagedb->updatePage( $page,$_POST['data'], $this->numbers->reverse_status($_POST['status']) ,$this->numbers->reverse_type( $_POST['type'] ) ,$_POST['order'], $_POST['name'] );
		}

		$data['page_data'] =  $this->pagedb->getPage($page);

		$this->load->view( 'admin/templates/head' );

		$this->load->view( 'admin/contents/page-editor', $data);

		$this->load->view( 'admin/templates/bottom' );
	}

	public function widgets() {

		$this->load->model('pagedb');

		if(isset($_GET['nwidget'])) { // Add a new widget
			$this->pagedb->addWidget($_GET['nwidget']);
			header('Location: ' . base_url() . 'admin/widgets');
		}

		if(isset($_GET['dwidget'])) {
			$this->pagedb->deleteWidget( $_GET['dwidget'] );
			header('Location: ' . base_url() . 'admin/widgets');
		}

		$data['widgets'] = $this->pagedb->getwidgets();

		$this->load->view( 'admin/templates/head' );

		$this->load->view( 'admin/contents/widgets', $data );

		$this->load->view( 'admin/templates/bottom' );
	}

	public function edit_widget($id = null) {

		if(is_null( $id )){
			show_404();
		}	

		$this->load->model('pagedb');

		//If trying to update
		if(isset($_POST['title'])){
			$this->pagedb->updateWidget( $_POST['id'], $_POST['title'], $_POST['content'], $_POST['order']);
		}

		$data['widget_data'] = $this->pagedb->getWidget($id);

		//If widget doesn't exist
		if(empty($data['widget_data'])){
			show_404();
		}

		$this->load->view( 'admin/templates/head');

		$this->load->view( 'admin/contents/widget-editor', $data);

		$this->load->view( 'admin/templates/bottom' );
	}

	public function blog_posts() {

		$this->load->model('pagedb');

		if( isset($_GET['npost']) ){
			$this->pagedb->addBlogPost( $_GET['npost']);
			header('location: ' . base_url() . 'admin/blog');
		}

		if( isset($_GET['dpost']) ){
			$this->pagedb->deleteBlogPost( $_GET['dpost'] );
			header('location: ' . base_url() . 'admin/blog');

		}

		$data['blog_posts'] = $this->pagedb->getBlogPosts();

		$this->load->view( 'admin/templates/head');

		$this->load->view( 'admin/contents/blog_posts', $data);

		$this->load->view( 'admin/templates/bottom' );

	}

	public function edit_post( $id = null ) {

		if(is_null( $id )){
			show_404();
		}	

		$this->load->model('pagedb');

		if(isset($_POST['title'])){
			$this->pagedb->updatePost($_POST['id'], $_POST['title'], $_POST['signature'], $_POST['content']);
		}

		$data['post_data'] = $this->pagedb->getPost( $id );

		//If post doesn't exist
		if(empty($data['post_data'])){
			show_404();
		}

		$this->load->view( 'admin/templates/head');

		$this->load->view( 'admin/contents/post-editor', $data );

		$this->load->view( 'admin/templates/bottom' );
	}

	public function misc() {
		if(isset($_GET['logout'])){
			   session_destroy();
			   header('location: ' . base_url());

		}
		$this->load->view( 'admin/templates/head' );

		$this->load->view( 'admin/contents/misc');

		$this->load->view( 'admin/templates/bottom');
	}

	public function install() {
	$this->load->model('pagedb');
	
	if(isset($_GET['install'])){
		$this->pagedb->install();
		echo '<span style="text-align: center; display: block; margin-top: 50px;">Tables created!<br><a href="' . base_url() .'admin"><input type="button" value="Start administrating"></input></a></span><br>'; 
	}else{
	
		echo '<span style="text-align: center; display: block; margin-top: 50px;">Installing will create 3 tables in your database, continue? <br>';
		echo '<a href="?install"><input type="button" value="Yes!"></a></span>';
	     }
	}
	
}