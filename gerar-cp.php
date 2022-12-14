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
$ini=$_POST["ini"];
$fim=$_POST["fim"];
if($turno==1){
  $ini="07:00";
  $fim="19:00";
}
if($turno==2){
  $ini="19:00";
  $fim="07:00";
}
if($turno==3){
  $ini="08:00";
  $fim="17:00"; 
}
if($turno==4){
  $ini="07:00";
  $fim="17:00";
}
if($turno==5){
  $ini="08:00";
  $fim="12:00"; 
}
if($turno==6){
  $ini="13:30";
  $fim="17:30"; 
}

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
$sql2='SELECT * FROM observacao ';
$res = $conn->query($sql2);
$row = $res->fetch_object();
while($row = $res->fetch_object()){
 // print "<option value='".$row->id."'>";
// print $row->tipo."</option>";
  if($row->id==8){
   //print $row->id;
    //$id_obs=$row->id;
  }
}

print// $id_obs;
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
    $guarda_ini=$ini;
    $guarda_fim=$fim;
   // $guarda_id=$id_obs;
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
        if($escala==1)
        {
           
            $ini=$guarda_ini;
            $fim=$guarda_fim;
           // $id_obs=$guarda_id;
            // ESCALA 12*36
            if($cont_w % 2 ==0 ){            
                print "<td>".$ini."</td>";
                $cont_d++; 
                $id_obs="10";
               // $id_obs=null; 
              }else{
                 $ini="00:00";             
                 $id_obs="8";
                print "<td>"."FOLGA"."</td>";
              $cont_folga++;
              }
              if($cont_w % 2 ==0 ){
                $ini_int='00:00';
                print "<td>"." "."</td>";
              }else{
               
              // print "<td>"."Folga"."</td>";
              
              }
              if($cont_w % 2 ==0 ){
                $fim_int='00:00';
              print "<td>"." "."</td>";
              }else{
              // print "<td>"."Folga"."</td>";
             
              }
              if($cont_w % 2 ==0 ){     
                  print "<td>".$fim."</td>";             
              }else{
               $fim="00:00";
              // print "<td>"."Folga"."</td>";
            
              }
              if($cont_w % 2 ==0 ){
               
                //  $soma_hora=($hr_entrada_soma-$hr_saida_soma);
                print "<td>"." "." Horas"."</td>";   

              }else{
              // print "<td>"."Folga"."</td>";
              
              }
              if($cont_w % 2 ==0 ){
                print "<td>".$nome_empresa."</td>";
              }else{
              //  print "<td>"."Folga"."</td>";
              
              }
        
              print "</tr>";
            
              $cont_dias++;
              $cont_w++;
              
            }
        if($escala==2)
        {
          $ini=$guarda_ini;
          $fim=$guarda_fim;
            // ESCALA 12*36 folga
            if($cont_w % 2 ==1 ){
                 print "<td>".$ini."</td>";   
                $cont_d++;  
                $id_obs="10";          
              }else{
                $id_obs="8";
               $ini="00:00";
                print "<td>"."FOLGA"."</td>";
              $cont_folga++;
              }
              if($cont_w % 2 ==1 ){
                $ini_int='00:00';
                print "<td>"." "."</td>";
              }else{
               
              // print "<td>"."Folga"."</td>";
              
              }
              if($cont_w % 2 ==1 ){
                $fim_int='00:00';
              print "<td>"." "."</td>";
              }else{
              // print "<td>"."Folga"."</td>";
              
              }
              if($cont_w % 2 ==1 ){
                
                  print "<td>".$fim."</td>";
                
                
              }else{
               $fim="00:00";
              // print "<td>"."Folga"."</td>";
            
              }
              if($cont_w % 2 ==1 ){
               
                //  $soma_hora=($hr_entrada_soma-$hr_saida_soma);
                print "<td>"." "." Horas"."</td>";
                
         
              }else{
              // print "<td>"."Folga"."</td>";
              
              }
              if($cont_w % 2 ==1 ){
                print "<td>".$nome_empresa."</td>";
              }else{
            // print "<td>"."Folga"."</td>";
              
              }
            
              print "</tr>";
         
              $cont_dias++;
              $cont_w++;
             
              
            }
        
        if($escala==3) 
          {  
            $ini=$guarda_ini;
            $fim=$guarda_fim;
              if($day==0 )
              {
                $id_obs="8";
                 $ini="00:00";
               //  $id_obs="8";
                 print "<td>"."FOLGA"."</td>";
               //  print "<td>"." "."</td>";
                // print "<td>"." "."</td>";
               //  print "<td>"." "."</td>";
               //  print "<td>"." "."</td>";
               //  print "<td>"." "."</td>";
 
                 $cont_folga++;      
              }
               elseif($day==6)
               {
                $id_obs="8";
                $ini="00:00";
              //  $id_obs="8";
                 print "<td>"."FOLGA"."</td>";
               //  print "<td>"." "."</td>";
               //  print "<td>"." "."</td>";
                // print "<td>"." "."</td>";
                // print "<td>"." "."</td>";
               //  print "<td>"." "."</td>";
 
                 $cont_folga++;      
               }
                else
                {

                  $id_obs="10";
                 print "<td>".$ini."</td>";
                 
                 
                 $cont_d++;
                
                 }
 
              if($day==0 )
              {
                $ini_int="00:00";
             //   print "<td>"."O"."</td>";
              }
               elseif($day==6)
               {
                $ini_int="00:00";
                  
                   
               }
                else
                {
                     $ini_int='12:00'; 
                     print "<td>".$ini_int."</td>";
                   
                }
                 
               if($day==0 )
               {
                 $fim_int="00:00";
               //   print "<td>"."L"."</td>";
               }
                elseif($day==6)
                {
                 $fim_int="00:00";
                             
                }
                 else
                 {
                     $fim_int='13:00';                  
                     print "<td>".$fim_int."</td>";                 
                 }
               if($day==0 )
               {
                 $fim="00:00";
               //    print "<td>"."G"."</td>";
               }
                elseif($day==6)
                {
                  $fim="00:00";
                                    
                 }
                  else
                  {
                    
                     print "<td>".$fim."</td>";                 
                   }
                   if($day==0 ){
               
                    //  $soma_hora=($hr_entrada_soma-$hr_saida_soma);
                   // print "<td>"." "." Horas"."</td>";
                  }
                  elseif($day==6)
                  {
                  //  print "<td>"." "." Horas"."</td>";
                  }else{
                  // print "<td>"."Folga"."</td>";
                  print "<td>"." "." Horas"."</td>";
                  }
                  if($day==0 ){
                   
                  }
                  elseif($day==6)
                  {

                  }else{
                // print "<td>"."Folga"."</td>";
                print "<td>".$nome_empresa."</td>";
                  }
          
          
          print "</tr>";
          $cont_dias++;
              $cont_w++;
                }
       if($escala==4) 
          { 
            $ini=$guarda_ini;
            $fim=$guarda_fim;
            //INICIO TURNO
             if($day==0 )
             {
              $id_obs="8";
              $ini="00:00";
                $hr_entrada='FOLGA';
                //$id_obs="8";
                print "<td>".$hr_entrada."</td>";
               // print "<td>".$hr_entrada."</td>";
                print "<td>"." "."</td>";
                print "<td>"." "."</td>";
                print "<td>"." "."</td>";
                print "<td>"." "."</td>";
                print "<td>"." "."</td>";

                $cont_folga++;      
             }
              elseif($day==6)
              {
             
                $id_obs="10";
              
              print "<td>".$ini."</td>";
              $cont_d++;
              $cont_horas=$cont_horas+4;
              }
               else
               {
                $id_obs="10";
                $hr_entrada_soma=8;
                print "<td>".$ini."</td>";
                
                
                $cont_d++;
                $cont_horas=$cont_horas+8;
                }
                  //INICIO DE TURNO//
                  //INICIO INTERVALO
             if($day==0 )
             {

              $ini_int="00:00";
            //   print "<td>"."O"."</td>";
             }
              elseif($day==6)
              {
                $ini_int="00:00";
                  print "<td>"." "."</td>";
                  
              }
               else
               {
                    $ini_int="12:00";
                    $ini_int_soma=12;
                    print "<td>".$ini_int."</td>";
                  
               }
                //INICIO INTERVALO//
                //FIM INTERVALO
              if($day==0 )
              {
               
                $fim_int='00:00';
              //   print "<td>"."L"."</td>";
              }
               elseif($day==6)
               {
                
                $fim_int='00:00';
                  print "<td>"." "."</td>";               
               }
                else
                {

                    $fim_int='13:00';
                    $fim_int_soma=13;
                    print "<td>".$fim_int."</td>";                 
                }
                //FIM INTERVALO//
                //FIM TURNO
              if($day==0 )
              {
                $fim="00:00";
              //    print "<td>"."G"."</td>";
              }
               elseif($day==6)
               {
                $fim="12:00";
                  print "<td>".$fim."</td>";                  
                }
                 else
                 {
                  $fim="17:00";
                    print "<td>".$fim."</td>";                 
                  }
                  //FIM TURNO//
              if($day==0 )
              {
              //    print "<td>"." "."</td>";
              }
               elseif($day==6)
               {
                //  $soma_hora=($hr_saida_soma-$hr_entrada_soma);
                print "<td>"." "." Horas"."</td>";
                // print "<td>"."04 horas"."</td>";
               }
                else
                {
                 //   $soma_hora=($hr_saida_soma-$hr_entrada_soma);
                 print "<td>"." "." Horas"."</td>";
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
              
              print "</tr>";
          }
        //echo   $dia_semana . "<br>";
			
       // id_dia,	data,	inicio_turno,	inicio_intervalo,	final_intervalo,	final_turno,	id_func,	id_emp,
    
       $sql = "INSERT INTO dia ( data, ini, inicio_intervalo, final_intervalo, fim, id_func,	id_emp, id_obs ) VALUES (
          '{$date}', 
          '{$ini}',
          '{$ini_int}', 
          '{$fim_int}', 
          '{$fim}',
          '{$id_funcionario}', 
          '{$id_empresa}',
          '{$id_obs}'
          )";
   
       $res = $conn->query($sql);
      
      
     //  '{$id_obs}'
      // id_obs
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
    
