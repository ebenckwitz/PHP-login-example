<?php
session_start();
echo "this is user.php. <br>";

//Collect $user array from signin.php. Print out users first and last name with username as well.
if (isset($_SESSION["user"]))
{
    $user = $_SESSION["username"];
    $first = $_SESSION["firstname"];
    $last = $_SESSION["lastname"];
    echo "username: $user <br> first name: $first <br> last name: $last";

    echo '<form action="logout.php" method="get">
		  <input type="submit" value="Sign Out">
		  </form>  ';
}
else
{
    header("location:signin.php");
}

?>
 
 <!DOCTYPE html>
<html>
    <head>
<form action="logged_in.php" method="get">
  <input type="submit" value="Main (logged in)">
</form>
</head>
</html>
