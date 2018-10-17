<?php
require_once("db.php");
if(isset($_POST['category'])){

$category_query="select * from categories";
$execute=mysqli_query($con,$category_query);
echo"
 <div class='nav flex-column nav-pills'>
      <a class='nav-link active' href='#' ><h4>Categories</h4></a>

";
if(mysqli_num_rows($execute)>0){
while($row=mysqli_fetch_array($execute)){
$cid=$row["cat_id"];
$cat_name=$row["cat_title"];
echo"
  <li><a href='#' class='category' cid='$cid' >$cat_name</a></li>
";
}
echo"</div>";
}
}

if(isset($_POST['brand'])){

$brand_query="select * from brands";
$execute=mysqli_query($con,$brand_query);
echo"
 <div class='nav flex-column nav-pills'>
      <a class='nav-link active' href='#' ><h4>Brands</h4></a>

";
if(mysqli_num_rows($execute)>0){
while($row=mysqli_fetch_array($execute)){
$bid=$row["brand_id"];
$brand_name=$row["brand_title"];
echo"
  <li><a href='#' class='selectedbrand' bid='$bid'>$brand_name</a></li>
";
}
echo"</div>";
}
}

if(isset($_POST["page"])){
	$product_query="select * from products  limit 0,5";
$execute=mysqli_query($con,$product_query);
$count=mysqli_num_rows($execute);
$pageno=ceil($count/3);
for($i=1;$i<=$pageno;$i++){
	echo "
	<li><a href='#' id='page' page='$i'>$i</a></li>
	";
}
}


if(isset($_POST["product"])){
//$product_query="select * from products order by rand() limit 0,5";
$limit=3;
if(isset($_POST["setPage"])){
	$pageno=$_POST["pageNumber"];
	$start=($pageno*$limit)-$limit;
}else{
	$start=0;
}
$product_query="select * from products  limit $start,$limit";
$execute=mysqli_query($con,$product_query);
if(mysqli_num_rows($execute)>0){
while($row=mysqli_fetch_array($execute)){
$pro_id=$row['product_id'];
$pro_cat=$row['product_cat'];
$pro_brand=$row['product_brand'];
$pro_title=$row['product_title'];
$pro_price=$row['product_price'];
$pro_image=$row['product_image'];

echo"
  <div class='col-md-4'>
<div class='panel panel-info'>
<div class='panel-heading'>$pro_title</div>
<div class='panel-body'>
<img src='images/$pro_image' style='width:160px; height:250px;'/>
</div>
<div class='panel-heading'>$.$pro_price.00
<button pid='$pro_id' style='float:right;' class='btn btn-danger' id='getproduct'>AddToCart</button></div>
</div>
</div>
  
";
}
}

}
if(isset($_POST["get_selected_category"]) || isset($_POST["selectbrand"]) || isset($_POST["search"])){
if(isset($_POST["get_selected_category"])){
$cid=$_POST["cat_id"];
$query="select * from products where product_cat='$cid'";
}
else if(isset($_POST["selectbrand"])){
$bid=$_POST["brand_id"];
$query="select * from products where product_brand='$bid'";
}
else{
$keyword=$_POST["keyword"];
$query="select * from products where product_keywords like '%$keyword%'";

}

$execute=mysqli_query($con,$query);
if(mysqli_num_rows($execute)>0){
while($row=mysqli_fetch_array($execute)){
$pro_id=$row['product_id'];
$pro_cat=$row['product_cat'];
$pro_brand=$row['product_brand'];
$pro_title=$row['product_title'];
$pro_price=$row['product_price'];
$pro_image=$row['product_image'];

echo"
  <div class='col-md-4'>
<div class='panel panel-info'>
<div class='panel-heading'>$pro_title</div>
<div class='panel-body'>
<img src='images/$pro_image' style='width:160px; height:250px;'/>
</div>
<div class='panel-heading'>$.$pro_price.00
<button pid='$pro_id' style='float:right;' class='btn btn-danger' id='getproduct'>AddToCart</button></div>
</div>
</div>
  
";
}
}
}

