<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
	<style type="text/css">
		#reg {
			width: 30%; height: 40%;
			padding: 5%;
			margin: auto;
			text-align: center;
			border: 10px solid transparent;
			border-image: linear-gradient(to right, transparent 0%, #ADF2F7 100%);
			border-image-slice: 1;
		}
	</style>
</head>
<body>
	<form method="post" action="registr_add.php" id="reg">
		Введите логин: 
		<input type="text" name="login" required>
		<br><br>
		Введите пароль: 
		<input type="password" name="parol" required>
		<br><br>
		Введите адрес электронной почты: 
		<input type="text" name="email" required>
		<br><br>
		Введите дату рождения: 
		<input type="date" class="form-control" name="birthday" required>
		<br><br>
		<input type="submit" value="Регистрация">
	</form>
</body>
</html>