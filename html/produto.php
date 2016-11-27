<!DOCTYPE html>

<html>
	<head>
		<?php
			session_start();

			foreach ($_SESSION["produtos"] as $individual) {
				if ($individual['id'] == $_GET["id"]) {
					$produto = $individual;
					break;
				}
			}

			$title = explode(' ', $produto["nome"]);
			echo("<title>{$title[0]}</title>");
		?>
	</head>
	<body>
		<?php
			if (!isset($_COOKIE["cookie1"])) {
				$historico[] = array('id' => $produto["id"], 'nome' => $produto["nome"], 'data' => date("Y-m-d H:i:s"));
			} else {
				$historico = $_COOKIE["cookie1"];
				$historico = json_decode($historico, true);
				$historico[] = array('id' => $produto["id"], 'nome' => $produto["nome"], 'data' => date("Y-m-d H:i:s"));
			}

			setcookie("cookie1", json_encode($historico), time()+60*60*24*30, '/');

			echo("<h1>{$produto["nome"]}</h1>");
			
			echo("<img src='../{$produto['imagem']}' /><br />");
			echo("<p><strong>Descrição:</strong> {$produto['descricao']}</p>");
			echo("<p><strong>Preço:<strong> {$produto['preco']}</p>");

			if (isset($_COOKIE["cookie1"])) {
				echo "<h2>4 últimos acessos</h2>";
				$historico = json_decode($_COOKIE["cookie1"], true);
				$lasts = array_reverse(array_slice($historico, -4, 4));

				foreach ($lasts as $produto) {
					echo "({$produto['data']}) {$produto['nome']}<br />";
				}
			}
		?>
	</body>
</html>