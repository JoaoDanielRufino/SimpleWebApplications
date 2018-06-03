<?php

  session_start();
  require_once('database.php');

  if(!isset($_SESSION['usuario']))
    header('Location: index.php?erro=1');

  $texto_tweet = $_POST['texto_tweet'];
  $id_usuario = $_SESSION['id_usuario'];

  $database = new database();
  $link = $database->conecta_mysql();

  $sql = "INSERT INTO tweet(id_usuario, tweet) VALUES($id_usuario, '$texto_tweet')";

  $link->query($sql);

  $link->close();

?>
