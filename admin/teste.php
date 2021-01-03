
<?php include '../conecta.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Sua Página</title>

  <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body>
  
  <table id="minhaTabela">
    <thead>
      <tr>
        <th>Nome</th>
        <th></th>
        <th>Telefone</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php 

           $pesquisaObras = "SELECT idEmpresa,nomeEmpresa,cnpjEmpresa,ativa,telefoneEmpresa,logoEmpresa,nomeUsuario FROM empresa e inner join usuario u on e.usuario = u.idUsuario order by e.nomeEmpresa";
           $resultadoObras = mysqli_query($conn, $pesquisaObras);
$totalObras = mysqli_num_rows($resultadoObras);


             while($row = mysqli_fetch_assoc($resultadoObras)){ ?>


      <tr>
        <th> <?php echo $row["nomeEmpresa"] ?> </th>

<th> <?php echo $row["nomeUsuario"] ?> </th>

  <?php } ?>
        </tr>
    </tbody>
  </table>
  
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

  <script>
  $(document).ready(function(){
      $('#minhaTabela').DataTable({
          "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
  });
  </script>
  
</body>
</html>