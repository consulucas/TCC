<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
        <title>Celke - Dias da semana</title>
    </head>
    <body>
   
    <form action="?page=imprimicp" method ="POST">
    
      <style>
        .flex{
          display:flex;
          justify-content:space-between;
        }
        .meio{
          margin:20px;
        width:50%;
              }
        .right{
          float:right;
        }
     
        
      </style>
      <div align= center>
    <h1><pre>E S C A L A   D E   S E R V I Ç O </pre></h1><hr>
    </div>
    <div>
      
    </div>
<?php
$data=$_POST["data_cp"];
$nome=$_POST["nome"];
$mesano=date('m/Y',strtotime($data));
$dia=date('d',strtotime($data));
$sql="SELECT * FROM dia WHERE data LIKE '%$data%' and id_func LIKE '$nome'";
  $res = $conn->query($sql);
  $qtd = $res ->num_rows;
  while($row = $res->fetch_object()){
  $id_emp=$row->id_emp;
  }
// salva o nome do funcionario da variavel 
$sql1='SELECT * FROM funcionario ';
$res = $conn->query($sql1);
$row = $res->fetch_object();
while($row = $res->fetch_object())
{
  if($row->id_funcionario==$nome)
  {
    $nome_func=$row->nome." ".$row->sobrenome;
  }
}
$sql1='SELECT * FROM empresa ';
            $res1 = $conn->query($sql1);
            $row1 = $res1->fetch_object();
            while($row1 = $res1->fetch_object())
            {
              if($row1->id_empresa==$id_emp)
              {
                $nome_posto=$row1->nome_empresa;
              }
            }

  echo "<div class="."flex".">";
 
  echo "<div align=right >";
echo "<img src=\"/img/logo.png\" alt=\"\" width="."130"." height="."100"."/>";
echo "</div>";
echo "<div align=left >";
    echo "Funcionario : ".$nome_func."<br>";
   
    $sql = "SELECT * FROM funcionario AS A INNER JOIN cargo AS B ON A.id_cargo_funcionario = B.id_cargo";
    $res = $conn->query($sql);
    $row = $res->fetch_object();
    while($row = $res->fetch_object()){
      if($row->id_cargo_funcionario==$row->id_cargo){
       // $cargo_func=$row->nome_cargo;
       $cargo_func="Auxiliar de Serviços Gerais";
       //$cargo_func="Zelador";
      }
    }
    echo"Cargo : ".$cargo_func."<br>";
    echo "Posto: ".$nome_posto."<br>";
	echo "MÊS/ANO: ".$mesano."";
  echo "</div>";
  echo "</div>";
		//Imprimir os dia 
		
    $cont_w = 0;
    $cont_horas = 0;
    $cont_d =0;
    $cont_folga =0;
    $day=0;
    $hr_entrada=0;
    $ini_int=0;
    $fim_int=0;
    $hr_saida=0;
    
    //echo "<div class="."container-fluid".">";
  
    
    print "<div class="."flex".">";
    print "<div class="."meio".">";
    $sql="SELECT * FROM dia WHERE data LIKE '%$data%' and id_func LIKE '$nome'";
  $res = $conn->query($sql);
  $qtd = $res ->num_rows;
     if($qtd > 0){
     print "<table class='table table-sm table-hover table-striped table-bordered'>";
       print "<tr>";
          print "<th>Dia</th>";
          print "<th>Entrada</th>"; 
          print "<th>Saída</th>";  
          print "<th>Entrada</th>";   
          print "<th>Saída</th>";  
         // print "<th>Horas Dia</th>";
          print "<th>Cliente</th>";
          print "<th>Observação</th>";
        print "</tr>";
        while($row = $res->fetch_object()){
      print "<tr>";
      $dia=date('d',strtotime($row->data));
      print "<td>".$dia."</td>";   
      if($row->ini=="00:00:00"){
        print "<td>"."FOLGA"."</td>";
      }else{
      print "<td>".$inii=date('H:i',strtotime($row->ini))."</td>";}
      print "<td>".$inii=date('H:i',strtotime($row->inicio_intervalo))."</td>";
      print "<td>".$inii=date('H:i',strtotime($row->final_intervalo))."</td>";
      print "<td>".$inii=date('H:i',strtotime($row->fim))."</td>"; 
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
			print "</tr>";
        }
    print "</table>";
  }else{
    print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
  }
    echo "</div>";





    //ESPELHO
   
   
   
    print "<div class="."meio".">";
    $sql="SELECT * FROM dia WHERE data LIKE '%$data%' and id_func LIKE '$nome'";
       $res = $conn->query($sql);
       $qtd = $res ->num_rows;
       if($qtd > 0){
    print "<table class='table table-sm table-hover table-striped table-bordered table align-center'>";
      print "<tr>";
         print "<th>Dia</th>";
         print "<th>Entrada</th>";
         print "<th>Saída  </th>"; 
         print "<th>Entrada</th>";   
         print "<th>Saída</th>";  
         print "<th>Rubrica</th>";
       print "</tr>";
       


        while($row = $res->fetch_object()){
          print "<tr>";
     print "<tr>";
     $dia=date('d',strtotime($row->data));
     print "<td>".$dia."</td>"; 
       
        
             
               print "<td>"." "."</td>";
               print "<td>"." "."</td>";
               print "<td>"." "."</td>";
               print "<td>"." "."</td>";
               print "<td>"." "."</td>";
            
           
               print "</tr>";
        }
   print "</table>";
  }
   echo "</div>";
   echo "</div>";
   echo "<div class="."right".">";
   echo "Assinatura funcionario:__________________________________________________________________________";
   echo "</div>";
   // print "<hr>";
   // echo "<div class="."flex".">";
   // echo "<div>";
   // echo "Total de horas mês: "."$cont_horas"." Horas";
    //echo "</div>";
   // echo "<div>";
    //echo "Total de dias trabalhados: "."$cont_d"." Dias";
    //echo "</div>";
    //echo "<div>";
    //echo "Total de dias de folga: "."$cont_folga"." Dias";
    //echo "</div>";
    //echo "</div>";
    //<input type="hidden" name="acao" value="cadastrar">
    //$data;

//  </form>
		?>
     <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
      crossorigin="anonymous"
    ></script>
   </body>
</html>
