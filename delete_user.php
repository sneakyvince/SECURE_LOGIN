<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "secure_login";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
	$id =$_GET['id'];
    
    echo $id;
    $sql = "DELETE FROM members WHERE id=".$id;

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record '$id' deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
