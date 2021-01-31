<?php
session_start();
include '../conecta.php'; 
$idUsuario = $_GET['id'];
$crea = $_POST['creaEngenheiro'];


$sqlUpdate = "UPDATE usuario SET numeroCrea = '$crea', engenheiro = 1 WHERE idUsuario=$idUsuario";
if ($conn->query($sqlUpdate) === TRUE) {
  $_SESSION['msg'] = "<div class='alert alert-primary'>Alterações realizadas com sucesso ! </div>";
    header("Location: usuarios.php");  

} else{

  $conn->error;
}

   



?>
