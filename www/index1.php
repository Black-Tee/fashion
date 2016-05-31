<?php
include 'connect.php';
?>

<h2>Список клієнтів</h2>
<a href="new.php">Додати нового</a><br/><br/>
<table border="1" cellspacing="0" cellpadding="5px">
	<tr>
		<th>ID</th>
		<th>Прізвище</th>
		<th>Ім'я</th>
		<th>Місто</th>
		<th>E-mail</th>
		<th>Логін</th>
		<th>Пароль</th>
		<th>Телефон</th>
		<th>Дата реєстрації</th>
		<th>Дата внесення змін</th>
		<th>Функції</th>
	</tr>
	<?php
		$sql = "select id, name, name1, misto, email, login, parol, phone, created_at, modified_at from registration";
		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result) > 0 ){
			while($row = mysqli_fetch_assoc($result)){									
	?>
				<tr>
					<td><?=$row['id']?></td>
					<td><?=$row['name']?></td>
					<td><?=$row['name1']?></td>
					<td><?=$row['misto']?></td>
					<td><?=$row['email']?></td>
					<td><?=$row['login']?></td>
					<td><?=$row['phone']?></td>
					<td><?=$row['created_at']?></td>
					<td><?=$row['modified_at']?></td>
					<td>
						<a href="edit.php?id=<?=$row['id']?>">Редагувати</a> |
						<a href="delete.php?id=<?=$row['id']?>">Видалити</a>
					</td>
				</tr>
	<?php
			}
		}
	?>
	
</table>