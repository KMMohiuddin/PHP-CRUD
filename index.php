<?php

$conn = mysqli_connect("localhost", "root", "", "web_practice");
if (isset($_POST["submit"])) {
  $name = $_POST["student_name"];
  $age = $_POST["student_age"];
  $email = $_POST["student_email"];

  $conn = mysqli_connect("localhost", "root", "", "web_practice");

  $sql = "insert into student (name,age,email) values ('$name',$age,'$email')";

  mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>CURD index</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
<div>
  <div class="row justify-content-center align-items-center" style="background-color: #71C9CE;">
    <div class="col-6" >
      <h1 class="text-center py-2" >Smart Hall</h1>
    </div>
    <div class="col-6">
      <form class="form-inline rounded-pill bg-light">
        <div class="input-group">
          <input class="form-control border-0" type="search" placeholder="Search..." aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary bg-white border-0 rounded-pill" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

  <div class="container my-5">
    <form class="" action="index.php" method="post">
      name <input type="text" name="student_name" value="">
      Age <input type="number" name="student_age" value="">
      Email <input type="email" name="student_email" value="">
      <input type="submit" name="submit" value="submit">
    </form>
  </div>

  <div class="container">

    <table class="table table-bordered">
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      <?php
      $sql = "select * from student";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["age"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td><a class='btn btn-primary' href='view_edit.php?id=" . $row["s_id"] . "'>Edit</a>
        <a class='btn btn-danger' href='delete.php?id=" . $row["s_id"] . "'> Delete</a></td>";
          echo "</tr>";
        }
      } else {
        echo "There is no data";
      }
      ?>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- font awsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>

</html>