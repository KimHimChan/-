<?
	session_start();
	echo "<meta charset='utf-8'>";

	$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
	$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

	$id_page = $_REQUEST['page_id'];
	$login = $_SESSION['login'];
	$coment = $_REQUEST['comm'];

	$insert_query = mysql_query("INSERT INTO coment (id, id_page, login, mesage) VALUES ('0', '$id_page', '$login', '$coment')");

	mysql_close($connection);
	echo "<script>location.replace('com_{$id_page}.php');</script>";
?>