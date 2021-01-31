<?php
session_start();
include '../conecta.php'; 

$nomeUsuario = $_POST["nomeUsuario"];
$cpfUsuario = $_POST["cpfUsuario"];
$telefoneUsuario = $_POST["telefoneUsuario"];



$salvarUsuario = "INSERT INTO usuario(nomeUsuario,cpfUsuario,
telefoneUsuario,dataCadastro) VALUES
 ('$nomeUsuario','$cpfUsuario', '$telefoneUsuario' ,NOW())";

if ($conn->query($salvarUsuario) === TRUE) {
	$_SESSION['msg'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso ! </div>";
		header("Location: usuarios.php");	
    header("Location:usuarios.php");
  }

  else {
      echo $salvarUsuario;
  }



   



?>
