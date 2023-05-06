<?php

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];  
}
?>
<?php
include '\xampp\htdocs\e-comerce\db.php';
include '\xampp\htdocs\e-comerce\functions.php';
$ip=getIPAddress();
?>
<?php
//writing the logic to create total number of items selected by user
$total_price=0;
$total_quantity=0;
$sql="SELECT * FROM `carts` WHERE ip_address='$ip'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$product_id=$row['product_id'];
$quantity=$row['quantity'];
$total_quantity=$total_quantity+$quantity;
$sql2="SELECT * FROM `products` WHERE product_id=$product_id";
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2)){
$price=$row2['product_price'];
$total_price=$total_price+($price*$quantity);
}
}

$invoice=mt_rand();
$status="pending";
?>
<?php
//writing a query to place the users order
$sql="INSERT INTO `orders` (`user_id`, `amount_id`, `invoice_num`, `total_products`, `order_date`, `order_status`) VALUES ('$user_id', '$total_price', '$invoice', '$total_quantity', current_timestamp(), '$status')";
$result=mysqli_query($conn,$sql);
if($result){
echo'<script>alert("order is placed successfully")</script>';
echo'<script>window.open("profile.php?user_id='.$user_id.'","_self")</script>';
}
//writing a query for pending order
$sql2="INSERT INTO `pending_orders` (`user_id`, `invoice_num`, `product_id`, `quantity`, `order_status`) VALUES ('$user_id', '$invoice', '$product_id', '$total_quantity', '$status');";
$result2=mysqli_query($conn,$sql2);

//writing a query to delete the items from cart once the order has been placed successfully
$sql3="DELETE FROM `carts` WHERE ip_address='$ip'";
$result3=mysqli_query($conn,$sql3);
?>