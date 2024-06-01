<html>
<head>
	<link rel="stylesheet" href="Formulario.css">
	<title>ADICIONAR</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
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
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} 
	else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO users (`name`, `matricula`, `email`) VALUES ('$name', '$matricula', '$email')");
		
		// Display success message
		echo "<p><font color='green'>REGISTRO ADICIONADO COM SUCESSO!</p>";
		echo "<a href='index.php'>VER O RESULTADO</a>";
	}
}
?>
</body>
</html>