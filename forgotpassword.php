<?php include 'connection.php'; 
?>
<!DOCTYPE html>
<head>
<title>Admin|Forgot Password</title>
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
					<h3>Reset Password<h3>
					
				</div>
				<p><font style="color:#ffffff">.</font></p>
				<form method="POST">
					<label for="inputPassword3" class="control-label">Enter the email address associated with your account</label> 
					<input type="text" name="uemail" placeholder="Email" required="">
					<input type="submit" class="register" name="reset" value="Reset Password">
				</form>

				<?php
  				/*	if(isset($_GET['flag']))
  					{  

    					if($_GET['flag']==1)
    					{
     						echo "<h6 style='color:green'><b>Details has been sent to your mail id.</b></h6><br>";
    					}
    					else{
      						echo "<h6 style='color:red'>Your Email Id does not exsits.Please enter valid email id.</h6><br>";
    					}
  					}*/
				?>

				<div class="signin-text">
					<div class="text-right">
						<p><a href="login.php" align="left" class="hvr-icon-forward">Back to login</a><br/></p>
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
