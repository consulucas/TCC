<?php
switch ($_REQUEST["acao"]) {
  case 'cadastrar':
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $id_cargo_funcionario = $_POST["id_cargo_funcionario"];
    $data_inicio = $_POST["data_inicio"];

    $sql = "INSERT INTO funcionario 
    (nome, 
    sobrenome, 
    id_cargo_funcionario, 
    data_inicio)
     VALUES (
       '{$nome}', 
       '{$sobrenome}', 
       '{$id_cargo_funcionario}', 
       '{$data_inicio}')";

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
  case 'editar':
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cargo = $_POST["id_cargo_funcionario"];
    $data_inicio = $_POST["data_inicio"];
    $demitido = $_POST["demitido"];
    $sql = "UPDATE funcionario SET
                    nome='{$nome}',
                    sobrenome='{$sobrenome}',
                    id_cargo_funcionario='{$cargo}',
                    desativado='{$demitido}',
                    data_inicio='{$data_inicio}'
                    WHERE
                    id_funcionario=".$_REQUEST["id_funcionario"];
                    

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