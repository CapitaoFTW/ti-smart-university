<?php

session_start();

header("refresh:3;url=logout.php"); 
?>

<!DOCTYPE html>
<html lang="pt">
	<head>
        
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="images/ipl.ico">
    <title>Universidade Inteligente</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>

    body
    {
        background-image: url("images/ipl.png");
    }

    </style>

	<link rel="stylesheet" href="css/style.css">
    </head>
	<body>
		<div class="alert alert-danger" id="alert">
            <h4 class="alert-heading">Acesso Negado!</h4>
            <p>Faça Login Primeiro!</p>
        </div>
	</body>
</html>