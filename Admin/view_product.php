<?php
session_start();
if(!isset($_SESSION['admin_loggedin'])){
    header("location:admin_login.php");
}
else{
    ?>
<div class="container">
<table class="table table-hover table-bordered container">
        <thead>
          <tr class="bg-info text-center text-inline">
            <th scope="col">Product Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Description</th>
            <th scope="col">Product Price</th>
            <th scope="col">Action</th>
      </tr>
        </thead>
        <tbody>
         <?php
          $tabel_sql="SELECT * FROM `products`";
          $tabel_result=mysqli_query($conn,$tabel_sql);
          while($row_tabel=mysqli_fetch_assoc($tabel_result)){
      
           $product_id=$row_tabel['product_id'];
           $product_name=$row_tabel['product_name'];
           $product_desc=$row_tabel['product_desc'];
           $product_price=$row_tabel['product_price'];
          echo'
          <tr class="bg-secondary text-light text-center">
            <td>'.$product_id.'</td>
            <td>'.$product_name.'</td>
            <td>'.$product_desc.'</td>
            <td>'.$product_price.'</td>
           <td> <form action="" method="post" class="d-inline"><input type="hidden" value='.$product_id.' name="id"/>
   <button type="submit" class="btn btn-dark btn-outline-light text-light" name="delete">Remove</button></form></td>
          </tr> ';
          }
  ?>
        </tbody>
      </table>
      <?php
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['id'])){
  $lesson_id=$_POST['id'];
  $delete_sql="DELETE FROM `products` WHERE product_id='$product_id'";
  $delete_result=mysqli_query($conn,$delete_sql);
}
}
  ?>
</div>

    <?php
}
?>