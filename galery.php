<?
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Галерея</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="style_galery.css">
</head>
<body>
	<div class="reg">
		<?
			if (!isset($_SESSION['login'])) {
				echo "<form method='post' action='enter.php'>";
				echo "<label>Логин: </label>";
				echo "<input type='text' name='login'>";
				echo "<label>Пароль: </label>";
				echo "<input type='password' name='parol'>";
				echo "<input type='submit' name='enter' value='Вход'>";
				echo "<a href='registr.php'>[Регистрация]</a>";
				echo "<br>";
				echo "</form>";
			}
		?>
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
	<h1 class="name_room"><u>Галерея</u></h1>
	<div class="photo_contant">
		<table align="center">
			<tr>
				<td>
					<a href="galery_people.php"><img src="img/pictures_originals.jpg"></a>
					<a href="galery_people.php" style="text-align: center;"><h3>Участники</h3></a>
				</td>
				<td>
					<a href="galery_place.php"><img src="img/pictures_originals.jpg"></a>
					<a href="galery_place.php" style="text-align: center;"><h3>Интересные места</h3></a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="galery_winner.php"><img src="img/pictures_originals.jpg"></a>
					<a href="galery_winner.php" style="text-align: center;"><h3>Победители конкурсов</h3></a>
				</td>
				<td>
					<a href="galery_other.php"><img src="img/pictures_originals.jpg"></a>
					<a href="galery_other.php" style="text-align: center;"><h3>Разное</h3></a>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>