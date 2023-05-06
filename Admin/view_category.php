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
            <th scope="col">Category Id</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category description</th>
            <th scope="col">Action</th>
      </tr>
        </thead>
        <tbody>
         <?php
          $tabel_sql="SELECT * FROM `categories`";
          $tabel_result=mysqli_query($conn,$tabel_sql);
          while($row_tabel=mysqli_fetch_assoc($tabel_result)){
      
           $category_id=$row_tabel['category_id'];
           $category_name=$row_tabel['category_name'];
           $category_desc=$row_tabel['category_desc'];
          echo'
          <tr class="bg-secondary text-light text-center">
            <td>'.$category_id.'</td>
            <td>'.$category_name.'</td>
            <td>'.$category_desc.'</td>
           <td> <form action="" method="post" class="d-inline"><input type="hidden" value='.$category_id.' name="id"/>
   <button type="submit" class="btn btn-dark btn-outline-light text-light" name="delete">Remove</button></form></td>
          </tr> ';
          }
  ?>
        </tbody>
      </table>
      <?php
if($_SERVER['REQUEST_METHOD']=="POST"){
if(isset($_POST['id'])){
  $category_id=$_POST['id'];
  $delete_sql="DELETE FROM `categories` WHERE category_id='$category_id'";
  $delete_result=mysqli_query($conn,$delete_sql);
}
}
  ?>
</div>

    <?php
}
?>