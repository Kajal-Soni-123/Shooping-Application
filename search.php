<!--$sql='SELECT * FROM `thread` WHERE match(thread_title,thread_desc) against ("'.$search.'")';-->
<?php
if(isset($_GET['logged_out'])){
  echo'<script>alert("you have been logged out successfully")</script>';
}
?>
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
    <link rel="stylesheet" href="style.css">;
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
<!--here i am dividing my index page into two column one for the product and one for the cards-->
<div class="row">
  <!--in this part i will add cards-->
  <div class="col-md-10">
    <div class="row">
   <?php
   //diplaying all the available product if no category or brands are selected
   if(isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']=='POST'){
    $search=$_POST['search_product'];
   $sql='SELECT * FROM `products` WHERE match(product_name , product_desc) against ("'.$search.'")';
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
    <div class="card mx-2" style="width: 23rem;">
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
else{
    echo'<h3 class="container text-center text-danger my-3">Searched product is not available</h3>';
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
        <a class="nav-link text-light text-center" href="product.php?brand_id='.$row['brand_id'].'">'.$row['brand_name'].'</a>
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
        <a class="nav-link text-light text-center" href="product.php?cat_id='.$row['category_id'].'">'.$row['category_name'].'</a>
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