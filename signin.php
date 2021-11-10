<?php
echo "Sign In page";
require_once 'login.php';
session_start();

$msg = "";

if (isset($_POST["login"]))
{
	//check if username and password fields are empty, if not, move on.
    if (empty($_POST["username"]) || empty($_POST["password"]))
    {
        $msg = '<label>All fields are required</label>';
    }
    else
    {
		//Create sql query. Call it for the DB. Execute then make the array a $user. Then check if passwords match or not.
        $query = "SELECT * FROM admin_users WHERE username = :username";
        $statement = $connect->prepare($query);
        $statement->execute(array(
            'username' => $_POST["username"],
        ));
        $user = $statement->fetchAll();
        $_SESSION["user"] = $user;

        if (password_verify(str_replace("'", "", $_POST["password"]) , $user[0]['password']))
        {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
            $_SESSION["firstname"] = $user[0]['firstname'];
            $_SESSION["lastname"] = $user[0]['lastname'];
            header("location:logged_in.php");
        }
        else
        {
            $msg = '<h2>Wrong Username and/or Password. Try Again.</h2>';
        }
    }
}

?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
      </head>  
      <body>    
           <div>  
                <?php
if (isset($msg))
{
    echo "$msg";
} ?>  
                <form class="form" action="" method="post">
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Sign In" />
                </form>  
           </div>  
      </body>  
 </html>
