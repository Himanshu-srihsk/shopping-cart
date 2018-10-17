<?php
session_start();
if(!isset($_SESSION["uid"])){
	
	header("Location:index.php");
	
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping cart</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="">

<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	 <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="main2.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Himanshu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-home"></i>&nbsp;&nbsp;Home&nbsp;&nbsp; <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fab fa-product-hunt"></i>&nbsp;&nbsp;Product&nbsp;&nbsp;</a>
      </li>
	   <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" onfocus="this.value=''" id="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" id="searchbtn" type="submit">&nbsp;Search&nbsp;</button>
    </form>
    </ul>
    <ul class="navbar-nav mr-auto  ">
      <li class="nav-item dropdown" style="float: right">
        <a class="nav-link dropdown-toggle" id="cart-container" data-toggle="dropdown" href="#"><i class="fas fa-cart-plus"></i>&nbsp;Cart&nbsp; <span class="badge">
		<?php
		$con=mysqli_connect("localhost","root","master1234","shopping");
		//if(isset($_POST["get_cart_Product"])){
		session_start();
		$uid=$_SESSION["uid"];
		$sql="select * from cart where user_id='$uid'";
		$execute=mysqli_query($con,$sql);
		$count= mysqli_num_rows($execute);
	//}
	echo "$count";
		?>
		</span></a>
      
	   <div class="dropdown-menu" style="width:400px;">
<div class="panel panel-info">
  <div class="panel-heading">
  <div class="row">
  <div class="col-md-3">Sl.No</div>
  <div class="col-md-3">Product Image</div>
  <div class="col-md-3">Product Name</div>
  <div class="col-md-3">Price in $</div>
  
  </div>
  </div>
  <div class="panel-body">
  <div id="cart_product">
 <!-- <div class="row">
  <div class="col-md-3">Sl.No</div>
  <div class="col-md-3">Product Image</div>
  <div class="col-md-3">Product Name</div>
  <div class="col-md-3">Price in $</div>
  </div>-->
  </div>
  </div>
  <div class="panel-footer"></div>
</div>
	 </div> 
	  </li>
     
	  <li class=" nav-item dropdown">
  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-sign-in-alt"></i><?php echo "  Hi ".$_SESSION["name"];?></a>
  <ul class="dropdown-menu dropdown-menu-right">
  <li><a href="cart.php" style="text-decoration:none;color:blue;"><i class="fas fa-cart-plus"></i>&nbsp;Cart</a></li>
 <li class="divider"></li>
 <li><a href="#" style="text-decoration:none;color:blue;">&nbsp;change password&nbsp;</a></li>
  <li class="divider"></li>
  <li><a href="logout.php" style="text-decoration:none;color:blue;">&nbsp;Logout&nbsp;</a></li>
  </ul>
</li>
	 
	  
	 
    </ul>
  </div>
</nav>
<p><br/></p>
<p><br/></p>
<p><br/></p>

<div class="container-fluid">
<div class="row">
<div class="col-md-1"></div>
  <div class="col-md-2">
  <div id="get_category">
  
 
  
  
  </div>
    
	<p><br></p>
	<div id="get_brand"></div>
	
</div>
<div class="col-md-8">
<div class="row">

<div class="col-md-12" id="prod_msg"></div>

</div>
<div class="panel panel-info">
<div class="panel-heading">Product</div>
<div class="panel-body">
<div id="get_product"></div>

</div>
<div class="panel-footer">&copy;Himanshu</div>
</div>


    

</div>
</div>
<div class="col-md-1"></div>
</div>
<div class="row">
<div class="col-md-12">
<center>
<ul class="pagination" id="pageno">
<li><a href="#">1</a></li>
</ul>
</center>
</div>
</div>
</div>


</body>
</html>
