<?php
include '\xampp\htdocs\e-comerce\db.php';
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  $cat_name=$_POST['category_name'];
  $cat_desc=$_POST['category_desc'];
  $sql2="SELECT * FROM `categories` WHERE category_name='$cat_name'";
  $result2=mysqli_query($conn,$sql2);
  $num=mysqli_num_rows($result2);
  if($num==0){
  $sql='INSERT INTO `categories` (`category_name`, `category_desc`, `time`) VALUES ("'.$cat_name.'", "'.$cat_desc.'", current_timestamp())';
  $result=mysqli_query($conn,$sql);
  echo'<script>alert("the category has been inserted successfully")</script>';
  }
  else{
    echo'<script>alert("this category already exist you cannot add this again")</script>';
  }
}
?>
<div class="container my-3">
<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
<div class="form-group">
<label for="category_name">Category Name</label>
<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter the category name" required>
</div>
<div class="form-group">
<label for="category_desc">Description</label>
<textarea class="form-control" id="category_desc" name="category_desc"></textarea>
</div>
<button type="submit" class="btn btn-info">Insert</button>
</form>
</div>
<?php
