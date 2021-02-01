<?php 
session_start();
include "mensagemPadrao.php";
include '../conecta.php';
$tituloObra =$_POST['tituloObra'];
$dataInicial = $_POST["dataIni"];
$dataProvavel = $_POST["dataProv"];
$empresa = $_POST["empresa"];
$responsavel = $_POST["responsavel"];
$status = 1;

$dataBdIni = explode("/",$dataInicial);
$dataBdIni = $dataBdIni[2]."-".$dataBdIni[1]."-".$dataBdIni[0];

$dataBdProv = explode("/",$dataProvavel);
$dataBdProv = $dataBdProv[2]."-".$dataBdProv[1]."-".$dataBdProv[0];


$sqlCadastro = "INSERT INTO obra (tituloObra,dataInicial,dataProvavel,empresa,usuario,statusObra,dataCadastro) VALUES
('$tituloObra', '$dataBdIni', '$dataBdProv', '$empresa', '$responsavel','$status', NOW())";



if ($conn->query($sqlCadastro) === TRUE){
	     $_SESSION['msg'] = $mensagens["cadastro"];

    header("Location:obras.php");
}
else{
$_SESSION['msg'] = $mensagens["erroCadastro"];
}

;

?>