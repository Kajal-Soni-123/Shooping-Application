
<?php
include '\xampp\htdocs\e-comerce\db.php';
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  $product_name=$_POST['product_name'];
  $product_desc=$_POST['product_desc'];
  $category_name=$_POST['category_name'];
  $brand_name=$_POST['brand_name'];
  $image1=$_POST['product_image1'];
  $image2=$_POST['product_image2'];
  $product_price=$_POST['product_price'];
//selecting category_id from category table
$sql1="SELECT * FROM `categories` WHERE category_name='$category_name'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$category_id=$row1['category_id'];
//selecting brand from brand table
$sql2="SELECT * FROM `brands` WHERE brand_name='$brand_name'";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$brand_id=$row2['brand_id'];
//inserting product details in the product data base
$sql='INSERT INTO `products` (`product_name`, `product_desc`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_price`, `insert_time`) VALUES ("'.$product_name.'", "'.$product_desc.'", "'.$category_id.'", "'.$brand_id.'" , "'.$image1.'", "'.$image2.'", "'.$product_price.'", current_timestamp())';
$result=mysqli_query($conn,$sql);
if($result){
  echo'<script>alert("One product has been inserted successfully")</script>';
}
}
?>

<div class="container my-3">
<h3 class="text-center">Insert Products</h3>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
<div class="form-group">
<label for="category_name">Product Name</label>
<input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter the product name" required>
</div>
<div class="form-group">
<label for="product_desc"> Product Description</label>
<textarea class="form-control" id="product_desc" name="product_desc" required></textarea>
</div>
<div class="form-group">
    <select class="form-select form-control" id="exampleFormControlSelect1" aria-label="default select example" name="category_name" required>
      <option selected>Select Category</option>
      <?php
      $sql="SELECT * FROM `categories`";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        $name=$row['category_name'];
        echo'
      <option>'.$name.'</option>';
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-select form-control" id="exampleFormControlSelect2" aria-label="default select example" name="brand_name" required>
      <option selected>Select Brand</option>
      <?php
      $sql="SELECT * FROM `brands`";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        $name=$row['brand_name'];
        echo'
      <option>'.$name.'</option>';
      }
      ?>
    </select>
  </div>
  <div class="form-group">
<label for="product_image1">Product image1</label>
<input type="file" class="form-control" id="product_image1" name="product_image1" placeholder="Enter the product name" required>
</div>
<div class="form-group">
<label for="product_image2">Product image2</label>
<input type="file" class="form-control" id="product_image2" name="product_image2" placeholder="Enter the product name" required>
</div>
  <div class="form-gorup">
    <label for="price">Product Price</label>
    <input type="text" id="price" name="product_price" class="form-control" placeholder="Enter the price" required>
<button type="submit" class="btn btn-info my-2">Insert</button>
</form>
</div>
