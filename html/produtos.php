<!DOCTYPE html>

<html>
    <head>
		<?php
			session_start();
		?>

	    <meta charset="utf-8">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<title>Lista de produtos</title>
	</head>

	<body class="info-boxed">
		<nav class="navbar navbar-default bg_cor mb0">
		<a class="navbar-brand "><class="textTitle"><img src="../img/icon.png" width="30"> BombChild</class></a>
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="../index.php">Home</a></li>
						<li><a href="#">Produtos</a></li>
						<li><a href="historico.php">Histórico</a></li>
					</ul>
				</div>
			</div>  
		</nav>


		<h1> Produtos </h1>

		<table width="800" border="1" align="center">
			<?php
				foreach ($_SESSION["produtos"] as $produto) {
					echo("<tr>");
					echo("<td align='center'><a href='paginaproduto.php?id={$produto['id']}'><img src='../{$produto['imagem']}' width='200' height='200' /></a></td>");
					echo("<td align='center' valign='middle'>Nome: {$produto['nome']}<br />Preço: {$produto['preco']}</td>");
					echo("</tr>");
				}
			?>
		</table>
		
		<div class="texto">
			<div align="center">
				<?php
					if (isset($_COOKIE["history"])) {
						echo "<h2>4 últimos acessos</h2>";
						$historico = json_decode($_COOKIE["history"], true);
						$lasts = array_reverse(array_slice($historico, -4, 4));
						echo("<ul>");
						foreach ($lasts as $produto) {
							echo "<li>({$produto['data']}) <a href='paginaproduto?id={$produto['id']}'>{$produto['nome']}</a></li>";
						}
						echo("</ul>");
					}
				?>
			</div>
		</div>

		<footer position=center>
		BombChild 2016</br>
	    Ifal - Arapiraca</br>
		</footer>
	</body>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>