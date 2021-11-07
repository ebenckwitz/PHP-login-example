<?php  
 session_start();  
 $host = "cssrvlab01.utep.edu";  
 $username = "ebenckwitz";  
 $password = "ethaniscool";  
 $database = "ebenckwitz_f21_db";  
 $message = ""; 

 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM admin_users WHERE username = :username AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
                     header("location:main.php");  
                }  
                else  
                {  
                     $message = '<label>Incorrect Username and/or Password. Try Again.</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Sign In Page</title>    
      </head>  
      <body>    
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <form class="form" action="" method="post">
                    <h1 class="login-title">Sign In</h1>
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" placeholder="Username" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control"  placeholder="Password"/>  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Sign In" />  <p class="link"><a href="registration.php">Click to Sign Up</a></p>
                </form>  
           </div>  
      </body>  
 </html>
