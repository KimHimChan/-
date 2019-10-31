<?
	session_start();
	$login = $_SESSION['login'];
	$email = $_SESSION['email'];
	$dates = $_SESSION['dates'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Личный кабинет</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="style_myself_room.css">
	<link rel="stylesheet" type="text/css" href="styles_form.css">

	<script type="text/javascript">
		function openbox(id){
            display = document.getElementById(id).style.display;
            if(display=='none'){
                document.getElementById(id).style.display='block';
            }else{
                document.getElementById(id).style.display='none';
            }
        }
	</script>

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
	<h1 class="name_room"><u>Кабинет <? echo "$login"; ?></u></h1>
	<div class="user">
		<form class="trips" method="post" action="trip_add.php" name="prip_date">
			<label><h1><u>Бронирование поездки</u></h1></label>
			<h3 class="in_block">Выбор даты поездки:</h3>
			<input type="date" name="dates" class="in_block">
			<?
				$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
				$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

				$date_over = "2001-01-01";

				if ($dates < $date_over) {
					echo "<input type='submit' value='Забронировать'>";
				}
				else{
					echo "<input type='submit' value='Забронировать' disabled>";
					echo "<h2>Бронирование только п достижению совершенолетия</h2>";
				}
				mysql_close($connection);
			?>
			
			<h4><p><u>Warning!</u>  При подтверждении бронирования с вами свяжутся</p></h4>
		</form>
	</div>
	<br>
	<div class='trip'>
		<div id='block' onclick="openbox('box0'); return false">
			<a href='' ><h3>Просмотр забронированных поездок</h3></a>
		</div>
		<hr>
		<div id='box0' style='display: none;'>
	<?
		$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
		$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

		if ($dates < $date_over) {

			$email = $_SESSION['email'];

			$result = mysql_query("SELECT * FROM trip WHERE email='$email'");

			for ($i = 0; $i < mysql_num_rows($result); $i++) { 
				$rez = mysql_fetch_array($result);
				echo "<form method='post' action='delete_trip.php' class='frm'>";
				echo "<label>$rez[dates]</label>";
				echo "&nbsp&nbsp&nbsp&nbsp";
				echo "<input type='hidden' name='form_id' value='$rez[id_trip]'>";
				echo "<input type='submit' value='Удалить дату'>";
				echo "</form>";
			}
			mysql_close($connection);
		}
	?>
		<br>
		</div>
	</div>
	<br>
	<div class='feedback'>
		<div id='block' onclick="openbox('box'); return false">
			<a href='' ><h3>Обратная связь</h3></a>
		</div>
		<hr>
		<div id='box' style='display: none; '>
			<form class='contact_form' action='mail.php' method='post'>
				<p>
					<label for='email'>Email:</label>
					<input type='text'  name='email' value='$email' readonly />
				</p>
				<p>
					<label for='message'>Текст сообщения:</label>
					<textarea name='messagess' cols='40' rows='6' required ></textarea>
				</p>
				<p>
					<button class='submit' type='submit'>Отправить сообщение</button>
				</p>
			</form>
		</div>
	</div>
	<div class="cards">
		<div id="block" onclick="openbox('box1'); return false">
			<a href="" ><h3>Обзор маршрута</h3></span></a>
		</div>
		<hr>
		<div id="box1" style="display: none; ">
			<div class="map" >
				<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Addb19b12e222a913ac52e61da76ec1c99a8f60004f4ea860e59205bd4c20a23a&amp;width=696&amp;height=361&amp;lang=ru_RU&amp;scroll=true"></script>
			</div>
			<br>
		</div>
	</div>
	<br>
</body>
</html>