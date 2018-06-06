<html>
	<head>
	  <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
	  <link rel="icon" href="favicon/favicon.png" />
	  <link rel="stylesheet" href="css/index.css">
	  <link rel="stylesheet" href="css/boot.css">
	  <link rel="stylesheet" href="css/fonts.css"> 
	  <script src="js/jquery.js"></script>  
	</head>
	<?php

	include ('config.php');
	require('verifica.php');
	?>
	<body>
		<?php include 'header.php'?>
		<main>
			<div class="menu-index">
				<div class="menu-lateral">
					<a class="seletor s1" href="./cadastrocliente.php">
						<div class="vetor-1"></div>
						<p>CADASTRO</p>
					</a>
					<a class="seletor s2" href="./cadastroproduto.php">
						<div class="vetor-2"></div>
						<p>CADASTRO DE PRODUTOS</p>
					</a>
					<a class="seletor s3" href="./estoque.php">
						<div class="vetor-3"></div>
						<p>ESTOQUE</p>
					</a>
					<a class="seletor s4" href="./logout.php">
						<div class="vetor-4"></div>
						<p>LOGOUT</p>
					</a>
				</div>
			</div>
		</main>
			<?php include 'footer.php'?>
	       <script>
            $(window).ready(function () {
                $(".botao-menu").click(function () {
                    $(".div-paginas").slideToggle();
                });
                if (screen.width <= 990) {
                    $(".div-paginas a").click(function () {
                        $(".div-paginas").slideToggle();
                    });
                }
            });
        </script>
	</body>
</html>