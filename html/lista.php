<!DOCTYPE html>

<html>
	<head>
		<?php
			session_start();
		?> 
		<title>Lista de produtos</title>
	</head>
	<body>
		<h1>Lista de produtos</h1>

		<ul>
			<?php
				foreach ($_SESSION["produtos"] as $produto) {
					echo("<li><a href='produto.php?id={$produto['id']}'>{$produto['nome']}</a></li>");
				}

				if (isset($_COOKIE["cookie1"])) {
					echo "<h2>4 últimos acessos</h2>";
					$historico = json_decode($_COOKIE["cookie1"], true);
					$lasts = array_reverse(array_slice($historico, -4, 4));

					foreach ($lasts as $produto) {
						echo "({$produto['data']}) {$produto['nome']}<br />";
					}
				}
			?>
		</ul>
	</body>
</html>