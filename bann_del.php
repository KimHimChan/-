<?
	session_start();
	echo "<meta charset='utf-8'>";

	$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
	$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

	$ban_name = $_REQUEST["ban_name"];

	$query = mysql_query("SELECT login FROM ban WHERE login = '".mysql_escape_string($ban_name)."'");
	$result_query = mysql_fetch_array($query);

	$login_ban = $result_query['login'];

	if ($ban_name != '' && !empty($login_ban)){
		$result = mysql_query("DELETE FROM ban WHERE login = '$login_ban'");
		echo "<script type='text/javascript'>alert('Злобный пользователь вышел из бана');</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Этот пользователь уже вышел из бана, либо вы не ввели его имя');</script>";
	}

	mysql_close($connection);
	echo "<script>location.replace('manager.php');</script>";
?>