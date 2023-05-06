<?php
if(isset($_GET['deleted'])){
  echo'<script>alert("your account has been deleted successfully.")</script>';
}

if(isset($_GET['logged_out'])){
  echo'<script>alert("you have been logged out successfully.")</script>';
}
?>
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

    <title>Shopon</title>
  </head>
  <body>
    <?php
    include '\xampp\htdocs\e-comerce\header.php';
    ?>
    <?php     
    session_start();
    if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']=="true"){
      $user_id=$_SESSION['user_id'];
      $sql="SELECT * FROM `registration` WHERE user_id='$user_id'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      $name=$row['user_name'];
      echo'
   <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div style="margin-left:40%" class="container text-light"><h3>Welcome '.$name.'</h3></div>
</nav>';
    }
else{
  echo'
  <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
   <div style="margin-left:40%" class="container text-light"><h3>Welcome Guest</h3></div>
</nav>';
}
?>
<!--putting the crousal in index:-->
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img style="height:500px" src="https://image.freepik.com/free-vector/online-shopping-modern-banner-with-large-volume-tablet-with-presents-boxes-around-pink-background_7993-6368.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Welcome to ShopOn</h5>
          <p>Buy the Top branded products form the site</p>
        </div>
      </div>
      <div class="carousel-item">
        <img style="height:500px" src="https://bandfbusinessplans.co.uk/uploads/filemanager/online-shopping3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Best products available</h5>
          <p>From the well known manufacturers.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img style="height:500px" src="https://i.pinimg.com/originals/34/31/3f/34313f2845aff1e25b0bd9b1f19845f7.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Enjoy Shopping</h5>
          <p>Have best shopping expericence.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<!--here i am dividing my index page into two column one for the product and one for the cards-->
<div class="row">
  <!--in this part i will add cards-->
  <div class="col-md-10">
    <div class="row">
  
   <?php
   // if no catagory or brand is chosen then will will display on first 9 items 
   if(!isset($_GET['cat_id'])&& !isset($_GET['brand_id'])){
   $sql="SELECT * FROM `products` LIMIT 0,9 ";
   $result=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_assoc($result)){
    $name=$row['product_name'];
    $desc=$row['product_desc'];
    $image1=$row['product_image1'];
    $product_id=$row['product_id'];
    $price=$row['product_price'];
    $update=$row['insert_time'];
    echo'
    <div class="col-md-4 my-2">
    <div class="card mx-2" style="width: 23rem; height:30rem">
  <img height="50%" src="./Admin/image/'.$image1.'" class="card-img-top img" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$name.'</h5>
    <p class="card-text">'.$desc.'</p>
    <p class="card-text">'.$price.'/-</p>
    <p class="card-text"> last updated at'.$update.'</p>
    <a href="index.php?product_id='.$product_id.'" class="btn btn-info">Add to cart</a>
    <a href="view_more.php?product_id='.$product_id.'" class="btn btn-secondary text-light">View more</a>
    </div>
    </div>
</div>';
   }
  }
  // diplaying the items of selected category
  elseif(isset($_GET['cat_id'])){
    $cat_id=$_GET['cat_id'];
    $sql="SELECT * FROM `products` WHERE category_id='$cat_id' LIMIT 0,9 ";
   $result=mysqli_query($conn,$sql);
   $num=mysqli_num_rows($result);
   if($num>0){
   while($row=mysqli_fetch_assoc($result)){
    $name=$row['product_name'];
    $desc=$row['product_desc'];
    $image1=$row['product_image1'];
    $product_id=$row['product_id'];
    $price=$row['product_price'];
    $update=$row['insert_time'];
    echo'
    <div class="col-md-4 my-2">
    <div class="card mx-2" style="width: 23rem; height:30rem">
  <img height="50%" src="./Admin/image/'.$image1.'" class="card-img-top img" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$name.'</h5>
    <p class="card-text">'.$desc.'</p>
    <p class="card-text">'.$price.'</p>
    <p class="card-text"> last updated at '.$update.'</p>
    <a href="index.php?product_id='.$product_id.'" class="btn btn-info">Add to cart</a>
    <a href="view_more.php?product_id='.$product_id.'" class="btn btn-secondary text-light">View more</a>
    </div>
    </div>
</div>';
   }
  }
   else{
echo'<h2 class="text-center text-danger container my-2"> No stock available for this product category</h2>';
   }
  }
//displaying the items of selected brands
  else{
    $brand_id=$_GET['brand_id'];
    $sql="SELECT * FROM `products` WHERE brand_id='$brand_id' LIMIT 0,9 ";
   $result=mysqli_query($conn,$sql);
   $num=mysqli_num_rows($result);
   if($num>0){
   while($row=mysqli_fetch_assoc($result)){
    $name=$row['product_name'];
    $desc=$row['product_desc'];
    $image1=$row['product_image1'];
    $product_id=$row['product_id'];
    $price=$row['product_price'];
    $update=$row['insert_time'];
    echo'
    <div class="col-md-4 my-2">
    <div class="card mx-2" style="width: 23rem; height:30rem">
  <img height="50%" src="./Admin/image/'.$image1.'" class="card-img-top img" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$name.'</h5>
    <p class="card-text">'.$desc.'</p>
    <p class="card-text">'.$price.'</p>
    <p class="card-text"> last updated at '.$update.'</p>
    <a href="index.php?product_id='.$product_id.'" class="btn btn-info">Add to cart</a>
    <a href="view_more.php?product_id='.$product_id.'" class="btn btn-secondary text-light">View more</a>
    </div>
    </div>
</div>';
   }
  }
   else{
echo'<h2 class="text-center text-danger container my-2">Products of this brand are not available</h2>';
   }
  }
?>
</div>
</div>
<!--in this part i will add products-->
<div class="col-md-2 bg-secondary p-0 my-2">
<!--brands to be displayed-->
<ul class="navbar-nav mr-auto">
      <li class="nav-item bg-info">
        <a class="nav-link text-light text-center" href="#"><h4>Delivery Brands</h4></a>
        <?php
        $sql="SELECT * FROM `brands`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          echo'
        <li class="nav-item">
        <a class="nav-link text-light text-center" href="index.php?brand_id='.$row['brand_id'].'">'.$row['brand_name'].'</a>
        </li>';
        }
        ?>
      </li>   
</ul>
<!--categories to be displayed-->
<ul class="navbar-nav mr-auto">
      <li class="nav-item bg-info">
        <a class="nav-link text-light text-center" href="#"><h4>Categories</h4></a>
      <?php
      $sql="SELECT *FROM `categories`";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        echo '<li class="nav-item">
        <a class="nav-link text-light text-center" href="index.php?cat_id='.$row['category_id'].'">'.$row['category_name'].'</a>
        </li>';
      }
?>

      </li>   
</ul>
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