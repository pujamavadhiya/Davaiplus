<?php
include "connection.php";
session_start();
error_reporting(E_ERROR);
if(!isset($_SESSION['sess_user']))
{
    echo "<script LANGUAGE='JavaScript'>
	window.location.href='login.php';
	</script>";
}

if(isset($_SESSION['total_amount'])){
	$tamount = $_SESSION['total_amount'];
	$ulid = $_SESSION['ulogid'];
	if(isset($_POST['formsubmit']))
	{
			$add = $_POST['add'];
			$q1 = "INSERT INTO `product_order`(`LOGIN_ID`, `TOTAL_AMOUNT`, `ADDRESS`, `ORDER_STATUS`) VALUES ('$ulid', '$tamount', '$add', 1)";
			$res1 = mysqli_query($con, $q1);

			$q2 = "SELECT * FROM product_order WHERE LOGIN_ID='$ulid' AND ORDER_STATUS=1 ORDER BY ORDER_ID DESC LIMIT 1";
			$res2 = mysqli_query($con, $q2);
			$row2 = mysqli_fetch_array($res2);
			$orderid = $row2['ORDER_ID'];

			$q3 = "SELECT * FROM cart_table WHERE LOGIN_ID='$ulid' AND STATUS=0 AND ORDER_ID is NULL";
			$res3 = mysqli_query($con, $q3);
			$count1 = mysqli_num_rows($res3);
			$count2 = 0;
			while($row3 = mysqli_fetch_array($res3)){
				$cartid = $row3['CART_ID'];
				$q5 = "UPDATE cart_table SET ORDER_ID='$orderid',STATUS=1 WHERE CART_ID='$cartid'";
				$res5 = mysqli_query($con, $q5);
				if($res5){
					++$count2;
				}
			}

			if($res1 && ($count1==$count2)){
				echo "<script LANGUAGE='javascript'>
						window.alert('Your Order Placed Successfully!!!');
						window.location.href='cart.php';
					  </script>";
				unset($_SESSION['total_amount']);
			}
		}
}
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>DavaiPlus-Place Order</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="Toys Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!--Shoping cart-->
      <link rel="stylesheet" href="css/shop.css" type="text/css" />
      <!--//Shoping cart-->
      <!--checkout-->
      <link rel="stylesheet" type="text/css" href="css/checkout.css">
      <!--//checkout-->
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
   </head>
   <body>
      <!--headder-->
     <?php 
     include 'header.php';
     ?>
         <!--//headder-->
         <!-- banner -->
         <div class="inner_page-banner one-img">
         </div>
         <!-- short -->
         <div class="using-border py-3">
            <div class="inner_breadcrumb  ml-4">
               <ul class="short_ls">
                  <li>
                     <a href="index.php">Home</a>
                     <span>/ /</span>
                  </li>
                  <li>Place Order</li>
               </ul>
            </div>
         </div>
         <!-- //short-->
         <!--Checkout-->  
         <!-- //banner -->
         <!-- top Products -->
	<div class="welcome">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l" style="margin-top: 50px;">Delivery Address Details
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
				<div class="contact-form wthree">
					<form method="POST">
						<div class="form-group">
							<label>Delivery Address:</label><br>
							<textarea style="width:99%;height:5rem;outline:none;padding-left:1rem;border: 1px solid #CECECE;font-size: 13px;color: #5b5b5b;border-radius: 2px;" name="add" placeholder="Enter Delivery Address" row="3"></textarea>
						</div>
						<button type="submit" class="w3view-cart" style="margin-top: 2px;height: 50px;font-size: unset;width: 150px;background: #ea1d5d;border-color: #ea1d5d;margin-bottom: 50px;" name="formsubmit">Order Now</button>
					</form>
				</div>
				<div class="clearfix"> </div>
                <div class="clearfix"></div>
		</div>
	</div>
      <!-- footer -->
      <footer class="py-lg-4 py-md-3 py-sm-3 py-3 text-center">
         <div class="copy-agile-right">
<?php
  include 'footer.php';
  ?>
         </div>
      </footer>
      <!-- //footer -->
      <!--js working-->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
      <!-- cart-js -->
       <script src="js/minicart.js"></script>
      <script>
         toys.render();
         
         toys.cart.on('toys_checkout', function (evt) {
         	var items, len, i;
         
         	if (this.subtotal() > 0) {
         		items = this.items();
         
         		for (i = 0, len = items.length; i < len; i++) {}
         	}
         });
      </script>
      <!-- //cart-js -->
		<!-- price range (top products) -->
		<script src="js/jquery-ui.js"></script>
		<script>
			//<![CDATA[ 
			$(window).load(function () {
				$("#slider-range").slider({
					range: true,
					min: 0,
					max: 9000,
					values: [50, 6000],
					slide: function (event, ui) {
						$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
					}
				});
				$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
			}); //]]>
		</script>
		<!-- //price range (top products) -->
      <!-- start-smoth-scrolling -->
       <script src="js/move-top.js"></script>
      <script src="js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 900);
         	});
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
      <script>
         $(document).ready(function () {
         	var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear'
         	};
         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working--> 
   </body>
</html>