<?php
include '\xampp\htdocs\e-comerce\db.php';
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  $brand_name=$_POST['brand_name'];
  $sql2="SELECT * FROM `brands` WHERE brand_name='$brand_name'";
  $result2=mysqli_query($conn,$sql2);
  $num =mysqli_num_rows($result2);
  if($num==0){
  $sql="INSERT INTO `brands` (`brand_name`, `time`) VALUES ('$brand_name', current_timestamp())";
  $result=mysqli_query($conn,$sql);
  echo'<script>alert("the brand name has been inserted successfully")</script>';
  }
  else{
    echo '<script>alert("this brand name already exist")</script>';
  }
}
?>
<div class="container my-3">
<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
<div class="form-group">
<label for="brand_name">Brand Name</label>
<input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter the brand name" required>
</div>
<button type="submit" class="btn btn-info">Insert</button>
</form>
</div>
<?php
