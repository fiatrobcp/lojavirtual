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
<?php
include ('config.php');
require('verifica.php');

if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='menu.php';</script>"; 


$id = @$_REQUEST['id'];

if (@$_REQUEST['botao'] == "Excluir") {
		$query_excluir = "
			DELETE FROM usuario WHERE login= '{$_POST['login']}'
		";
		$result_excluir = mysqli_query($con,$query_excluir);
		
		if ($result_excluir) echo "<script>alert('Registro excluido com sucesso!!!');</script>";
		else echo "<script>alert('Nao consegui excluir!!!');</script>";

		"Excluir - $query_excluir";
}

if (@$_REQUEST['id'] and !@$_REQUEST['botao'])
{
	$query = "
		SELECT * FROM usuario WHERE id='{$_REQUEST['id']}'
	";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	//echo "<br> $query";	
	foreach( $row as $key => $value )
	{
		$_POST[$key] = $value;
	}
}

if (@$_REQUEST['botao'] == "Gravar") 
{
	if (@!$_REQUEST['id'])
		
		{
		$nivel = $_POST['nivel'];
		$senha = md5($_POST['senha']);
		$insere = "INSERT into usuario (login, senha,nivel) VALUES ('{$_POST['login']}', '$senha', '{$_POST['nivel']}')";
		$result_insere = mysqli_query($con,$insere);
		
		if ($result_insere) echo "<script>alert('Registro inserido com sucesso!!!');</script>";
		else echo "<script>alert('Nao consegui inserir!!!');</script>";
		
		echo "<script>alert('Usuario inserido');</script>";
	} else 	
	{
		$insere = "UPDATE usuario SET 
					login = '{$_POST['login']}'
					, senha = '$senha'
					, nivel = '{$_POST['nivel']}'
					
					WHERE id = '{$_REQUEST['id']}'
				";
		$result_update = mysqli_query($con,$insere);

		if ($result_update) echo "<script>alert('Registro atualizado com sucesso!!!');</script>";
		else echo "<script>alert('Nao consegui atualizar!!!');</script>";
		
		echo "<script>alert('Atualizado');</script>";
	}
}
?>
		<div class="cadastro-user">
			<div class="conteudo-center-970">
				<form action="cadastrarusuario.php" method="post" name="cadastrar"  class="formulario-footer-padrao-4">
					<div class="logo-login"></div>
					<input type="text" name="login" value="<?php echo @$_POST['login']; ?>" placeholder="Login"  class="input-login">
					<input type="password" name="senha" value="<?php echo @$_POST['senha']; ?>" placeholder="Senha"  class="input-login">
					
					<select name="nivel"  style="float:left;width:90%;margin: 0 16px 18px 5%;">
							<option value="ADM">ADM</option> 
							<option value="USER" selected>USER</option>
					</select>
					<button type="submit" value="Gravar" name="botao">Gravar</button>
					<button type="submit" value="Excluir" name="botao">Excluir</button>
				</form>
			</div>
		</div>

</body>
</html>

