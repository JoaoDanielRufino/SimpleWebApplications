<?php

  require_once('database.php');

  $sql = "SELECT * FROM usuarios";

  $database = new database();

  $link = $database->conecta_mysql();

  $res = $link->query($sql);

  if($res->num_rows >= 0){
    $dados_usuario = array();

    while($linha = $res->fetch_array(MYSQLI_ASSOC))
      $dados_usuario[] = $linha;

    foreach($dados_usuario as $usuario){
      var_dump($usuario);
      echo "<br/>";
    }
  }
  else{
    echo "Erro!!";
  }

  $link->close();

?>
