
function cat(){

    $.ajax({
    type: 'POST',
    url: 'action.php',
    data: {category:1},
    success: function(data){
         $("#get_category").html(data);
    }
 })
}
function brand(){
    $.ajax({
    type: 'POST',
    url: 'action.php',
    data: {brand:1},
    success: function(data){
         $("#get_brand").html(data);
    }
 })
}
function product(){
    $.ajax({
    type: 'POST',
    url: 'action.php',
    data: {product:1},
    success: function(data){
         $("#get_product").html(data);
    }
 })
}

function cart_checkout(){
	  $.ajax({
    type: 'POST',
    url: 'action.php',
    data: {cart_checkout:1},
    success: function(data){
         $("#cart-checkout").html(data);
		 
    }
 })
	
}
function pagination(){
	$.ajax({
    type: 'POST',
    url: 'action.php',
    data: {page:1},
    success: function(data){
        $("#pageno").html(data);
		 
    }
 })
	
}

/*
function cart-container(){
		$.ajax({
		url:"action.php",
method:"POST",
data:{get_cart_Product:1},
success :function (data){
	$("#cart_product").html(data);
}
	})
	
}
*/
/*
function cart_count(){
	$.ajax({
		url:"action.php",
method:"POST",
data:{cart_count:1},
success :function (data){
	$(".badge").html(data);
}
	})
}*/

$(document).ready(function(){


 cat();
 brand();
 product();
 
 cart_checkout();
 
//cart_count();
pagination();
//cart-container();


  $("body").delegate(".category","click",function(event){
event.preventDefault();
var cid=$(this).attr('cid');


$.ajax({
    type: 'POST',
    url: 'action.php',
    data: {get_selected_category:1,cat_id:cid},
    success: function(data){
         $("#get_product").html(data);
    }
 })

})

 $("body").delegate(".selectedbrand","click",function(event){
event.preventDefault();
var bid=$(this).attr('bid');

$.ajax({
    type: 'POST',
    url: 'action.php',
    data: {selectbrand:1,brand_id:bid},
    success: function(data){
         $("#get_product").html(data);
    }
 })
})

$("#searchbtn").click(function(){
var keyword=$("#search").val();
if(keyword!=null){

$.ajax({
    type: 'POST',
    url: 'action.php',
    data: {search:1,keyword:keyword},
    success: function(data){
         $("#get_product").html(data);
    }
 })

}
})




$("#signup_btn").click(function(event){

event.preventDefault();
$.ajax({
    url: "register.php",
    method: "POST",
    data:$("form").serialize(),
    success: function(data){
		$("#signup_msg").html(data);
		}
 })
})

$("#login").click(function(event){

event.preventDefault();
var email=$("#email").val();
var pass=$("#password").val();

$.ajax({
url:"login.php",
method:"POST",
data:{userLogin:1,userEmail:email,userPassword:pass},
success :function (data){
	if(data == "truehi"){
	  window.location.href="profile.php";;
	}
}
})

})

$("body").delegate("#getproduct","click",function(event){

event.preventDefault();
var p_id=$(this).attr('pid');

$.ajax({
url:"action.php",
method:"POST",
data:{addToProduct:1,prod_id:p_id},
success :function (data){
	$("#prod_msg").html(data);
}
})

})

$("#cart-container").click(function(event){
	event.preventDefault();
	$.ajax({
		url:"action.php",
method:"POST",
data:{get_cart_Product:1},
success :function (data){
	$("#cart_product").html(data);
}
	})
	
})

$("body").delegate(".qty","keyup",function(){
	var pid=$(this).attr("pid");
	var qty=$("#qty-"+pid).val();
	var price =$("#price-"+pid).val();
	var total=qty*price;
	$("#total-"+pid).val(total);
})

$("body").delegate(".remove","click",function(event){
	event.preventDefault();
	var pid=$(this).attr("remove_id");
	$.ajax({
		url:"action.php",
method:"POST",
data:{removeFromCart:1,removeId:pid},
success :function (data){
	$("#cart_info").html(data);
	cart_checkout();
	
}
	})
})

$("body").delegate(".update","click",function(event){
	event.preventDefault();
	var pid=$(this).attr("update_id");
	var qty=$("#qty-"+pid).val();
	var price =$("#price-"+pid).val();
	var total=$("#total-"+pid).val();
	
	
	$.ajax({
		url:"action.php",
method:"POST",
data:{updateProduct:1,updateId:pid,qty:qty,price:price,total:total},
success :function (data){
	$("#cart_info").html(data);
	cart_checkout();
	
}
	})
})


$("body").delegate("#page","click",function(){
	var pn=$(this).attr("page");
	
	$.ajax({
		url:"action.php",
method:"POST",
data:{product:1,setPage:1,pageNumber:pn},
success :function (data){
	$("#get_product").html(data);
	
	
}
	})
})

})


