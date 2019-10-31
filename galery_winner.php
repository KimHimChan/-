<?
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Победители конкурсов</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="style_galery.css">

	<script async>
		var t, a;
    	function example(e){ 
    		clearTimeout(t);
    		var w = e.width; 
    		if (a) {
    			 t = setInterval(function () { 
    			 	if (w <= 150) clearTimeout(t);
    			 	// Стили на уменьшение
    			 	e.style.cursor = 'zoom-in';
    			 	e.style.borderRadius = '1px';
    			 	e.style.boxShadow = '2px 2px 5px #fff'
    			 	e.width = w--;
    			 }, 1);
    			} 
    			else {
    				t = setInterval(function () { 
    					if (w >= 450) clearTimeout(t);
    					// Стили на увеличение
    					e.style.cursor = 'zoom-out';
    					e.style.borderRadius = '5px';
    					e.style.boxShadow = '2px 2px 5px #888'
    					e.width = w++;
    				}, 1);
    			}
    		a = !a;
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
	<h1 class="name_room"><u>Победители конкурсов</u></h1>
	<div class="photo">
		<img src="img/galery/winner/2R4XIGuPnPc.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
		<img src="img/galery/winner/4_2i1xJpWc4.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
		<img src="img/galery/winner/56Ya_jBT81E.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
		<img src="img/galery/winner/au0W_6C46kA.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
		<img src="img/galery/winner/d2ZH0EQcvLQ.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
		<img src="img/galery/winner/GOLupFnA4qI.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
		<img src="img/galery/winner/lrzROAaFMBQ.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
		<img src="img/galery/winner/NT6C5aIbJ0o.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
		<img src="img/galery/winner/PS-KzsLEl98.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
		<img src="img/galery/winner/RA1SygUNHS8.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
		<img src="img/galery/winner/S1j1rhKSzV0.jpg" width="150px" class="alignleft" style="cursor: zoom-in;" onclick="example(this)">
	</div>
	<br>
</body>
</html>