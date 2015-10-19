<?php

// db connection here

// set path of uploaded file
$path = "./".basename($_FILES['filename']['name']); 

// move file to current directory
move_uploaded_file($_FILES['filename']['tmp_name'], $path) ;

// get file contents
$data = file_get_contents($path, NULL, NULL, 0, 60000);

// run the query
@mysql_query("INSERT INTO table (column) VALUES ('".$data."')");

// delete the file
unlink($path);

?>