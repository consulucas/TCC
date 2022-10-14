<?php
switch ($_REQUEST["acao"]) {
  case 'cadastrar':
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cargo = $_POST["cargo"];
    $data_inicio = $_POST["data_inicio"];

    $sql = "INSERT INTO funcionario (nome, sobrenome, cargo, data_inicio) VALUES ( '{$nome}', '{$sobrenome}', '{$cargo}', '{$data_inicio}')";

    $res = $conn->query($sql);
    break;
  
  default:
    # code...
    break;
}