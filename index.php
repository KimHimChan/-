<?
	session_start();
	if (isset($_GET["exite"])) {
		session_destroy();
		echo '<script>location.replace("index.php");</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Экотуризм по Курганской области</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="slider.css">

	<script type="text/javascript" src="jQueryJavaScriptLibrary.js"></script>
	<script type="text/javascript" src="script.js"></script>

</head>
<body>
	<div class="header">
		<div class="reg">
			<?
				if (!isset($_SESSION['login'])) {
					echo "<form method='post' action='enter.php'>";
					echo "<label>Логин: </label>";
					echo "<input type='text' name='login'>";
					echo "<br>";
					echo "<label>Пароль: </label>";
					echo "<input type='password' name='parol'>";
					echo "<br>";
					echo "<input type='submit' name='enter' value='Вход'>";
					echo "<a href='registr.php'>[Регистрация]</a>";
					echo "<br>";
					echo "</form>";
				}
				else{
					echo "Здравствуйте, ".$_SESSION["login"]; 
					echo "<a href='?exite'>   [Выход]</a>";
				}
			?>
		</div>
		<div class="logo" align="center">
			<img src="img/logo.png">
		</div>
	</div>
	<div class="menu">
		<ul class="topmenu">
			<li><a href="index.php">Главная</a></li>
			<li><a href="galery.php">Галерея</a></li>
			<li><a href="info.php">Информация</a>
				<ul class="submenu">
					<li><a href="news.php">Новости</a></li>
				</ul>
			</li>
			<?
				$login = $_SESSION['login'];
				if ($login == 'victoryAdmin') {
					echo "<li><a href='manager.php'>Управление пользователями</a></li>";
				}
				else{
					if (isset($_SESSION['login'])) {
						echo "<li><a href='myself_room.php'>Личный кабинет</a></li>";
					}
				}
			?>
		</ul>
	</div>
	<div class="slider-box">
		<div class="slider">
			<img src="img/slider/Winter_Snow.jpg" alt="" />
			<img src="img/slider/Lake.bmp" alt="" />
			<img src="img/slider/World_Russia.bmp" alt="" />
		</div>
	</div>
	<div class="footer" align="center" style="bottom: 0; position: fixed;">
		Индивидуальный проект декабь 2018г. - январь 2019г.
	</div>
</body>
</html>