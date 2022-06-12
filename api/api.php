<?php

include 'database.php';

function metodoPOSTDB($nome, $valor, $hora)
{
    if (isset($_POST['estado']))
    {
        $estado = $_POST['estado'];
    }

    if ($nome == "luminosidade" || $nome == "chuva" || $nome == "humidade" || $nome == "fumo")
    {
        $log = $valor ."%, a ". $hora;
    }

    if ($nome == "temperatura")
    {
        $log = $valor ." ºC, a ". $hora;
    }

    if ($nome == "aspersor" || $nome == "ac" || $nome == "incendio" || $nome == "alarme")
    {
        if ($valor==1)
        {
            $log = "Inativo, a ". $hora;

        } else {

            $log = "Ativo, a ". $hora;
        }
    }

    if ($nome == "entrada")
    {
        if ($estado == 1)
        {
            $log = "Bloqueada, a ". $hora;
        
        } else {

            if ($valor == 1)
            {
                $log = "Aberta, a ". $hora;

            } else {

                $log = "Fechada, a ". $hora;
            }
        }
    }

    if ($nome == "salas" || $nome == "janelas")
    {
        if ($nome == "salas" && $estado == 1)
        {
            $log = "Bloqueadas, a ". $hora;

        } else {

            if ($valor == 1)
            {
                $log = "Abertas, a ". $hora;
        
            } else {

                $log = "Fechadas, a ". $hora;
            }
        }
    }

    if ($nome == "rega" || $nome == "luz")
    {
        if ($valor == 1)
        {
            $log = "Ligada, a ". $hora;
        
        } else {

            $log = "Desligada, a ". $hora;
        }
    }

    if ($nome != "entrada" || $nome != "salas")
    {
        $sql = "INSERT INTO $nome (valor, hora, log) VALUES ('$valor','$hora', '$log');";

        mysqli_query(mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME), $sql);
    
    } else {

        $sql = "INSERT INTO $nome (valor, estado, hora, log) VALUES ('$valor', '$estado', '$hora', '$log');";

        mysqli_query(mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME), $sql);
    }
}

function metodoPOST($diretorio)
{
    if (isset($_POST['estado']))
    {
        file_put_contents("$diretorio/estado.txt", $_POST['estado']);
    }

    file_put_contents("$diretorio/hora.txt", $_POST['hora']);
    file_put_contents("$diretorio/valor.txt", $_POST['valor']);
    $ficheiro = file_get_contents("$diretorio/log.txt");

    return $ficheiro;
}

function metodoGET($diretorio)
{
	$valor = file_get_contents("$diretorio/valor.txt");
    echo $valor;
}

