<?php
include '\xampp\htdocs\e-comerce\functions.php';
getIPAddress();
cart();
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

    <title>Hello, world!</title>
  </head>
  <body>
    <?php
    include '\xampp\htdocs\e-comerce\header.php';
    ?>
    <?php
    if(isset($_GET['success'])&& $_GET['success']=="true"){
      echo'<div class="alert alert-info alert-dismissible fade show my-0" role="alert">
      <strong>your contact information has been recorder successfully</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
    ?>
    <div class="container text-center my-3"><h4>Fill your contact information</h4></div>
    <div class="container my-3">
    <form action="con_handle.php" method="post">
  <div class="form-group">
    <label for="exampleInputPassword1"> First name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="fname" placeholder="Enter your user name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"> Last name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="lname" placeholder="Enter your user name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share you email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <textarea class="form-control" id="add" name="add"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="phone" placeholder="Enter your user name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Comments</label>
    <textarea class="form-control" id="comment" name="comment"></textarea>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
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