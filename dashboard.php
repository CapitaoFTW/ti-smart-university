<?php

include 'api/database.php';

$valor_luminosidade = file_get_contents("api/files/luminosidade/valor.txt");
$hora_luminosidade = file_get_contents("api/files/luminosidade/hora.txt");
$estado_paineis = file_get_contents("api/files/luminosidade/estado.txt");

$valor_chuva = file_get_contents("api/files/chuva/valor.txt");
$hora_chuva = file_get_contents("api/files/chuva/hora.txt");
$estado_chuva = file_get_contents("api/files/chuva/estado.txt");

$valor_luz = file_get_contents("api/files/luz/valor.txt");
$hora_luz = file_get_contents("api/files/luz/hora.txt");
$estado_energia = file_get_contents("api/files/luz/estado.txt");

$valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
$hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
$estado_monitorTemperatura = file_get_contents("api/files/temperatura/estado.txt");

$valor_humidade = file_get_contents("api/files/humidade/valor.txt");
$hora_humidade = file_get_contents("api/files/humidade/hora.txt");
$estado_monitorHumidade = file_get_contents("api/files/humidade/estado.txt");

$valor_entrada = file_get_contents("api/files/entrada/valor.txt");
$hora_entrada = file_get_contents("api/files/entrada/hora.txt");
$estado_entrada = file_get_contents("api/files/entrada/estado.txt");

$valor_janelas = file_get_contents("api/files/janelas/valor.txt");
$hora_janelas = file_get_contents("api/files/janelas/hora.txt");
$estado_janelas = file_get_contents("api/files/janelas/estado.txt");

$valor_fumo = file_get_contents("api/files/fumo/valor.txt");
$hora_fumo = file_get_contents("api/files/fumo/hora.txt");
$estado_fumo = file_get_contents("api/files/fumo/estado.txt");

$valor_salas = file_get_contents("api/files/salas/valor.txt");
$hora_salas = file_get_contents("api/files/salas/hora.txt");
$estado_salas = file_get_contents("api/files/salas/estado.txt");

$valor_rega = file_get_contents("api/files/rega/valor.txt");
$hora_rega = file_get_contents("api/files/rega/hora.txt");
$estado_rega = file_get_contents("api/files/rega/estado.txt");

$valor_aspersor = file_get_contents("api/files/aspersor/valor.txt");
$hora_aspersor = file_get_contents("api/files/aspersor/hora.txt");
$estado_aspersor = file_get_contents("api/files/aspersor/estado.txt");

$valor_ac = file_get_contents("api/files/ac/valor.txt");
$hora_ac = file_get_contents("api/files/ac/hora.txt");
$estado_ac = file_get_contents("api/files/ac/estado.txt");

$valor_incendio = file_get_contents("api/files/incendio/valor.txt");
$hora_incendio = file_get_contents("api/files/incendio/hora.txt");
$estado_incendio = file_get_contents("api/files/incendio/estado.txt");

$valor_alarme = file_get_contents("api/files/alarme/valor.txt");
$hora_alarme = file_get_contents("api/files/alarme/hora.txt");
$estado_alarme = file_get_contents("api/files/alarme/estado.txt");

$owner=0;
$admin=0;
$user=0;

session_start();

if ( !isset($_SESSION['username']) ) 
{
    header("Location: denied.php");

} else {

    if ($_SESSION['username']=='Samuel António Capitão Ferraz')
    {
        $owner=1;
        $admin=1;
        $user=1;
    
    } else if($_SESSION['username']=='Rodrigo Filipe Capitão') {

        $admin=1;
        $user=1;
    
    } else {

        $user=1;
    }
}

if (isset($_POST['aspersor']) && $valor_aspersor == 1)
{
    file_put_contents("api/files/aspersor/valor.txt", 0);
    
    } else {

    if (isset($_POST['aspersor']) && $valor_aspersor == 0)
    {
        file_put_contents("api/files/aspersor/valor.txt", 1);
    }
}

