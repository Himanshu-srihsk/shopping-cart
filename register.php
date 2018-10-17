<?php

require_once("db.php");
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$email=$_POST['email'];
$password=($_POST['password']);
$repassword=($_POST['repassword']);
$mobile=$_POST['mobile'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
//$name="/^[A-Z][a-zA-Z ]*$/";
$name="/^[a-zA-Z\\s]*$/";
$emailValidation="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number="/^[0-9]+$/";
//echo $f_name;
if(empty($f_name)||empty($l_name)||empty($email)||empty($password)||
empty($repassword)||empty($mobile)||empty($address1)||empty($address2))
{
echo"
<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill all fields</b>
</div>

";

exit();
}
else{
if(!preg_match($name,$f_name)){
echo"
<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>$f_name is not valid</b>
</div>
";
exit();
}
if(!preg_match($emailValidation,$email)){
echo"
<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>$email is not valid</b>
</div>
";
exit();
}
if(!preg_match($name,$l_name)){
echo"
<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>$l_name is not valid</b>
</div>
";

exit();
}
if(strlen($password)<5){
echo"
<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>password is weak</b>
</div>
";

exit();
}
if($password!=$repassword){
echo"
<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>password is not matching</b>
</div>
";

exit();
}
if(!preg_match($number,$mobile)){
echo"
<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>Mobile number $mobile is not valid</b>
</div>
";
exit();
}
if(strlen($mobile)==10){

}else{
echo"
<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>Mobile number should be 10 digit long</b>
</div>
";
}
}
$sql="select user_id from user_info where email='$email' limit 1";
$execute=mysqli_query($con,$sql);
$count_email=mysqli_num_rows($execute);
if($count_email>0){
echo "
<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>Email Address already Exists try another one</b>
</div>
";
exit();
}else{
$password=md5($password);
$sql="INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES (NULL, '$f_name', '$l_name', '$email', '$password', '$mobile', '$address1', '$address2')";
$execute=mysqli_query($con,$sql);
if($execute){
echo "you are registered successfully....";
}
else{
echo "trouble signing up....";
}
}

?>