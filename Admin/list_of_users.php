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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Address</th>
      </tr>
        </thead>
        <tbody>
         <?php
          $tabel_sql="SELECT * FROM `registration`";
          $tabel_result=mysqli_query($conn,$tabel_sql);
          while($row_tabel=mysqli_fetch_assoc($tabel_result)){
      
           $user_id=$row_tabel['user_id'];
           $user_name=$row_tabel['user_name'];
           $user_email=$row_tabel['user_email'];
           $phone=$row_tabel['phone'];
           $add=$row_tabel['Address'];
          echo'
          <tr class="bg-secondary text-light text-center">
            <td>'.$user_name.'</td>
            <td>'.$user_email.'</td>
            <td>'.$phone.'</td>
            <td>'.$add.'</td>
          </tr> ';
          }
  ?>
        </tbody>
      </table>
</div>

    <?php
}
?>