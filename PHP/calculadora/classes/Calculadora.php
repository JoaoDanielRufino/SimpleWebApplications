<?php

  class Calculadora{
    private $num1;
    private $num2;
    private $total;

    public function __construct($num1, $num2){
      $this->num1 = $num1;
      $this->num2 = $num2;
    }

    public function calcular($op){
      switch($op){
        case 'somar':
          $this->total = $this->num1 + $this->num2;
          break;

        case 'subtrair':
          $this->total = $this->num1 - $this->num2;
          break;

        case 'multiplicar':
          $this->total = $this->num1 * $this->num2;
          break;

        case 'dividir':
          $this->total = $this->num1 / $this->num2;
      }
    }

    public function getTotal(){
      return $this->total;
    }

  }

?>
