<?php
session_start();
include '../conecta.php'; 
include 'mensagemPadrao.php'; 

$idEmpresa = $_GET['id'];
$nomeEmpresa;
$cnpjEmpresa;
$telefoneEmpresa;
$responsavelEmpresa;
$situacaoEmpresa;
$logoEmpresa;

$nome = $_FILES['arquivo']['name'];
$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
$novo_nome =  md5(time()) .$extensao; //define o nome do arquivo
$diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
$_UP['pasta'] = 'UP/';

      
      if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$_UP['pasta'].$novo_nome)){
  
$nomeEmpresa = $_POST['nomeEmpresa'];
$telefoneEmpresa = $_POST['telefoneEmpresa'];
$cnpjEmpresa = $_POST['cnpjEmpresa'];
$responsavelEmpresa = $_POST['responsavel'];
$logoEmpresa = $novo_nome;
$situacaoEmpresa = $_POST['situacao'];

$sqlUpdate = "UPDATE empresa SET nomeEmpresa = '$nomeEmpresa', cnpjEmpresa = '$cnpjEmpresa' , telefoneEmpresa = '$telefoneEmpresa' ,logoEmpresa = '$logoEmpresa', ativa = $situacaoEmpresa, usuario = $responsavelEmpresa  WHERE idEmpresa=$idEmpresa";
if ($conn->query($sqlUpdate) === TRUE) {
        $_SESSION['msg'] = $mensagens["cadastro"];

    header("Location:empresas.php");
  }

  else         $_SESSION['msg'] = $mensagens["erroCadastro"];


}

   
else {
$nomeEmpresa = $_POST['nomeEmpresa'];
$telefoneEmpresa = $_POST['telefoneEmpresa'];
$cnpjEmpresa = $_POST['cnpjEmpresa'];
$responsavelEmpresa = $_POST['responsavel'];
$situacaoEmpresa = $_POST['situacao'];

$sqlUpdate = "UPDATE empresa SET nomeEmpresa = '$nomeEmpresa', cnpjEmpresa = '$cnpjEmpresa' , telefoneEmpresa = '$telefoneEmpresa' , ativa = $situacaoEmpresa, usuario = $responsavelEmpresa  WHERE idEmpresa=$idEmpresa";


if ($conn->query($sqlUpdate) === TRUE) {
        $_SESSION['msg'] = $mensagens["cadastro"];

    header("Location:empresas.php");
  }

  else         $_SESSION['msg'] = $mensagens["erroCadastro"];



}




?>
