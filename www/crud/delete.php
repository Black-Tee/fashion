<?php
include 'connect.php';

if(isset($_GET['id'])){
	$sql = "delete from tb_users where user_id =".$_GET['id'];
	if(mysqli_query($con, $sql)){
		header('Location:index1.php');
	}else{
		echo "Error ".mysql_error($con);
	}
}