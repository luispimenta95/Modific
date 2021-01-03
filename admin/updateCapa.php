<?php 
include '../conecta.php';

$idImagem = $_GET["id"];
$idObra = $_GET["idObra"];
  $sql_inicial = "UPDATE imagemObra ie  set capa = 0 WHERE ie.obra=$idObra";

if ($conn->query($sql_inicial) === TRUE) {

  $sql_final = "UPDATE imagemObra ie  set capa = 1 WHERE ie.idImagem=$idImagem";


  if ($conn->query($sql_final) === TRUE) {

 header("Location:obras.php");
} else {
  echo "Erro ao atualizar: " . $conn->error;
}
}


?>