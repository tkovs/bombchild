<!DOCTYPE html>

<html>
	<head>
		<?php
			session_start();
			$produtos = json_decode(file_get_contents("produtos.json"), true);
			$_SESSION["produtos"] = $produtos["produtos"];
		?>
		<title>Bombchild</title>
	</head>
	<body>
		<h1>Bombchild!</h1>
		<p>header bonito:
		<a href="html/lista.php">Lista de produtos</a></p>

		<?php
			/*foreach ($_SESSION["produtos"] as $produto) {
				echo "<img src='{$produto['imagem']}'/>";
			}*/

			if (isset($_COOKIE["testing"])) {
				echo "<h2>4 últimos acessos</h2>";
				$historico = json_decode($_COOKIE["testing"], true);
				$lasts = array_slice($historico, -4, 4);

				foreach ($lasts as $produto) {
					echo "({$produto['data']}) {$produto['nome']}<br />";
				}
			}
		?>
	</body>
</html>