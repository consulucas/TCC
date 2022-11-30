<?php
switch ($_REQUEST["acao"]) {
  case 'cadastrar':
    $nome_empresa= $_POST["nome_empresa"];
    $cnpj = $_POST["cnpj"];
    

    $sql = "INSERT INTO empresa 
    (nome_empresa,
    cnpj)
     VALUES ( 
      '{$nome_empresa}',
       '{$cnpj}')";

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
    $nome_empresa= $_POST["nome_empresa"];
    $cnpj = $_POST["cnpj"];

    $sql = "UPDATE empresa SET
                    nome_empresa='{$nome_empresa}'
                    cnpj= '{$cnpj}'
                   
                    WHERE
                    id_empresa=".$_REQUEST["id_empresa"];
                    

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