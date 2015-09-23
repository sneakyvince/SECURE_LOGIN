<?php    
ob_start();

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();

if(isset($_SESSION['admin'])) {

if($_SESSION['admin'] !=2 && $_SESSION['admin'] !=1) {
    echo '<h2>You are not an Admin!</h2>';     
    header("refresh:5;url=.index.php?error=1");
    exit;
}       
} else {
    echo '<h2>Please login first!</h2>';     
    header("refresh:5;url=index.php?error=1");
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
    $sql = "DELETE FROM members WHERE id=".$id;
    } else {
        echo '<h2>You are trying to delete the superadmin!</h2>';     
        header("refresh:5;url=adminpanel".$admin.".php");
        exit;
    }

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

<?php ob_flush();?>
