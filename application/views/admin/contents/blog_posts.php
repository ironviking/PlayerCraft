<h4 class="section-title">Blogging <a onclick="newPost();" href="#">[+]</a></h4>

<section class="section-content">

	<?php


	foreach($blog_posts as $post){
		echo '<div class="blog_post"> <h4>'. $post->title .' </h4> <p class="blog-post-time">'.date('F j',$post->time).'</p> <p>'.$post->content .'</p><br><a href="'.base_url().'admin/blog/post/'.$post->id.'">Edit this post</a> | <a href="'.base_url().'admin/blog?dpost='.$post->id.'">Delete this post</a></div>';
	}
		    //If there is no blog posts
	    	if(empty($blog_posts)){ echo "<br><h5 style='text-align: center; font-family: arial;'>You have no blog posts, how about <a onclick='newPost();' href='#'>posting</a> one?</h5>";}
	?>
</section>

<script>
//Add a new blog post
function newPost()
{
	var x;

	 x = window.prompt("Post Title","");

	 if(x != null){
	 	window.location.href='?npost=' + x;
	 }else{
	 	return false;
	 }

}
</script>