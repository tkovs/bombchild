<!DOCTYPE html>

<!DOCTYPE html>
<html>
    <head>
		<?php
			session_start();
		?>

	    <meta charset="UTF-8">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">

		<title>Histórico</title>
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
		
		<h1>Histórico</h1>

		<ul>
			<?php
				$historico = json_decode($_COOKIE["history"], true);
				echo ("<ul>");
				foreach ($historico as $produto) {
					echo "<li>({$produto['data']}) <a href='paginaproduto.php?id={$produto['id']}'>{$produto['nome']}</a></li>";
				}
				echo ("</ul>");

			?>
		</ul>

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
	    	Ifal - Arapiraca</br>
		</footer>
	</body>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>	
</html>