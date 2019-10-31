<?
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Управление</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="manager_style.css">

</head>
<body>
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
	<h1 class="name_room"><u>Вселенная админа</u></h1>
	<div class="contant">
		<div>
			<u><h3>Просмотр данных пользователей</h3></u>
		</div>
		<form method="post" action="manager.php">
			Введите логин чтобы найти пользователя:
			<input type="text" name="dname">
			<input type="submit" name="search" value="Найти">
			<input type="submit" name="cancel" value="Отмена">
		</form>
		<br>
		<form method="post" action="bann.php">
			Введите логин чтобы забанить пользователя:
			<input type="text" name="d_name">
			<input type="submit" value="Отправить в бан">
		</form>
		<br>
		<form method="post" action="bann_del.php">
			Введите логин чтобы вернуть пользователя из бана:
			<input type="text" name="ban_name">
			<input type="submit" value="Вернуть из бана">
		</form>
		<br>
		<div id="tabl">
			<table border=center width=600 cellspacing=0 cellpadding=5 align="center">
				<tr>
					<td>ID</td>
					<td>Логин</td>
					<td>Пароль</td>
					<td>e-mail</td>
					<td>День рождения</td>
				</tr>
				<?
					$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
					$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

					$dname = $_REQUEST["dname"];
					$search = $_REQUEST["search"];
					$cancel = $_REQUEST["cancel"];

					$query = "SELECT * FROM users";

					if ($search) {
						$query = "SELECT * FROM users WHERE login = '".mysql_escape_string($dname)."'";
					}

					if ($cancel) {
						$query = "SELECT * FROM users";
					}

					$result = mysql_query($query) or die("Ошибка при выполнении запроса:".mysql_error());

					for ($i = 0; $i < mysql_num_rows($result); $i++) { 
						echo "<tr>";
						$f = mysql_fetch_array($result);
						echo "<td>$f[id]</td><td>$f[login]</td><td>$f[parol]</td><td>$f[email]</td><td>$f[birthday]</td>";
						echo "</tr>";
					}

					mysql_close($connection);
				?>
			</table>
		</div>
	</div>
	<br>
</body>
</html>