<?php
		function fix( $page ){
			return str_replace(' ', '_', $page);
		}
?>
		<h4 class="section-title">pages <a href="#" onclick="newPage();" title="Add page">[+]</a></h4>
		<section class="section-content">
		<table class="page-table">

			<tr>
				<th style="text-align: center;">name</th>
				<th style="text-align: center;">type</th>
				<th style="text-align: center;">status</th>
				<th style="text-align: center;">order</th>
			</tr>
			<?php // Write all pages to table
				foreach($pages as $page) {
					echo '<tr> <td style="text-align: center;"><a href="'. fix($page->name) .'"> ' . $page->name . '</a> </td> <td style="text-align: center;"> ' . $page->type . ' </td> <td style="text-align: center;"> ' . $page->status . ' </td> <td style="text-align: center;"> '. $page->order .' </td> <td width="70px"> <a href="' . base_url() . 'admin/page/'. fix( $page->name ) .'"><img src="'. base_url() .'img/admin/edit.png"></a>  <a href="?dpage='. $page->name .'"><img src="'. base_url() .'img/admin/remove.png"></a></td>  </tr>';
				}
			?>
		</table>
<script>
//Add new page
function newPage()
{
	var x;

	 x = window.prompt("Page name","");

	 if(x != null){
	 	window.location.href='?pname=' + x;
	 }else{
	 	return false;
	 }

}
</script>
</section>