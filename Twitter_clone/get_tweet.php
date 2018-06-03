<?php

  session_start();

  if(!isset($_SESSION['usuario']))
    header('Location: index.php?erro=1');

  require_once('database.php');

  $id_usuario = $_SESSION['id_usuario'];

  $database = new database();
  $link = $database->conecta_mysql();

  $sql = "SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao, t.tweet, u.usuario
          FROM tweet AS t JOIN usuarios AS u ON (t.id_usuario = u.id)
          WHERE id_usuario = $id_usuario OR id_usuario IN (SELECT seguindo_id_usuario FROM usuarios_seguidores WHERE id_usuario = $id_usuario)
          ORDER BY data_inclusao DESC";

  $res = $link->query($sql);

  if($res && $res->num_rows >= 0){
    while($registro = $res->fetch_array(MYSQLI_ASSOC)){
      echo '<a href="#" class="list-group-item">
      <h4 class="list-group-item-heading">'.$registro['usuario'].'<small> - '.$registro['data_inclusao'].'</small></h4>
      <p class="list-group-item-text">'.$registro['tweet'].'</p>
      </a>';
    }
  }
  else{
    echo "Erro na consulta!!";
  }

  $link->close();

?>
