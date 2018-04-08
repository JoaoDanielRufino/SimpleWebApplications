<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Primeiros Passos</title>
	</head>

	<body>

		<?php
			/*$inteiro = 1;

			$fracioando = 5.6;

			$booleano = true;

			$texto = 'Aprendendo php '.$booleano;
			echo $texto;*/

			/*$vet[0] = 1;
			$vet[1] = 2;
			$vet[2] = 'Oi';
			$vet['a'] = 'Que louco!';*/

			$vet = array(0 => 1, 1 => 2, 2 => 'Oi', 'a' => 'Que louco!');

		/*	var_dump($vet);
			echo '<br/>';
			print_r($vet);
			echo '<br/>';
			echo $vet[2];
			echo '<br/>';
			echo $vet['a'];*/

			foreach($vet as $elem){
				echo $elem.'<br/>';
			}

		?>

	</body>
</html>
