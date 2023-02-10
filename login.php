<?php include 'connection.php'; ?>
<!DOCTYPE html>
<head>
<title>Admin | Login</title>
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
</head>
<body class="signup-body">
		<div class="agile-signup">	
			
			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
					<h2>Login | Admin</h2>
				</div>
				<form method="POST">
					<input type="text" name="uemail" placeholder="Email" required="">
					<input type="password" name="upass" placeholder="Password" required="">
					<input type="submit" class="register" name="login" value="Login">
				</form>
				<?php
					if(isset($_POST['login'])){
						$email = $_POST['uemail'];
						$pass = $_POST['upass'];
				
						$q = "SELECT * FROM login WHERE EMAIL='".$email."' AND PASSWORD='".$pass."' AND ROLE='0'";
						$run = mysqli_query($con,$q);
						$count = mysqli_num_rows($run); 
						if($count == 1){
							session_start();
							$_SESSION['sess_admin'] = $email;
							header("location:index.php");
						}
						else{
				 			echo "<script LANGUAGE='JavaScript'>
              				window.alert('Invalid Username or Password');
           					</script>";
						}
					}
				?>

				<div class="signin-text">
					<div class="text-right">
						<p><a href="forgotpassword.php">Forget Password?</a></p>
					</div>
					<div class="clearfix"> </div>
				</div>
	
			<!-- footer -->
			<div class="copyright">
				<?php include 'footer.php'; ?>
			</div>
			<!-- //footer -->
			
		</div>
	<script src="js/proton.js"></script>
</body>
</html>
