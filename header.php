<?php
getIPAddress();
$total_price=total_price();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
<a class="navbar-brand d-flex align-items-center justify-content-center" href="#">
    <img src="http://www.pngall.com/wp-content/uploads/2016/07/Online-Shopping-PNG-Image.png" width="50" height="50" class="d-inline-block align-top" alt="">
    <h3 class="text-light">E-Shop</h3>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>     
      <li class="nav-item">
        <a class="nav-link" href="product.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">cart<sup><?php cart_items()?></sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="totalprice.php">Total Price <?php echo $total_price?>/-</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
      <input class="form-control mr-sm-2" type="search" name="search_product" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light text-light my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="d-inline mx-1">
    <button class="btn btn-outline-light text-light my-2 my-sm-0" type="button"><a class="text-light" href="login.php">Login</a></button>
    <button class="btn btn-outline-light text-light my-2 my-sm-0" type="button"><a class="text-light" href="logout.php">Logout</a></button>
    <button class="btn btn-outline-light text-light my-2 my-sm-0" type="button"><a class="text-light" href="admin_login.php">Admin Login</a></button>
    <div>
  </div>
</nav>
