
<?php
// PHP Data Objects(PDO) Sample Code:

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
              $query = "SELECT * FROM Person WHERE email ='$email' AND password = '$password' ";
            $statement = $conn -> prepare ($query);
        }
        $count = $statement->rowCount();
        if($count > 0)
        {
            
            $_SESSION["email"] = $_POST["email"];      
        
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