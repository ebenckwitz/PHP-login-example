<?php
//session_start();
require_once 'login.php';
echo "This is the sign in page" . PHP_EOL;
try
{
    $pdo = new PDO($attr, $user, $pass, $opts);
}
catch(PDOException $e)
{
    //throw new PDOException($e->getMessage(), (int)$e->getCode());
    echo "not good";
}

$msg = '';

$user = $_POST['username'];
$pass = $_POST['password'];

/*$query = "SELECT * FROM admin_users WHERE username=$user AND password=$pass";
$result = $pdo->prepare($query);
$fn = $row['firstName'];
$ln = $row['lastname'];
$un = $row['username'];
$pw = $row['password'];

if (!$result->rowCount()) die("User or password not found");
if (password_verify(str_replace("'", "", $pass) , $pw))
{
    session_start();
    echo "You are now logged in as $fn";
}
else die("Invalid username/password combination");*/

 if (isset($_POST['login']) && !empty($user)
               && !empty($pass)) {
				
               if ($_POST['username'] == 'SELECT * FROM admin_users WHERE username=$user' && 
                  $_POST['password'] == 'SELECT * FROM admin_users WHERE password=$pass') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = '$user';
                  
                  header("Location: main.php"); 
				  exit();
               }else {
                  $msg = 'Wrong username or password';
               }
            }
?>
		 
<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
    <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
    <input type = "text" class = "form-control" 
		name = "username" placeholder = "username" 
		required autofocus></br>
    <input type = "password" class = "form-control"
		name = "password" placeholder = "password" required>
    <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
		name = "login">Sign in</button>
</form>
