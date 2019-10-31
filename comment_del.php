<?
	session_start();
	echo "<meta charset='utf-8'>";

	$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
	$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

	$form_id = $_REQUEST['form_id'];

	$result = mysql_query("DELETE FROM coment WHERE id = '$form_id'");
	echo "<script type='text/javascript'>alert('Комментарий удален');</script>";

	mysql_close($connection);
	echo "<script>location.replace('com_1.php');</script>";
?>