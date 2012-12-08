<?/* PlayerCraft 2.0 default template */?>
	<?php $url = base_url() ?>

<!doctype html>

<html>

<head>

	<meta charset="utf-8">
	<title> <?=$page?> | <?=$site_name?> </title> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=$url?>styles/<?=$style?>/style.css">
	<link href="<?=$url?>img/favicon.png" rel="icon" type="image/png"/>

</head>

<!-- BODY -->
<body>

<!-- HEADER [header] -->
<header>
	<!-- Logo image, location: /img/logo.png -->
	<a href="<?=$url?>">
		<img src="<?=$url?>img/logo.png" alt="Logo" title="Logo"/>
	</a>
</header>

<!-- NAVIGATION [nav]-->
<nav>

	<ul>
		<?php // Get all menu items on screen
			foreach($menu_items as $menu) {
				echo '<a href="' . base_url() . $menu->href . '"><li>' . $menu->name . '</li></a>';
			}
		?>
	</ul>

</nav>

<div class="wrapper">

<!-- MAIN CONTENT [#content] -->
<section id="content">

	<?php // Write content (if it exists, which it should)
		if(isset($content)){
			echo $content;
		}
	?>

</section>

<!-- SIDEBAR [aside] -->
<aside>


	<?php // Write all widgets
		foreach($widgets as $widget) {
			echo '<article class="widget"><h4>'. $widget->title .'</h4><p>'. $widget->data .'</p></article>';
		}
	?>

</aside>

<!-- FOOTER [footer] -->
<footer>
	<p> <?=$footer?> </p>
</footer>

</div> <!-- End wrapper -->

<a class="admin-login-link" href="admin">Administration</a>
</body>

</html>
