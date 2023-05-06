<?php

if(isset($_GET['success'])){
  echo '<script>alert("Your account has been updated successfully.")</script>';
}
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
      <!--Showing all pending orders-->
        <?php
      if(isset($_GET['set'])=="true"){
        ?>
        <div class="text-center my-5 text-success"><h3>All my orders</h3></div>
        <table class="table table-hover table-bordered container">
        <thead>
          <tr class="bg-info text-center text-inline">
            <th scope="col">SI no</th>
            <th scope="col">Order number</th>
            <th scope="col">Amount Due</th>
            <th scope="col">Total Products</th>
            <th scope="col">Invoice number</th>
            <th scope="col">Date</th>
            <th scope="col">Complete/Incomplete</th>
            <th scope="col">Status</th>
      </tr>
        </thead>
        <tbody>
         <?php
          $tabel_sql="SELECT * FROM `orders` WHERE user_id=$user_id";
          $tabel_result=mysqli_query($conn,$tabel_sql);
          $sn=0;
          while($row_tabel=mysqli_fetch_assoc($tabel_result)){
           $sn++;
           $order_number=$row_tabel['order_id'];
           $amount=$row_tabel['amount_id'];
           $total_product=$row_tabel['total_products'];
           $date=$row_tabel['order_date'];
           $status=$row_tabel['order_status'];
           $invoice=$row_tabel['invoice_num'];
           $confirm;
           if($status=="pending"){
            $confirm="Complete";
           }
           else{
            $confirm="Incomplete";
           }
          echo'
          <tr class="bg-secondary text-light text-center">
            <td scope="row">'.$sn.'</td>
            <td>'.$order_number.'</td>
            <td>'.$amount.'</td>
            <td>'.$total_product.'</td>
            <td>'.$invoice.'</td>
            <td>'.$date.'</td>
            <td>'.$confirm.'</td>
            <td><a href="profile.php" class="text-light">Confirm</a></td>
          </tr> ';
          }
  ?>
        </tbody>
      </table>
      <?php
      }
      else{
     get_order_detail();
      }
     ?>
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