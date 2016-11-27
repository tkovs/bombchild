<!DOCTYPE html>

<html>
	<head>
		<?php
			session_start();
			$produtos = json_decode(file_get_contents("produtos.json"), true);
			$_SESSION["produtos"] = $produtos["produtos"];
		?>
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body class="info-boxed">
		<nav class="navbar navbar-default bg_cor mb0">
			<a class="navbar-brand "><div class="textTitle"><img src="img/icon.png" width="30"> BombChild</div></a>
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="sr-only">navbar-headergação de alternância</span>
						<span class="icon-bar"></span>          
						<span class="icon-bar"></span>          
						<span class="icon-bar"></span>          
					</button>
				</div>
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="#">Home</a></li>
						<li><a href="html/produtos.php">Produtos</a></li>
						<li><a href="html/historico.php">Histórico</a></li>
					</ul>
				</div>
			</div>  
		</nav>

		<div class="page-header">
			<h1> BombChild </h1>
		</div>

		<div class="texto">
			<div align="center">
				<img src="img/PSE-Archery-RDX.jpg">
				<p style="text-align: center">Entendendo a dificuldade que existe na hora de escolher o brinquedo ideal para a garotada, o BombChild resolveu deixar isso muito mais fácil em nossa loja virtual. Com uma grande variedade de brinquedos para meninos e meninas, nosso site oferece o que há de mais atual em brinquedos infantis.</p>

				<?php
					if (isset($_COOKIE["cookie1"])) {
						echo "<h2>4 últimos acessos</h2>";
						$historico = json_decode($_COOKIE["cookie1"], true);
						$lasts = array_reverse(array_slice($historico, -4, 4));
						echo("<ul>");
						foreach ($lasts as $produto) {
							echo "<li>({$produto['data']}) <a href='html/produto?id={$produto['id']}'>{$produto['nome']}</a></li>";
						}
						echo("</ul>");
					}
				?>
			</div>
		</div>

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
		
		<footer style="position:center;">
			BombChild 2016</br>
			Ifal - Arapiraca</br>
		</footer>
	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
</html>