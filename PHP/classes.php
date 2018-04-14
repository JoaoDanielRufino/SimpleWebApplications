<?php

  class Pessoa{
    var $nome;

    function setNome($nome){
      $this->nome = $nome;
    }

    function getNome(){
      return $this->nome;
    }
  }

  $pessoa = new Pessoa();
  $pessoa->setNome('Joao Daniel');
  echo $pessoa->getNome();

?>
