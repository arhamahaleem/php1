

<?php
	session_start();
 
	require_once 'connection.php';
 
	if(ISSET($_POST['login'])){
		if($_POST['email'] != "" || $_POST['password'] != ""){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM `Person` WHERE `email`=? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($email,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['email'] = $fetch['password'];
				header("location: login_success.php");
			} else{
				echo "
				<script>alert('Invalid email or password')</script>
				
				";
			}
		}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				
			";
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
    <form action="logged.php" method="POST">
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

