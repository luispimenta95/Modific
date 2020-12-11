<?php
  include '../conecta.php';


$idObra = $_GET['id'];

$diretorio = "UP/";

if(!is_dir($diretorio)){ 
  echo "Pasta $diretorio nao existe";
}

else{
 $arquivo = $_FILES['arquivo'];
  for ($controle = 0; $controle < count($arquivo['name']); $controle++){
    
         $extensao = strtolower(substr($arquivo['name'][$controle], -4)); //pega a extensao do arquivo
            $novo_nome= "projeto_".md5(time()+$controle).$extensao;
            $destino = $diretorio."/".$novo_nome[$controle];
                    $_UP['pasta'] = 'UP/';


      if(move_uploaded_file($_FILES['arquivo']['tmp_name'][$controle],$_UP['pasta'].$novo_nome)){
     $sql_code = "INSERT INTO imagemObra (imagem,obra,dataCadastro) VALUES('$novo_nome','$idObra',NOW())";
      
    }

if ($conn->query($sql_code) === TRUE) {
          header("Location:obras.php");

        }

        


  else{
echo $sql_code;

}



    }



}