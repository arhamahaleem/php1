
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
session_start();

try {
    $conn = new PDO("sqlsrv:server = tcp:testdbsqlserver2.database.windows.net,1433; Database = floteq_dev", "serveradmin2", "zxcvbnm1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  

    if(isset($_GET["submit"]))
    {
        if(empty($_GET["email"]) || empty($_GET["password"]))
        {
            $message = '<label>All filed is required</label>';
        }
        else{
              $query = "SELECT * FROM Person WHERE email = :email AND password = :password ";
            $statement = $conn -> prepare ($query);
            $statement->execute(
                array(
                    'email' => $_GET["email"],
                    'password' => $_GET["password"]

                )
                );
        }
        $count = $statement->rowCount();
        if($count>0)
        {

        
        $_SESSION["email"] = $_GET["email"];      
        
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
     <button class="button" type="submit" value="Login" >Login</button>
</div>
</form>
</body>
</html>
