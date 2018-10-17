<?php

//$connection=mysql_connect("localhost","root","master1234");
//$connectingDB=mysql_select_db("shopping",$connection);
$con=mysqli_connect("localhost","root","master1234","shopping");
if(!$con){
die("Connection failed:" .mysqli_connect_error());
}
?>