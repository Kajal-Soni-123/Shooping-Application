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
    <link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <!--first part of the body-->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand d-flex align-items-center justify-content-center container-fluid" href="#">
    <img src="http://www.pngall.com/wp-content/uploads/2016/07/Online-Shopping-PNG-Image.png" width="50" height="50" class="d-inline-block align-top" alt="">
    <h3 class="text-light">E-Shop</h3>
  </a>
    <nav class="navbar navbar-expand-lg ">
    <ul class="navbar-nav float-right">
        <li class="nav-item">
       <button class="btn btn-info text-light btn-outline-light"> <a href="logout.php" class=" text-light nav-link text-inline">Logout</a></button>
</li>
</ul>
</nav>
</nav>
<!--seconf part of the body-->
<div class="bg-light">
    <h3 class="text-center p-2">Manage Details</h3>
</div>
<!--third part of the body-->
<div class="row">
    <div class="col-md-12 bg-secondary">
      <?php
      
      ?>
  
  <div class="button text-center py-2">
  <button class="btn btn-outline-light bg-info text-light my-2" type="button"><a class="text-light" href="index.php?insert_product">Insert Products</a></button>
  <button class="btn btn-outline-light bg-info text-light my-2" type="button"><a class="text-light" href="index.php?view_product">View product</a></button>
  <button class="btn btn-outline-light bg-info text-light my-2" type="button"><a class="text-light" href="index.php?insert_category">Insert Categories</a></button>
  <button class="btn btn-outline-light bg-info text-light my-2" type="button"><a class="text-light" href="index.php?view_category">View categories</a></button>
  <button class="btn btn-outline-light bg-info text-light my-2" type="button"><a class="text-light" href="index.php?insert_brand">Insert Brands</a></button>
  <button class="btn btn-outline-light bg-info text-light my-2" type="button"><a class="text-light" href="index.php?view_brand">View Brands</a></button>
  <button class="btn btn-outline-light bg-info text-light my-2" type="button"><a class="text-light" href="index.php?view_orders">All order</a></button>
  <button class="btn btn-outline-light bg-info text-light my-2" type="button"><a class="text-light" href="index.php?view_users">List users</a></button>

</div>
</div>
</div>
<!--third part of the body-->
<div class="my-5">
  <?php
  if(isset($_GET['insert_category'])){
    include '\xampp\htdocs\e-comerce\Admin\insert_categories.php';
  }
  if(isset($_GET['insert_product'])){
    include '\xampp\htdocs\e-comerce\Admin\insert_product.php';
  }
  if(isset($_GET['insert_brand'])){
    include '\xampp\htdocs\e-comerce\Admin\insert_brand.php';
  }
  if(isset($_GET['view_product'])){
    include '\xampp\htdocs\e-comerce\Admin\view_product.php'; 
  }
  if(isset($_GET['view_category'])){
    include '\xampp\htdocs\e-comerce\Admin\view_category.php'; 
  }
  if(isset($_GET['view_brand'])){
    include '\xampp\htdocs\e-comerce\Admin\view_brand.php'; 
  }
  if(isset($_GET['view_orders'])){
    include '\xampp\htdocs\e-comerce\Admin\all_orders.php'; 
  }
  if(isset($_GET['view_users'])){
    include '\xampp\htdocs\e-comerce\Admin\list_of_users.php'; 
  }
  ?>
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