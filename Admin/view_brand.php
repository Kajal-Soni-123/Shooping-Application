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
            <th scope="col">Brand Id</th>
            <th scope="col">Brand Name</th>
            <th scope="col">Action</th>
      </tr>
        </thead>
        <tbody>
         <?php
          $tabel_sql="SELECT * FROM `brands`";
          $tabel_result=mysqli_query($conn,$tabel_sql);
          while($row_tabel=mysqli_fetch_assoc($tabel_result)){
      
           $brand_id=$row_tabel['brand_id'];
           $brand_name=$row_tabel['brand_name'];
          echo'
          <tr class="bg-secondary text-light text-center">
            <td>'.$brand_id.'</td>
            <td>'.$brand_name.'</td>
           <td> <form action="" method="post" class="d-inline"><input type="hidden" value='.$brand_id.' name="id"/>
   <button type="submit" class="btn btn-dark btn-outline-light text-light" name="delete">Remove</button></form></td>
          </tr> ';
          }
  ?>
        </tbody>
      </table>
      <?php
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['id'])){
  $brand_id=$_POST['id'];
  $delete_sql="DELETE FROM `brands` WHERE brand_id='$brand_id'";
  $delete_result=mysqli_query($conn,$delete_sql);
}
}
  ?>
</div>

    <?php
}
?>