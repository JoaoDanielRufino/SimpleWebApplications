<?php

  session_start();

  require_once('database.php');

  $usuario = $_POST['usuario'];
  $senha = md5($_POST['senha']);

  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

  $database = new database();

  $link = $database->conecta_mysql();

  $res = $link->query($sql);

  if($res->num_rows > 0){
    $dados_usuario = $res->fetch_array();
    $_SESSION['id_usuario'] = $dados_usuario['id'];
    $_SESSION['usuario'] = $dados_usuario['usuario'];
    $_SESSION['email'] = $dados_usuario['email'];
    header('Location: home.php');
  }
  else{
    header('Location: index.php?erro=true');
  }

  $link->close();

?>
