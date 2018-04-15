<?php

  require("classes/Calculadora.php");

  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $op = $_POST['op'];

  $calculadora = new Calculadora($num1, $num2);
  $calculadora->calcular($op);
  echo $calculadora->getTotal();

?>
