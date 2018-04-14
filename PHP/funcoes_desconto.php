<?php

  function calcula_desconto($total, $desconto){
    return $total - ($total * $desconto / 100);
  }

?>
