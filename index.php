<?php
session_start();
if(isset($_SESSION["uid"])){
	
	header("Location:profile.php");
	
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
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-cart-plus"></i>&nbsp;Cart&nbsp; <span class="badge">0</span></a>
      
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
  <div class="panel-body"></div>
  <div class="panel-footer"></div>
</div>
	 </div> 
	  </li>
     
	  <li class=" nav-item dropdown">
  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;SignIn&nbsp;&nbsp;</a>
  <ul class="dropdown-menu dropdown-menu-right">
  
  
       <div class="width:400px;">
<div class="panel panel-info">
  <div class="panel-heading">Login Form</div>
  <div class="panel-body"> 
  <form role="form" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password"  name="password" placeholder="Enter password">
    </div>
    <div class="form-group">
     <a href="#"> <label for="pwd">Forgot Password</label></a>
     
    </div>
	<fieldset class="form-group">
    <input type="hidden" name="signUp" value="0">
	</fieldset>
    <button type="submit" name="login" id="login" class="btn btn-default">Login</button>
  </form>
  </div>
</div>
</div>


  </ul>
</li>
	 
	  
	  <li class="nav-item" style="float: right">
        <a class="nav-link" href="customer_reg.php"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;SignUp&nbsp;</a>
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
</div>


</body>
</html>
