<html>
<head>
	<link rel="stylesheet" href="Action.css">
	<title>EDITAR AÇÃO</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$matricula = mysqli_real_escape_string($mysqli, $_POST['matricula']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// Check for empty fields
	if (empty($name) || empty($matricula) || empty($email)) {
		if (empty($name)) {
			echo "<font color='red'>ERRO: NOME INCORRETO!</font><br/>";
		}
		
		if (empty($matricula)) {
			echo "<font color='red'>ERRO: MATRICULA INCORRETA!</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>ERRO: EMAIL INCORRETO!</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `matricula` = '$matricula', `email` = '$email' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>REGISTRO EDITADO COM SUCESSO!</p>";
		echo "<a href='index.php'>VER O RESULTADO</a>";
	}
}
?>
</body>
</html>