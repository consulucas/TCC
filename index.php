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
    <title>Document</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand mb-0 h1" href="#">GKPartner</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            <li class="nav-item dropdown">  
          <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Funcionario
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=novo">Novo Funcionario</a></li>
            <li><a class="dropdown-item" href="#">Listar Funcionarios</a></li>  
          </ul>
        </li>
        <a class="nav-link active" href="#">Novo Cartão Ponto</a>
            <li class="nav-item dropdown">
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col mt-5">
          <?php
          include("config.php");
          switch(@$_REQUEST["page"]){
            case "novo":
              include("criar-funcionario.php");
              break;
              case "listar":
                include("listar-usuario.php");
                break;
              case "salvar":
                include("salvar-funcionario.php");
                break;
                default:
                print "<h1>Bem vindos</h1>";
          }
          
          ?>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
