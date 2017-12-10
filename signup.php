<?php


if(isset($_POST["register"])){
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
//$db_name = 'crimes'; // Database Name




try {
$dbh = new PDO("mysql:host=$db_host;dbname=crimes",$db_user,$db_pass);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$sql = "INSERT INTO userdetails (name,email,password,age,organisation) VALUES ('".$_POST["Name"]."','".$_POST["Email"]."',MD5('".$_POST["Password"]."'),'".$_POST["Age"]."','".$_POST["Org"]."' )";

if ($dbh->query($sql)) {
header("location: cam.php");
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
?>