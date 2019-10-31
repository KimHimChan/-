<?
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Страница с комментариями</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="comments.css">
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
	<h1 class="name_room"><u>В России разрешат сбивать пассажирские самолеты с туристами</u></h1>
	<?
		$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
		$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

		$query_log = mysql_query("SELECT login FROM ban WHERE login = '$login'");
		$result_query = mysql_fetch_array($query_log);

		mysql_close($connection);
	?>
	<div class="pages">
		<?
			$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
			$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

			$result = mysql_query("SELECT * FROM coment WHERE id_page = '3'");

			for ($i = 0; $i < mysql_num_rows($result); $i++) { 
				$rez = mysql_fetch_array($result);
				echo "<form method='post' action='comment_del_3.php' class='commentaries'>";
				echo "<label class='border_login'>";
				echo "$rez[login] : ";
				echo "&nbsp";
				echo "</label>";
				echo "<p class='in_block'>&nbsp&nbsp&nbsp&nbsp&nbsp$rez[mesage]&nbsp&nbsp</p>";
				if ($login == 'victoryAdmin') {
					echo "<input type='hidden' name='form_id' value='$rez[id]'>";
					echo "<input type='submit' value='Удалить комментарий'>";
				}
				echo "</form>";

			}
		?>
		<hr>
		<?
			if (isset($_SESSION['login'])) {
				if (empty($result_query['login'])) {
					echo "<form method='post' action='comment_add.php' style='text-align: center;'>";
					echo "<label>";
					echo "$login :  ";
					echo "</label>";
					echo "<textarea name='comm' cols='130' rows='1'></textarea>";
					echo "<input type='hidden' name='page_id' value='3'>";
					echo "<input type='submit' value='Отправть'>";
					echo "</form>";
				}
				else{
					echo "<h2>Вам нельзя коммментировать! Вы - в бане</h2>";
				}
			}
			else{
				echo "<h2>Зайдите или зарегистрируйтесь, чтобы оставить комментарий</h2>";
			}
		?>
	</div>
	<br>
</body>
</html>