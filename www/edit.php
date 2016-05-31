<?php
include 'connect.php';
	if(isset($_POST['btn_submit'])){
		$sql = "update registration set name = '".$_POST['txt_name']."',
									name1 = '".$_POST['txt_name1']."',
									misto = '".$_POST['txt_misto']."',
									email = '".$_POST['txt_email']."',
									login = '".$_POST['txt_login']."',
									parol = '".$_POST['txt_parol']."',
									phone = '".$_POST['txt_phone']."',
									modified_at = '".date('Y-m-d H:i:s')."'
				where id = '".$_POST['txt_id']."'
		";
		if(mysqli_query($con, $sql)){
			header('Location:index1.php');
		}else{
			echo "Error ".mysqli_error($con);
		}
	}
	
	$id = '';
	$name = '';
	$name1 = '';
	$misto = '';
	$email = '';
	$login = '';
	$parol = '';
	$phone = '';
	if(isset($_GET['id'])){
		$sql = "select id, name, name1, misto, email, login, parol, phone, created_at, modified_at from registration
				where id=".$_GET['id'];
		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$id = $row['id'];
			$name = $row['name'];
			$name1 = $row['name1'];
			$misto = $row['misto'];
			$email = $row['email'];
			$login = $row['login'];
			$parol = $row['parol'];
			$phone = $row['phone'];
		}
	}
	
?>

<h2>Додати користувача</h2>
<form action="" method="post">
	<table>
		<tr>
			<td>Прізвище</td>
			<td><input name="txt_name" value="<?=$name?>"></td>
		</tr>
		<tr>
			<td>Ім'я</td>
			<td><input name="txt_name1" value="<?=$name1?>"></td>
		</tr>
		<tr>
			<td>Місто</td>
			<td><input name="txt_misto" value="<?=$misto?>"></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input name="txt_email" value="<?=$email?>"></td>
		</tr>
		<tr>
			<td>Логін</td>
			<td><input name="txt_login" value="<?=$login?>"></td>
		</tr>
		<tr>
			<td>Пароль</td>
			<td><input name="txt_parol" value="<?=$parol?>"></td>
		</tr>
		<tr>
			<td>Телефон</td>
			<td><input name="txt_phone" value="<?=$phone?>"></td>
		</tr>
		<tr>
			<td><input type="hidden" name="txt_id" value="<?=$id?>"></td>
			<td><input type="submit" name="btn_submit"></td>
		</tr>
	</table>
</form>