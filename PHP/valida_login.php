<?php

  function valida_login($login, $senha){
    $login_bd = 'joaodaniel';
    $senha_bd = '12345';

    if($login == $login_bd && $senha == $senha_bd)
      return true;

    return false;
  }

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  if(valida_login($login, $senha)){
    echo "Acesso liberado";
  }
  else{
    echo "Acesso negado";
  }

?>