if (isset($_POST['entrada']) && $valor_entrada == 1 && $estado_entrada != 1)
{
    file_put_contents("api/files/entrada/valor.txt", 0);
    
    } else {

    if (isset($_POST['entrada']) && $valor_entrada == 0 && $estado_entrada != 1)
    {
        file_put_contents("api/files/entrada/valor.txt", 1);
    }
}

if (isset($_POST['salas']) && $valor_salas == 1 && $estado_salas != 1)
{
    file_put_contents("api/files/salas/valor.txt", 0);
    
    } else {

    if (isset($_POST['salas']) && $valor_salas == 0 && $estado_salas != 1)
    {
        file_put_contents("api/files/salas/valor.txt", 1);
    }
}

if (isset($_POST['janelas']) && $valor_janelas == 1)
{
    file_put_contents("api/files/janelas/valor.txt", 0);
    
    } else {

    if (isset($_POST['janelas']) && $valor_janelas == 0)
    {
        file_put_contents("api/files/janelas/valor.txt", 1);
    }
}

if (isset($_POST['rega']) && $valor_rega == 1)
{
    file_put_contents("api/files/rega/valor.txt", 0);
    
    } else {

    if (isset($_POST['rega']) && $valor_rega == 0)
    {
        file_put_contents("api/files/rega/valor.txt", 1);
    }
}

if (isset($_POST['luz']) && $valor_luz == 1)
{
    file_put_contents("api/files/luz/valor.txt", 0);
    
    } else {

    if (isset($_POST['luz']) && $valor_luz == 0)
    {
        file_put_contents("api/files/luz/valor.txt", 1);
    }
}

