<?php 
session_start();
include 'conecta.php';

$usuario = $_POST["username"];
$senha = $_POST["pass"];



$sql = "SELECT nomeAdministrador,idAdministrador FROM administrador WHERE LPAD(cpfAdministrador,11,'0') = '$usuario' and senhaAdministrador = '$senha'";    
$result=$conn->query($sql);
     $rowcount=mysqli_num_rows($result);

if ($rowcount >0) {
	$acesso = $result->fetch_assoc();
	$_SESSION['nomeAdministrador'] = $acesso["nomeAdministrador"];
	$_SESSION['idAdministrador'] = $acesso["idAdministrador"];

	$_SESSION["logado"] = true;
	$_SESSION["senha"] = $senha;


	header("Location:admin/home.php");
}
else{
 $_SESSION['msg'] = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";

 header("Location:administrativo.php");
}



?>
