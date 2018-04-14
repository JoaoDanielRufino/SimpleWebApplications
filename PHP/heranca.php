<?php

  class Felino{
    var $mamifero = 'sim';

    function correr(){
      echo "Correr como felino";
    }
  }

  class Chita extends Felino{
    function correr(){
      echo "Correr como chita";
    }
  }

  $chita = new Chita();
  $chita->correr();

?>