if (isset($_POST['ac']) && $valor_ac == 1)
{
    file_put_contents("api/files/ac/valor.txt", 0);
    
    } else {

    if (isset($_POST['ac']) && $valor_ac == 0)
    {
        file_put_contents("api/files/ac/valor.txt", 1);
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">

    <link rel="shortcut icon" href="images/ipl.ico">
    <title>Universidade Inteligente</title>
    <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
    <script>
        jQuery(window).load(function($){
            atualizaRelogio();
        });

        $(document).ready(function()
            {
                $("div_refresh").load("dashboard.php");
                setInterval(function()
                {
                    $("div_refresh").load("dashboard.php");

                }, 1000);

            });
    </script>

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
        <div id="div_refresh">
        <div id="navbar">
            <a style="background-color: #3498db" href="dashboard.php">🏠 Dashboard</a>
            <a style="transform: translate(193.2%, 0%); -ms-transform: translate(193.2%, 0%)" href="historico.php">📓 Histórico</a>
            <?php ?>
            <a style="background-color: #ad0c0c; transform: translate(1340%, 0%); -ms-transform: translate(1340%, 0%)" href="logout.php">🔑 Sair</a>
        </div><br /><br /><br /><br /><br />
        <h1>Universidade Inteligente<br />
            <output id="data"></output>&nbsp;
            <output id="hora"></output></h1>
        <br /><br />
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <img src="images/luminosidade.jpg" class="card-img" alt="luminosidade">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Luminosidade</h2>
                        <p class="card-text"><span class="badge badge-pill badge-success"><?php echo $valor_luminosidade?>%</span></p>
                        <div class="Overlay">
                            <div class="txt"><br />Atualização:<br /><?php echo "<p>$hora_luminosidade</p>"?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="images/chuva.jpg" class="card-img" alt="chuva">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Chuva</h2>
                        <p class="card-text"><span class="badge badge-pill badge-success"><?php if($valor_chuva==0){echo "Nenhuma";}else{echo $valor_chuva;echo " cm";}?></span></p>
                        <div class="Overlay">
                            <div class="txt"><br />Atualização:<br /><?php echo "<p>$hora_chuva</p>"?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="images/temperatura.jpg" class="card-img" alt="temperatura">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Temperatura</h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_temperatura>35 || $valor_temperatura<5){echo "danger";}elseif($valor_temperatura>=30 || $valor_temperatura<=10){echo "warning";}else{echo "success";}?>"><?php echo $valor_temperatura?>ºC</span></p>
                        <div class="Overlay">
                            <div class="txt"><br />Atualização:<br /><?php echo "<p>$hora_temperatura</p>"?></div>
                        </div>
                    </div>
                </div>
            </div><br /><br />
            <div class="row">
                <div class="col-sm-4">
                    <img src="images/humidade.jpg" class="card-img" alt="humidade">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Humidade</h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_humidade>=60){echo "danger";}elseif($valor_humidade>50){echo "warning";}else{echo "success";}?>"><?php echo $valor_humidade?>%</span></p>
                        <div class="Overlay">
                            <div class="txt"><br />Atualização:<br /><?php echo "<p>$hora_humidade</p>"?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="images/detetor_fumo.jpg" class="card-img" alt="fumo">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title"><b>Fumo</b></h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_fumo>=1){echo "danger";}elseif($valor_fumo>=0.5){echo "warning";}else{echo "success";}?>"><?php echo $valor_fumo?>%</span></p>
                        <div class="Overlay">
                            <div class="txt"><br />Atualização:<br /><?php echo "<p>$hora_fumo</p>"?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="images/aspersor.jpg" class="card-img" alt="aspersor">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Aspersor</h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_aspersor==1){echo 'success">Ligado';}else{echo 'danger">Desligado';}?></span></p>
                        <div class="Overlay">
                            <div class="txt"><?php if ($owner!=0){ if($valor_aspersor==0){echo '<form action="#" method="post"><input name="aspersor" type="submit" class="btn btn-success" value="Abrir Aspersor"><br /></form>';}else{echo'<form action="#" method="post"><input name="aspersor" type="submit" class="btn btn-danger" value="Fechar Aspersor"><br /></form>';}}?>Atualização:<br /><?php echo "<p>$hora_aspersor</p>"?></div>
                        </div>
                    </div>
                </div>
            </div><br /><br />
            <div class="row">
            	<div class="col-sm-4">
                    <img src="images/entrada.png" class="card-img" alt="entrada">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Entrada</h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_entrada==1){echo 'success">Aberta';}else{echo 'danger">Fechada';}?></span></p>
                        <div class="Overlay">
                            <div class="txt"><?php if ($owner!=0 && $estado_entrada!=1){ if($valor_entrada==0){echo '<form action="#" method="post"><input name="entrada" type="submit" class="btn btn-success" value="Abrir Entrada"><br /></form>';}else{echo'<form action="#" method="post"><input name="entrada" type="submit" class="btn btn-danger" value="Fechar Entrada"><br /></form>';}}?>Atualização:<br /><?php echo "<p>$hora_entrada</p>"?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="images/salas.jpg" class="card-img" alt="salas">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Salas</h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_salas==1){echo 'success">Abertas';}else{echo 'danger">Fechadas';}?></span></p>
                        <div class="Overlay">
                            <div class="txt"><?php if ($admin!=0 && $estado_salas!=1){ if($valor_salas==0){echo '<form action="#" method="post"><input name="salas" type="submit" class="btn btn-success" value="Abrir Salas"><br /></form>';}else{echo'<form action="#" method="post"><input name="salas" type="submit" class="btn btn-danger" value="Fechar Salas"><br /></form>';}}?>Atualização:<br /><?php echo "<p>$hora_salas</p>"?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="images/janelas.png" class="card-img" alt="janelas">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Janelas</h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_janelas==1){echo 'success">Abertas';}else{echo 'danger">Fechadas';}?></span></p>
                        <div class="Overlay">
                            <div class="txt"><?php if($admin!=0 && $estado_salas!=1){ if($valor_janelas==0){echo '<form action="#" method="post"><input name="janelas" type="submit" class="btn btn-success" value="Abrir Janelas"><br /></form>';}else{echo'<form action="#" method="post"><input name="janelas" type="submit" class="btn btn-danger" value="Fechar Janelas"><br /></form>';}}?>Atualização:<br /><?php echo "<p>$hora_janelas</p>"?></div>
                        </div>
                    </div>
                </div>
                </div><br /><br />
            <div class="row">
                <div class="col-sm-4">
                    <img src="images/rega.jpg" class="card-img" alt="rega">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Rega</h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_rega==1){echo 'success">Ativa';}else{echo 'danger">Inativa';}?></span></p>
                        <div class="Overlay">
                            <div class="txt"><?php if($admin!=0){ if($valor_rega==0){echo '<form action="#" method="post"><input name="rega" type="submit" class="btn btn-success" value="Ligar Rega"><br /></form>';}else{echo'<form action="#" method="post"><input name="rega" type="submit" class="btn btn-danger" value="Desligar Rega"><br /></form>';}}?>Atualização:<br /><?php echo "<p>$hora_rega</p>"?>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-sm-4">
                    <img src="images/luz.png" class="card-img" alt="luz">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title"><b>Luz</b></h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_luz==1){echo 'success">Ligada';}else{echo 'danger">Desligada';}?></span></p>
                        <div class="Overlay">
                            <div class="txt"><?php if($user!=0){ if($valor_luz==0){echo '<form action="#" method="post"><input name="luz" type="submit" class="btn btn-success" value="Ligar Luz"><br /></form>';}else{echo'<form action="#" method="post"><input name="luz" type="submit" class="btn btn-danger" value="Desligar Luz"><br /></form>';}}?>Atualização:<br /><?php echo "<p>$hora_luz</p>"?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="images/ac.png" class="card-img" alt="ac">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">AC</h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_ac==1){echo 'success">Ligado';}else{echo 'danger">Desligado';}?></span></p>
                        <div class="Overlay">
                            <div class="txt"><?php if($admin!=0){ if($valor_ac==0){echo '<form action="#" method="post"><input name="ac" type="submit" class="btn btn-success" value="Ligar AC"><br /></form>';}else{echo'<form action="#" method="post"><input name="ac" type="submit" class="btn btn-danger" value="Desligar AC"><br /></form>';}}?>Atualização:<br /><?php echo "<p>$hora_ac</p>"?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br /><br />
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="col-sm-4">
                    <img src="images/alarme_incendio.jpg" class="card-img" alt="incendio">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Incêndio</h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_incendio==1){echo 'danger">Ativo';}else{echo 'success">Inativo';}?></span></p>
                        <div class="Overlay">
                            <div class="txt"><br />Atualização:<br /><?php echo "<p>$hora_incendio</p>"?></div>
                        </div>
                    </div> 
                </div>
                <div class="col-sm-4">
                    <img src="images/alarme.png" class="card-img" alt="alarme">
                    <div class="card-img-overlay">
                        <br /><h2 class="card-title">Alarme</h2>
                        <p class="card-text"><span class="badge badge-pill badge-<?php if ($valor_alarme==1){echo 'danger">Ativo';}else{echo 'success">Inativo';}?></span></p>
                        <div class="Overlay">
                            <div class="txt"><br />Atualização:<br /><?php echo "<p>$hora_alarme</p>"?></div>
                        </div>
                    </div> 
                </div>    
            </div><br /><br /><br /><br />
        </div></div>
        <script>
            function atualizaRelogio()
            { 
                var momentoAtual = new Date();
            
                var vhora = momentoAtual.getHours();
				vhora--;
                var vminuto = momentoAtual.getMinutes();
                var vsegundo = momentoAtual.getSeconds();
            
                var vdia = momentoAtual.getDate();
                var vmes = momentoAtual.getMonth() + 1;
                var vano = momentoAtual.getFullYear();
            
                if (vdia < 10){ vdia = "0" + vdia;}
                if (vmes < 10){ vmes = "0" + vmes;}
                if (vhora < 10){ vhora = "0" + vhora;}
                if (vminuto < 10){ vminuto = "0" + vminuto;}
                if (vsegundo < 10){ vsegundo = "0" + vsegundo;}

                dataFormat = vdia + " / " + vmes + " / " + vano;
                horaFormat = vhora + " : " + vminuto + " : " + vsegundo;

                document.getElementById("data").innerHTML = dataFormat;
                document.getElementById("hora").innerHTML = horaFormat;

                setTimeout("atualizaRelogio()",1000);
            }
                
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

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    </body>
</html>