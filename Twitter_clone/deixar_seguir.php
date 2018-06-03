<?php

  session_start();
  require_once('database.php');

  if(!isset($_SESSION['usuario']))
    header('Location: index.php?erro=1');

  $id_usuario = $_SESSION['id_usuario'];
  $deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];

  $database = new database();
  $link = $database->conecta_mysql();

  $sql = "DELETE FROM usuarios_seguidores WHERE id_usuario = $id_usuario AND seguindo_id_usuario = $deixar_seguir_id_usuario";

  $link->query($sql);

  $link->close();

?>
