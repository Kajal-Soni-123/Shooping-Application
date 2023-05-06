
<?php  
include '\xampp\htdocs\e-comerce\db.php';
 function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

//function to insert an item into cart
function cart(){
    if(isset($_GET['product_id'])){
        global $conn;
        $ip = getIPAddress(); 
        $product_id=$_GET['product_id'];
    $sql="SELECT * FROM `carts` WHERE product_id='$product_id' AND ip_address='$ip'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        echo '<script>alert("This item already exist in the cart")</script>';
        
    }
    else{
    $sql="INSERT INTO `carts` (`product_id`, `quantity`, `ip_address`, `time`) VALUES ('$product_id', '0', '$ip', current_timestamp())";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo'<script>alert("One item added successfully to the cart")</script>';
    }
    }
    }
}

//function to count total number of items present in the cart
function cart_items(){
    if(isset($_GET['product_id'])){
        global $conn;
        $ip = getIPAddress(); 
    $sql="SELECT * FROM `carts` WHERE ip_address='$ip'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
        echo $num;
    }
    else{
        global $conn;
        $ip = getIPAddress(); 
    $sql="SELECT * FROM `carts` WHERE ip_address='$ip'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
        echo $num;
    }
}

//function to get the sum of total price of the items in the cart
function total_price(){
    global $conn;
$ip=getIPAddress();
$sql="SELECT * FROM `carts` WHERE ip_address='$ip'";
$result=mysqli_query($conn,$sql);
$sum=0;
while($row=mysqli_fetch_assoc($result)){
$product_id = $row['product_id'];
$priceSelect="SELECT * FROM `products` WHERE product_id='$product_id'";
$priceResult=mySqli_query($conn,$priceSelect);
$priceRow=mysqli_fetch_assoc($priceResult);
$price=$priceRow['product_price'];
$sum=$sum+$price;
}
return $sum;
}
//function to get oerder details
function get_order_detail(){
    global $conn;
    session_start();
    $userid=$_SESSION['user_id'];
    $get_name="SELECT * FROM `registration` WHERE user_id='$userid'";
    $result_name=mysqli_query($conn,$get_name);
    $row_name=mysqli_fetch_assoc($result_name);
    $user_name=$row_name['user_name'];
    $get_order="SELECT * FROM `orders` WHERE user_id='$userid' and order_status='pending'";
    $order_result=mysqli_query($conn,$get_order);
    $num=mysqli_num_rows($order_result);
    if($num==0){
    echo"<h3 class='container text-center text-success'>You don't have any pending order</h3>";
    }
    else{
        echo"<h3 class=' text-center text-danger'>You have ".$num." pending order</h3>";
        echo'<p class="text-center"><a class="text-dark" href="profile.php?user_id='.$userid.'&set=true">order details</a></p>';  
    }
}
?>  