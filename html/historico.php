<!DOCTYPE html>

<html>
	<head>
		<?php
			session_start();
		?> 
		<title>Histórico</title>
	</head>
	<body>
		<h1>Histórico</h1>

		<ul>
			<?php
				$historico = json_decode($_COOKIE["testing"], true);
				echo ("<ul>");
				foreach ($historico as $produto) {
					echo "<li>({$produto['data']}) <a href='produto.php?id={$produto['id']}'>{$produto['nome']}</a></li>";
				}
				echo ("</ul>");

				if (isset($_COOKIE["testing"])) {
					echo "<h2>4 últimos acessos</h2>";
					$historico = json_decode($_COOKIE["testing"], true);
					$lasts = array_slice($historico, -4, 4);

					foreach ($lasts as $produto) {
						echo "({$produto['data']}) {$produto['nome']}<br />";
					}
				}
			?>
		</ul>
	</body>
</html>