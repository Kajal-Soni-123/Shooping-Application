<?php
include '\xampp\htdocs\e-comerce\db.php';
session_start();
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    $sql="DELETE FROM `registration` WHERE user_id='$user_id'";
    $result=mysqli_query($conn,$sql);
    if($result){
     session_unset();
     session_destroy();
     header("location:index.php?deleted");
    }
}
?>