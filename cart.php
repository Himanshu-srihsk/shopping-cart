
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
	  </div>
	  </nav>
	  <p><br/></p>
	  <p><br/></p>
	  <p><br/></p>
	  
	  <div class="container-fluid">
	  <div class="row">
	  <div class="col-md-2"></div>
	   <div class="col-md-8">
	   <div id="cart_info"></div>
	   </div>
	   <div class="col-md-2"></div>
	  </div>
	  <div class="row">
	  <div class="col-md-2"></div>
	   <div class="col-md-8">
	   <div class="panel panel-primary">
	   <div class="panel-heading">Cart Checkout</div>
	    <div class="panel-body">
		<div class="row">
		<div class="col-md-2"><b>Action</b></div>
		<div class="col-md-2"><b>Product Image</b></div>
		<div class="col-md-2"><b>Product Name</b></div>
		
		<div class="col-md-2"><b>Quantity</b></div>
		<div class="col-md-2"><b>Product price</b></div>
		<div class="col-md-2"><b>price in $</b></div>
		</div>
		<div id="cart-checkout"></div>
		<!--<div class="row">
		<div class="col-md-2">
		<div class="btn-group">
		<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
		<a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span></a>
		</div>
		</div>
		<div class="col-md-2"><img src='images/images.jpg'></div>
		<div class="col-md-2">Product Name</div>
		<div class="col-md-2"><input type='text' class='form-control' value='1' disabled></div>
		<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
		<div class="col-md-2"><input type='text' class='form-control' value='$5000' disabled></div>
		</div>-->
		<!--<div class="row">
		<div class="col-md-10"></div>
		<div class="col-md-2">
		<b>Total $8922222</b>
		</div>
		</div>-->
		</div>
		<div class="panel-footer"></div>
	   </div>
	   
	   </div>
	    <div class="col-md-2"></div>
	  </div>
	  </div>
</body>
</html>
