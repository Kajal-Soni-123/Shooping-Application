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
            <th scope="col">Order Id</th>
            <th scope="col">Order Date</th>
            <th scope="col">Order Status</th>
            <th scope="col">Invoice No.</th>
            <th scope="col">Amount</th>
            <th scope="col">Action</th>
      </tr>
        </thead>
        <tbody>
         <?php
          $tabel_sql="SELECT * FROM `orders`";
          $tabel_result=mysqli_query($conn,$tabel_sql);
          while($row_tabel=mysqli_fetch_assoc($tabel_result)){
      
           $order_id=$row_tabel['order_id'];
           $order_date=$row_tabel['order_date'];
           $order_status=$row_tabel['order_status'];
           $invoice=$row_tabel['invoice_num'];
           $amount=$row_tabel['amount_id'];

          echo'
          <tr class="bg-secondary text-light text-center">
            <td>'.$order_id.'</td>
            <td>'.$order_date.'</td>
            <td>'.$order_status.'</td>
            <td>'.$invoice.'</td>
            <td>'.$amount.'</td>
           <td> <form action="" method="post" class="d-inline"><input type="hidden" value='.$order_id.' name="id"/>
   <button type="submit" class="btn btn-dark btn-outline-light text-light" name="delete">Remove</button></form></td>
          </tr> ';
          }
  ?>
        </tbody>
      </table>
      <?php
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['id'])){
  $order_id=$_POST['id'];
  $delete_sql="DELETE FROM `orders` WHERE order_id='$order_id'";
  $delete_result=mysqli_query($conn,$delete_sql);
}
}
  ?>
</div>

    <?php
}
?>