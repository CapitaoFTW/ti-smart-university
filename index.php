<?php

session_start();

$usernames = ['Samuel António Capitão Ferraz', 'Rodrigo Filipe Capitão', 'user'];
$passwords = ['2201740', '2201741', 'user'];

if (isset($_POST['username']) && isset($_POST['password'])) 
{
    if (($_POST['password'] != $passwords[0] || $_POST['username'] != $usernames[0]) && ($_POST['password'] != $passwords[1] || $_POST['username'] != $usernames[1]) && ($_POST['password'] != $passwords[2] || $_POST['username'] != $usernames[2]))
    {
        echo <<<html

        <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Erro!</h4>
            <p>Password Incorreta, Tente Novamente!</p>
        </div>

        html;
        
    } else {
        
        $_SESSION['username'] = $_POST['username'];
        header("Location: dashboard.php");
        echo <<<html

        <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Sucesso!</h4>
            <p>Password Correta, A ser Redirecionado...</p>
        </div>

        html;
    }
}

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
    <div class="container">
        <form action="#" method="post" class="form" style="padding-top: 200px">
            <div class="form-group">
                <img src="images/estg.png" alt="Logo-ESTG">
            </div>
            <div class="form-group">
                <label for="username"><b>Username:</b></label>
                <input type="text" required class="form-control" id="username" value="" name="username" placeholder="Escreva o username">
            </div>

            <div class="form-group">
                <label for="password"><b>Password:</b></label>
                <input type="password" required class="form-control" id="password" value="" name="password" placeholder="Escreva a password">
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submeter</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>