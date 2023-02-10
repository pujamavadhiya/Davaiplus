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
<title>Admin | Edit Medicine</title>
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
										<h4>Edit Medicine</h4>
									</div>
									<div class="form-body">
										<?php
										$id = $_GET['id'];
										$sql = "SELECT * FROM medicines WHERE MEDICINE_ID='$id'";
										$getresults = mysqli_query($con,$sql);
										while($viewdata = mysqli_fetch_array($getresults)){
										
										$uname = $viewdata['NAME'];
										$ucont = $viewdata['CONTENT'];
										$uprice = $viewdata['PRICE'];
										$uphoto = $viewdata['PHOTO'];

										}
										?>
										<form class="form-horizontal" method="post" enctype="multipart/form-data"> 
										
											<div class="form-group"> 
												<label for="inputEmail3" class="col-sm-2 control-label">Name</label> 
												<div class="col-sm-9"> 
													<input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $uname; ?>"> 
												</div> 
											</div> 

											<div class="form-group"> 
												<label for="inputEmail3" class="col-sm-2 control-label">Content</label> 
												<div class="col-sm-9"> 
												<!--<textarea rows=5  placeholder="content" name="cont" value=""></textarea>-->
												<input type="text" name="cont" class="form-control" placeholder="Name" value="<?php echo $ucont; ?>"> 
												</div> 
											</div> 

											<div class="form-group"> 
												<label for="inputPassword3" class="col-sm-2 control-label">Price</label> 
												<div class="col-sm-9"> 
													<input type="text" name="price" class="form-control" placeholder="Price" value="<?php echo $uprice; ?>"> 
												</div> 
											</div> 

											<div class="form-group"> 
												<label for="inputPassword3" class="col-sm-2 control-label">Photo</label> 
												<div class="col-sm-9"> 
													<input type="file" name="image" accept="image/png,image/jpg,image/jpeg"><br/>
													<img src="images/<?php echo $uphoto; ?>" width='100px' height='100px' alt='not found'>
												</div> 
											</div> 

											<div class="col-sm-offset-2"> 
												<button type="submit" class="btn btn-default w3ls-button" name="update">Update</button> 
											</div> 
										</form> 
										<?php
										$id = $_GET['id'];
										if(isset($_POST['update'])){
										
										$name = $_POST['name'];
										$cont = $_POST['cont'];
										$price = $_POST['price'];
	
										date_default_timezone_set("Asia/calcutta");
										$iname = (string)(date("YmdHis"));

										if (!isset($_FILES['image']['name'])) {
      										$image_path =  $old_image;
										}
										else{
											$filename=$_FILES['image']['name'];
      										$tmpname=$_FILES['image']['tmp_name'];
      										$extension=pathinfo($filename, PATHINFO_EXTENSION);
      										$image_path= $iname.".".$extension; 
      										//delete old image
      										unlink("images/$old_image");

      										move_uploaded_file($tmpname,"images/".$image_path);
    									}	
											
       										
										$query = "UPDATE medicines SET NAME='$name', CONTENT='$cont', PRICE='$price', PHOTO='$image_path' WHERE MEDICINE_ID='$id'";
										$sql = mysqli_query($con,$query);

										
										if($sql){
        									echo ("<script LANGUAGE='JavaScript'>
        									window.alert('Data Upadated Successfully');
         								 	</script>");
         								 	echo ("<script LANGUAGE='JavaScript'>
        									window.location.href='manage_medicine.php';
         								 	</script>");
      									}
      									else{
        									echo "<script LANGUAGE='JavaScript'>
              								window.alert('Error Occured Please Try Again.');
           									</script>";
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
