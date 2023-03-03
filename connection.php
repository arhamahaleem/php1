
<?php
// PHP Data Objects(PDO) Sample Code:
session_start();

try {
    $conn = new PDO("sqlsrv:server = tcp:testdbsqlserver2.database.windows.net,1433; Database = floteq_dev", "serveradmin2", "zxcvbnm1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    if(isset($_GET["login"]))
    {    
         $email = $_GET['email'];
          $password = $_GET['password'];
            $query = "SELECT * FROM Person WHERE email ='$email' AND password = '$password' ";
            $statement = $conn->prepare ($query);
            $row =$statement->fetch_assoc();
            $stmt->execute();
            if($query->rowCount() > 0) {
              $_SESSION['email'] = $email;
              header('location:logout.php');
            } else {
              header('location:login.php');
            }
        
       if(PDOStatement::rowCount()>0)
        {
            
            $_SESSION["email"] = $_GET["email"];      
            $_SESSION["password"] = $_GET["password"]; 
            header ("Location:login_success.php");
        
         }
         else{
            $message =" Wrong email or password";
            
         }
         if(isset($_SESSION['email']) || $_SESSION['loggedin'] !== TRUE){
            
            header("Location: login.php");
          }
          

    }
    
    if(empty($_SESSION['email']))
    {
     header("Location:Login .php");
    }
else
{

header("Location:logout.php");
}
}

catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>

