<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
  <title>Document</title>
</head>
<body>
  
<h1>Imprimir Cartao Ponto</h1>
      <form action="?page=imprimircp" method ="POST">
        <input type="hidden" name="acao" value="cadastrar">
      <div class="mb-3">
        
        <label for="Nome">Nome</label>
        <select name="nome" class="form-control" >
        <?php
          $sql = "SELECT * FROM funcionario";
          $res = $conn->query($sql);
          while($row = $res->fetch_object()){
            print "<option value='".$row->id_funcionario."'>"; 
           print $row->nome." ".$row->sobrenome."</option>";
          }
          ?>
          </select>
      </div>
      
      <div class="mb-3">
       
       <label for="data_adm">Data do Cartão Ponto</label>
       <input type="Month" name="data_cp" id="" class="form-control">
     </div>
      <div class="mb-3">
       <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
 

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
      crossorigin="anonymous"
    ></script>
</body>
</html>