
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Get and Post</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> <?php echo "job features"; ?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>


<?php
//submit into database
 
try {
  $conn = new PDO("sqlsrv:server = tcp:testdbsqlserver2.database.windows.net,1433; Database = floteq_dev", "serveradmin2", "zxcvbnm1!");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "connected <br>";

 $name = $_REQUEST['name'];
 $email = $_REQUEST['email'];
 $concern = $_REQUEST['concern'];

$sql = "INSERT INTO Contact (FullName, Email, Concern)VALUES ('$name', '$email','$concern')";
$conn->exec($sql);

 }
catch (PDOException $e) {
  print("Error connecting to SQL Server.");
  die(print_r($e));
 }
?>

<div class="container mt-3">
    <h2> Contact us</h2>
<form action ="" method="post">
    <div class="container">
  
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name ="name" class="form-control" id="name" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name ="email" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="concern" class="form-label">description</label>
    <textarea class="form-control"  name=" concern" id="concern" cols="30" rows="10"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</div>  
</body>
</html>


//$affected_row =$conn->exec($sql);
//echo $affected_row . "Row Inserted <br> ";








