<?php
	
	// Set number to data
	class Numbers {

	    public function set( $pages )
	    {
	    	foreach( $pages as $page) {
	    		switch( $page->type ){
	    			case 1: //html
	    				$page->type = 'Html';
	    				break;
	    			case 2: //blog
	    				$page->type = 'Blog';
	    				break;
	    			case 3: // iFrame
	    				$page->type = 'iFrame';
	    				break;
	    			case 4: // Redirect
	    				$page->type = 'Redirect';
	    				break;
	    			case 5: // PHP
	    				$page->type = 'PHP';
	    				break;
	    			case 6: // Gallery
	    				$page->type ="Gallery";
	    				break;
	    			default:
	    				$page->type = 'Uknown';

	    		}

	    		switch( $page->status ) {
	    			case 1: // Open
	    				$page->status = 'Open';
	    				break;
	    			case 2: // Hidden
	    				$page->status = 'Hidden';
	    				break;
	    			case 3: // Closed
	    				$page->status = 'Closed';
	    				break;
	    			default:
	    				$page->status = 'Uknown';
	    		}
	    	}
	    	

	    	return $pages;
	    }

	    public function reverse( $page ) {
	    	foreach ( $page as $p ){
	    		switch ( $p->type ) {
	    			case 'HTML':
	    				$p->type = 1;
	    				break;
	    			case 'Blog':
	    				$p->type = 1;
	    				break;
	    			case 'iFrame':
	    				$p->type = 1;
	    				break;
	    			case 'Redirect':
	    				$p->type = 1;
	    				break;
	    			case 'PHP':
	    				$p->type = 1;
	    				break;
	    			case 'Gallery':
	    				$p->type = 1;
	    			default:
	    				$p->type = 1;
	    				break;
	    		}
	    	}
	    }

	    public function fixMenu( $pages ) {
	    	foreach ( $pages as $page ) {
	    		$page->href = str_replace(' ', '_', $page->name);	
	    	}

	    	return $pages;

	    }

	  public function reverse_type( $type ){
	  	switch( $type ){
					case 'HTML':
	    				$type = 1;
	    				break;
	    			case 'blog':
	    				$type = 2;
	    				break;
	    			case 'iFrame':
	    				$type = 3;
	    				break;
	    			case 'redirect':
	    				$type = 4;
	    				break;
	    			case 'PHP':
	    				$type = 5;
	    				break;
	    			case 'Gallery':
	    				$type = 6;
	    				break;
	    			default:
	    				$type = 1;
	    				break;	  		
	  	}
	  	return $type;
	  }

	  public function reverse_status( $status ){

	  	switch( $status ){
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
	  	return $status;
	  }

}
