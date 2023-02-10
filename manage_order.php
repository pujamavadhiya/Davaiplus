<?php include 'connection.php'; 
error_reporting(0);
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
<title>Admin | Manage Order</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/typo.css" rel='stylesheet' type='text/css' />
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
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->
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
				<!-- tables -->
				
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h3>Manage Orders</h3>
					    <table id="table">
						<thead>
						  <tr>
						  	<th>ORDER_ID</th>	
						  	<th>LOGIN_ID</th>	
						  	<th>PRODUCT NAMES</th>	
							<th>TOTAL AMOUNT</th>
							<th>ADDRESS</th>
							<th>DATE-TIME</th>
						  </tr>
						</thead>

						<?php
						$query = "SELECT * FROM product_order WHERE ORDER_STATUS=1";
						$result = mysqli_query($con,$query);
						while($value = mysqli_fetch_array($result)){
							$orid=$value['ORDER_ID'];
							$uid=$value['LOGIN_ID'];
							$sql1 = "SELECT * FROM cart_table WHERE ORDER_ID='$orid' AND LOGIN_ID='$uid'";
							$query1 = mysqli_query($con,$sql1);
						?>
						<tbody>
						  <tr>
						  	<td><?php echo $orid; ?></td>
						  	<td><?php echo $uid; ?></td>
							<td>
								<?php 
										while($value1= mysqli_fetch_array($query1))
										{	
											$mid=$value1['MEDICINE_ID'];
											$iid=$value1['INSTRUMENT_ID'];
											$qnt=$value1['QUANTITY'];
											$sql2 = "SELECT * FROM medicines WHERE MEDICINE_ID='$mid'";
											$query2 = mysqli_query($con,$sql2);
											$value2= mysqli_fetch_array($query2);
											$cnt=mysqli_num_rows($query1);
											$sql3 = "SELECT * FROM instruments WHERE INSTRUMENT_ID='$iid'";
											$query3 = mysqli_query($con,$sql3);
											$value3 = mysqli_fetch_array($query3);
											if ($cnt>1) {
												if ($value2['NAME']) {
													echo '<b>'.$value2['NAME'].' </b> Quantity - '.$qnt.'<br/> ';
												}
												if ($value3['NAME']) {
													echo '<b>'.$value3['NAME'].' </b> Quantity - '.$qnt.'<br/> ';
												}
											}
											else{
												if ($value2['NAME']) {
													echo '<b>'.$value2['NAME'].' </b> Quantity - '.$qnt.'<br/> ';
												}
												if ($value3['NAME']) {
													echo '<b>'.$value3['NAME'].' </b> Quantity - '.$qnt;
												}
											}
										}
									?>
							</td>
							<td><?php echo 'Rs. '.$value['TOTAL_AMOUNT']; ?></td> 
							<td><?php echo $value['ADDRESS']; ?></td> 
							<td><?php echo $value['TIMESTAMP']; ?></td>
						  </tr>
						</tbody>
						<?php
							}
						?>
					  </table>
					</div>
				  
				</div>
				<!-- //tables -->
			</div>
		</div>
		<table height="20%"></table>
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
