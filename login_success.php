
<?php
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['email'] = $row['email'];
$_SESSION['password'] = $row['password'];



?>