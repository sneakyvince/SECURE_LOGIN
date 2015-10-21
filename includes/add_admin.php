<?php  
ob_start();

include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start();

if(isset($_SESSION['admin'])) {

if($_SESSION['admin'] !=2) {
    echo '<h2>You are not a Super Admin!</h2>';     
    header("refresh:5;url=../index.php?error=1");
    exit;
}       
} else {
    echo '<h2>Please login first!</h2>';     
    header("refresh:5;url=../index.php?error=1");
    exit;
}  

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "secure_login";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    
    $admin =$_SESSION['admin'];
    if($admin != 2) {
    $id =$_GET['id'];
    $sql = "UPDATE members SET admin='1' WHERE id=".$id;
    } else {
        echo '<h2>You are trying to downgrade yourself!</h2>'; 
        header("refresh:500;url=../adminpanel2.php");
        exit;
    }
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record '$id' made admin successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>


<?php ob_flush();?>