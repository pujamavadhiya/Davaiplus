<?php include 'connection.php'; 
session_start();
error_reporting(E_ERROR);
if(!isset($_SESSION['sess_user']))
{
    echo "<script LANGUAGE='JavaScript'>
   window.location.href='signin.php';
   </script>";
}
else
{
   $a = $_SESSION['sess_user'];
}
?>
<!DOCTYPE html>
<html>
   <head>
      <title>DavaiPlus-prescription</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
               <li>Prescription</li>
            </ul>
         </div>
      </div>
      <table height="13px"></table>
      <!-- //short-->
       
      <!--contact -->
      <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Prescription Editor</h3>
            <div class="contact-list-grid">
               <form method="POST">
                  <div class=" agile-wls-contact-mid">
                     

                     <div class="form-group contact-forms">
                        <textarea class="form-control" name="desc" placeholder="Description" rows="3"></textarea>
                     </div>
                      <div class="form-group contact-forms">
                        <input type="time" class="form-control" name="t1" placeholder="Time1">
                     </div>
                     <div class="form-group contact-forms">
                        <input type="time" class="form-control" name="t2" placeholder="Time2">
                     </div>
                     <div class="form-group contact-forms">
                        <input type="time" class="form-control" name="t3" placeholder="Time3">
                     </div>
                                          <div class="form-group contact-forms">
                        <input type="time" class="form-control" name="t4" placeholder="Time4">
                     </div>  
<button type="submit" class="btn btn-block sent-butnn" name="pres">Prescribe
                     </button>
                  </div>
               </form>
               <?php
                  if(isset($_POST['pres']))
                  {
                     $des = $_POST['desc'];
                    /* $tm1 = $_POST['t1'];
                     $tm2 = $_POST['t2'];
                     $tm3 = $_POST['t3'];
                     $tm4 = $_POST['t4'];*/
                     $tm1 = date("H:i a", strtotime($_POST['t1']));
                     $tm2 = date("H:i a", strtotime($_POST['t2']));
                     $tm3 = date("H:i a", strtotime($_POST['t3']));
                     $tm4 = date("H:i a", strtotime($_POST['t4']));
     $query = "INSERT INTO prescription(DESCRIPTION , TIME_1 ,TIME_2 ,TIME_3,TIME_4) VALUES ('$des','$tm1','$tm2','$tm3','$tm4')";
                     $sql = mysqli_query($con,$query);
                     if($sql){
                     echo 'Successfully Prescribed';
                     }
                     else{
                     echo 'Something went wrong';
                     echo mysqli_error($con);
                     }
                  }
               ?>
            </div>
         </div>
      </section>
      <!-- footer -->
      <footer class="py-lg-4 py-md-3 py-sm-3 py-3 text-center">
         <div class="copy-agile-right">
           <?php include 'footer.php'; ?>
         </div>
      </footer>
      <!-- //footer -->    
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