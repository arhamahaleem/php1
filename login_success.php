
<?php
session_start();
$_SESSION['loggedin'] = TRUE;
$_SESSION['email'] = $row['email'];
$_SESSION['password'] = $row['password'];



?>