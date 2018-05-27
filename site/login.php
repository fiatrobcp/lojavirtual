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
	<body>
	<div class="div-login">
		<div class="engloba-login">
			<div class="conteudo-center-970">
				<form class="formulario-footer-padrao-4" method="post" action="#">
					<div class="logo-login"></div>
						<input type="hidden" name="email" class="input-login">
						<input type="text" name="login" placeholder="Username" required="required" id ="login"  class="input-login">
						<input type="password" name="senha" placeholder="Password" required="required" id ="senha"  class="input-login">				
						<div class="engloba-botoes-2">
							<button class="botao-login" type="submit" value="Login" name="botao">Login</button>
						</div>
					</form>
			</div>
		</div>
		</div>
	</body>
	<footer>
		<div class="copy-sole">
			<div class="conteudo-center-970">
				<p class="c1">© 2018 |  DOM BOSCO | Todos os Direitos Reservados</p>
				<p class="c2"><b class="desenvolvido">Desenvolvido </b>by <i>Jeferson & Robson</i></a></p>
			</div>
		</div>
	</footer>
	<?php
include ('config.php');
session_start(); // inicia a sessao	
if (@$_REQUEST['botao']=="Login")
{
	$login = $_POST['login'];
	$senha = md5($_POST['senha']);
	
	$query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
	$result = mysqli_query($con,$query);
	while ($coluna=mysqli_fetch_array($result)) 
	{
		$_SESSION["id_usuario"]= $coluna["id"]; 
		$_SESSION["nome_usuario"] = $coluna["login"]; 
		$_SESSION["UsuarioNivel"] = $coluna["nivel"];

		// caso queira direcionar para páginas diferentes
		$niv = $coluna['nivel'];
		if($niv == "USER"){ 
			header("Location: index.php"); 
			exit; 
		}
		
		if($niv == "ADM"){ 
			header("Location: index.php"); 
			exit; 
		}
		// ----------------------------------------------
	}
	
}
?>	
</html>