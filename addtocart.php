<?php
include "connection.php";
session_start();

if(isset($_GET['id']) & isset($_GET['type'])){
	$id = $_GET['id'];
	$type = $_GET['type'];
	$ulid = $_SESSION['ulogid'];

	$q6 = "SELECT * FROM cart_table WHERE LOGIN_ID='$ulid' AND status=0 AND MEDICINE_ID='$id' OR INSTRUMENT_ID='$id'";
	$res6 = mysqli_query($con, $q6);
	$n = mysqli_num_rows($res6);
	if($n==0){
		if ($type=='m') {
			$q4 = "INSERT INTO `cart_table`(`LOGIN_ID`, `MEDICINE_ID`,`QUANTITY`, `STATUS`) VALUES ('$ulid','$id',1, 0)";
			$res4 = mysqli_query($con, $q4);
		}
		elseif ($type=='i') {
			$q4 = "INSERT INTO `cart_table`(`LOGIN_ID`, `INSTRUMENT_ID`,`QUANTITY`, `STATUS`) VALUES ('$ulid','$id',1, 0)";
			$res4 = mysqli_query($con, $q4);
		}
		if($res4){
			echo "<script LANGUAGE='JavaScript'>
			window.alert('Product added to cart successfully.');
			window.location.href=document.referrer;
			</script>";
		}
		else{
			echo "<script LANGUAGE='JavaScript'>
			window.alert('Error Occured Please Try Again!!');
			window.location.href=document.referrer;
			</script>";
		}
	}
	else{
		echo "<script LANGUAGE='JavaScript'>
			window.alert('Product already added to your cart.');
			window.location.href='cart.php';
			</script>";
	}
}

?>