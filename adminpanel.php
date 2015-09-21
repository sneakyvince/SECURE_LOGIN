<?php  
ob_start();
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

if(isset($_SESSION['admin'])) {

if($_SESSION['admin'] !=2) {
    echo '<h2>Please check the the captcha form.</h2>';     
    header("refresh:5;url=.index.php?error=1");
    exit;
}       
} else {
    echo '<h2>Please check the the captcha form.</h2>';     
    header("refresh:5;url=index.php?error=1");
    exit;
}   

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
        
        <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
</style>

    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <p>This is the Admin Panel</p>
        <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
        <p>You are currently logged <?php echo $logged ?>.</p>
        
        
        <?php 
        try 
        { 
            $db = new PDO('mysql:host=localhost;dbname=secure_login','root','root'); 
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            
            $sql = "SELECT * FROM members"; 
            
            $stmt = $db->prepare($sql);
            $stmt->execute();
            
            $linkdeleteuser ="<a href='delete_user.php'>verwijder</a>";
            echo ' <table class="tg"> ';
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            { 
                echo "<tr><td>" .$row['id']."</td><td>".$row['username']."</td><td>".$row['email']."</td><td>".$row['admin']."</td><td>".$row[$linkdeleteuser]."</td></tr>";
            }
            
            echo "</table>";
        } 
        catch(PDOException $e) 
        { 
            echo '<pre>'; 
            echo 'Regel: '.$e->getLine().'<br>'; 
            echo 'Bestand: '.$e->getFile().'<br>'; 
            echo 'Foutmelding: '.$e->getMessage(); 
            echo '</pre>'; 
        } 
        ?>
        
    </body>
</html>


<?php ob_flush();?>