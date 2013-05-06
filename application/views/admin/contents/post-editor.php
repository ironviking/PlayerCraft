<?php
foreach($post_data as $post){
	$data['id'] = $post->id;
	$data['title'] = $post->title;
	$data['content'] = $post->content;
}
?>

<h4 class="section-title">Edit post <a href="#">[<?php echo htmlentities($post->title); ?>]</a> </h4>

<section class="section-content">

<form class="post-editor-form" method="POST" action="">

	<p>Title:</p>
	<input name="title" type="text" class="textbox-100px" value="<?php echo $post->title; ?>">
	<p>Signature:</p>
	<input name="signature" type="text" class="textbox-100px" value="<?php echo $post->by; ?>"><br><br>

	<p>Content:</p><br>
	<textarea name="content"><?php echo $post->content; ?></textarea>

	<a href="<?php echo base_url(); ?>admin/blog">
		<input style="float: right; margin-top: 10px; margin-left: 5px;" class="button" type="button" value="cancel">
	</a>
	<!-- This is hidden, id used for updating the widget -->
	<input type="text" style="visibility: hidden;" name="id" value="<?php echo $data['id']; ?>">

	<input style="float: right; margin-top: 10px;" type="submit" class="button" value="save">

</form>

</section>