<?php include 'connection.php'; 
	session_start();
	  if(!isset($_SESSION['sess_store']))
	  {
	     header("location:login.php");   
	  }
	 else{
	 	$email = $_SESSION['sess_store'];
	 }
?>
<!DOCTYPE html>
<head>
<title>Store | Medicine Order</title>
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
					  <h3>Medicine Order</h3>
					    <table id="table">
						<thead>
						  <tr>
						  <th>O_ID</th>	
						  <th>L_ID</th>	
						  <th>M_ID</th>	
							<th>Price</th>
							<th>Total</th>
							<th>Date and Time</th>
						  </tr>
						</thead>

						<?php
						$query = "SELECT * FROM medicine_order";
						$result = mysqli_query($con,$query);
						while($value = mysqli_fetch_array($result)){
						?>

						<tbody>
						  <tr>
						  <td><?php echo $value['ORDER_ID']; ?></td>
						  <td><?php echo $value['LOGIN_ID']; ?></td>
							<td><?php echo $value['MEDICINE_ID']; ?></td>
							<td><?php echo $value['QUANTITY']; ?></td>
							<td><?php echo $value['TOTAL']; ?></td>
							<td><?php echo $value['DATE AND TIME']; ?></td>
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
