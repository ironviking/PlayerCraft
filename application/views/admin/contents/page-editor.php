<?php
		function fix( $page ){
			return str_replace(' ', '_', $page);
		}

// This is one big messy file! :) A cookie to the one who move this PHP to a library.

	foreach ($page_data as $page_prop) {
		$page['data']  =  $page_prop->data;
		$page['name']  =  $page_prop->name;
		$page['data']  =  $page_prop->data;
		$page['order'] =  $page_prop->order;
		$page['ntype'] = $page_prop->type;

		switch($page_prop->status){
			case 1: // open
				$page['status'] = '<option name="open" selected>open</option> <option>hidden</option> <option>closed</option>';
				break;
			case 2: // hidden
				$page['status'] = '<option>open</option> <option selected>hidden</option> <option>closed</option>';
				break;
			case 3: // closed
				$page['status'] = '<option>open</option> <option>hidden</option> <option selected>closed</option>';
				break;
			default:
				$page['status'] = 'null';
		}

		switch($page_prop->type){
			case 1: // html
				$page['type'] = '<option name="Html" selected>Html</option> <option>blog</option> <option>iFrame</option> <option>redirect</option> <option>PHP</option><option>Gallery</option>';
				break;
			case 2: // blog
				$page['type'] = '<option>Html</option> <option selected>blog</option> <option>iFrame</option> <option>redirect</option> <option>PHP</option><option>Gallery</option>';
				break;
			case 3: // iFrame
				$page['type'] = '<option>Html</option> <option>blog</option> <option selected>iFrame</option> <option>redirect</option> <option>PHP</option><option>Gallery</option>';
				break;
			case 4: //redirect
				$page['type'] = '<option>Html</option> <option>blog</option> <option>iFrame</option> <option selected>redirect</option> <option>PHP</option><option>Gallery</option>';
				break;
			case 5: // PHP
				$page['type'] = '<option>Html</option> <option>blog</option> <option>iFrame</option> <option>redirect</option> <option selected>PHP</option><option>Gallery</option>';
				break;
			case 6: // Gallery
				$page['type'] = '<option>Html</option> <option>blog</option> <option>iFrame</option> <option>redirect</option> <option>PHP</option> <option selected>Gallery</option>';
				break;
			default:
				$page['type'] = 'null';
		}
	}
?>

<h4 class="section-title">Edit page <a href="<?=base_url() . fix($page['name'])?>">[<?=$page['name']?>]</a></h4>
<section class="section-content">
<form name="save" action="" method="POST">

	<div id="editor"></div>
	<!-- Properties -->
	<div id="properties">
	<!-- NAME --><br>
	<h4> Name </h4>
	<input name="name" class="text-input" type="text" value="<?=$page['name']?>">
	
	<!-- TYPE -->
	<h4> Type </h4>
	<select name="type" class="text-input">
		<?=$page['type']?>
	</select>

	<!-- STATUS -->
	<h4> Status</h4>
	<select name="status" class="text-input">
		<?=$page['status']?>
	</select>

	<!-- PAGE ORDER -->
	<h4>Page order</h4>
	<input name="order" type="text" class="text-input" value="<?=$page['order']?>">

	<br><br>
	<input type="submit" class="button text-input" value="update">
	<a href="<?=base_url()?>admin">
		<input type="button" class="button text-input" value="cancel">
	</a>
	</div>
	    
	<script src="http://d1n0x3qji82z53.cloudfront.net/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
	<!-- Hidden textarea -->
	<textarea style="display: none" name="data"><?=$page['data'];?></textarea>

</form>


<!-- load jquery library -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- Create ace editor -->
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/html");
    var textarea = $('textarea[name="data"]');
	editor.getSession().setValue(textarea.val());
	<?php if($page['ntype'] == 2){
		echo 'editor.setReadOnly(true);';
	} ?> 
	editor.getSession().on('change', function(){
	  textarea.val(editor.getSession().getValue());
	});
</script>
</section>