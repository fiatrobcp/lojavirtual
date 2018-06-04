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
					<a class="seletor s1" href="http://localhost/lojavirtual/site/cadastrocliente.php">
						<div class="vetor-1"></div>
						<p>CADASTRO</p>
					</a>
					<a class="seletor s2" href="http://localhost/lojavirtual/site/cadastroproduto.php">
						<div class="vetor-2"></div>
						<p>CADASTRO DE PRODUTOS</p>
					</a>
					<a class="seletor s3" href="http://localhost/lojavirtual/site/estoque.php">
						<div class="vetor-3"></div>
						<p>ESTOQUE</p>
					</a>
					<a class="seletor s4" href="">
						<div class="vetor-4"></div>
						<p>PONTO DE VENDA</p>
					</a>
				</div>
			</div>
		</main>
		<footer>
			<div class="copy-sole">
        <div class="conteudo-center-970">
            <p class="c1">© 2018 |  DOM BOSCO | Todos os Direitos Reservados</p>
            <p class="c2"><b class="desenvolvido">Desenvolvido </b>by <i>Jeferson & Robson</i></a></p>
        </div>
		</div>
		</footer>	
			<script>
            $(document).ready(function () {
                $(".off").hide();
                $(".on").show();
                $('.seletor').click(function () {
                    var link = $(this).attr('href');
                    $('.on').hide().addClass('off').removeClass('on');
                    $(link).show().addClass('on');
                    $('.menu-lateral a').removeClass('n');
                    $(this).addClass('n');

                    return false;
                });
            });
	</script>
		<script>
            $(document).ready(function () {
                $(".off").hide();
                $(".on").show();
                $('.m-topo').click(function () {
                    var link = $(this).attr('href');
                    $('.on').hide().addClass('off').removeClass('on');
                    $(link).show().addClass('on');
                    $('.m-topo').removeClass('ativo');
                    $(this).addClass('ativo');
                    return false;
                });
            });
	</script>
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
<?php


if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='index.php';</script>"; 
?>
</html>