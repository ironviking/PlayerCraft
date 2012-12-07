<?php
	
	// Make a gallery :-)
	class Gallery {

	    public function createGallery()
	    {
	    	$gallery = "<h2>Gallery</h2><hr><br>";
	    	// This delightfull piece of code was orignally posted by PeejAvery, thanks for saving me brain capacity! :)
	    	$handle = opendir('gallery-source');
			while (false !== ($file = readdir($handle))){
			  $extension = strtolower(substr(strrchr($file, '.'), 1));
			  if($extension == 'jpg' || $extension == 'gif' || $extension == 'png'){
			   		$gallery = $gallery . '<div class="gallery-photo"><a href="'.base_url().'gallery-source/'.$file.'"><img  src="'.base_url().'gallery-source/'.$file.'" alt="GalleryPhoto"\></a><p>'. substr($file, 0, -4) .'</p></div>';
			  }

			} 
			return $gallery; 
	    }
}
