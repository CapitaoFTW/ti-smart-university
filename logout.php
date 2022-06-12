<?php 

session_start();
session_unset();
session_destroy();
header("Location: index.php" );

echo<<<HTML
	<html lang="pt">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">

			<link rel="shortcut icon" href="images/ipl.ico">
			<title>Universidade Inteligente</title>
		</head>
		<body>
		</body>
	</html>

	HTML;
	//Isto tudo só para não aparecer o icon do Uniserver no separador quando clicamos para dar logout
?>