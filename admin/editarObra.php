<?php
include("../conecta.php");
$tituloObra = $_POST['titulo'];
$dataInicial =$_POST['dataIni'];
$dataProvavel = $_POST['dataProv'];
$dataEntrega = $_POST['dataEntrega'];
$engenheiro = $_POST['engenheiro'];
$situacao = $_POST['situacao'];
$empresa = $_POST['empresa'];
$idObra = $_GET['id'];
$sql_update;

$dataBdIni = explode("/",$dataInicial);
$dataBdIni = $dataBdIni[2]."-".$dataBdIni[1]."-".$dataBdIni[0];

$dataBdProv = explode("/",$dataProvavel);
$dataBdProv = $dataBdProv[2]."-".$dataBdProv[1]."-".$dataBdProv[0];

$dataBdFim = explode("/",$dataFinal);
$dataBdFim = $dataBdFim[2]."-".$dataBdFim[1]."-".$dataBdFim[0];


if($situacao == 3){
    $sql_update = "UPDATE obra SET dataEntrega ='$dataBdFim'
    ,dataInicial ='$dataBdIni',dataProvavel ='$dataBdProv',usuario ='$engenheiro'
    ,statusObra ='$situacao' , empresa ='$empresa', entregue ='1'  where obra.idObra = $idObra";
}
else{
    $sql_update = "UPDATE obra SET dataEntrega = NULL
    ,dataInicial ='$dataBdIni',dataProvavel ='$dataBdProv',usuario ='$engenheiro'
    ,statusObra ='$situacao' , empresa ='$empresa', entregue ='0'  where obra.idObra = $idObra";
}

if ($conn->query($sql_update) === TRUE) {

    header("Location:obras.php");
  }

  else {
      echo "Erro no sql : <br>" .$sql_update;
  }
?>