<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'crimes'; // Database Name
   $db = mysqli_connect($db_host,$db_user,$db_pass,$db_name );
   
   session_start();
   if(isset($_POST["login"])) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['Email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['Password']); 
      
      $sql = "SELECT userId FROM userdetails WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) { 

    
         header("location: cam.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>