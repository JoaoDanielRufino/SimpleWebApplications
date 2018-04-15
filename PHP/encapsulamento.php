<?php

  class Veiculo{
    private $placa;
    private $cor;
    protected $tipo = 'Caminhonete';

    public function setPlaca($placa){
      $this->placa = $placa;
    }

    public function getPlaca(){
      return $this->placa;
    }
  }

  class Carro extends Veiculo{
    public function getTipo(){
      return $this->tipo;
    }
  }

  $veiculo = new Veiculo();
  $veiculo->setPlaca('OXE2564');
  echo $veiculo->getPlaca()."<br>";

  $carro = new Carro();
  echo $carro->getTipo();

?>
