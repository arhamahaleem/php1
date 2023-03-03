
<?php
// PHP Data Objects(PDO) Sample Code:
session_start();

try {
    $conn = new PDO("sqlsrv:server = tcp:testdbsqlserver2.database.windows.net,1433; Database = floteq_dev", "serveradmin2", "zxcvbnm1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $email = $_GET['email'];
    $password = $_GET['password'];

    if(isset($_GET["login"]))
    {
        if(empty($_GET["email"]) || empty($_GET["password"]))
        {
            $message = '<label>All filed is required</label>';
        }
        else{
              $query = "SELECT * FROM Person WHERE email ='$email' AND password = '$password' ";
            $statement = $conn -> prepare ($query);
        }
        $count = $statement->rowCount();
        if(PDOStatement::rowCount()>0)
              
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