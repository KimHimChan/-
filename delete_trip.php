<?
	session_start();
	echo "<meta charset='utf-8'>";

	$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
	$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

	$id_form = $_REQUEST['form_id'];

	$result = mysql_query("DELETE FROM trip WHERE id_trip = '$id_form'");
	echo "<script type='text/javascript'>alert(Дата удалена');</script>";

	mysql_close($connection);
	echo "<script>location.replace('myself_room.php');</script>";
?>