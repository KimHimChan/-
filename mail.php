<?
	session_start();

	$email = $_SESSION["email"];
	$messagess = $_REQUEST["messagess"];
	mail("nossizz@mail.ru", "Экотуризм по курганской области ('$email')", "$messagess");

	echo '<script>location.replace("myself_room.php");</script>';
?>