<?
	session_start();
	echo "<meta charset='utf-8'>";

	$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
	$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

	$dates = $_REQUEST['dates'];
	$email = $_SESSION['email'];

	$date_today = date("Y-m-d");

	if ($dates <= $date_today) {
		echo "<script type='text/javascript'>alert('Нельзя забронировать позже или сегодняшним числом!');</script>";
	}
	else{
		$result = mysql_query("INSERT INTO trip (id_trip, dates, email) VALUES ('0', '$dates', '$email')") or die("Ошибка при выполнении запроса:".mysql_error());
	}
	mysql_close($connection);

	echo "<script>location.replace('myself_room.php');</script>";
?>