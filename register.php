<?php
include '\xampp\htdocs\e-comerce\functions.php';
getIPAddress();
?>
<?php
include '\xampp\htdocs\e-comerce\db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Register</title>
  </head>
  <body>
    <?php
    include '\xampp\htdocs\e-comerce\header.php';
    ?>
    <?php
if(isset($_GET['success'])&&$_GET['success']=="true"){
  echo'<div class="alert alert-info alert-dismissible fade show my-0" role="alert">
  <strong>you are registered in successfully</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
if(isset($_GET['success'])&& $_GET['success']=="false"){
  $error=$_GET['error'];
  echo'<div class="alert alert-info alert-dismissible fade show my-0" role="alert">
  <strong>'.$error.'</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>'; 
}
?>
<div class="container text-center my-3"><h3>Registration Form</h3></div>
    <div class="container my-3">
    <form action="register_handle.php" method="post">
  <div class="form-group">
    <label for="exampleInputPassword1"> Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Enter your user name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share you email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mobile no:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="phone" placeholder="Enter your mobile name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <textarea class="form-control" id="exampleInputPassword1" name="address" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" placeholder="Password" required>
</div>
  <button type="submit" class="btn btn-info">Register</button>
</form>
</div>
    <?php
    include '\xampp\htdocs\e-comerce\footer.php';
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>