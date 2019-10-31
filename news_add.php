<?
	session_start();
	echo "<meta charset='utf-8'>";

	$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
	$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

	$zagolovok = $_REQUEST['text_zagol'];
	$image_way = $_REQUEST['image'];
	$texts = $_REQUEST['big_text'];

	$query = mysql_query("INSERT INTO news (id, zagolovok, image_way, texts) VALUES ('0', '$zagolovok', '$image_way', '$texts')");

	mysql_close($connection);
	echo "<script>location.replace('news.php');</script>";
?>