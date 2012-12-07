<?php
	
	// Blogify the content
	class Blogify {

	    public function setBlog($posts)
	    {
	    	// Update each post with a new, awesome blog format and put it in $blog variable
	    	$blog = null;
	    	foreach($posts as $post) {
	    		$blog = '<article class="blog-post"><h3 class="blog-title">' . $post->title . '</h3><section class="blog-content"> ' . $post->content . '</section><div class="blog-avatar"><img src="'.base_url().'/img/avatar.png" alt="Avatar"\></div><p class="by"> <strong>Posted:</strong> ' . date('F j, Y, g:i a',$post->time) .' <strong>By:</strong> ' . $post->by . ' </p></article>' . $blog;
	    	}

	    	return $blog;
	    }
}
