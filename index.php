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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CURD index</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
  <header class="py-3" style="background-color: #71C9CE;">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-3">
          <h3 class="text-center text-lg-left mb-0">CURD</h3>
        </div>
        <div class="col-md-6">
          <div class="btn-group btn-group-lg" role="group" aria-label="CURD">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Create</button> <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary">Read</button>
            <button type="button" class="btn btn-warning">Update</button>
            <button type="button" class="btn btn-danger">Delete</button>
          </div>
        </div>
        <div class="col-md-3">
          <form class="form-inline">
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary bg-white border-0 rounded-pill" type="submit"><i class="fas fa-search"></i></button>
              </div>
              <input class="form-control bg-white border-0 rounded-pill" type="search" placeholder="Search..." aria-label="Search">
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>


  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" data-backdrop="static" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg role=" document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" id="form" action="index.php" method="post">
            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Name</div>
                </div>
                <input type="text" class="form-control" name="student_name" placeholder="Jon Doe">
              </div>
            </div>
            <div class="row justify-content-between align-items-center">
              <div class="col-sm-3 my-1">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Age</div>
                  </div>
                  <input type="number" class="form-control" name="student_age">
                </div>
              </div>
              <div class="col-sm-9 my-1">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Email</div>
                  </div>
                  <input type="number" class="form-control" name="student_email" placeholder="jondoe@gmail.com">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" name="submit" class="btn btn-primary">Save changes</button>
          <button type="submit" class="btn btn-primary" name="submit" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>



  <div class="container my-5">
  <form class="" id="form" action="index.php" method="post">
            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Name</div>
                </div>
                <input type="text" class="form-control" name="student_name" placeholder="Jon Doe">
              </div>
            </div>
            <div class="row justify-content-between align-items-center">
              <div class="col-sm-3 my-1">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Age</div>
                  </div>
                  <input type="number" class="form-control" name="student_age">
                </div>
              </div>
              <div class="col-sm-9 my-1">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Email</div>
                  </div>
                  <input type="number" class="form-control" name="student_email" placeholder="jondoe@gmail.com">
                </div>
              </div>
            </div>
          </form>
  </div>



  <div class="container">

    <table class="table table-bordered table-striped table-dark">
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
          echo "<td><a class='btn btn-warning' href='view_edit.php?id=" . $row["s_id"] . "'>Update</a>
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