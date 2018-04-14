<?php

  require_once("funcoes_desconto.php");

  $total = 800;
  $desconto = 10;
  $valor_desconto = calcula_desconto($total, $desconto);

?>

Valor Total: R$ <?php echo $total; ?> <br/>
Valor Desconto: <?php echo $desconto; ?>% <br/>
Valor total com desconto: R$ <?php echo $valor_desconto; ?>
