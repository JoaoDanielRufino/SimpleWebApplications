<?php

  class database{
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $db = 'twitter_clone';

    public function conecta_mysql(){
      $conec = new mysqli($this->host, $this->usuario, $this->senha, $this->db);
      mysqli_set_charset($conec, 'utf8');

      if(mysqli_connect_error()){
        echo "Erro ao tentar conectar ao banco de dados".mysqli_connect_error();
      }

      return $conec;
    }

  }

?>