header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    echo "Recebido um POST!\n";

    print_r($_POST);

    if (isset($_POST['nome']) && isset($_POST['valor']) && isset($_POST['hora'])) 
    {
        $nome = $_POST['nome'];

        if (isset($_POST['estado']))
        $estado = $_POST['estado'];

        metodoPOSTDB($_POST['nome'], $_POST['valor'], $_POST['hora']);

        $diretorio = "files/$nome";
        $ficheiro = metodoPOST($diretorio);

        switch ($nome)
        {
            case "luminosidade":

                file_put_contents("$diretorio/log.txt", $_POST['valor'] ."%, a ". $_POST['hora'] ."\n". $ficheiro);
                
            break;

            case "chuva":
                
                if ($_POST['valor']==0)
                {
                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Nenhuma, a ". $_POST['hora'] ."\n". $ficheiro);

                } else {

                    file_put_contents("$diretorio/log.txt", $_POST['valor'] ."%, a ". $_POST['hora'] ."\n". $ficheiro);
                }

            break;

            case "aspersor":

                if ($_POST['valor']==1)
                {
                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Ligado, a ". $_POST['hora'] ."\n". $ficheiro);

                } else {

                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Desligado, a ". $_POST['hora'] ."\n". $ficheiro);
                }

            break;

            case "luz":
                
                if ($_POST['valor']==1)
                {
                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Ligada, a ". $_POST['hora'] ."\n". $ficheiro);

                } else {

                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Desligada, a ". $_POST['hora'] ."\n". $ficheiro);
                }

            break; 

            case "temperatura":

                file_put_contents("$diretorio/log.txt", $_POST['valor'] ."ºC, a ". $_POST['hora'] ."\n". $ficheiro);

                break;

            case "humidade":

                file_put_contents("$diretorio/log.txt", $_POST['valor'] ."%, a ". $_POST['hora'] ."\n". $ficheiro);

            break;
            
            case "entrada":

                if ($estado==1)
                {
                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Bloqueada a ". $_POST['hora'] ."\n". $ficheiro);     
                
                } else {

                    if ($_POST['valor']==1)
                    {
                        $ficheiro = file_get_contents("$diretorio/log.txt");
                        file_put_contents("$diretorio/log.txt", "Aberta a ". $_POST['hora'] ."\n". $ficheiro);

                    } else {

                        $ficheiro = file_get_contents("$diretorio/log.txt");
                        file_put_contents("$diretorio/log.txt", "Fechada a ". $_POST['hora'] ."\n". $ficheiro);
                    }
                }

            break;

            case "janelas":

                if ($_POST['valor']==1)
                {
                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Abertas a ". $_POST['hora'] ."\n". $ficheiro);

                } else {

                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Fechadas a ". $_POST['hora'] ."\n". $ficheiro);
                }
                
            break;

            case "fumo":

                file_put_contents("$diretorio/log.txt", $_POST['valor'] ."%, a ". $_POST['hora'] ."\n". $ficheiro);
                
            break;

            case "salas":

                if ($estado==1)
                {
                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Bloqueadas a ". $_POST['hora'] ."\n". $ficheiro);     
                
                } else {

                    if ($_POST['valor']==1)
                    {
                        $ficheiro = file_get_contents("$diretorio/log.txt");
                        file_put_contents("$diretorio/log.txt", "Abertas a ". $_POST['hora'] ."\n". $ficheiro);

                    } else {

                        $ficheiro = file_get_contents("$diretorio/log.txt");
                        file_put_contents("$diretorio/log.txt", "Fechadas a ". $_POST['hora'] ."\n". $ficheiro);
                    }
                }

            break;

            case "rega":

                if ($_POST['valor']==1)
                {
                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Ativa a ". $_POST['hora'] ."\n". $ficheiro);

                } else {

                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Inativa a ". $_POST['hora'] ."\n". $ficheiro);
                }

            break;

            case "ac":

                if ($_POST['valor']==1)
                {
                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Ligado a ". $_POST['hora'] ."\n". $ficheiro);

                } else {

                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Desligado a ". $_POST['hora'] ."\n". $ficheiro);
                }

            break;

            case "incendio":

                if ($_POST['valor']==1)
                {
                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Ativo a ". $_POST['hora'] ."\n". $ficheiro);

                } else {

                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Inativo a ". $_POST['hora'] ."\n". $ficheiro);
                }

            break;

            case "alarme":

                if ($_POST['valor']==1)
                {
                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Ativo a ". $_POST['hora'] ."\n". $ficheiro);

                } else {

                    $ficheiro = file_get_contents("$diretorio/log.txt");
                    file_put_contents("$diretorio/log.txt", "Inativo a ". $_POST['hora'] ."\n". $ficheiro);
                }

            break;

            default:
            http_response_code(403);

            break;
        }

    } else {
        
        http_response_code(400);
        echo "Método POST com Argumentos em Falta!";
    }

} else {
	
	if ($_SERVER['REQUEST_METHOD'] == "GET") 
	{
    	if (isset($_GET['nome']))
    	{
            $nome=$_GET['nome'];

            /*if(strcmp($nome,"luminosidade")!=0 || $nome,"chuva")!=0 || strcmp($nome,"luz")!=0 || strcmp($nome,"temperatura")!=0 || strcmp($nome,"humidade")!=0 || strcmp($nome,"entrada")!=0 || strcmp($nome,"janelas")!=0 || strcmp($nome,"fumo")!=0 || strcmp($nome,"salas")!=0 || strcmp($nome,"rega")!=0)
            {
                http_response_code(403);
                echo "Nome não Permitido!";

            } else {*/

                $diretorio = "files/$nome";

                metodoGET($diretorio);
            //}

		} else {

            http_response_code(400);
    		echo "Método GET com Argumentos em Falta";
    	}

	} else {
    
		http_response_code(403);
		echo "Método Não Permitido!";
	}
}
?>