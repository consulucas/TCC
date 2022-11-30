<h1>Editar Cartão Ponto</h1>
<?php
$sql = "SELECT * FROM dia WHERE id_dia=".$_REQUEST["id_dia"];
$res = $conn->query($sql);
$row = $res->fetch_object();

echo $sql;

?>
 <form action="?page=salvarcp" method ="POST">
        <input type="hidden" name="acao" value="editarcp">
        <input type="hidden" name="id_dia" value="<?php print $row->id_dia;?>">

      <div class="mb-3">
        
        <label for="hr_ini">Hora Entrada</label>
        <input type="text" name="hr_ini" id="" value="<?php print $row->inicio_turno;?>" class="form-control">
      </div>
      <div class="mb-3">
        
        <label for="ini_int">Inicio Intervalo</label>
        <input type="text" name="ini_int" id="" value="<?php print $row->inicio_intervalo;?>"class="form-control">
      </div>

      <div class="mb-3">
        
        <label for="fim_int">Fim Intervalo</label>
        <input type="text" name="fim_int" id="" value="<?php print $row->inicio_intervalo;?>"class="form-control">
      </div>
      <div class="mb-3">
        
        <label for="hr_fim">Hora saida</label>
        <input type="text" name="hr_fim" id="" value="<?php print $row->inicio_intervalo;?>"class="form-control">
      </div>
      

      <div class="mb-3">
        
        <label for="id_emp">Empresa</label>
        <select name="id_emp" class="form-control" >
          <?php
          $sql = "SELECT * FROM empresa";
          $res = $conn->query($sql);
          while($row = $res->fetch_object()){
            print "<option value='".$row->id_empresa."'>";
            print $row->nome_empresa."</option>";
          }
          ?>
          </select>
      </div>    
      
      <div class="mb-3">
       <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
 
