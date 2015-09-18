<?php

/*
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

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.


      if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          header("refresh:5;url=../index.php?error=1");
          echo '<h2>Please check the the captcha form.</h2>';          
          exit;
          
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le78QwTAAAAAJLOpX5Cm-Zw278QviYDaR4HxqnS&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.'success'==false)
        {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }else
        {
          
          
     
if (isset($_POST['email'], $_POST['p'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['p']; // The hashed password.
    
    if (login($email, $password, $mysqli) == true) {
        // Login success 
      
      if($_SESSION["admin"] == 2 ){
           header("Location: ../adminpanel.php");
        exit();
          
        } else {
        header("Location: ../protected_page.php");
        exit();
        }
        
        
        
    } else {
        // Login failed 
        header('Location: ../index.php?error=1');
        exit();
    }
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: ../error.php?err=Could not process login');
    exit();
}     
          
          
          
        }
        
 
