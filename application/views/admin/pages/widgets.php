<div id="NewBox">
	<h3>New widget</h3>
	<form action="" method="POST">
		<input name="title" type="text" placeholder="Title">
		<input type="submit" style="width: 100px; height: 24px;" value="Save">
		<input type="button" onclick="NoNewBox(); return false;" style="width: 100px; height: 24px;" value="Cancel">
	</form>
</div>
<section>
	<h2>Widgets</h2>
	<hr>
	<h3>Current widgets (<?=$widgets->num_rows()?>)</h3>
	<?php
	foreach($widgets->result() as $widget){
		echo '<div class="widget">';
		echo '<h4>'. $widget->title .'<a href="?action=delete&widget='. $widget->id .'"><img class="remove" src="'.base_url().'images/admin/remove.png"></a><a href="' . base_url() . 'admin/EditWidget/'. $widget->id .'"><img class="remove" src="'.base_url().'images/admin/edit.png"></a></h4>';
		echo '<p>'. $widget->content .'</p>';
		echo '</div>';
	}
	?>
	
	<br>
		<a onclick="NewBox(); return false;" href="#"><button>New widget</button></a>
</section>
