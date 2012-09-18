<?php
foreach($widget->result() as $wid){
	$widget_prop['title'] = $wid->title;
	$widget_prop['content'] = $wid->content;
	$widget_prop['order'] = $wid->ord;
}
?>

<div id="content">
	<div id="editwidget">
	<form method="post" action="">
		<textarea cols="75" style="resize: none;" rows="10" name="content"><?=$widget_prop['content']?></textarea>
		<div class="mtop"><label>Title: </label><input name="title" required type="text" value="<?=$widget_prop['title']?>"><label> Order: </label><input name="order" required  type="number" value="<?=$widget_prop['order']?>"><br><br><input class="button" type="submit" value="save"> <a href="<?=base_url()?>admin/widgets" class="button">Cancel</a></div>
	</form>
	</div>
</div>
