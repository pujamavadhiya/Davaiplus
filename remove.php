<?php
include "connection.php";
session_start();

if(isset($_GET['cartid'])){
		$cartid = $_GET['cartid'];
		$ulid = $_SESSION['ulogid'];

		$q1 = "DELETE FROM cart_table WHERE LOGIN_ID='$ulid' AND CART_ID='$cartid'";
		$res1 = mysqli_query($con, $q1);

		if($res1){
			echo "<script LANGUAGE='JavaScript'>
					window.alert('Product Removed From Your Cart!!');
					window.location.href='cart.php';
					</script>";
		}
}
?>