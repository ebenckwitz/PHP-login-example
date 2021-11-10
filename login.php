<?php // login.php
 $host = "cssrvlab01.utep.edu";  
 $username = "user"; //change as needed 
 $password = "pass"; //change as needed  
 $database = "db";  //change as needed

 try  {  
 
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 } catch(PDOException $error) {  
      $msg = $error->getmessage();  
 }
?>
