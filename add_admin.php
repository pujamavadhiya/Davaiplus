<?php include 'connection.php'; 
	session_start();
	  if(!isset($_SESSION['sess_admin']))
	  {
	     header("location:login.php");   
	  }
	 else{
	 	$email = $_SESSION['sess_admin'];
	 }
?>
<!DOCTYPE html>
<head>
<title>Admin | Add Admin</title>
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
									<h4>Add Admin</h4>
								</div>
								<div class="form-body">
									<form class="form-horizontal" method="post"> 
										
										<div class="form-group"> 
											<label for="inputEmail3" class="col-sm-2 control-label">Name</label> 
											<div class="col-sm-9"> 
												<input type="text" name="name" class="form-control" placeholder="Name" required> 
											</div> 
										</div> 

										<div class="form-group"> 
											<label for="inputEmail3" class="col-sm-2 control-label">Email</label> 
											<div class="col-sm-9"> 
											<input type="email" name="email" class="form-control" placeholder="Email" required> 
											</div> 
										</div> 

										<div class="form-group"> 
											<label for="inputPassword3" class="col-sm-2 control-label">Password</label> 
											<div class="col-sm-9"> 
												<input type="password" name="pass" class="form-control" placeholder="Password" required> 
											</div> 
										</div>

										<div class="form-group"> 
											<label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label> 
											<div class="col-sm-9"> 
												<input type="password" name="cpass" class="form-control"  placeholder="Confirm Password" required> 
											</div> 
			       						</div>
											
										<div class="form-group"> 
											<label for="inputPassword3" class="col-sm-2 control-label">Contact</label> 
											<div class="col-sm-9"> 
												<input type="tel" name="cont" class="form-control" placeholder="Contact" required> 
											</div> 
										</div> 

										<div class="form-group"> 
											<label for="inputPassword3" class="col-sm-2 control-label">Address</label> 
											<div class="col-sm-9"> 
												<textarea rows=5 name="add" class="form-control" placeholder="Address" required></textarea>
											</div> 
										</div> 

										<div class="col-sm-offset-2"> 
											<button type="submit" class="btn btn-default w3ls-button" name="insert">Insert</button> 
										</div> 
									</form> 
									<?php
								
										if(isset($_POST['insert'])){
										
										$name = $_POST['name'];
										$email = $_POST['email'];
										$pass = $_POST['pass'];
										$cpass = $_POST['cpass'];
										$cont = $_POST['cont'];
										$add = $_POST['add'];

										if($pass != $cpass){
											echo ("<script LANGUAGE='JavaScript'>
        									window.alert('Password and confirm password must be match')</script>");
										}
										else{
											$query = "INSERT INTO login(NAME, EMAIL, PASSWORD, CONFIRM_PASSWORD, CONTACT_NO, ADDRESS, ROLE) VALUES ('$name','$email','$pass','$cpass','$cont','$add','0')";
											$sql = mysqli_query($con,$query);

											if($sql){
        									echo ("<script LANGUAGE='JavaScript'>
        									window.alert('Admin Added Successfully');
         								 	</script>");
      										}
      										else{
        									echo "<script LANGUAGE='JavaScript'>
              								window.alert('Error Occured Please Try Again.');
           									</script>";
      										}
										}
									}
									
									?>
								</div>
							</div>
						</div>
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
