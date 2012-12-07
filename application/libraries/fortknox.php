<?php
	
	// This library contains security stuff
	class Fortknox {

	    public function dbready($page)
	    {
	    	// Replace _ with space
	    	$return = str_replace('_', ' ', $page);
	    	// Make safe
	    	$return = mysql_real_escape_string($return);
	    	return $return;
	    }

	    public function escape($string) {
	    	return mysql_real_escape_string($string);
	    }
}