<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
if(!isset($_SESSION['admin']) && !$_SESSION['admin'] == TRUE)
{
	header("location: login");
	exit('No access!');
}
class Admin extends CI_Controller {
	
	public function index()
	{
		#Initilize models (pageDB)
		$this->load->model('pageDB');
		
		#Anything happend?
		if(isset($_GET['page']))
		{
			if(isset($_GET['action']))
			{
				if($_GET['action'] == 'Edit')
				{
					header('location: ' . base_url() .'admin/edit/' . str_replace(' ','_',$_GET['page']));
				}
				
				if($_GET['action'] == 'Create')
				{
					$this->pageDB->addPage($_GET['page']);
					header('location: ' . base_url() . 'admin');
				}
				
				if($_GET['action'] == 'Delete')
				{
					$this->pageDB->deletePage($_GET['page']);
				}
				
				if($_GET['action'] == 'Go')
				{
					header('location: '. base_url() . str_replace(' ','_', $_GET['page']));
				}
			}
		}
		
		#Get data for pages
		$data['pages'] = $this->pageDB->getAllMenuItems();
		
		#Initilize views
		$this->load->view('admin/head');
		$this->load->view('admin/navigation');
		$this->load->view('admin/pages/pages', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/end');
	}
	
	public function edit($page)
	{
		#Initilize models
		$this->load->model('pageDB');
		
		#Does the page even exists?
		$this->pageDB->page_exists($page);
		#Anything happend? 
		if(isset($_POST['action']))
		{
			$update = $this->pageDB->updatePage($page, $_POST['name'], $_POST['content'], $_POST['order'], $_POST['status']);
			if(!$update){
				$data['notice'] = "Page didn't save";
			}else{
				$data['notice'] = 'Page updated! <a target="__blank" href="'. base_url() . $page . '">[view]</a>';
			}
		}
		
		#Get data
		$data['pageData'] = $this->pageDB->getPageData($page);
		
		#Initilize views
		$this->load->view('admin/head');
		$this->load->view('admin/navigation');
		$this->load->view('admin/pages/edit', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/end');
	}
	
	public function widgets()
	{
		#Initilize models
		$this->load->model('pageDB');
	
		#Anything todo?
		if(isset($_POST['title'])){ #Add a new widget?
			$this->pageDB->AddWidget($_POST['title'], $_POST['content']);
		}
		if(isset($_GET['action'])){
			if($_GET['action'] == 'delete'){ #Delete a widget?
				$this->pageDB->deleteWidget($_GET['widget']);
				header('location: ' . base_url() . 'admin/widgets');
			}
		}
			
		#Get data
		$data['widgets'] = $this->pageDB->getWidgets();
		
		#Initilize widgets
		$this->load->view('admin/head');
		$this->load->view('admin/navigation');
		$this->load->view('admin/pages/widgets', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/end');
	}
	
	public function misc()
	{
		#Get configurations
		$this->config->load('site');
		
		$data['description'] = $this->config->item('description');
		$data['title'] 		 = $this->config->item('title');
		
		#Anything to do
		if(isset($_POST['logout'])){
			session_unset();
			session_destroy();
			header('location: ', base_url());
		}
				
		#Initilize widgets
		$this->load->view('admin/head');
		$this->load->view('admin/navigation');
		$this->load->view('admin/pages/misc', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/end');
	}
	
	public function EditWidget($id)
	{
		#Initilize models
		$this->load->model('pageDB');
		
		#Anything todo?
		if(isset($_POST['content'])){
			$this->pageDB->updateWidget($id, $_POST['title'], $_POST['content'], $_POST['order']);
		}
		
		#Get Data
		$data['widget'] = $this->pageDB->GetWidget($id);
		
		#Does the widget exists?
		# !Do widget check! #
		
		#Initlize views
		$this->load->view('admin/head');
		$this->load->view('admin/navigation');
		$this->load->view('admin/pages/EditWidget', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/end');
	}
	
	public function install()
	{
		$this->load->model('pageDB');
		if(isset($_POST['install'])){
			$this->pageDB->install();
			echo 'Done!<br>';
			echo '<a href="admin"><button>Continue to admin panel</button></a>';
		}else{
		$this->load->view('install/install');
		}
	}
	
}
