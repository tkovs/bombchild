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

	    <meta charset="utf-8" />
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>

	<body class="info-boxed">
		<nav class="navbar navbar-default bg_cor mb0">
			<a class="navbar-brand "><div class="textTitle"><img src="../img/icon.png" width="30">BombChild</div></a>
			
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="../index.php">Home</a></li>
						<li><a href="produtos.php">Produtos</a></li>
						<li><a href="historico.php">Histórico</a></li>
					</ul>
				</div>
			</div>  
		</nav>
		<?php
			if (!isset($_COOKIE["history"])) {
				$historico[] = array('id' => $produto["id"], 'nome' => $produto["nome"], 'data' => date("Y-m-d H:i:s"));
			} else {
				$historico = $_COOKIE["history"];
				$historico = json_decode($historico, true);
				$historico[] = array('id' => $produto["id"], 'nome' => $produto["nome"], 'data' => date("Y-m-d H:i:s"));
			}

			setcookie("history", json_encode($historico), time()+60*60*24*30, '/');

			echo("<h1>{$produto["nome"]}</h1>");
			
			echo("<img style='display: block; margin: 0 auto;' src='../{$produto['imagem']}' /><br />");
			echo("<p><strong>Descrição:</strong> {$produto['descricao']}</p>");
			echo("<p><strong>Preço:<strong> {$produto['preco']}</p>");
		?>
		
		<div class="texto">
			<div align="center">
				<?php
					if (isset($_COOKIE["history"])) {
						echo "<h2>4 últimos acessos</h2>";
						$historico = json_decode($_COOKIE["history"], true);
						$lasts = array_reverse(array_slice($historico, -4, 4));
						echo("<ul>");
						foreach ($lasts as $produto) {
							echo "<li>({$produto['data']}) <a href='paginaproduto.php?id={$produto['id']}'>{$produto['nome']}</a></li>";
						}
						echo("</ul>");
					}
				?>
			</div>
		</div>
		
		<footer position=center>
			BombChild 2016</br>
		    Ifal - Arapiraca
		</footer>
	</body>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>