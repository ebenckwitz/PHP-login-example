<?php // login.php
$host = "cssrvlab01.utep.edu";// Change as necessary
$data = "db"; // Change as necessary
$user = "user"; // Change as necessary
$pass = "pass"; // Change as necessary
$chrs = "utf8mb4";
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
$opts =
[
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,
];
?>
