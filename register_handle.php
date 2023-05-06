
<?php
include '\xampp\htdocs\e-comerce\db.php';
include '\xampp\htdocs\e-comerce\functions.php';
getIPAddress();
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$user_name=$_POST['name'];
$user_email=$_POST['email'];
$phone=$_POST['phone'];
$add=$_POST['address'];
$password=$_POST['password'];
$hash=password_hash($password,PASSWORD_DEFAULT);
$cpassword=$_POST['cpassword'];
$sql="SELECT * FROM `registration` WHERE user_email='$user_email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
    $showError="The email already exist user someother email id";
    header("location:register.php?success=false&error='$showError'");
    exit();
}

if($password!=$cpassword){
    $showError="The password does not matches";
   header("location:register.php?success=false&error='$showError'");
    exit();
}
else{
    $ip=getIPAddress();
$sql1="INSERT INTO `registration` (`user_ip_add`, `user_name`, `user_email`,`phone`,`Address`, `user_password`, `time`) VALUES ('$ip', '$user_name', '$user_email','$phone','$add', '$hash', current_timestamp())";
$result1=mysqli_query($conn,$sql1);
if($result1){
    header("location:register.php?success=true");
}
}
}

?>