<?php/* PlayerCraft 2.0 default template */
	$url = base_url() 
?><!doctype html>
<html
<head>
	<meta charset="utf-8">
	<title> <?php echo $page; ?> | <?php echo $site_name; ?> </title> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo $url; ?>styles/<?php echo $style; ?>/style.css">
	<link href="<?php echo $url; ?>img/favicon.png" rel="icon" type="image/png"/>
</head>

<!-- BODY -->
<body>

<!-- HEADER [header] -->
<header>
	<!-- Logo image, location: /img/logo.png -->
	<a href="<?php echo $url; ?>">
		<img src="<?php echo $url; ?>img/logo.png" alt="Logo" title="Logo"/>
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
	<p> <?php echo $footer; ?> </p>
</footer>
</div> <!-- End wrapper -->
<a class="admin-login-link" href="admin">Administration</a>
</body>
</html>
