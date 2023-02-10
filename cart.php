<?php
include "connection.php";
session_start();
error_reporting(E_ERROR);
if(!isset($_SESSION['sess_user']))
{
    header("location:login.php");
}
else{
   if(isset($_GET['type'])){
      if($_GET['type']=='increase')
      {
         if(isset($_GET['cartid']))
         {
            $cartid = $_GET['cartid'];
            $q1 = "UPDATE cart_table SET QUANTITY = QUANTITY + 1 WHERE CART_ID='$cartid'";
            $res1 = mysqli_query($con, $q1);
            if($res1){
               echo '<script LANGUAGE="JavaScript">
                        window.location.href = "cart.php";
                        </script>';
            }
         }
      }
      else if($_GET['type']=='decrease')
      {
         if(isset($_GET['cartid']))
         {
            $cartid = $_GET['cartid'];
            $q1 = "UPDATE cart_table SET QUANTITY = QUANTITY - 1 WHERE CART_ID='$cartid'";
            $res1 = mysqli_query($con, $q1);
            if($res1){
               echo '<script LANGUAGE="JavaScript">
                     window.location.href = "cart.php";
                     </script>';
            }
         }
      }
   }
}
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>DavaiPlus-checkout</title>
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
                  <li>Checkout</li>
               </ul>
            </div>
         </div>
         <!-- //short-->
         <!--Checkout-->  
         <!-- //banner -->
         <!-- top Products -->
         <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <h3>Chec<span>kout</span></h3>
                     <div class="checkout-right">
                        <?php 
                           $ulid = $_SESSION['ulogid'];
                           $q1 = "SELECT * FROM cart_table WHERE LOGIN_ID='$ulid' AND STATUS=0 AND ORDER_ID is NULL";
                           $res = mysqli_query($con, $q1);
                           $cnt = mysqli_num_rows($res);
                           if($cnt>0){
                        ?>
                        <h4>Your shopping cart contains: <span><?php echo $cnt; ?> Products</span></h4>
                        <table class="timetable_sub">
                           <thead>
                              <tr>
                                 <th>Sr No.</th>
                                 <th>Product</th>
                                 <th>Quantity</th>
                                 <th>Product Name</th>
                                 <th>Price</th>
                                 <th>Remove</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                              $count = 0;
                              $total_amount = 0;
                              while($row1 = mysqli_fetch_array($res)){
                                 $mid = $row1['MEDICINE_ID'];
                                 $iid = $row1['INSTRUMENT_ID'];
                                 $cartid = $row1['CART_ID'];
                                 $cartquan = $row1['QUANTITY'];
                                 if (isset($mid)) {
                                    $q2 = "SELECT * FROM medicines WHERE MEDICINE_ID='$mid'";
                                    $res2 = mysqli_query($con, $q2);
                                    $row2 = mysqli_fetch_array($res2);
                                    $proname = $row2['NAME'];
                                    $proimg = $row2['PHOTO'];
                                    $proprice = $row2['PRICE'];
                                 }
                                 elseif (isset($iid)) {
                                    $q2 = "SELECT * FROM instruments WHERE INSTRUMENT_ID='$iid'";
                                    $res2 = mysqli_query($con, $q2);
                                    $row2 = mysqli_fetch_array($res2);
                                    $proname = $row2['NAME'];
                                    $proimg = $row2['PHOTO'];
                                    $proprice = $row2['PRICE'];
                                 }
                                 $amount = $cartquan * $proprice;
                                 $total_amount+=$amount;
                              ?>
                              <tr class="rem1">
                              <form action="placeorder.php" method="post">
                              <td class="invert"><?php echo ++$count; ?></td>
                              <td class="invert-image">
                                    <img style="width: 100px;height: 100px;" src="../admin/images/<?php echo $proimg; ?>" alt=" " class="img-responsive">
                              </td>
                              <td class="invert">
                                 <div class="quantity">
                                    <div class="quantity-select">
                                       <?php
                                          if($cartquan>1){
                                                echo "<a class='entry value-minus' 
                                                href='?cartid=$cartid&type=decrease'>&nbsp;
                                                </a>";
                                          }else{
                                                echo '<a class="entry value-minus" disabled>&nbsp;</a>';
                                          }
                                       ?>
                                       <div class="entry value"><span class="span-1"><?php echo $cartquan;?></span></div>
                                    <?php
                                       echo "<a class='entry value-plus' 
                                                href='?cartid=$cartid&type=increase'>&nbsp;
                                                </a>";
                                    ?>
                                    </div>
                                 </div>
                              </td>
                              <td class="invert"><?php echo $proname; ?></td>
                              <td class="invert"><?php echo 'Rs. '.$amount; ?></td>
                              <td class="invert">
                                 <div class="rem">
                                    <a href="remove.php?cartid=<?php echo $cartid;?>"><div class="close1"></div></a>
                                 </div>
                              </td>
                           </tr>
                           <?php }
                              $_SESSION['total_amount'] = $total_amount;
                           ?>
                           </tbody>
                        </table>
                     </div>
                        <div style="margin-top: 20px;">
                           <center>
                              <label>Total Amount: Rs. <?php echo $total_amount;?> </label>&nbsp;&nbsp;&nbsp;&nbsp;
                              <button class="w3view-cart" style="margin-top: 2px;height: 50px;font-size: unset;width: 150px;background: #ea1d5d;border-color: #ea1d5d;" name="order">Order Now</button>
                           </center>
                        </div>
                     </form>
                        <?php
                           } 
                           else{
                              echo '<div class="alert alert-danger" role="alert" id="my-cart-empty-message">Your cart is empty</div>';
                           }
                        ?>
                        <div class="clearfix"> </div>
                        <div class="clearfix"></div>
                  </div>
               </div>
               <!-- //top products -->
            </div>
      </section>
    
      <!-- footer -->
      <footer class="py-lg-4 py-md-3 py-sm-3 py-3 text-center">
         <div class="copy-agile-right">
            <?php
                include 'footer.php';
            ?>
         </div>
      </footer>
      <!-- //footer -->
      <!-- Modal 1-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form action="#" method="post">
                        <div class="fields-grid">
                           <div class="styled-input">
                              <input type="text" placeholder="Your Name" name="Your Name" required="">
                           </div>
                           <div class="styled-input">
                              <input type="email" placeholder="Your Email" name="Your Email" required="">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="password" name="password" required="">
                           </div>
                           <button type="submit" class="btn subscrib-btnn">Login</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- //Modal 1-->
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
      <!--// cart-js -->
      <!--quantity-->
      <script>
         $('.value-plus').on('click', function () {
         	var divUpd = $(this).parent().find('.value'),
         		newVal = parseInt(divUpd.text(), 10) + 1;
         	divUpd.text(newVal);
         });
         
         $('.value-minus').on('click', function () {
         	var divUpd = $(this).parent().find('.value'),
         		newVal = parseInt(divUpd.text(), 10) - 1;
         	if (newVal >= 1) divUpd.text(newVal);
         });
      </script>
      <!--quantity-->
      <!--closed-->
      <script>
         $(document).ready(function (c) {
         	$('.close1').on('click', function (c) {
         		$('.rem1').fadeOut('slow', function (c) {
         			$('.rem1').remove();
         		});
         	});
         });
      </script>
      <script>
         $(document).ready(function (c) {
         	$('.close2').on('click', function (c) {
         		$('.rem2').fadeOut('slow', function (c) {
         			$('.rem2').remove();
         		});
         	});
         });
      </script>
      <script>
         $(document).ready(function (c) {
         	$('.close3').on('click', function (c) {
         		$('.rem3').fadeOut('slow', function (c) {
         			$('.rem3').remove();
         		});
         	});
         });
      </script>
      <!--//closed-->
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