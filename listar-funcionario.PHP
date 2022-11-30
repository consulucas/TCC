<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  


<h1>Listar Funcionarios</h1>
<?php
  $sql = "SELECT * FROM funcionario AS A INNER JOIN cargo AS B ON A.id_cargo_funcionario = B.id_cargo
  ORDER BY nome";
  $res = $conn->query($sql);
  $qtd = $res ->num_rows;

  if($qtd > 0){
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<thead>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>Sobrenome</th>";
    print "<th>Data de Admissão</th>";
    print "<th>Cargo</th>";
    print "<th>Desativado</th>";
    print "<th>Ações</th>";
    print "</tr>";
    print "</thead>";
  while($row = $res->fetch_object()){
    print "<tbody>";
    print "<tr>";
    print "<td>".$row->id_funcionario."</td>";
    print "<td>".$row->nome."</td>";
    print "<td>".$row->sobrenome."</td>";
    print "<td>".$row->data_inicio."</td>";
    print "<td>".$row->nome_cargo."</td>";
    print "<td>".$row->desativado."</td>";
    print "<td>
          
          <button onclick=\"location.href='?page=editar&id_funcionario=".$row->id_funcionario."';\" class = 'btn btn-success'>Editar</button>
        </td>";
    print "</tr>";
    print "</tbody>";
  }  
  print "</table>";
  }else{
    print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
  }

?>

</body>
</html>
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
      crossorigin="anonymous"
    ></script>
   </body>
</html>