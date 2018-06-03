<?php

  require_once('database.php');

  $usuario = $_POST['usuario'];
  $email = $_POST['email'];
  $senha = md5($_POST['senha']);

  $database = new database();
  $link = $database->conecta_mysql();

  $usuario_existe = false;
  $email_existe = false;

  //Checando usuario
  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
  if($res = $link->query($sql)){
    $dados_usuario = $res->fetch_array(MYSQLI_ASSOC);

    if(isset($dados_usuario['usuario']))
      $usuario_existe = true;
  }
  else{
    echo "Erro ao tentar localizar o usuario!";
  }

  //Checando email
  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  if($res = $link->query($sql)){
    $dados_usuario = $res->fetch_array(MYSQLI_ASSOC);

    if(isset($dados_usuario['email']))
      $email_existe = true;
  }
  else{
    echo "Erro ao tentar localizar o usuario!";
  }

  if($usuario_existe || $email_existe){
    $retorno_get = '';

    if($usuario_existe)
      $retorno_get.= "erro_usuario=1&";

    if($email_existe)
      $retorno_get.= "erro_email=1";

    header('Location: inscrevase.php?'.$retorno_get);
    //Interrompe a execucao do programa
    die();
  }

  //Inserindo novo usuario
  $sql = "INSERT INTO usuarios(usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";

  if(!$link->query($sql)){
    echo "Erro ao registrar o usuario!";
  }

  else{
    echo "Usuario registrado com sucesso";
  }

  $link->close();

 ?>
