<?php 

include "../conecta.php";

$idImagem = $_GET["idImagem"];
echo $idImagem;

 $sql = "DELETE FROM imagemObra WHERE idImagem=$idImagem";

if ($conn->query($sql) === TRUE) {
 header("Location:obras.php");
} else {
  echo "Erro ao excluir registro: " . $conn->error;
}

?>
