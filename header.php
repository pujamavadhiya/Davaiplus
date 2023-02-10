<?php 
  include 'connection.php';
  session_start(); ?>
<!doctype html>
<head></head>
<body>
      <div class="header-outs" id="home">
      <div class="header-bar">
         <div class="container-fluid">
            <div class="hedder-up row">
               <div class="col-lg-3 col-md-3 logo-head">
                  <h1><a class="navbar-brand" href="index.php">DavaiPlus</a></h1>
                  <h6><font style="color:#666e70;"><i>because we care for you</i></font></h6>
               </div>
              <?php 
                  if (!isset($_SESSION['sess_user'])) {
              ?>
                  <div class="col-lg-4 col-md-6 search-right">
                  <form class="form-inline my-lg-0">
                     <input class="form-control mr-sm-2" type="search" placeholder="Search">
                     <button class="btn" type="submit">Search</button>
                  </form>
               </div>
               <div class="col-lg-3 col-md-3" style="margin-top: -7px;">
              <?php 
                }
                else{
              ?>
                  <div class="col-lg-4 col-md-6 search-right">
                  <form class="form-inline my-lg-0">
                     <input class="form-control mr-sm-2" type="search" placeholder="Search">
                     <button class="btn" type="submit">Search</button>
                  </form>
               </div>
                  <div class="col-lg-5 col-md-3" style="margin-top: -7px;">
              <?php 
                }
              ?>
                  <div class="cart-icons">
                     <ul>
                        <li style="margin-top: 15px;">
                         <button class="top_toys_user" type="submit" name="submit" value="">
                                 <a href="prescription.php">
                                     <span class="far fa-edit">
                           </span> </a></button>
                        </li>
                      <?php 
                        if (isset($_SESSION['sess_user'])) {
                      ?>
                        <li class="outs_more-buttn" style="margin-left: 50px;"><a href="logout.php">Logout</a></li>
                      <?php 
                      }
                      ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
               <ul class="navbar-nav ">
                  <li class="nav-item ">
                     <a class="nav-link" href="index.php">Home <span class="sr-only">(current)
                     </span> </a>
                  </li>
                  <li class="nav-item">
                     <a href="about.php" class="nav-link">About</a>
                  </li>
                  <li class="nav-item">
                     <a href="service.php" class="nav-link">Service</a>
                  </li>
                  <li class="nav-item">
                     <a href="medicines.php" class="nav-link">Medicines</a>
                  </li>
                  <li class="nav-item">
                     <a href="instrument.php" class="nav-link">Instruments</a>
                  </li>
                  <li class="nav-item">
                     <a href="contact.php" class="nav-link">Contact</a>
                  </li>
                  <?php 
                    if (isset($_SESSION['sess_user'])) {
                    ?>
                        <li class="nav-item">
                          <a href="manageorders.php" class="nav-link">Manage Orders</a>
                        </li>
                        <li class="nav-item">
                          <a href="cart.php" class="nav-link">Your Cart</a>
                        </li>
                  <?php 
                    }
                    else {
                  ?>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Sign up/Sign in
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link" href="signup.php">Sign up/ Register</a>
                        <a class="nav-link " href="signin.php">Sign in/Login</a>
                     </div>
                  </li>
                  <?php 
                    }
                  ?>
               </ul>
            </div>
         </nav>
       </div>
	 </div>
  </body>
</html>