<?php 

include("../conecta.php");
$idEmpresa = $_GET["id"];
$idEngenheiro=$_POST["engenheiro"];
$dataInicial = $_POST["datIni"];
$dataFinal = $_POST["datFim"];

$dataBdIni = explode("/",$dataInicial);
$dataBdIni = $dataBdIni[2]."-".$dataBdIni[1]."-".$dataBdIni[0];

$dataBdFim = explode("/",$dataFinal);
$dataBdFim = $dataBdFim[2]."-".$dataBdFim[1]."-".$dataBdFim[0];

     $sql_code = "INSERT INTO obra (dataInicial,dataProvavel,engenheiro,empresa,dataCadastro) VALUES('$dataBdIni','$dataBdFim','$idEmpresa','$idEngenheiro',NOW())";

if ($conn->query($sql_code) === TRUE) {
  
        
    
    header("Location:home.php");

        }
    

  else{
      echo "Erro ao salvar dados " . $sql_code;
    }



