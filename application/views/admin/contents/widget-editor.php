<?php
foreach($widget_data as $widget){
	$data['id'] = $widget->id;
	$data['title'] = $widget->title;
	$data['order'] = $widget->order;
	$data['content'] = $widget->data;
}
?>

<h4 style="padding-bottom: -5px;" class="section-title">Edit widget <a href="<?=base_url()?>">[<?=$widget->title?>]</a></h4>

<section style="padding: 10px;" class="section-content">

<form class="new-widget-form" method="post" action="">

	<p style="display:inline;">Title: </p>
	<input class="textbox-100px" type="text" name="title" value="<?=$data['title']?>"> 
	<p style="display:inline;">Order: </p>
	<input class="textbox-100px" type="text" name="order" value="<?=$data['order']?>"> <br><br>

	<label>Content:</label><br>
	<textarea name="content" style="width: 620px; height: 200px;"><?=$data['content']?></textarea>

	<a href="<?=base_url()?>admin/widgets">
		<input style="float: right; margin-top: 10px; margin-left: 5px;" class="button" type="button" value="cancel">
	</a>
	<!-- This is hidden, id used for updating the widget -->
	<input type="text" style="visibility: hidden;" name="id" value="<?=$data['id']?>">

	<input style="float: right; margin-top: 10px;" type="submit" class="button" value="save">
</form>

</section>