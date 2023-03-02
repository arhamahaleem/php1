
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
session_start();
try {
    $conn = new PDO("sqlsrv:server = tcp:testdbsqlserver2.database.windows.net,1433; Database = floteq_dev", "serveradmin2", "zxcvbnm1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($_POST["submit"]))
    {
        if(empty($_POST["email"]) || empty($_POST["password"]))
        {
            $message = '<label>All filed is required</label>';
        }
        else{
            $query = "SELECT * FROM Person WHERE Email =email AND Password = password";
            $statement = $conn -> prepare ($query);
        }
        $count = $statement->rowCount();
        if($count > 0)
        {
            
            $_SESSION["email"] = $_POST['email'];      
        
            header ("Location:login_success.php");
        
         }
         else{
            $message =" Wrong email or password";
            echo $message ;
         }
        

    }
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>

<div class="container">
    <form action="login.php" method="post">
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
