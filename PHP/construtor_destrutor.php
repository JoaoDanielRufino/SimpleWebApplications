<?php

  class Pessoa{
    private $nome;

    public function __construct($nome){
      $this->nome = $nome;
    }

    public function getNome(){
      return $this->nome;
    }

    public function __destruct(){
      echo "<br>Objeto removido";
    }
  }

  $pessoa = new Pessoa('Joao');
  echo $pessoa->getNome();

?>
