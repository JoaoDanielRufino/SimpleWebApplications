<?php

  if(empty($_POST['nome']) & isset($_POST['nome'])){
    echo "Preencha o nome<br/>";
  }

  if(empty($_POST['cpf']) && isset($_POST['cpf'])){
    echo "Preencha o CPF<br/>";
  }

  if(isset($_POST['cpf']) && !is_numeric($_POST['cpf']) ){
    echo "Apenas numeros no CPF<br/><br/>";
  }

?>

<form method="post" action="">
  <label>
    Nome completo:
    <input type="text" name="nome">
  </label>
  <br/> <br/>

  <label>
    CPF:
    <input type="number" name="cpf">
  </label>

  <input type="submit" value="Cadastrar">
</form>
