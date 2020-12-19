<?php
$conn = new MySQLi('localhost', 'pimenta', '13151319', 'modific');
if($conn->connect_error){
   echo "Desconectado! Erro: " . $conn->connect_error;
}


?>