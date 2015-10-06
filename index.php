<?php
/**
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html>
    <head>
        <!-- Boilerplate -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        
        <!-- Security -->
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="header-container">
                <h1 class="title">Secure Login</h1>
                <nav>
                    <ul>
                        <li><a href="register.php">register</a></li>
                        <li><a href="includes/logout.php">log out</a></li>
                        <li><a href="protected_page.php"><?php  (login_check($mysqli) == true); echo htmlentities($_SESSION['username']); ?></a></li>
                    </ul>
                </nav>
        </div>
        <div class="main-container">

<div style="display:flex;justify-content:center;align-items:center;">
<?php
    if (isset($_GET['error'])) {echo '<p class="error">Error Logging In!</p>';}
    ?>

<form action="includes/process_login.php" method="post" name="login_form">
<div class="input"><input type="e-mail" name="email" placeholder="E-mail" /></div>
<div class="input"><input type="password" name="password" id="password" placeholder="Password"/></div>
<div class="g-recaptcha" data-sitekey="6Le78QwTAAAAAIc1higa_X7ffM9-Oict99TtLTJr" data-theme="dark"></div>
<input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
</form>
</div>



        </div> <!-- #main-container -->

        <div class="footer-container">
                <h3>Gemaakt door Vincent</h3>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>

