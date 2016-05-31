<?php
header('Content-Type: text/html; charset=utf-8');
?><!DOCTYPE html>
<html>
   <meta charset="utf-8">
        <title> Вхід</title>
<body>

 <!--START OF MAIN CONTENT-->
    <div class="main-container col2-left-layout">
      <div class="main">
        <div class="col-main">
          <div id="messages_product_view"></div>
          <!--Page Title-->
          <div class="page-title">
            <h2>Авторизація</h2>
          </div>
          		<!--Start of Contact Form-->
              <div class="fieldset">
              <h3 class="legend">Для входу до Вашого особистого кабінету введіть логін та пароль</h3>	
			<?php
			
			$connect = mysql_connect('localhost','yana','kostyana1995') or die(mysql_error());
			mysql_select_db('yana');
			
			if(isset($_POST['enter']))
		{
			$e_login=$_POST['e_login'];
			$e_parol=($_POST['e_parol']);
			
			$query=mysql_query("SELECT * FROM registration WHERE login='$e_login'");
			$client_data=mysql_fetch_array($query);
			
			if($client_data['parol']==$e_parol){
			
			echo "Ви ввійшли в свій обліковий запис ";
					
			}
			else {
			echo "Не вірний логін чи пароль ";
			}	
		}
		else {
			
			?>
			
	
			<form action = "vhid.php" method="post">
			<p><h3 class="classy">Логін</h2><br><input type="text" name="e_login" required/></p>
			<p><h3 class="classy">Пароль</h2><br><input type="password" name="e_parol" required/></p>
			<input class="fancybox quickllook" type = "submit" name="enter" value="Ввійти">
			</form>
		
		<p align="centr"> <a href="new.php"><font size="3" color = "green">Якщо Ви ще не зареєстровані перейдіть на сторінку реєстрації</font></a></p></td> </tr>
			<?php } ?>
          </form>
          <!--End of Contact Form-->  
        </div>
        <div class="col-left sidebar"> 
        
          
          
        </div>
      </div>
	 </div>
      <div style="display: none;" id="back-top"> <a href="#"><img alt="" src="images/backtop.gif" /></a> </div>
    </div>
    <!--END OF MAIN CONTENT--> 
</body>
</html>