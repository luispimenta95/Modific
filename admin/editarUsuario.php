<?php
session_start();
include '../conecta.php'; 
$idUsuario = $_GET['id'];

$nomeUsuario = $_POST['nomeUsuario'];
  $cpfUsuario = $_POST['cpfUsuario'];
  $telefoneUsuario = $_POST['telefoneUsuario'];

if(isset($_POST['creaEngenheiro'])){
    $crea = $_POST['creaEngenheiro'];
    $sqlUpdate = "UPDATE usuario SET nomeUsuario = '$nomeUsuario', cpfUsuario = '$cpfUsuario' , telefoneUsuario = '$telefoneUsuario' ,numeroCrea = '$crea' WHERE idUsuario=$idUsuario";
    if ($conn->query($sqlUpdate) === TRUE) {

$_SESSION['msg'] = "<div class='alert alert-primary'>Alterações realizadas com sucesso ! </div>";
    header("Location:usuarios.php"); 

       }
  
    else {
        echo "Erro no sql : <br>" .$sqlUpdate . "</br>" . $conn->error;
    }
}



   



?>
