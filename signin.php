<?php 
include 'connection.php';

      if(isset($_POST['signin'])){
         session_start();
         $email = $_POST['uemail'];
         $pass = $_POST['upass'];
            
         $q = "SELECT * FROM login WHERE EMAIL='$email' AND PASSWORD='$pass'";
         $run = mysqli_query($con,$q);
         $ans=mysqli_fetch_array($run);
         $count = mysqli_num_rows($run); 
         if($count == 1){
            $_SESSION['sess_user'] = $email;
            $_SESSION['ulogid'] = $ans['LOGIN_ID'];
            echo "<script LANGUAGE='JavaScript'>
                        window.location.href='index.php';
                        </script>";
         }
         else{
            echo "<script LANGUAGE='JavaScript'>
                        window.alert('Invalid Username or Password');
                        </script>";
         }
      }
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>DavaiPlus-signin</title>
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
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
   </head>
   <body>
      <!--headder-->
     <?php include 'header.php'; ?>
      <!--//headder-->
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!--//banner -->
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="index.php">Home</a>
                  <span>/ /</span>
               </li>
               <li>Sign In</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--Signin -->
      <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Sign In</h3>
            <div class="contact-list-grid">
               <form method="POST">
                  <div class=" agile-wls-contact-mid">
                     
                     <div class="form-group contact-forms">
                        <input type="email" class="form-control" name="uemail" placeholder="Email ID">
                     </div>
                     <div class="form-group contact-forms">
                        <input type="password" class="form-control" name="upass" placeholder="Password">
                     </div>
                     
                     <button type="submit" name="signin" class="btn btn-block sent-butnn">Sign In</button>
                  </div>
               </form>
               
            </div>
         </div>
         <!--//contact-map -->
      
      <!--subscribe-address-->
      
      <!--//subscribe-->
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
      <!-- //bootstrap working-->      <!-- //OnScroll-Number-Increase-JavaScript -->
   </body>
</html>