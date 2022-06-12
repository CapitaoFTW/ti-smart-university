<?php

session_start();

$pageText = "";

if (isset($_GET['opcao']))
{
    $opcao = $_GET['opcao'];

    $ficheiro = fopen("api/files/$opcao/log.txt", 'r');
    $pageText = fread($ficheiro, 999999);
}

if ( !isset($_SESSION['username']) ) 
{
    header("Location: denied.php");
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

    .container
    {
        transform: translate(0%, 100%);
        -ms-transform: translate(0%, 100%);
    }

    </style>

	<link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <div id="navbar">
            <a href="dashboard.php">🏠 Dashboard</a>
            <a style="background-color: #3498db; transform: translate(193.2%, 0%); -ms-transform: translate(193.2%, 0%);" href="historico.php">📓 Histórico</a>
            <a style="background-color: #ad0c0c; transform: translate(1340%, 0%); -ms-transform: translate(1340%, 0%);" href="logout.php">🔑 Sair</a>
        </div>

		<div class="container">
            <h1>Histórico</h1>
            <form action="historico.php" method="get" class="form">
                <div class="form-group">
                    <label for="submit"><b>Histórico para Analisar:</b></label>
                    <select class="form-control form-control-lg" name="opcao">
						<option value="" disabled selected style="color: gray">Escolha o histórico a analisar</option>
                        <option value="luminosidade">Luminosidade</option>
                        <option value="chuva">Chuva</option>
                        <option value="temperatura">Temperatura</option>
                        <option value="humidade">Humidade</option>
                        <option value="fumo">Fumo</option>
                        <option value="aspersor">Aspersor</option>
                        <option value="luz">Luz</option>
                        <option value="entrada">Entrada</option>
                        <option value="janelas">Janelas</option>
                        <option value="salas">Salas</option>
                        <option value="rega">Rega</option>             
                    </select>
					<div class='col-md-12 text-center'>
						<br/><input id="submit" type="submit" class='btn btn-success' value="Guardar Escolha">
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#<?php if (isset($_GET['opcao'])){echo "$opcao";}?>'>Ver Histórico</button>
					</div>
                </div>
            </form>
        </div>
        <div class='modal fade' <?php echo "id='$opcao'";?>>
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content" style="max-width: 400px">
                    <div class="modal-header">
                    <?php echo "<h5 class='modal-title'>Histórico de <b style='text-transform: capitalize'>$opcao</b></h5>"?>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo nl2br($pageText); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>

        var prevScrollpos = window.pageYOffset;
        window.onscroll = function()
        {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos)
            { 
                 document.getElementById("navbar").style.top = "0";

            } else {

                document.getElementById("navbar").style.top = "-50px";
            }
                prevScrollpos = currentScrollPos;
        }
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    </body>
</html>