<h4 class="section-title">misc</h4>

<?php
	$current_version = file_get_contents('application/version.txt');
	$license = file_get_contents('license.txt');
?>

<section style="font-family: arial;" class="section-content">
<p style="text-align: center;">PlayerCraft version <strong style="font-weight: bold"><?php echo $current_version; ?></strong></p><br>
<span style="text-align: center; display: block;">
	<a target="_BLANK" href="https://github.com/ironviking/PlayerCraft" class="button">Github</a>
	<a target="_BLANK" href="https://github.com/ironviking/PlayerCraft/wiki" class="button">Wiki</a>
	<a target="_BLANK" href="http://www.minecraftforum.net/topic/1170355-web-playercraft-minecraft-web-cms-server-website-in-minutes/" class="button">MCF</a>
	<hr>
	<a href="?logout" class="button">Log me out</a>
</span>
<h4>License</h4>
<textarea readonly style="width: 625px; border: 1px solid gray; margin: 10px; height: 215px;"><?php echo $license; ?></textarea>
<p style="text-align: right;">FreeBSD license</p>
</section>