<?php
session_start();
echo "this is the main page when logged in!";
if (isset($_SESSION["username"]))
{
	//once we are signed in, we check if user is an admin or regular user. admin will have two links to other pages while regular user has one.
    echo '<h3>You are signed in! - ' . $_SESSION["username"] . '</h3>';
    if ($_SESSION['username'] != 'admin')
    {
        echo "You are not an admin! You can only go to user page or sign out.";
        echo '<form action="user.php" method="get">
			  <input type="submit" value="Go to User page">
			  </form>';
    }
    else
    {
        echo "You are an admin! You have access to both user page and admin page.";

        echo '<form action="user.php" method="get">
			  <input type="submit" value="Go to User page">
              </form>';

        echo '<form action="admin.php" method="get">
			  <input type="submit" value="Go to Admin page">
		      </form>';
    }
    echo '<form action="logout.php" method="get">
		  <input type="submit" value="Sign Out">
		  </form>  ';
}
else
{
    header("location:signin.php");
}
?>
