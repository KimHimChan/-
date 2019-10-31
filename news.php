<?
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Новости</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="news_style.css">

	<script type="text/javascript">
		function showModalWin() {

			var darkLayer = document.createElement('div');
			darkLayer.id = 'shadow';
			document.body.appendChild(darkLayer);

			var modalWin = document.getElementById('popupWin');
			modalWin.style.display = 'block';

			darkLayer.onclick = function () {
				darkLayer.parentNode.removeChild(darkLayer);
				modalWin.style.display = 'none';
				return false;
			};
		}
	</script>

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
	<h1 class="name_room"><u>Последние новости</u></h1>
	<?
		if ($login == 'victoryAdmin') {
			echo "<form style='text-align: center;'>";
			echo "<input type='button' value='Добавить новость' onclick='showModalWin()'>";
			echo "</form>";

			echo "<div style='text-align: center' id='popupWin' class='modalwin'>";
			echo "<form method='post' action='news_add.php'>";
			echo "Введите заголовок новости:<br>";
			echo "<input type='text' name='text_zagol' size='110'>";
			echo "<br>Введите путь к картинке:<br>";
			echo "<input type='text' name='image' size='50'>";
			echo "<br>Вставте текст статьи:<br>";
			echo "<textarea name='big_text' cols='100' rows='10'></textarea>";
			echo "<br>";
			echo "<input type='submit' value='Добавить'>";
			echo "</form>";
			echo "</div>";
		}
	?>
	<br>
	<?
		$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
		$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

		$query = mysql_query("SELECT * FROM news");

		for ($i = 0; $i < mysql_num_rows($query); $i++) { 
			$result = mysql_fetch_array($query);
			echo "<div class='contant'>";
			echo "<h2><u>$result[zagolovok]</u></h2>";
			echo "<p align='justify'><img src='$result[image_way]' class='leftimg'>";
			echo "$result[texts]";
			echo "</p>";
			echo "<hr>";
			echo "<h3><a href='com_{$result[id]}.php'>Открыть страницу с комментариями</a></h3>";
			echo "</div>";
			echo "<br>";
		}
	?>
</body>
</html>