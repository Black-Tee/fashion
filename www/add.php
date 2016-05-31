<?php
include 'connect.php';


if(isset($_POST['btn_submit'])){
	$sql = "insert into registration(name,name1, misto, email, login, parol, phone, created_at)
			values('".$_POST['txt_name']."', '".$_POST['txt_name1']."', '".$_POST['txt_misto']."', '".$_POST['txt_email']."', '".$_POST['txt_login']."', '".$_POST['txt_parol']."', '".$_POST['txt_phone']."','".date('Y-m-d H:i:s')."')
	";
	if(mysqli_query($con, $sql)){
		header('Location:index1.php');
	}else{
		echo "Error ".mysqli_error($con);
	}
}
?>

<h2>Додати користувача</h2>
<form action="" method="post">
	<table>
	<tr>
			<td>Прізвище</td>
			<td><input name="txt_name"></td>
		</tr>
		<tr>
			<td>Ім'я</td>
			<td><input name="txt_name1"></td>
		</tr>
		<tr>
			<td>Місто</td>
			<td><input name="txt_misto"></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input name="txt_email"></td>
		</tr>
		<tr>
			<td>Логін</td>
			<td><input name="txt_login"></td>
		</tr>
		<tr>
			<td>Пароль</td>
			<td><input name="txt_parol"></td>
		</tr>
		<tr>
			<td>Телефон</td>
			<td><input name="txt_phone"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn_submit"></td>
		</tr>
	</table>
</form>