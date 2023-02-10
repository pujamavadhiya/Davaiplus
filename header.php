<?php
	include 'connection.php';
	//session_start();
	$email = $_SESSION['sess_admin'];

	$q = "SELECT NAME FROM login WHERE EMAIL='".$email."'";
	$run = mysqli_query($con,$q);
	$fetchrecord = mysqli_fetch_array($run);
	$uname = $fetchrecord['NAME'];
?>

<div>			
				<h1 align="center"><a href="index.php">DavaiPlus | Admin</a></h1>
				<h5 align="right"><a href="index.php"><?php echo $uname; ?></a></h5>
</div>
<div class="header-right">

				<div class="profile_details_left">				
					<div class="header-right-left">
					
						<div class="profile_details">
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span> 
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li><a href="edit_profile.php"><i class="icon-off fa-edit nav-icon"></i>  Edit Profile</a> </li>
									<li><a href="changepassword.php"><i class="icon-off fa-cogs nav-icon"></i>  Change <br>&nbsp;Password</a> </li>
									<li> <a href="logout.php"><i class="icon-off nav-icon"></i>  Logout </a> </li> 
									
								</ul>
							</li>
						</ul>
						</div>
					</div>	
				</div>
</div>