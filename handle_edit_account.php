<?php
include '\xampp\htdocs\e-comerce\db.php';
include '\xampp\htdocs\e-comerce\functions.php';
getIPAddress();
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$user_id=$_POST['user_id'];
$phone=$_POST['phone'];
$add=$_POST['address'];
$password=$_POST['password'];
$hash=password_hash($password,PASSWORD_DEFAULT);


 $ip=getIPAddress();
$sql1="UPDATE `registration` SET `phone` = '$phone',`Address`='$add', `user_password`='$hash' WHERE `registration`.`user_id` = $user_id;
";
$result1=mysqli_query($conn,$sql1);
if($result1){
    header("location:profile.php?user_id=$user_id&success=true");
}
}


?>