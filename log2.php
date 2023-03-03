<?php
session_start();
if(isset($_POST['b_login'])){
    $email =$_POST['email'];
    $password =$_POST['password'];
    try{
        $conn = new PDO('mysql:host=localhost;dbname=newschool','admin','admin');
       
        $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();

// Store the result so we can check it later
$row = $stmt->fetch();
if($row){

    // use the 'password verify' only if you encrypt your password in your database if not just do $_POST['password'] == $password (not recommended)
    if(($_POST['password']. $password)){
      // no need to include the $_POST['password'] in your prepared statement since you will not be executing a SQL command to check for a match of passwords
    } else {
      // redirect if password is not a match to the ones in the database
      header("Location: log2.php?error=IncorrectPassword");
    }
  
  } 

  if(!isset($_SESSION['email']) || $_SESSION['loggedin'] !== TRUE){
    // redirects you if sessions are not present
    header("Location: log2.php");
  }
    else
    {

echo "no entry";
    }
    }catch (PDOException $ex){

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login page</title>

</head>

<body style= background-color:aliceblue>
<div class="img">
    <img src="image/logo.png" alt="logo">

</div>

<div class="container">
    <form action="logged.php" method="POST" >
     <label for ="email">Email</label><br><br>
     <input type="email" id="email" name ="email" size = "38" style="height:30px"  placeholder="Enter your email" required><br><br>
     <label for="password">Password</label><br><br>
     <input type="password" id="password" name="password"size = "38" style="height:30px" placeholder="Enter your password" required><br><br>
     
</div>
<div class="body">
     <p><a href="file:///C:/Users/Dell/Desktop/loginscreen/pass.html"><strong>Forgot password?</strong></a></p>
    <p>Don't have an account?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="file:///C:/Users/Dell/Desktop/loginscreen/account.html"> <strong>Create an
     account</strong></a></p> 
     <input type="submit" class="button" name="login" value="Login">
     
</div>
</form>
</body>
</html>
