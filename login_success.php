<?php
session_start();
if (isset($_SESSION["email"]))
{
    echo "Login success, welcome";
  
}

?>
