<?php
    /*include("../conecta.php");
    $idObra = $_GET["id"];
    $dataEntrega = $_POST['dataEntrega'];

    $dataBdEntrega = explode("/",$dataEntrega);
    $dataBdEntrega = $dataBdEntrega[2]."-".$dataBdEntrega[1]."-".$dataBdEntrega[0];
    $statusObra =3;
    $sqlEntrega = "UPDATE obra SET dataEntrega = '$dataBdEntrega' , 
    statusObra = '$statusObra',entregue ='1' WHERE idObra= '$idObra'";
    if ($conn->query($sqlEntrega) === TRUE) {

        $_SESSION['mensagemCad'] = "<div class='alert alert-success'>Dados registrados com sucesso !</div>";

        header("Location:obras.php");
    }*/
    $msg_pesquisa = "teste";

    header("Location:obras.php");


    ?>