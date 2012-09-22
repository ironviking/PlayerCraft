<?php
foreach($pageData->result() as $page)
{
	$pageContent['source'] = $page->content;
	$pageContent['name']   = $page->name;
	$pageContent['order']  = $page->ord;
	$pageContent['status'] = $page->status;
}

switch($pageContent['status'])
{
	case 1:
	     $status = '<option name="open" selected>open</option>\n<option name="hidden">hidden</option>\n<option name="closed">closed</option>';
		break;
	case 2:
		$status = '<option name="open">open</option>\n<option name="hidden" selected>hidden</option>\n<option name="closed">closed</option>';
		break;
	case 3:
		$status = '<option name="open">open</option>\n<option name="hidden">hidden</option>\n<option name="closed" selected>closed</option>';
		break;
	default:
		$status = "<option>null (?)</option>";
}

?>

<div id="content">
	<?php
	if(isset($notice)){
		echo '<div class="editor-notice">';
		echo '<p style="color: white;">' . $notice . '</p>';
		echo '</div>';
	}
	?>
	<form method="post" action"">
	<textarea style="resize: none; height: 257px; width: 415px;" name="content" wrap="off" rows="15" cols="50"><?=$pageContent['source']?></textarea>
		<div id="PageProperties">
		<h4>Properties</h4>
		<hr><br />
		<div class="prop">
		<p>Name</p>
		<input style="width: 150px;" name="name" required type="text" value="<?=$pageContent['name']?>">
		</div>
		<div class="prop">
		<p>Order</p>
		<input style="width: 150px;" name="order" required type="number" value="<?=$pageContent['order']?>">
		</div>
		<div class="prop">
		<p>Status</p>
		</div>
		<select style="width: 150px;" name="status" style="width: 155px;">
			<?=$status?>
		</select>
	</div>
	<div class="mtop">
		<input type="submit" class="button" name="action" value="Save">
		<a href="<?=base_url()?>admin" class="button">Cancel</a>
		</form>
	</div>
</div>

