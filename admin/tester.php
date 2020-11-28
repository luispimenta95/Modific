<?php
 function salvarEmpresa(){

    if(isset($_FILES['arquivo'])){
        $nome = $_FILES['arquivo']['name'];
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
        $novo_nome =  md5(time()) .$extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        $_UP['pasta'] = $diretorio;


      



      if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$_UP['pasta'].$novo_nome)){
  
        echo $novo_nome;


}
   
}
else {
    $foto = 'user.png';
echo $foto;



}
}

?>