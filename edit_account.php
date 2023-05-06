<?php
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}
include '\xampp\htdocs\e-comerce\db.php';
include '\xampp\htdocs\e-comerce\functions.php';
?>
<?php
    $sql="SELECT * FROM `registration` WHERE user_id='$user_id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['user_name'];
    $email=$row['user_email'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Payment</title>
  </head>
  <body>
  <nav class="navbar  navbar-expand-lg bg-info">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link text-dark" href="index.php">ShopOn<span class="sr-only">current</span></a>
      </li> 
      <li class="nav-item active">
        <a class="nav-link text-dark" href="index.php">Home <span class="sr-only"></span></a>
      </li>     
      <li class="nav-item">
        <a class="nav-link text-dark" href="product.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="contact.php">Contact</a>
      </li>
</ul>
</div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div style="margin-left:40%" class="container text-light"><h3>Welcome <?php echo $name?></h3></div>
</nav>
<div class="row my-5 p-0">
    <div class="col-md-2 bg-secondary mx-2 p-0">
    <ul class="navbar-nav bg-info mr-auto">
      <li class="nav-item">
        <a class="nav-link text-light text-center" href="#"><h4>Delivery Brands</h4></a>
</li>
</ul>
    <ul class="navbar-nav mr-auto my-3">
      <li class="nav-item">
    <img class="container" src="https://tse2.mm.bing.net/th?id=OIP.Gfp0lwE6h7139625a-r3aAHaHa&pid=Api&P=0" alt="...">
</li>
</ul>
<ul class="navbar-nav bg-secondary mr-auto min-vh-100">
 <li class="nav-item">
        <a class="nav-link text-light text-center" href="profile.php?user_id=<?php echo $user_id?>">Pending orders</a>
</li>

<li class="nav-item">
        <a class="nav-link text-light text-center" href="edit_account.php?user_id=<?php echo $user_id?>">Edit Account</a>
</li>
<li class="nav-item">
        <a class="nav-link text-light text-center" href="delete_account.php?user_id=<?php echo $user_id?>">Delete Account</a>
</li>
<li class="nav-item">
        <a class="nav-link text-light text-center" href="logout.php">Logout</a>
</li>
</ul>
    </div>
    <div class="col-md-8">


<!--Editing user account-->
<?php
$sql="SELECT * FROM `registration` WHERE user_id=$user_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['user_name'];
$email=$row['user_email'];
$phone=$row['phone'];
$add=$row['Address'];
$password=$row['user_password'];
?>
<div class="container text-center my-3"><h3>Account Details</h3></div>
    <div class="container my-3">
    <form action="handle_edit_account.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id?>"/>
  <div class="form-group">
    <label for="exampleInputPassword1"> Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="<?php echo $name?>" disabled>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?php echo $email?>" disabled>
    <small id="emailHelp" class="form-text text-muted">We'll never share you email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mobile no:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $phone?>" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <textarea class="form-control" id="exampleInputPassword1" name="address" value="<?php echo $add?>" required></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value=<?php $password?> required>
  </div>
  <div class="d-flex align-items-center justify-content-center">
<input type="submit" class="btn btn-primary mx-2" value="Update"/>
<a class="btn btn-secondary mx-2" href="profile.php?user_id=<?php echo $user_id?>">Close</a>

  </div>
</form>
</div>

    </div>
<div>

<?php
//include '\xampp\htdocs\e-comerce\footer.php';
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>