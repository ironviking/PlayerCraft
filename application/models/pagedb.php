<?php

class Pagedb extends CI_Model {

    function __construct()
    {
        $this->load->library('fortknox');
        parent::__construct();
    }

    // Get type of page (1, 2, 3 or 4)
    function pagetype($page) {
    	// Make ready for query
    	$page = $this->fortknox->dbready($page);
    	$query = $this->db->query("SELECT type FROM pages WHERE name='$page'");
    	return $query->row('type');

    }

    function pageContent($page) {
    	// Make ready for query
    	$page = $this->fortknox->dbready($page);
    	$data = $this->db->query("SELECT data FROM pages WHERE name='$page'");
        return $data->row('data');

    }

    function getMenuItems() { // Don't get hidden pages
    	$this->db->select('name');
		$this->db->order_by("order", "ASC");
		$this->db->where('status', 1); 
		$query = $this->db->get('pages');
		return $query->result();
    }

    function getAllPages() { // Ignores hidden pages
    	$this->db->select('*');
		$this->db->order_by("order", "asc");
		$query = $this->db->get('pages');
		return $query->result();
    }

    function iframe($page) {
    	$page = $this->fortknox->dbready( $page );
    	$query = $this->db->query("SELECT data FROM pages WHERE name='$page'");
    	$data  = '<iframe src="' . $query->row('data') . '"></iframe>';
    	return $data;
    }

    function getBlogPosts() {
    	$this->db->select('*');
		$this->db->order_by("time", "ASC");
		$query = $this->db->get('blog_posts');
		return $query->result();
    }

    function page_closed($page) {
    	$page = $this->fortknox->dbready($page);
    	$query = $this->db->query("SELECT status FROM pages WHERE name='$page'");
    	//Check weather the page is closed or not
    	if($query->row('status') == 3){
    		return true;  // closed
    	}else {				
    		return false; // open
    	}

    }

    function getWidgets() {
    	$this->db->select('*');
		$this->db->order_by("order", "asc");
		$query = $this->db->get('widgets');
		return $query->result();
    }

    function getWidget($id) {
        if(!is_numeric($id)){ return false; }

        $query = $this->db->query("SELECT * FROM widgets WHERE id=$id");
        return $query->result();
    }

    function getPage( $page ) {
    	$page = $this->fortknox->dbready( $page );
    	$query = $this->db->query("SELECT * FROM pages WHERE name='$page'");
    	return $query->result();
    }

    function getPost( $id ) {
         if(!is_numeric($id)){ return false; }

         $query = $this->db->query("SELECT * FROM blog_posts WHERE id='$id'");
         return $query->result();
    }

    function page_exists( $page ){
        $page = $this->fortknox->dbready( $page );
        $query = $this->db->query("SELECT * FROM pages WHERE name='$page'");
        if( $query->num_rows() == 0){
            return false;
        }else { return true; }
    }
    // ^-- GET --^


    // ADD

    function addBlogPost($title) {
        $title = $this->fortknox->escape( $title );

        $this->db->query("INSERT INTO `playercraft`.`blog_posts` (`id`, `title`, `content`, `by`, `time`) VALUES (NULL, '$title', '', 'admin', '".time()."');");
    }

    function addPage( $name ){
    	$name = $this->fortknox->dbready( $name );
    	$this->db->query("INSERT INTO `pages` (`id`, `name`, `data`, `type`, `status`, `order`, `widgets`) VALUES (NULL, '$name', '', '1', '1', '5', '1');");
    }

    function addWidget( $title ){
        $title = $this->fortknox->escape( $title );
        $this->db->query("INSERT INTO `widgets` (`id`, `title`, `data`, `type`, `order`) VALUES (NULL, '$title', '', '1', '5');");
    }


    // DELETE

    function deletePage( $name ){
    	$name = $this->fortknox->dbready( $name );
    	$this->db->query("DELETE FROM `pages` WHERE `name` = '$name'");
    }

    function deleteWidget( $id ){
        if(!is_numeric($id)) { return false; }

        $this->db->query("DELETE FROM `widgets` WHERE `id` = " . $id);
    } 

    function DeleteBlogPost( $id ) {
         if(!is_numeric($id)) { return false; }

        $this->db->query("DELETE FROM `blog_posts` WHERE `id` = " . $id);         
    }

    // UPDATE
    function updateWidget($id, $title, $content, $order){

        if(!is_numeric($id) or !is_numeric($order)){
            return false;
        }

        $name   =   $this->fortknox->escape(    $title     ); 
        $name   =   $this->fortknox->escape(    $content   ); 
        $this->db->query("UPDATE `widgets` SET `title` = '$title', `data` = '$content', `order` = '$order' WHERE `id` = $id;");
    }

    function updatePage( $name, $data, $status, $type, $order, $new_name) {
        $name   =   $this->fortknox->dbready(   $name    ); 
        $new_name = $this->fortknox->escape(    $new_name );
        $data   =   $this->fortknox->escape(    $data     ); 
        $status =   $this->fortknox->escape(    $status   ); 
        $type   =   $this->fortknox->escape(    $type     ); 
        $order  =   $this->fortknox->escape(    $order    ); 
        if( $this->page_exists($name)){
    	$this->db->query("UPDATE `pages` SET `data` = '$data', name = '$new_name', `type` = '$type', `status` = '$status', `order` = '$order' WHERE name = '$name';");
        if($name != $new_name){
            header('Location: ' . base_url() . 'admin/page/' . str_replace(' ', '_', $new_name));
        }
    }
    }

    function updatePost( $id, $title, $signature, $content ) {
        $title = $this->fortknox->dbready( $title );
        $signature = $this->fortknox->dbready( $signature );
        $content = $this->fortknox->dbready( $content );
        $this->db->query("UPDATE `blog_posts` SET `title` = '$title', `content` = '$content', `by` = '$signature' WHERE `id` = $id;");
    }

    //install
    function install() {
        $this->db->query("CREATE TABLE `blog_posts` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `title` varchar(255) NOT NULL,  `content` text NOT NULL,  `by` varchar(255) NOT NULL,  `time` int(11) NOT NULL,  PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1");
        $this->db->query("CREATE TABLE `pages` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `name` varchar(255) NOT NULL,  `data` text NOT NULL,  `type` int(11) NOT NULL,  `status` int(11) NOT NULL,  `order` int(11) NOT NULL,  `widgets` tinyint(1) NOT NULL,  PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1");
        $this->db->query("CREATE TABLE `widgets` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `title` varchar(255) NOT NULL,  `data` text NOT NULL,  `type` int(11) NOT NULL,  `order` int(11) NOT NULL,  PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1");        
        $this->db->query("INSERT INTO `pages` (`id`, `name`, `data`, `type`, `status`, `order`, `widgets`) VALUES (NULL, 'start', '<span style=\'display: block; text-align: center\'> <img src=\'http://i.imgur.com/Ljvfj.png\' title=\'ironviking\' alt=\'ironviking\'/> <p>Thanks for using playercraft :-)</p><br> <span style=\'font-size: 9px; color: gray\'>Please edit site.php configuration in config folder to change the page title, footer text and page name.</span> </span>', '1', '1', '1', '1');");
    }

}