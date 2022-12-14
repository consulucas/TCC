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
  
<h1>Novo Cartao Ponto</h1>
      <form action="?page=gerarcp" method ="POST">
        <input type="hidden" name="acao" value="cadastrar">
      <div class="mb-3">
        
        <label for="Nome">Nome</label>
        <select name="nome" class="form-control" >
        <?php
          $sql = "SELECT * FROM funcionario
          order by nome";
          $res = $conn->query($sql);
          while($row = $res->fetch_object()){
            print "<option value='".$row->nome." ".$row->sobrenome."'>";
            print $row->nome." ".$row->sobrenome."</option>";
          }
          ?>
          </select>
      </div>
      <div class="mb-3">
        
        <label for="Nome">Nome da empresa</label>
        <select name="nome_empresa" class="form-control" >
        <?php
          $sql = "SELECT * FROM empresa
          order by nome_empresa";
          $res = $conn->query($sql);
          while($row = $res->fetch_object()){
            print "<option value='".$row->nome_empresa."'>";
            print $row->nome_empresa."</option>";
          }
          ?>
          </select>
      </div>
      
      <div class="mb-3">
        
        <label for="Escala">Escala</label>
        <select name="escala" class="form-select" aria-label="Default select example">
        <option selected>Escolha a Escala</option>
        <?php
          $sql = "SELECT * FROM escala";
          $res = $conn->query($sql);
          while($row = $res->fetch_object()){
            print "<option value='".$row->id_escala."'>";
            print $row->nome_escala."</option>";
          }
          ?>

       
       
      </select>
      </div>
      <div class="row mb-3">
      <div class="col-4 col-s-12">
      <label for="Turno">Turno</label>
      <select name="turno" class="form-select" aria-label="Default select example">
        <option value="0">Escolha o Turno</option>
        <option value="1">07:00 / 19:00</option>
        <option value="2">19:00 / 07:00</option>
        <option value="3">08:00 / 17:00</option>
        <option value="4">07:00 / 17:00</option>
        <option value="5">08:00 / 12:00</option>
        <option value="6">13:30 / 17:30</option>
      </select>
      </div>    

     <div class="col-4 col-s-12">
       
       <label for="ini">Inicio Turno</label>
       <input type="time" name="ini" id="" class="form-control">
       </div>
       <div class="col-4 col-s-12">
       <label for="fim">Fim Turno</label>
       <input type="time" name="fim" id="" class="form-control">
     </div>
     </div>
      <div class="mb-3">
       
       <label for="data_adm">Data do Cartão Ponto</label>
       <input type="date" name="data_cp" id="" class="form-control">
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