<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
$data=$_POST["data_cp"];
$nome=$_POST["nome"];

$sql1='SELECT * FROM funcionario ';
$res = $conn->query($sql1);
$row = $res->fetch_object();
while($row = $res->fetch_object()){
 
  if($row->id_funcionario==$nome){
    $nome_func=$row->nome." ".$row->sobrenome;
  }
}

$sql="SELECT * FROM dia WHERE data LIKE '%$data%' and id_func LIKE '$nome'";
  $res = $conn->query($sql);
  $qtd = $res ->num_rows;
  //print $qtd;
  if($qtd > 0){
    print "<table class='table table-hover table-striped table-bordered'>";
    print "<thead>";
    print "<tr>";
    print "<th>Data</th>";
    print "<th>Inicio Turno</th>";
    print "<th>inicio intervalo</th>";
    print "<th>Fim intervalo</th>";
    print "<th>Fim turno</th>";
    print "<th>Nome</th>";
    print "<th>Empresa</th>";
    print "<th>Observação</th>";
    print "<th></th>";
    print "</tr>";
    print "</thead>";
    while($row = $res->fetch_object()){
      print "<tbody>";
      print "<tr>";

      //print "<td>".$row->data."</td>";
      $dia=date('d/m/Y',strtotime($row->data));
      print "<td>".$dia."</td>";
      if($row->ini=="00:00"){
        print "<td>"."FOLGA"."</td>";
      }else{
        print "<td>".$inii=date('H:i',strtotime($row->ini))."</td>";}
        print "<td>".$inii=date('H:i',strtotime($row->inicio_intervalo))."</td>";
        print "<td>".$inii=date('H:i',strtotime($row->final_intervalo))."</td>";
        print "<td>".$inii=date('H:i',strtotime($row->fim))."</td>"; 
       print "<td>".$nome_func."</td>";
        $id_emp=$row->id_emp;         
     $sql1='SELECT * FROM empresa ';
            $res1 = $conn->query($sql1);
            $row1 = $res1->fetch_object();
            while($row1 = $res1->fetch_object()){
              if($row1->id_empresa==$id_emp){
                $nome_empresa=$row1->nome_empresa;
              }
            }          
       print "<td>".$nome_empresa."</td>";  
       $id_obs=$row->id_obs;
       $sql1='SELECT * FROM observacao ';
       $res1 = $conn->query($sql1);
       $row1 = $res1->fetch_object();
       while($row1 = $res1->fetch_object()){
         if($row1->id==$id_obs){
           $tipo=$row1->tipo;
         }
       }   
       print "<td>".$tipo."</td>";        
      print "<td>
            
            <button onclick=\"location.href='?page=editarcp&id_dia=".$row->id_dia."';\" class = 'btn btn-success'>Editar</button>
          </td>";
      print "</tr>";
      print "</tbody>";
    }  
    print "</table>";
  }else{
    print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
  }



  print $data;
  
  echo $nome;
  ?>
</body>
</html>