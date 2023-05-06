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
    <link rel="stylesheet" href="style.css">
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
<!--displaying the cart detailes by creating tables-->
<div class="container text-center my-3 "><h3>View Cart Details</h3></div>
<!--checking if the cart is empty or not-->
<?Php
 $sql2="SELECT * FROM `carts`";
 $result2=mysqli_query($conn,$sql2);
 $num=mysqli_num_rows($result2);
 if($num==0){
  echo'<div class="container text-center"><h3 class="text-danger">No item present in the cart</h3></div>';
 }
 else{
  ?>
<div class="container">
  <div class="row">
  <form action="" method="post">
  <table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Remove</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $ip=getIPAddress();
    $total_price=total_price();
    $sql="SELECT * FROM `carts` WHERE ip_address='$ip'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $product_id=$row['product_id'];
    $sql2="SELECT * FROM `products` WHERE product_id='$product_id'";
    $result2=mysqli_query($conn,$sql2);
    while($row2=mysqli_fetch_assoc($result2)){
      $name=$row2['product_name'];
      $image=$row2['product_image1'];
      $price=$row2['product_price'];
    ?>
    <tr class="p-0">
      <td><?php echo $name?></td>
      <td><img height="30%" width="30%" src="./Admin/image/<?php echo $image?>" ></td>
      <td><input type="text" id="qtn" name="quantity"></td>
  <!--writing the update query-->
      <?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['update'])){
  if(isset($_POST['quantity'])){
      $quantity=$_POST['quantity'];
      echo $quantity;
        $ip=getIPAddress();
        $sql_update_cart="UPDATE `carts` SET quantity='$quantity' WHERE ip_address='$ip'";
        $query_result=mysqli_query($conn,$sql_update_cart);
        if($query_result){
          echo '<script>alert("Quantity of the product is increased by '.$quantity.'")</script>';
        }
        $total_price=$total_price*(int)$quantity;
      }
  }
  }
  ?>
     
      <td><?php echo $price?></td>
      <td><input type="checkbox" id="remove_item" name="remove_item" value="<?php echo $product_id?>"></td>
      <td><div class="container d-flex align-items-center justify-content-center"> <input name="update" type="submit" class="btn btn-info text-light mx-2" value="Update"> <input name="remove" type="submit" value="remove" class="text-light btn btn-secondary mx-2"></div></td>
      </tr>
      <?php
   }
  }
    
   ?>
  </tbody>
</table>
<!--subtotal price-->
<div class=" p-0">
<h3 class="py-3">Subtotal:<strong class="text-info"> <?php echo $total_price?>/-</strong></h3>
<a href="index.php" class="btn btn-info mx-2 text-center text-light">keep Shopping</a>
<?php
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=="true")
 echo'<a href="payment.php" class="btn btn-secondary mx-2 text-center text-light">Check Out</a>';
else{
  echo'<a href="login.php" class="btn btn-secondary mx-2 text-center text-light">Check Out</a>'; 
}
?>
</div>
</div>
</div>
  </form>
  <?php
}
?>
   
<!--writing php code to remove items from the cart-->
  <?php
  if(isset($_POST['remove'])){
    if(isset($_POST['remove_item'])){
 $product_id=$_POST['remove_item'];
 $sql="DELETE FROM `carts` WHERE product_id='$product_id'";
 $result =mysqli_query($conn,$sql);
 if($result){
  echo '<script>alert("One item deleted form from cart")</script>';
 }
}
}
?>
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