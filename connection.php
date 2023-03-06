

<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // get username and password from the login form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // connect to the database using PDO
   
    $conn = new PDO("sqlsrv:server = tcp:testdbsqlserver2.database.windows.net,1433; Database = floteq_dev", "serveradmin2", "zxcvbnm1!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // query the database to check if the user exists
    $stmt = $conn->prepare("SELECT * FROM Person WHERE email=:email AND password=:password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if($stmt->rowCount() == 1) {
        // set session variables
        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = true;

        // redirect to the secure page
        header("location: logged.php");
    } else {
        // display an error message
        echo "Invalid username or password.";
    }
}
?>

