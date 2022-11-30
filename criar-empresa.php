<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    <title>GKPartner</title>
  </head>
  <body>
   
    
      <h1>Novo Funcionario</h1>
      <form action="?page=salvarempresa" method ="POST">
        <input type="hidden" name="acao" value="cadastrar">
      <div class="mb-3">
        
        <label for="Nome">Nome da empresa</label>
        <input type="text" name="nome_empresa" id="" class="form-control">
      </div>
      <div class="mb-3">
      <div class="mb-3">
        
        <label for="Nome">CNPJ da empresa</label>
        <input type="text" name="cnpj" id="" class="form-control">
      </div>
      <div class="mb-3">  
      
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
