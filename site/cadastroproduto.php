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
	include ('remover_acentos.php');
    require('verifica.php');
    
    if (@$_REQUEST['id'] and !@$_REQUEST['botao'])
{
	$query = "
		SELECT * FROM produto WHERE id='{$_REQUEST['id']}'
	";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	//echo "<br> $query";	
	foreach( $row as $key => $value )
	{
		$_POST[$key] = $value;
	}
}
    ?>
    			<div class="conteudo-2 off">
				<div class="conteudo-center-970">
					<form class="formulario-footer-padrao-3" method="post" action="#">
						<input type="text" name="cdbarras" placeholder="CÓDIGO DE BARRAS" value="<?php echo @$_POST['cdbarras']; ?>" required="required" id ="cdbarras">
						<input type="text" name="nomeproduto" placeholder="NOME" value="<?php echo @$_POST['nomeproduto']; ?>" required="required" id ="nomeproduto">
						<input type="text" name="segmento" placeholder="SEGMENTO" value="<?php echo @$_POST['segmento']; ?>" required="required" id = "segmento">
                        <input type="text" name="categoria" placeholder="CATEGORIA" value="<?php echo @$_POST['categoria']; ?>" required="required" id ="categoria">
                        <input type="text" name="pccusto" placeholder="PREÇO DE CUSTO" value="<?php echo @$_POST['pccusto']; ?>" required="required" id ="pccusto">
                        <input type="text" name="mgvenda" placeholder="MARGEM DE VENDA %" value="<?php echo @$_POST['mgvenda']; ?>" id="mgvenda">
                        <input type="text" name="pcvenda" placeholder="PREÇO DE VENDA" value="<?php echo @$_POST['pcvenda']; ?>"  required="required" id="pcvenda">
                        <input type="text" name="estoque" placeholder="ESTOQUE" value="<?php echo @$_POST['estoque']; ?>" id="estoque">
                        <input type="text" name="dtcadastro" readonly  value="<?php echo date("d/m/Y"); ?>" id="dtcadastro">
                        
						<div class="vetor-seletor"></div>
						<input type="file" name="img" class="seletor-img">								
						<div class="engloba-botoes">
                        <input type="submit" name="botao" value="Salvar" >Salvar</button>
							<button>Cancelar</button>
						</div>
					</form>
				</div>
            </div>
</body>

<?php
include ('config.php');
if(@$_REQUEST['botao'] == "Salvar")
{
    $cdbarras = @$_POST['cdbarras'];
    $nomeproduto = @$_POST['nomeproduto'];
    $segmento = @$_POST['segmento'];
    $categoria = @$_POST['categoria'];
    $pccusto = @$_POST['pccusto'];
    $mgvenda = @$_POST['mgvenda'];
    $pcvenda = @$_POST['pcvenda'];
    $estoque = @$_POST['estoque'];
    $dtcadastro =@$_POST['dtcadastro'];

    // echo $nome;
    // echo $sbnome;
    // echo $fone;
    // echo $cep;
    // echo $rua;
    // echo $numero;
    // echo $bairro;
    // echo $cidade;
    // echo $uf;
    
$query= "INSERT INTO produto (cdbarras,nomeproduto,segmento,categoria,pccusto,mgvenda,pcvenda,estoque,dtcadastro)values('$cdbarras','$nomeproduto','$segmento','$categoria','$pccusto','$mgvenda','$pcvenda','$estoque','$dtcadastro')";
$result=mysqli_query($con,$query);




}

?>
</html>