if(isset($_POST["addToProduct"])){
	//echo "hi";
		session_start();
		if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
			
			//echo 'hi';
   $p_id=$_POST["prod_id"];
$user_id=$_SESSION["uid"];
$sql="select * from cart where p_id='$p_id' and user_id='$user_id'";
$execute=mysqli_query($con,$sql);
$count=mysqli_num_rows($execute);
if($count>0){
echo "
<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>Product is already added into the cart...</b>
</div>
";
}else{
	$sql="select * from products where product_id='$p_id'";
	$execute=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($execute);
	$id=$row["product_id"];
	$pro_name=$row["product_title"];
	$pro_image=$row["product_image"];
	$pro_price=$row["product_price"];
	$sql="INSERT INTO `cart` 
	(`id`, `p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) 
	VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', '$pro_image', '1', '$pro_price', '$pro_price')";
if(mysqli_query($con,$sql)){
	echo "
	<div class='alert alert-success'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>product is added..</b>
</div>
	
	";
}
	}	
	
	
	
}

else{
    echo "
	<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>Sorry SignUp first then only you can add product into your cart!!!</b>
</div>
	
	";
}
/*
if( !isset($_SESSION['uid']) )
    die( "Login required." );
*/	
	/*if(isset($_SESSION["uid"])){
		echo "
	<div class='alert alert-danger'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>Sorry SignUp first then only you can add product into your cart!!!</b>
</div>
	
	";
	}*/

}

if(isset($_POST["get_cart_Product"]) || isset($_POST["cart_checkout"])){
	session_start();
	$uid=$_SESSION["uid"];
	$sql="select * from cart where user_id='$uid'";
	$execute=mysqli_query($con,$sql);
	$count=mysqli_num_rows($execute);
	$no=1;
	$total_amt=0;
	if($count>0){
	while($row=mysqli_fetch_array($execute)){
		
		$id=$row["id"];
		$pro_id=$row["p_id"];
		$pro_name=$row["product_title"];
		$pro_image=$row["product_image"];
        $pro_price=$row["price"];
		$qty=$row["qty"];
		$total=$row["total_amount"];
		$price_array=array($total);
		$total_sum=array_sum($price_array);
		$total_amt=$total_amt+$total_sum;
		if(isset($_POST["get_cart_Product"])){
			echo " 
		<div class='row'>
  <div class='col-md-3'>$no</div>
  <div class='col-md-3'><img src='images/$pro_image' width='60px' height='50px'></div>
  <div class='col-md-3'>$pro_name</div>
  <div class='col-md-3'>$.$pro_price.00</div>
  </div>
		";
		$no++;
		}else{
			echo "
			<div class='row'>
		<div class='col-md-2'>
		<div class='btn-group'>
		<a href='#' remove_id='$pro_id'  class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
		<a href='#' update_id='$pro_id' class='btn btn-success update'><span class='glyphicon glyphicon-ok-sign'></span></a>
		</div>
		</div>
		<div class='col-md-2'><img src='images/$pro_image' width='50px' height='60px'></div>
		<div class='col-md-2'>$pro_name</div>
		<div class='col-md-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty' ></div>
		<div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled ></div>
		<div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
		</div>
			";
		}
		
		
	}
	if(isset($_POST["cart_checkout"])){
		echo "
		<div class='row'>
		<div class='col-md-10'></div>
		<div class='col-md-2'>
		<b>Total $$total_amt</b>
		</div>
		</div>
		";
	}
		echo'
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="monsterkumar9334@gmail.com">
  <input type="hidden" name="upload" value="1">';
  
  $x=0;
  session_start();
	$uid=$_SESSION["uid"];
  $sql="select * from cart where user_id='$uid'";
  $execute=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($execute)){
  $x++;
  echo'
  <input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
	<input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
	<input type="hidden" name="Quantity_'.$x.'" value="'.$row["qty"].'">';
  }
	
	echo'
  <input style="float:right;margin-right:20px; " type="image" name="submit"
    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png" alt="Buy Now">
  <img alt="" src="https://paypalobjects.com/en_US/i/scr/pixel.gif"
    width="1" height="1">
</form>';
		
	}
	
	
}
if(isset($_POST["removeFromCart"])){
	session_start();
	$pid=$_POST["removeId"];
	$uid=$_SESSION["uid"];
	$sql="delete from cart where user_id='$uid' and p_id='$pid'";
	$execute=mysqli_query($con,$sql);
	if($execute){
		echo "
		<div class='alert alert-warning'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>Product has been removed from the cart...</b>
</div>
		";
	}
}
if(isset($_POST["updateProduct"])){
	session_start();
	$uid=$_SESSION["uid"];
	$pid=$_POST["updateId"];
	$qty=$_POST["qty"];
	$price=$_POST["price"];
	$total=$_POST["total"];
	
	$sql="update cart set qty='$qty',price='$price',total_amount='$total' where user_id='$uid' and p_id='$pid'";
	$execute=mysqli_query($con,$sql);
	if($execute){
		echo "
		<div class='alert alert-success'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<b>Product has been updated into the cart continue shopping...</b>
</div>
		";
	}
}

?>