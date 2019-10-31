<?
	$connection = mysql_connect("localhost","root","")or die("Ошибка соединения с сервером");
	$db = mysql_select_db("cait", $connection) or die("Ошибка при выборе базы данных");
	$login = $_REQUEST["login"];
	$parol = $_REQUEST["parol"];
	$email = $_REQUEST["email"];
	$birthday = $_REQUEST["birthday"];

	$result_login = mysql_query("SELECT login FROM users WHERE login='$login'");
	$result_row = mysql_fetch_array($result_login);

	$result_email = mysql_query("SELECT email FROM users WHERE email='$email'");
	$result_email = mysql_fetch_array($result_email);

	if (empty($result_row["login"]) && empty($result_email["email"])) {
		$query = "INSERT INTO users (id, login, parol, email, birthday) VALUES ('0', '$login', '$parol', '$email', '$birthday')";
		$result = mysql_query($query) or die("Ошибка при выполнении запроса:".mysql_error());
	}
	else{
		echo "<meta charset='utf-8'>";
		echo "<script type='text/javascript'>alert('Такой логин и/или почта существует!');</script>";
	}
	mysql_close($connection);

	echo "<script>location.replace('index.php');</script>";
?>