<?php
$conn = new MySQLi('localhost', 'root', '', 'modific');
if($conn->connect_error){
   echo "Desconectado! Erro: " . $conn->connect_error;
}


?>