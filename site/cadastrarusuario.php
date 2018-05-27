<html>
<body>
<?php
include ('config.php');
require('verifica.php');

if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='menu.php';</script>"; 


$id = @$_REQUEST['id'];

if (@$_REQUEST['botao'] == "Excluir") {
		$query_excluir = "
			DELETE FROM usuario WHERE id='$id'
		";
		$result_excluir = mysqli_query($con,$query_excluir);
		
		if ($result_excluir) echo "<h2> Registro excluido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui excluir!!!</h2>";

		echo "Excluir - $query_excluir";
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
	if (!$_REQUEST['id'])
	{
		$senha = md5($_POST['senha']);
		$insere = "INSERT into usuario (login, senha,nivel) VALUES ('{$_POST['login']}', '$senha', '{$_POST['nivel']}')";
		$result_insere = mysqli_query($con,$insere);
		
		if ($result_insere) echo "<h2> Registro inserido com sucesso!!!</h2>";
		else echo "<h2> Nao consegui inserir!!!</h2>";
		
		echo "Usuario inserido";
	} else 	
	{
		$insere = "UPDATE usuario SET 
					login = '{$_POST['login']}'
					, senha = '$senha'
					, nivel = '{$_POST['nivel']}'
					
					WHERE id = '{$_REQUEST['id']}'
				";
		$result_update = mysqli_query($con,$insere);

		if ($result_update) echo "<h2> Registro atualizado com sucesso!!!</h2>";
		else echo "<h2> Nao consegui atualizar!!!</h2>";
		
		echo "Atualizado";
	}
}
?>

<form action="cadastrarusuario.php" method="post" name="cadastrar">
<table width="200" border="1">
  <tr>
    <td colspan="2">Cadastro de Usuario</td>
  </tr>
  <tr>
    <td width="53">Cod.</td>
    <td width="131"><?php echo @$_POST['id']; ?>&nbsp;
  </tr>
  <tr>
    <td>Login:</td>
    <td><input type="text" name="login" value="<?php echo @$_POST['login']; ?>"></td>
  </tr>
  <tr>
    <td>Senha:</td>
    <td><input type="text" name="senha" value="<?php echo @$_POST['senha']; ?>"></td>
  </tr>
  <tr>
    <td>Nivel:</td>
    <td><input type="text" name="nivel" value="<?php echo @$_POST['nivel']; ?>"></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input type="submit" value="Gravar" name="botao"> - <input type="submit" value="Excluir" name="botao">
    -
    <button onclick="javascript:window.location.href='menu.php">Voltar</button>
    <input type="reset" value="Novo" name="novo"> 	<input type="hidden" name="id" value="<?php echo @$_REQUEST['id'] ?>"
    <a href= menu.php />

    
</td>
    </tr>	
</table>
</form>


</body>
</html>

