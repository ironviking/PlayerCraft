<?php
class PageDB extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getMenuItems()
    {
              $this->db->select('name');
			  $this->db->order_by("ord", "asc");
			  $this->db->where('status', 1); 
			  $query = $this->db->get('pages');
			  return $query;
    }
	
	function getAllMenuItems()
    {
              $data = $this->db->query("SELECT name FROM pages");
              return $data;
    }
	
	function is_closed($page)
	{
		$page = str_replace('_', ' ', $page);
		$data = $this->db->query("SELECT status FROM pages WHERE name='$page'");
		if($data->row('status') == 3){
			return true;
		}
	}
	
    function getPageContent($page)
    {        $page = str_replace('_', ' ', $page);
             $data = $this->db->query("SELECT content FROM pages WHERE name='$page'");
             return $data->row('content');
    }
	
    function getWidgets()
    {
              $this->db->select('*');
			  $this->db->order_by("ord", "asc");
			  $query = $this->db->get('widgets');
			  return $query;
    }
	
	function getPageData($page)
	{
		$page = str_replace('_',' ', $page);
		$data = $this->db->query("SELECT * FROM pages WHERE name='$page'");
		return $data;
	}
	
	function deletePage($page)
	{
		if($page == 'start'){
			show_error('<p>You may not delete the start page.</p><br /><a href="admin"><input type="buton" value="Back"></a>');
		}
		$page = mysql_real_escape_string($page);
		$page = str_replace('_', ' ', $page);
		$this->db->query("DELETE FROM pages WHERE name='$page'");
	}
	
	function addPage($page)
	{
		$page = htmlentities(mysql_real_escape_string($page));
		$this->db->query("INSERT INTO pages (`id`, `name`, `content`, `ord`, `status`) VALUES (NULL, '$page', '<p>Page content</p>', '10', '1');");
	}
	
	function page_exists($page)
	{
		$page = str_replace('_',' ',$page);
		$query = $this->db->query("SELECT id FROM pages WHERE name='$page'");
		if($query->num_rows() == 0){
			show_404();
		}
	}
	
	function updatePage($page, $name, $content, $order, $status)
	{
		
		$page = mysql_real_escape_string(str_replace('_', ' ', $page));
		$content = mysql_real_escape_string($content);
		$order = mysql_real_escape_string($order);
		$status = mysql_real_escape_string($status);
		switch($status)
		{
			case 'open':
				$status = 1;
				break;
			case 'hidden':
				$status = 2;
				break;
			case 'closed':
				$status = 3;
				break;
			default: 
				$status = 1;
		}
		if(!is_numeric($order)){
			$order = 10;
		}
		$this->db->query("UPDATE pages SET `name` = '$name', `content` = '$content', `ord` = '$order', `status` = '$status' WHERE name = '$page';");
		if($page != $name){
			header('location: '. base_url() .'admin');
		}
	}
	
	function addWidget($title, $content)
	{
		$title = mysql_real_escape_string($title);
		$content = mysql_real_escape_string($content);
		$this->db->query("INSERT INTO `widgets` (`id`, `title`, `content`) VALUES (NULL, '$title', '$content');");
	}
	
	function deleteWidget($id)
	{
		$this->db->query("DELETE FROM widgets WHERE id='$id'");
	}
	
	function GetWidget($id)
	{
		$data = $this->db->query("SELECT * FROM widgets WHERE id='$id'");
		return $data;
	}
	
	function updateWidget($id, $title, $content, $order)
	{
		if(!is_numeric($order)){
			$order = 5;
		}
		$this->db->query("UPDATE `widgets` SET `title` = '$title',`content` = '$content',`ord` = '$order' WHERE `id` =$id;");
	}
	
	function install()
	{
		#Create pages & widgets table
		$this->db->query("CREATE TABLE `pages` (`id` int(11) NOT NULL AUTO_INCREMENT,`name` varchar(255) NOT NULL,`content` text NOT NULL,`ord` int(11) NOT NULL,`status` int(11) NOT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1");
		$this->db->query("CREATE TABLE `widgets` ( `id` int(11) NOT NULL AUTO_INCREMENT,`title` varchar(255) NOT NULL, `content` text NOT NULL, `ord` int(11) NOT NULL DEFAULT '5', PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1");
		#Default start page
		$this->db->query("INSERT INTO `pages` (`id`, `name`, `content`, `ord`, `status`) VALUES (NULL, 'start', '<p>Default start page</p>', '1', '1');");
		$this->db->query("INSERT INTO `widgets` (`id`, `title`, `content`, `ord`) VALUES (NULL, 'Widget', 'Edit this in the admin panel', '1');");
	}
}
