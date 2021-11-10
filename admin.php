<?php
echo "This is admin.php";
require_once 'login.php';
session_start();

if (isset($_POST["Register"]))
{
	//check if any of the fields are empty. create sql query with fields user has put. sent it to the DB and echo a message indicating that it worked.
    if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["fname"]) || empty($_POST["lname"]))
    {
        $msg = '<label>All fields are required</label>';
    }
    else
    {
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $first = $_POST["fname"];
        $last = $_POST["lname"];
        $admins = 'no';
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $query = "INSERT INTO admin_users (firstname, lastname, username, password, admins) VALUES('$first', '$last', '$user', '$pass', '$admins')";
        $result = $connect->prepare($query);
        $result->execute([$first, $last, $user, $pass, $admins]);
        echo "Good job! New User added!";
    }
}
if (isset($_POST["Display"]))
{
	//display the entire table from the database.
	$query = "SELECT * FROM admin_users";
	$display = $connect->prepare($query);
	$display->execute();

	//this will print the entire table from the DB
	echo "<table class='table'>";
	echo "<thead><tr><th>FirstName</th><th>LastName</th><th>USER</th><th>password</th><th>admin?</th></tr></thead>";
	while($row = $display->fetch())
	{
		echo "<tr><td>" . $row["firstname"]. "</td><td>" . $row["lastname"] . "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td><td>" . $row["admins"] . "</td></tr>";
	}
	echo "</table>";
}
?>


 <!DOCTYPE html>
<html>
    <head>
	
<form class="form" action="" method="post">
     <label>Username</label>  
     <input type="text" name="username" class="form-control" />  
       <br />  
     <label>Password</label>  
     <input type="password" name="password" class="form-control" />  
      <br /> 
     <label>First Name</label>  
     <input type="text" name="fname" class="form-control" />  
      <br />  
     <label>Last Name</label>  
     <input type="text" name="lname" class="form-control" />  
      <br />  	  
     <input type="submit" name="Register" class="btn btn-info" value="Register New user" />  
 </form> 
 
 <form class="form" action="" method="post">
	<input type="submit" name="Display" class="btn btn-info" value="Display Entire Table" />
</form>
	
<form action="logged_in.php" method="get">
  <input type="submit" value="Main (logged in)">
</form>

<form action="user.php" method="get">
  <input type="submit" value="Go to User page">
</form>

	</head>
</html>
