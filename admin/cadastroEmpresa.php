<?php
include '../conecta.php'; 

$nomeEmpresa;
$cnpjEmpresa;
$telefoneEmpresa;
$responsavelEmpresa;

$logoEmpresa;

      if(isset($_FILES['arquivo'])){
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

$salvarEmpresa = "INSERT INTO empresa(nomeEmpresa,cnpjEmpresa,
telefoneEmpresa,usuario,logoEmpresa,
dataCadastro) VALUES ('$nomeEmpresa','$cnpjEmpresa', '$telefoneEmpresa', 
'$responsavelEmpresa','$logoEmpresa',NOW())";

if ($conn->query($salvarEmpresa) === TRUE) {

    header("Location:teste.php");
  }

  else {
      echo $salvarEmpresa;
  }


}
   
}
else {
    $foto = 'user.png';

            echo $foto;      
}




?>