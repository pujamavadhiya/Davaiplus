<?php include 'connection.php'; 
	session_start();
	  if(!isset($_SESSION['sess_admin']))
	  {
	     header("location:login.php");   
	  }
	 else{
	 	$email = $_SESSION['sess_admin'];
		$qry = "SELECT * FROM login WHERE EMAIL='$email'";
		$result = mysqli_query($con,$qry);
		$value = mysqli_fetch_array($result);
		$pass = $value['PASSWORD'];
	 }
?>
<!DOCTYPE html>
<head>
<title>Admin | Change Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
		
</head>
<body class="dashboard-page">

	<nav class="main-menu">
		<?php include 'sidebar.php'; ?>
	</nav>
	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<section class="title-bar">
			<?php include 'header.php'; ?>
		</section>
		
		<div class="main-grid">
			<div class="agile-grids">	
				
				<!-- input-forms -->
				<div class="grids">
					
					<div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class=" form-grids form-grids-right">
								<div class="widget-shadow " data-example-id="basic-forms"> 
									<div class="form-title">
										<h4>Change Password</h4>
									</div>
									<div class="form-body">
										<form class="form-horizontal" method="post"> 
										
											<div class="form-group"> 
												<label for="inputEmail3" class="col-sm-2 control-label">Old Password</label> 
												<div class="col-sm-9"> 
													<input type="password" name="old_pass" class="form-control" placeholder="Old Password" required> 
												</div> 
											</div> 

											<div class="form-group"> 
												<label for="inputEmail3" class="col-sm-2 control-label">New Password</label> 
												<div class="col-sm-9"> 
												<input type="password" name="pass1" class="form-control" placeholder="New Password" required> 
												</div> 
											</div> 

											<div class="form-group"> 
												<label for="inputPassword3" class="col-sm-2 control-label">Retype Password</label> 
												<div class="col-sm-9"> 
													<input type="password" name="pass2" class="form-control" placeholder="Re-type New Password" required> 
												</div> 
											</div> 
											<div class="col-sm-offset-2"> 
												<button type="submit" class="btn btn-default w3ls-button" name="submit">Change</button> 
											</div> 
										</form> 
										<?php

										if(isset($_POST['submit']))
										{
											$old_pass = $_POST['old_pass'];
											$pass1 = $_POST['pass1'];
											$pass2 = $_POST['pass2'];
											if($pass==$old_pass)
											{
												if($pass1==$pass2)	
												{
													$update = "UPDATE login SET PASSWORD='$pass1',CONFIRM_PASSWORD='$pass2' WHERE EMAIL='$email'";
													$result1 = mysqli_query($con,$update);
													if($result1)
													{
														echo "<script>  alert('Password Changed'); </script>";
														echo ("<script>location.href='changepassword.php'</script>");
													}			
													else
													{
														echo "<script>  alert('Password Not Changed'); </script>";
														echo ("<script>location.href='changepassword.php'</script>");
													}
												}
												else{
													echo "<script>  alert('Password and confirm password should be same'); </script>";
												}
												
											}
		
											else
											{
												echo "<script>  alert('Old Password Incorrect'); </script>";
												echo ("<script>location.href='changepassword.php'</script>");
											}
										}
										?>
									</div>
								</div>
							</div>
						</div>	
					</div>
		
		<!-- footer -->
		<div class="footer">
			<?php include 'footer.php'; ?>
		</div>
		<!-- //footer -->
	</section>
	<script src="js/bootstrap.js"></script>
	<script src="js/proton.js"></script>
</body>
</html>
