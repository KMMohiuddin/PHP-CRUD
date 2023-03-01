<?php
include 'sql.php';
if(isset($_POST['Submit'])){
  $name = $_POST['Name'];
  $phone = $_POST['Ph'];
  $email = $_POST['Email'];
  $password = $_POST['Password'];

  $query= "INSERT INTO `curd` (`Name`, `Mobile`, `Email`,  `Password`)
  values('$Name','$Ph','$Email','$Password')";

  $push = mysqli_query($con,$query);
  if($push){ 
    echo 'success';
  }else{
    die(mysqli_error($con));
  }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>PHP- CRUD</title>
  </head>
  <body>
    <div class="container my-5"> 
    <form method="post">
    <div class="form-group">
    <label >Name: </label>
    <input type="text" class="form-control" name="Name">
  </div>
  <div class="form-group">
    <label >Phone Number: </label>
    <input type="text" class="form-control" name="Ph" placeholder="+880">
  </div>
    <div class="form-group">
    <label for="Email">Email address: </label>
    <input type="email" class="form-control" name="Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" name="Password">
  </div>
  
  <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
</form>
    </div>
     </body>
</html>