<?php 

include '../conecta.php';
$tituloObra =$_POST['tituloObra'];
$dataInicial = $_POST["dataIni"];
$dataProvavel = $_POST["dataProv"];
$empresa = $_POST["empresa"];
$responsavel = $_POST["responsavel"];


$dataBdIni = explode("/",$dataInicial);
$dataBdIni = $dataBdIni[2]."-".$dataBdIni[1]."-".$dataBdIni[0];

$dataBdProv = explode("/",$dataProvavel);
$dataBdProv = $dataBdProv[2]."-".$dataBdProv[1]."-".$dataBdProv[0];


$sqlCadastro = "INSERT INTO obra (tituloObra,dataInicial,dataProvavel,empresa,usuario,dataCadastro) VALUES
('$tituloObra', '$dataBdIni', '$dataBdProv', '$empresa', '$responsavel', NOW())";



if ($conn->query($sqlCadastro) === TRUE){
    header("Location:obras.php");
}
else{
    $conn->error;
}

;

?>