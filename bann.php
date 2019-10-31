<?
	session_start();
	echo "<meta charset='utf-8'>";

	$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
	$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");

	$d_name = $_REQUEST["d_name"];

	$query = mysql_query("SELECT login FROM ban WHERE login = '".mysql_escape_string($d_name)."'");
	$result_query = mysql_fetch_array($query);

	if ($d_name != '' && empty($result_query['login'])) {

		$mail = mysql_query("SELECT email FROM users WHERE login = '".mysql_escape_string($d_name)."'");
		$f = mysql_fetch_array($mail);

		$result_into = mysql_query("INSERT INTO ban (id, login, email) VALUES ('0', '".mysql_escape_string($d_name)."', '$f[email]')");

		echo "<script type='text/javascript'>alert('Злобный пользователь забанин');</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Этот пользователь уже забанин, либо вы не ввели его имя');</script>";
	}

	mysql_close($connection);
	echo "<script>location.replace('manager.php');</script>";
?>