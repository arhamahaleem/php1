
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
<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:testdbsqlserver2.database.windows.net,1433; Database = floteq_dev", "serveradmin2", "{your_password_here}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $sql = "INSERT INTO Person (Email, Password )VALUES ('$email','$password')";
 $affected_row =$conn->exec($sql);
 echo $affected_row ;
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>

<div class="container">
    <form action="" method="post">
     <label for ="email">Email</label><br><br>
     <input type="email" id="email" name ="email" size = "38" style="height:30px"  placeholder="Enter your email"><br><br>
     <label for="password">Password</label><br><br>
     <input type="password" id="password" name="password"size = "38" style="height:30px" placeholder="Enter your password"><br><br>
  
</div>
<div class="body">
     <p><a href="file:///C:/Users/Dell/Desktop/loginscreen/pass.html"><strong>Forgot password?</strong></a></p>
    <p>Don't have an account?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="file:///C:/Users/Dell/Desktop/loginscreen/account.html"> <strong>Create an
     account</strong></a></p> 
     <button class="button" type="submit">Login</button>


</div>
</form>
</body>
</html>