
<!doctype html>
<html
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="css/style1.css" type="text/css" />
        <title>Веб-сайт</title>
		
    </head>
	    <body background="768.jpg">
		<div id="main">
		         <div id="menu">
				 <div class="container">
                 <img src="d8.jpg" alt="Norway" width="1000" height="300">
                 <div class="topleft">Fashion</div>
</div>
			         <div id = "menu1">
             <div id="menu2">
					 <ul>
				         <li> <a href="index.php">Головна</a> </li>
				     </ul>
					 
					  <ul>
				         <li> <a href="#">Каталог</a>
						<ul>
                             <li> <a href="#">Сукні</a> </li>
							 <li> <a href="#">Верхній одяг</a> </li>
							 <li> <a href="#">Спортивний одяг</a> </li>
							 <li> <a href="#">Брюки та спідниці</a> </li>
							 <li> <a href="#">Блузки та футболки</a> </li>
							 <li> <a href="#">Светри</a> </li>
							 <li> <a href="#">Костюми та піджаки</a> </li>
                        </ul>
                         </li>
			
				      </ul>
					 
					 <ul>
				         <li> <a href="#">Контакти</a> </li>
				     </ul>
					 <ul>
				         <li> <a href="#">Оплата та доставка</a>
						<ul>
						     <li> <a href="oplata.php">Замовлення</a> </li>
							 <li> <a href="#">Доставка</a> </li>
						</ul>
				         </li>
				     </ul>
					 <ul>
				         <li> <a href="#"> Інформація </a>
						<ul>
							 <li> <a href="#">Служба підтримки</a> </li>
							 <li> <a href="#">Таблиця розмірів</a> </li>
							 <li> <a href="#">Повернення товару</a> </li>
						</ul>
				         </li>
				     </ul>
					 <ul>
				          <li> <a href="#">Вхід та Реєстрація</a>
						<ul>
						     <li> <a href="vhid.php">Вхід</a> </li>
							 <li> <a href="add.php">Реєстрація</a> </li>
						</ul>
				         </li>
				     </ul>
					 
				 </div>  
			 </div>
                 </div>
        		
				 
				<div>
				 <header>
                     <h2>Модний жіночий одяг!</h2>
                 </header>

				 <section>
			<?php
include 'connect.php';


if(isset($_POST['btn_submit'])){
	$sql = "insert into registration(name,name1, misto, email, login, parol, phone, created_at)
			values('".$_POST['txt_name']."', '".$_POST['txt_name1']."', '".$_POST['txt_misto']."', '".$_POST['txt_email']."', '".$_POST['txt_login']."', '".$_POST['txt_parol']."', '".$_POST['txt_phone']."','".date('Y-m-d H:i:s')."')
	";
	if(mysqli_query($con, $sql)){
		//header('Location:index1.php');
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
							
				 </section>
				  <footer>
						Fashion2016©fashion.com
				 </footer>
				</div>	

				</div>
							
		</div>

        </body>
</html>

