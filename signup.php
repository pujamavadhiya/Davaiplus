<?php
 include 'connection.php';
 ?>
                <?php
               if(isset($_POST['signup']))
               {
                  $name = $_POST['uname'];
                  $email = $_POST['uemail'];
                  $pass = $_POST['upass'];
                  $cpass = $_POST['cpass'];
                  $cont = $_POST['ucon'];
                  $add = $_POST['uadd'];

                
                $query = "INSERT INTO login(NAME, EMAIL, PASSWORD ,CONFIRM_PASSWORD, CONTACT_NO, ADDRESS, ROLE) VALUES ('$name','$email','$pass','$cpass','$cont','$add',1)";
                 $sql = mysqli_query($con,$query);
        
               if($sql){
                  header("location:signin.php");
                 
               }
               else{
                  echo 'Something went wrong';
               }
     }   
     ?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>DavaiPlus-signup</title>
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
      <?php
 include 'header.php';
 ?>
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
               <li>Sign Up</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--Signup -->
      <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Sign Up</h3>
            <div class="contact-list-grid">
               <form method="POST">
                  <div class=" agile-wls-contact-mid">
                     <div class="form-group contact-forms">
                        <input type="text" class="form-control" name="uname" placeholder="Name">
                     </div>
                     <div class="form-group contact-forms">
                        <input type="email" class="form-control" name="uemail" placeholder="Email ID">
                     </div>
                                          <div class="form-group contact-forms">
                        <input type="password" class="form-control" name="upass" placeholder="Password">
                     </div>
                                          <div class="form-group contact-forms">
                        <input type="password" class="form-control" name="cpass" placeholder="Confirm Password">
                     </div>
                                          <div class="form-group contact-forms">
                        <input type="tel" class="form-control" name="ucon" placeholder="Contact No">
                     </div>
                     <div class="form-group contact-forms">
                        <textarea class="form-control" name="uadd" placeholder="Address" rows="3"></textarea>
                     </div>
                     <button type="submit" name="signup" class="btn btn-block sent-butnn">Sign Up</button>
                  </div>
               </form>

   
            </div>
         </div>
         <!--//contact-map -->
      </section>
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