<?php
include "db.php";
session_start();
if(isset($_POST["userLogin"])){
$email=mysqli_real_escape_string($con,$_POST["userEmail"]);
$password=md5($_POST["userPassword"]);
$sql="select * from user_info where email='$email' and password='$password'";
$execute=mysqli_query($con,$sql);
$count=mysqli_num_rows($execute);
if($count == 1){
$row=mysqli_fetch_array($execute);
$_SESSION["uid"]=$row['user_id'];
$_SESSION["name"]=$row['first_name'];
echo "truehi";
}
}
?>