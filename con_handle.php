<?php
include  '\xampp\htdocs\forum\db.php'; 
if($_SERVER['REQUEST_METHOD']=='POST')
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$add=$_POST['address'];
$phone=$_POST['phone'];
$comment=$_POST['comment'];
$sql='INSERT INTO `contact` (`fname`, `lname`, `email`, `address`, `phone`, `comment`) VALUES ("'.$fname.'", "'.$lname.'", "'.$email.'", "'.$add.'", "'.$phone.'", "'.$comment.'")';
$result=mysqli_query($conn,$sql);
if($result){
  header("location:contact.php?success=true");
}
else{
  header("location:contact.php?success=false");
}
?>