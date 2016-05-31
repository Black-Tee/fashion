<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Загрузка файлов на сервер</title>
</head>
<body>
      <h2><p><b> загрузка файлов </b></p></h2>
      <form action="upload.php" method="post" enctype="multipart/form-data">
      file: <input type="file" name="filename"/><input type="submit" value="Загрузить"><br>
      </form>
	  
	  <?php
   if($_FILES)
   {
		$name=$_FILES["filename"]["name"];
		@move_uploaded_file($_FILES["filename"]["tmp_name"].$name);
		echo"image:$name<br><img src='$name'/>";
   }    
            
?>
</body>
</html>