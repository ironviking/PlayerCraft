<?php
 $version = file_get_contents('application/version.txt');
?>

<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?=base_url()?>css/login.css">
	<title>PlayerCraft » Login</title>
</head>

<body>

<div id="login-box">
 <h4 style="padding: 5px;">PLAYERCRAFT » LOGIN</h4>
<br>
	<form name="login" method="POST" action="">
		<p>Username:</p>
		<input class="textbox" type="text" name="username">
		<p>Password:</p>
		<input class="textbox" type="password" name="password">
		<br><input class="button" style="width: 250px; margin-top: 10px;" type="submit" value="login">
	</form>
	<p class="version"> v.<?=$version?></p>

</div>

</body>

</html>