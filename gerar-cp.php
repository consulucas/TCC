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
    
    </head>
    <body>
   
    <form action="?page=salvarcp" method ="POST">
    
      <style>
        .flex{
          display:flex;
          justify-content:space-between;
        }
        .meio{
      
        }
        
      </style>
      <div align= center>
    <h1><pre>E S C A L A   D E   S E R V I Ç O </pre></h1><hr>
    </div>
    <div>
      
    </div>
<?php
include_once "./config.php";

$nome=$_POST["nome"];
$nome_empresa=$_POST["nome_empresa"];
$escala=$_POST["escala"];
$turno=$_POST["turno"];
$data=$_POST["data_cp"];


//$sql='SELECT * FROM empresa';

$sql='SELECT * FROM empresa ';
$res = $conn->query($sql);
$row = $res->fetch_object();
while($row = $res->fetch_object()){
 // print "<option value='".$row->id_empresa."'>";
 // print $row->id_empresa."</option>";
  if($row->nome_empresa==$nome_empresa){
    $id_empresa=$row->id_empresa;
  }
}

$sql1='SELECT * FROM funcionario ';
$res = $conn->query($sql1);
$row = $res->fetch_object();
while($row = $res->fetch_object()){
 // print "<option value='".$row->id_funcionario."'>";
 // print $row->id_funcionario."</option>";
  if($row->nome." ".$row->sobrenome==$nome){
    $id_funcionario=$row->id_funcionario;
  }
}
print $id_empresa;
print $id_funcionario;
/*

*/
		//setlocale — Define informações locais
		//http://php.net/manual/pt_BR/function.setlocale.php
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

   
 
		//O mes pesquisado está fixo, o mesmo pode ser obtido do formulario.
		//Formato: Ano-mes-dia ou Ano-mes
		$mes_pesq = $data;
    //'2022-05-15';
   
    
		//Separar mes e ano
		//http://php.net/manual/pt_BR/function.date.php
		$mes = date('m', strtotime($mes_pesq));
	//	echo "Mês: " . $mes ."<br>";
		$ano = date('Y', strtotime($mes_pesq));
		//echo "Ano: " . $ano ."<br>";
		$dia = date('d', strtotime($mes_pesq));
   // echo "Dia: " . $dia . "<br>";
    $dianum = date('w', strtotime($mes_pesq));
   // echo "week: ". $dianum . "<br>";
		//Pesquisar quantos dias tem o mes
		//http://php.net/manual/pt_BR/function.cal-days-in-month.php
		$qnt_dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);		
	//	echo "Quantidade de dias no mês: " . $qnt_dias_mes ."<br><hr>";
  //  echo "<pre><h1>E S C A L A   D E   S E R V I Ç O <h1></pre>";
  echo "<div class="."flex".">";
 
  echo "<div align=right >";
