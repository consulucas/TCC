<?php
switch ($_REQUEST["acao"]) {
  case 'cadastrar':
    $data = $_POST["data"];
    $ini_turn = $_POST["inicio_turno"];
    $ini_int = $_POST["inicio_intervalo"];
    $fim_int = $_POST["final_intervalo"];
    $fim_turn = $_POST["final_turno"];
    $id_func = $_POST["id_func"];
    $id_emp = $_POST["id_emp"];

    $sql = "INSERT INTO dia 
    (data, 
    inicio_turno, 
    inicio_intervalo,
    final_intervalo, 
    final_turno,
    id_func,
    id_emp)
     VALUES (
       '{$data}', 
       '{$ini_turn}', 
       '{$ini_int}', 
       '{$fim_int}', 
       '{$fim_turn}', 
       '{$id_func}', 
       '{$id_emp}')";

    $res = $conn->query($sql);
    if($res==true)
    {
      print "<script>alert('O cadastro do funcionario foi realizado com sucesso');</script>";
      print "<script>location.href='?page-listar';</script>";
    }else
    {
      print "<script>alert('Não foi possivel cadastrar o funcionario');</script>";
      print "<script>location.href='?page-listar';</script>";
    }

    break;
  case 'editarcp':
    
    $ini_turn = $_POST["hr_ini"];
    $ini_int = $_POST["ini_int"];
    $fim_int = $_POST["fim_int"];
    $fim_turn = $_POST["hr_fim"];
    $id_emp = $_POST["id_emp"];
    $id_obs = $_POST["id_obs"];

    $sql = "UPDATE dia SET
                    ini='{$ini_turn}',
                    inicio_intervalo='{$ini_int}',
                    final_intervalo='{$fim_int}',
                    fim='{$fim_turn}',
                    id_emp='{$id_emp}',
                    id_obs='{$id_obs}'
                    WHERE
                    id_dia=".$_REQUEST["id_dia"];
                    

    $res = $conn->query($sql);
    if($res==true)
    {
      print "<script>alert('A edição do cadastro do funcionario foi realizado com sucesso');</script>";
      print "<script>location.href='?page-listar';</script>";
    }else
    {
      print "<script>alert('Não foi possivel editar o funcionario');</script>";
      print "<script>location.href='?page-listar';</script>";
    }
    break;
}