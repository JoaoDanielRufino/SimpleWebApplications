<?php

  session_start();
  require_once('database.php');

  if(!isset($_SESSION['usuario']))
    header('Location: index.php?erro=1');

  $id_usuario = $_SESSION['id_usuario'];
  $seguir_id_usuario = $_POST['seguir_id_usuario'];

  $database = new database();
  $link = $database->conecta_mysql();

  $sql = "INSERT INTO usuarios_seguidores(id_usuario, seguindo_id_usuario) VALUES($id_usuario, $seguir_id_usuario)";

  $link->query($sql);

  $link->close();

?>
