<?
	session_start();
	echo "<meta charset='utf-8'>";

	$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
	$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");
	$login = $_REQUEST["login"];
	$parol = $_REQUEST["parol"];

	$result = mysql_query("SELECT * FROM users WHERE login='$login'") or die("Ошибка при выполнении запроса:".mysql_error());
;
	$result_array = mysql_fetch_array($result);
	if (!empty($result_array["login"]) && !empty($result_array["parol"]) && $login == $result_array["login"] && $parol == $result_array["parol"]) {
		$_SESSION["login"] = $result_array["login"];
		$_SESSION["parol"] = $result_array["parol"];
		$_SESSION["id"] = $result_array["id"];
		$_SESSION["email"] = $result_array["email"];
		$_SESSION["dates"] = $result_array["birthday"];

		mysql_close($connection);
	}
	else{
		echo "<script type='text/javascript'>alert('Не введен (не правильно введен) логин и/или пароль!');</script>";
	}
	echo '<script>location.replace("index.php");</script>';
?>