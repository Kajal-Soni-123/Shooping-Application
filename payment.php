<?php
include '\xampp\htdocs\e-comerce\db.php';
?>
<?php
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=="true"){
    $user_id=$_SESSION['user_id'];
    $sql="SELECT * FROM `registration` WHERE user_id='$user_id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['user_name'];
}
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
    <ul class="navbar-nav mr-auto">
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
<div class="container text-center text-info my-3"><h3>Payment Options</h3></div>
<div class="row my-5 d-flex justify-content-center align-items-center">
    <div class="col-md-6">
    <a href="https://wwww.kajal.com"><img src="https://tse4.mm.bing.net/th?id=OIP.WG3HQtExlJ0ENhi1HZKxvwHaDP&pid=Api&P=0" class="payment_img" alt="...."></a>
    </div>
    <div class="col-md-6">
    <a href="order.php?user_id=<?php echo $user_id?>"><h4 class="mx-0"> Payment Offline</h4></a>
</div>
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