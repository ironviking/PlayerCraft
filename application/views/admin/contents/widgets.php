<!-- Widgets -->
<h4 class="section-title">Widgets <a onclick="newWidget();" href="#">[+]</a></h4>
<section class="section-content">
<p style="visibility: hidden;">clear</p>

	<?php // Write all widgets

		foreach($widgets as $widget){
			
			// Widget
			echo '<article><h4>' . $widget->title . '</h4><p>' . $widget->data . '</p></article>';

			// Edit box
			echo '<div class="widget-edit-box"><a href="'. base_url() .'admin/widgets/'. $widget->id .'"><img src="'. base_url() . 'img/admin/edit.png" alt="Edit" title="Edit widget"\></a><a href="'.base_url().'admin/widgets?dwidget='.$widget->id.'"><img style="float: right" src="'. base_url() . 'img/admin/remove.png" alt="Delete" title="Delete widget"\></a></div>';
		}

			//If there is no widget
			if(empty($widgets)){ echo "<h5 style='text-align: center; font-family: arial;'>You have no widgets added, how about <a onclick='newWidget();' href='#'>adding</a> one?</h5>";}
		
	?>
<br>
</section>

<script>
//Add new widget
function newWidget()
{
	var x;

	 x = window.prompt("Widget Title","");

	 if(x != null){
	 	window.location.href='?nwidget=' + x;
	 }else{
	 	return false;
	 }

}
</script>


