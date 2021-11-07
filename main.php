<?php

echo "This is main.php";
?>
<form action="signin.php" method="get">
  <input type="submit" value="Sign In">
</form>

<?php echo "You are an administrator, you can go to two different pages."; ?>

<form action="user.php" method="get">
  <input type="submit" value="Go to User page">
</form>

<form action="admin.php" method="get">
  <input type="submit" value="Go to Admin page">
</form>
