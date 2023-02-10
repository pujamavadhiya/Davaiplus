<?php include 'connection.php';
session_start();
error_reporting(E_ERROR);
if(!isset($_SESSION['sess_user']))
{
    echo "<script LANGUAGE='JavaScript'>
	window.location.href='login.php';
	</script>";
}
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>DavaiPlus-Order History</title>
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
	<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l" style="margin-top: 50px;">Your Order History
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<section id="tables" style="margin-bottom: 50px;">
	          	<div class="table-responsive">
				<table class="timetable_sub">
	              <thead>
	                <tr>
	                  <th>Sr. No</th>
	                  <th>Ordered Products</th>
	                  <th>Order Date</th>
	                  <th>Estimated Delivery Date</th>
	                  <th>Total Amount</th>
	                  <th>Order Status</th>
	                </tr>
	              </thead>
	              <tbody>
	                <?php
	                	$ulid = $_SESSION['ulogid'];
	                    $q1 = "SELECT * FROM product_order WHERE LOGIN_ID='$ulid' AND ORDER_STATUS=1 ORDER BY ORDER_ID DESC";
	                    $res1 = mysqli_query($con, $q1);
	                    $count = 0;
	                    while($row1 = mysqli_fetch_array($res1)){
	                        $orderid = $row1['ORDER_ID'];
	                        $odate = $row1['TIMESTAMP'];
	                        $tamnt = $row1['TOTAL_AMOUNT'];
	                        $today = date('Y-m-d');
	                        $odate = date('Y-m-d',strtotime($odate));
	                        $ddate= date('Y-m-d', strtotime($odate. ' + 8 days'));

	                        $q2 = "SELECT * FROM cart_table WHERE ORDER_ID='$orderid'";
	                        $res2 = mysqli_query($con, $q2);
	                ?>
	                    <tr>
	                        <td><?php echo ++$count;?></td>
	                        <td>
	                          <?php
	                            while($row2 = mysqli_fetch_array($res2)){
	                            $cartid = $row2['CART_ID'];
	                            $mid = $row2['MEDICINE_ID'];
	                            $iid = $row2['INSTRUMENT_ID'];
	                            $quan = $row2['QUANTITY'];
	                            $ostatus = $row2['STATUS'];

	                            if (isset($mid)) {
                                    $q2 = "SELECT * FROM medicines WHERE MEDICINE_ID='$mid'";
                                    $res2 = mysqli_query($con, $q2);
                                    $row2 = mysqli_fetch_array($res2);
                                    $proname = $row2['NAME'];
                                    $proimg = $row2['PHOTO'];
                                    $proprice = $row2['PRICE'];
                                    $price = $quan * $proprice;
                                 }
                                 elseif (isset($iid)) {
                                    $q2 = "SELECT * FROM instruments WHERE INSTRUMENT_ID='$iid'";
                                    $res2 = mysqli_query($con, $q2);
                                    $row2 = mysqli_fetch_array($res2);
                                    $proname = $row2['NAME'];
                                    $proimg = $row2['PHOTO'];
                                    $proprice = $row2['PRICE'];
                                    $price = $quan * $proprice;
                                 }

	                            echo "<img style='width: 100px;height: 100px;' src='../admin/images/$proimg'><span style='margin-right:0.5rem;'>$proname</span><span style='margin-right:0.5rem;'><br/><b>Quantity:</b> $quan</span><b>Price:</b> Rs. $proprice<br/>";
	                           	if ($ostatus==2) {
	                              		echo "<font color='red'>Sorry your order $proname is cancelled by store.</font><br/>";
	                              }
	                          }
	                          ?>
	                        </td>
	                        <td><?php echo date('d-M-Y',strtotime($odate));?></td>
	                        <td><?php echo date('d-M-Y',strtotime($ddate));?></td>
	                        <td>Rs. <?php echo $tamnt;?></td>
	                        <td>
	                            <?php
	                              $today=strtotime($today);
	                              $odate=strtotime($odate);
	                              $ddate=strtotime($ddate);
	                              if($today>$ddate){
	                                  	echo "<font color='green'>Order Delivered</font>";
	                              }
	                              else{
	                                  	echo "<font color='red'>Order will be delivered soon</font>";
	                              }
	                            ?>
	                        </td>
	                    </tr>
	                <?php
	                    }
	                ?>
	              </tbody>
	            </table>
	        </div>
		</section>
		</div>
	</div>
	<!-- //welcome -->
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