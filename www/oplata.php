<?php
header('Content-Type: text/html; charset=utf-8');
?><!DOCTYPE html>
<html>
   <meta charset="utf-8">
        <title> Оплата</title>
<body>

<form action="action_page.php">
  <fieldset>
    <legend>Personal information:</legend>
    Прізвище:<br>
    <input type="text" name="firstname" value="">
    <br>
    Ім'я:<br>
    <input type="text" name="lastname" value="">
    <br><br>
	<form action="action_page.php">
  <select name="odyag">
    <option value="sykni">Сукні</option>
    <option value="verh">Верхній одяг</option>
    <option value="sport">Спортивний одяг</option>
    <option value="bryku">Брюки та спідниці</option>
	<option value="bluzku">Блузки та футболки</option>
	<option value="svetru">Светри</option>
  </select>
  <br><br>
  <form>
  <input type="radio" name="gender" value="v" checked> Вечірні<br>
  <input type="radio" name="gender" value="k"> Коктельні<br>
  <input type="radio" name="gender" value="o"> Офісні  
</form>
  <br><br>
<form action="action_page.php">
<input type="checkbox" name="vehicle1" value="kira"> Kira Plastinina
<br>
<input type="checkbox" name="vehicle2" value="naut">Nautica
<br>
<input type="checkbox" name="vehicle2" value="oj">Oodji
<br>
<form action="action_page.php">
  Розмір (між 42 and 52):
  <input type="number" name="quantity" min="42" max="52">
</form>
<br>
<form action="action_page.php">
  Сайт: <input type="url" list="url_list" name="link">
  <datalist id="url_list">
    <option label="shopster" value="https://shopster.ua">
    <option label="rozetka" value="http://rozetka.com.ua/">
    <option label="answear" value="http://answear.ua/">
  </datalist>
</form>
<br>
<form action="action_page.php">
  Вставити фото: <input type="file" name="img" multiple>
</form>
<br>
				<label for="text5">Кількість товару</label>
					<input type="text" name="text5" id="text5" size="4"
								maxlength="3"> 
					<label for="text6">Ціна</label>
					<input type="text" name="text6" id="text6" size="4"
								maxlength="5"> </input> <br><br>
		
		<SCRIPT LANGUAGE="JavaScript">

 function totalPrice()
 {
 var ourprice=+document.getElementById('text5').value
 var kolichestvo=+document.getElementById('text6').value
 document.getElementById('result').value=ourprice*kolichestvo
 }

 </SCRIPT>
			<input type=button value="Підрахувати" onclick=totalPrice()></br><br> 
			<label for="result"><font size="4">Сума яку необхідно сплатити </font>
			<input type="text" id="result" size="4"> <br><br> 
			
</form>
    <input type="reset" value="Очистить"></p>
    <input type="submit">
  </fieldset>

</form>

<br>
</body>
</html>
