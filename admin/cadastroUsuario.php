<?php
include '../conecta.php'; 

$nomeUsuario = $_POST["nomeUsuario"];
$cpfUsuario = $_POST["cpfUsuario"];
$telefoneUsuario = $_POST["telefoneUsuario"];



$salvarUsuario = "INSERT INTO usuario(nomeUsuario,cpfUsuario,
telefoneUsuario,dataCadastro) VALUES
 ('$nomeUsuario','$cpfUsuario', '$telefoneUsuario' ,NOW())";

if ($conn->query($salvarUsuario) === TRUE) {

    header("Location:usuarios.php");
  }

  else {
      echo $salvarUsuario;
  }



   



?>
