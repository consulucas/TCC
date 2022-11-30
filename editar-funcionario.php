<h1>Editar usuario</h1>
<?php
$sql = "SELECT * FROM funcionario WHERE id_funcionario=".$_REQUEST["id_funcionario"];
$res = $conn->query($sql);
$row = $res->fetch_object();
echo $sql;

?>
 <form action="?page=salvar" method ="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_funcionario" value="<?php print $row->id_funcionario;?>">

      <div class="mb-3">
        
        <label for="Nome">Nome</label>
        <input type="text" name="nome" id="" value="<?php print $row->nome;?>" class="form-control">
      </div>
      <div class="mb-3">
        
        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome" id="" value="<?php print $row->sobrenome;?>"class="form-control">
      </div>
      <div class="mb-3">
        
        <label for="id_cargo_funcionario">Cargo</label>
        <select name="id_cargo_funcionario" class="form-control" >
          <?php
          $sql = "SELECT * FROM cargo";
          $res = $conn->query($sql);
          while($row = $res->fetch_object()){
            print "<option value='".$row->id_cargo."'>";
            print $row->nome_cargo."</option>";
          }
          ?>
          </select>
      </div>     
      <div class="mb-3">
       
        <label for="data_adm">Data de admissão</label>
        <input type="date" name="data_inicio" id=""value='<?php print $row->data_inicio;?>' class="form-control">
      </div>
      <div class="mb-3">
        
        <label for="Escala">Funcionario demitido</label>
        <select name="demitido" class="form-select" aria-label="Default select example">
        <option selected></option>
        <option value="Sim">Sim</option>
        <option value="Nao">Não</option>
      
      </select>
      </div>
      <div class="mb-3">
       <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
 
