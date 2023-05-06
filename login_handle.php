<?php
include '\xampp\htdocs\e-comerce\db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
$user_name=$_POST['name'];
$user_email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$user_id=$_POST['user_id'];
$sql="SELECT * FROM `registration` WHERE user_email='$user_email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
echo $num;
$row=mysqli_fetch_assoc($result);
$user_id=$row['user_id'];

if($num==1){
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['user_id']=$user_id;
    header("location:login.php?success=true");
}
else{
  header("location:login.php?success=false");
}
}
?>