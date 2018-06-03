<?php

  session_start();

  if(!isset($_SESSION['usuario']))
    header('Location: index.php?erro=1');

  require_once('database.php');

  $id_usuario = $_SESSION['id_usuario'];
  $nome_pessoa = $_POST['nome_pessoa'];

  $database = new database();
  $link = $database->conecta_mysql();

  $sql = "SELECT u.*, us.* FROM usuarios AS u LEFT JOIN usuarios_seguidores AS us ON (us.id_usuario = $id_usuario AND u.id = us.seguindo_id_usuario)
          WHERE u.usuario LIKE '%$nome_pessoa%' AND u.id <> $id_usuario";

  $res = $link->query($sql);

  if($res && $res->num_rows >= 0){
    while($registro = $res->fetch_array(MYSQLI_ASSOC)){
      $esta_seguindo = isset($registro['id_usuario_seguidor']) && !empty($registro['id_usuario_seguidor']) ? true : false;
      $btn_seguir = 'block';
      $btn_deixar_seguir = 'block';

      if($esta_seguindo)
        $btn_seguir = 'none';
      else
        $btn_deixar_seguir = 'none';

      echo '<a href="#" class="list-group-item">
      <strong>'.$registro["usuario"].'</strong> <small> - '.$registro["email"].'</small>
      <p class="list-group-item-text pull-right">
      <button type="button" id="btn-seguir-'.$registro['id'].'" style="display:'.$btn_seguir.'" class="btn btn-default btn-seguir" data-id_usuario="'.$registro['id'].'">Seguir</button>
      <button type="button" id="btn-deixar-seguir-'.$registro['id'].'" style="display:'.$btn_deixar_seguir.'" class="btn btn-primary btn-deixar-seguir" data-id_usuario="'.$registro['id'].'">
      Deixar de seguir</button>
      </p><div class="clearfix"></div>
      </a>';
    }
  }
  else{
    echo "Erro na consulta!!";
  }

  $link->close();

?>
