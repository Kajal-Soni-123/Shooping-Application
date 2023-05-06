<?php
include '\xampp\htdocs\e-comerce\db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
$admin_email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$sql="SELECT * FROM `admin` WHERE admin_email='$admin_email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
$admin_id=$row['admin_id'];
$admin_name=$row['admin_name'];

if($num==1){
    session_start();
    $_SESSION['admin_loggedin']=true;
    $_SESSION['admin_id']=$admin_id;
    $_SESSION['admin_name']=$admin_name;
    header("location:admin/index.php?name=$admin_name&success=true");
}
else{
  header("location:admin_login.php?success=false");
}
}
?>