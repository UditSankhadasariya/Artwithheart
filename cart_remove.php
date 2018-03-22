<?php
include "storescripts/connect_to_mysql.php";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		if($sql = $udit->query("DELETE FROM cart WHERE p_id='$id'")){
			echo "<script>alert('Item removed from cart!')</script>";
			echo "<script>window.open('cart.php','_self')</script>";
		}
	}

?>