echo "<img src=\"/img/logo.png\" alt=\"\" width="."130"." height="."100"."/>";
echo "</div>";
echo "<div align=left >";
    echo "Funcionario : ".$nome."<br>";
    echo "Escala : 12x36<br>";
    $sql = "SELECT * FROM funcionario AS A INNER JOIN cargo AS B ON A.id_cargo_funcionario = B.id_cargo";
    $res = $conn->query($sql);
    $row = $res->fetch_object();
    echo"Cargo : ".$row->nome_cargo."<br>";
    // echo "Cargo : ".$row->nome_cargo;."<br>";
    
   
          
   
    echo "Posto :".$nome_empresa."<br>";
	echo "MÊS/ANO: ".$mes."/".$ano;
  echo "</div>";
  echo "</div>";
		//Imprimir os dia 
		$cont_dias = $dia;
    $cont_w = 0;
    $cont_horas = 0;
    $cont_d =0;
    $cont_folga =0;
    $day=0;
    $hr_entrada=0;
    $ini_int=0;
    $fim_int=0;
    $hr_saida=0;
    str_pad( $cont_dias , 1 , '0' , STR_PAD_LEFT);
    //echo "<div class="."container-fluid".">";
    print "<div class="."meio".">";
     print "<table class='table table-sm table-hover table-striped table-bordered'>";
       print "<tr>";
          print "<th>Dia</th>";
          print "<th>Entrada</th>"; 
          print "<th>Saída</th>";  
          print "<th>Entrada</th>";   
          print "<th>Saída</th>";  
          print "<th>Horas Dia</th>";
          print "<th>Cliente</th>";
        print "</tr>";

		while($cont_dias <= $qnt_dias_mes)
    {
    $day=date('w', strtotime($ano . '-' . $mes . '-' . $cont_dias));
    $date=date('Y-m-d', strtotime($ano . '-' . $mes . '-' . $cont_dias));
    $dia_semana = ucfirst(utf8_encode(strftime("%a", strtotime($ano . '-' . $mes . '-' . $cont_dias))));
      print "<tr>";
        print "<td>". str_pad( $cont_dias , 2 , '0' , STR_PAD_LEFT) ." - ". $dia_semana ."</td>";
          if($escala==2) 
          { 
             if($day==0 )
             {
                $hr_entrada='FOLGA';
                print "<td>".$hr_entrada."</td>";
                print "<td>"." "."</td>";
                print "<td>"." "."</td>";
                print "<td>"." "."</td>";
                print "<td>"." "."</td>";
                print "<td>"." "."</td>";

                $cont_folga++;      
             }
              elseif($day==6)
              {
              $hr_entrada='08:00';
              $hr_entrada_soma=8;
              print "<td>".$hr_entrada."</td>";
              
              $cont_d++;
              $cont_horas=$cont_horas+4;
              }
               else
               {
                $hr_entrada='08:00';
                $hr_entrada_soma=8;
                print "<td>".$hr_entrada."</td>";
                
                
                $cont_d++;
                $cont_horas=$cont_horas+8;
                }

             if($day==0 )
             {
              $ini_int='FOLGA';
            //   print "<td>"."O"."</td>";
             }
              elseif($day==6)
              {
                $ini_int='0';
                  print "<td>"." "."</td>";
                  
              }
               else
               {
                    $ini_int='12:00';
                    $ini_int_soma=12;
                    print "<td>".$ini_int."</td>";
                  
               }
                
              if($day==0 )
              {
                $fim_int='FOLGA';
              //   print "<td>"."L"."</td>";
              }
               elseif($day==6)
               {
                $fim_int='0';
                  print "<td>"." "."</td>";               
               }
                else
                {
                    $fim_int='13:00';
                    $fim_int_soma=13;
                    print "<td>".$fim_int."</td>";                 
                }
              if($day==0 )
              {
                $hr_saida='FOLGA';
              //    print "<td>"."G"."</td>";
              }
               elseif($day==6)
               {
                  $hr_saida='12:00';
                  $hr_saida_soma=12;
                  print "<td>".$hr_saida."</td>";                  
                }
                 else
                 {
                    $hr_saida='17:00';
                    $hr_saida_soma=17;
                    print "<td>".$hr_saida."</td>";                 
                  }
              if($day==0 )
              {
              //    print "<td>"." "."</td>";
              }
               elseif($day==6)
               {
                  $soma_hora=($hr_saida_soma-$hr_entrada_soma);
                  print "<td>".$soma_hora." Horas"."</td>";
                // print "<td>"."04 horas"."</td>";
               }
                else
                {
                    $soma_hora=($hr_saida_soma-$hr_entrada_soma);
                    print "<td>".$soma_hora." Horas"."</td>";
                  // print "<td>"."09 horas"."</td>";
                }
              if($day==0 )
              {
              //   print "<td>"."A"."</td>";
              }
               elseif($day==6)
               {
                  print "<td>".$nome_empresa."</td>";               
               }
                else
                {
                    print "<td>".$nome_empresa."</td>";
                }
                $cont_dias++;
          }
        if($escala==1)
        {
            // ESCALA 12*36
            if($cont_w % 2 ==0 ){
              if($turno==1)
              {
                $hr_entrada='07:00';
                $hr_entrada_soma=7;
                print "<td>".$hr_entrada."</td>";
              }
              if($turno==2)
              {
                $hr_entrada='19:00';
                $hr_entrada_soma=19;
                print "<td>".$hr_entrada."</td>";
                
              }
                $cont_d++;
                $cont_horas=$cont_horas+12;
              }else{
                $hr_entrada='FOLGA';
                print "<td>"."FOLGA"."</td>";
              $cont_folga++;
              }
              if($cont_w % 2 ==0 ){
                $ini_int='0';
                print "<td>"." "."</td>";
              }else{
                $ini_int='FOLGA';
              // print "<td>"."Folga"."</td>";
              
              }
              if($cont_w % 2 ==0 ){
                $fim_int='0';
              print "<td>"." "."</td>";
              }else{
              // print "<td>"."Folga"."</td>";
              $fim_int='FOLGA';
              }
              if($cont_w % 2 ==0 ){
                if($turno==1){
                  $hr_saida='19:00';
                  $hr_saida_soma=19;
                  print "<td>".$hr_saida."</td>";
              
                }
                if($turno==2){
                  $hr_saida='07:00';
                  $hr_saida_soma=7;
                  print "<td>".$hr_saida."</td>";
                
                  }
              }else{
                $hr_saida='FOLGA';
              // print "<td>"."Folga"."</td>";
            
              }
              if($cont_w % 2 ==0 ){
                if($turno==1){
                  $soma_hora=($hr_saida_soma-$hr_entrada_soma);
                print "<td>".$soma_hora." Horas"."</td>";
              
                }
                if($turno==2){
                  $soma_hora=($hr_entrada_soma-$hr_saida_soma);
                print "<td>".$soma_hora." Horas"."</td>";
                
              
              // print "<td>"."12 horas"."</td>";

              }else{
              // print "<td>"."Folga"."</td>";
              
              }
              if($cont_w % 2 ==0 ){
                print "<td>".$nome_empresa."</td>";
              }else{
              //  print "<td>"."Folga"."</td>";
              
              }
            }
              print "</tr>";
            // print $day;
             
              
            //	echo "" . $cont_dias ."  ". $dia_semana . "<br>";
              $cont_dias++;
              $cont_w++;
              //$cont_horas=$cont_horas+12;
              //Imprimir o dia da semana
              //http://php.net/manual/pt_BR/function.strftime.php
              
        }//echo   $dia_semana . "<br>";
			
       // id_dia,	data,	inicio_turno,	inicio_intervalo,	final_intervalo,	final_turno,	id_func,	id_emp,
      
       $sql = "INSERT INTO dia ( data, inicio_turno, inicio_intervalo, final_intervalo, final_turno,	id_func,	id_emp) VALUES (
          '{$date}', 
          '{$hr_entrada}', 
          '{$ini_int}', 
          '{$fim_int}', 
          '{$hr_saida}', 
          '{$id_funcionario}', 
          '{$id_empresa}')";
   
       $res = $conn->query($sql);
      
      
      
      
  /*     $query_dias="INSERT INTO dia ( data, inicio_turno, inicio_intervalo, final_intervalo, final_turno,	id_func,	id_emp) VALUES (:data, :inicio_turno, :inicio_intervalo, :final_intervalo, :final_turno,	:id_func,	:id_emp )";
        $cad_dias=$conn->prepare($query_dias);
        $cad_dias->bindParam(':data',$date);
        $cad_dias->bindParam(':inicio_turno',$hr_entrada);
        $cad_dias->bindParam(':inicio_intervalo',$ini_int);
        $cad_dias->bindParam(':final_intervalo',$fim_int);
        $cad_dias->bindParam(':final_turno',$hr_saida);
        $cad_dias->bindParam(':id_func',$id_funcionario);
        $cad_dias->bindParam(':id_emp',$id_empresa);
        $cad_dias->execute();
        */
	  }
    print "</table>";
    echo "</div>";
    
    print "<hr>";
    echo "<div class="."flex".">";
    echo "<div>";
    echo "Total de horas mês: "."$cont_horas"." Horas";
    echo "</div>";
    echo "<div>";
    echo "Total de dias trabalhados: "."$cont_d"." Dias";
    echo "</div>";
    echo "<div>";
    echo "Total de dias de folga: "."$cont_folga"." Dias";
    echo "</div>";
    echo "</div>";
    //<input type="hidden" name="acao" value="cadastrar">
    //$data;

//  </form>
		?>
    
