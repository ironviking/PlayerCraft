<!doctype html>

<html>

    <head>
        <meta charset="utf-8">
        <title>Playercraft | Login</title>
        <link rel="stylesheet" href="<?=base_url()?>css/login.css">
    </head>

    <body>

        <div id="box">
           <div id="box-top"> 
                 <img class="logo" src="<?=base_url()?>img/admin/medium-logo.png">
            </div>

            <form name="login" method="POST" action="">
                <p class="label">Username</p>
                    <input type="textbox" class="text-input" name="username">
                <p class="label">Password</>
                    <input type="password" class="text-input" name="password">
                <input type="submit" class="button" value="LOGIN">
                <p class="info">Playercraft CMS</p>
            </form>
        </div>

    </body>

</html>
