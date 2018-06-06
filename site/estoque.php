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
?>
<?php //if (@$_REQUEST['botao'] == "Gerar") { ?>
	<body>
		<?php include 'header.php'?>
		<main>
			<?php include 'menu-lateral.php'?>
			
			<div class="conteudo-3 off">
			<div class="engloba-input-estoque">
				<div class="conteudo-center-970">
					<form action="estoque.php?botao=gerar" method="post" name="form1" class="formulario-footer-padrao-3">
						<div class="titulo-input"><p>Código de barras:</p></div>
						<input type="text" name="cdbarras"/>
						<div class="titulo-input"><p>Nome:</p></div>
						<input type="text" name="nomeproduto"/>
						<button type="submit" name="botao" value="Gerar" >Gerar</button>
			</form>
				<table  class="table-estoque">
					<tr>
						<th>ID</th>
						<th>Código de Barras</th>
						<th>Nome</th>
						<th>Preço</th>
						<th>Quantidade em estoque</th>
						<th>Imagem</th>
						<th></th>
					</tr>
				</div>
			</div>
			</div>
<?php

if (@$_REQUEST['botao'] == "Gerar") {
	$cdbarras = @$_POST['cdbarras'];
	$nomeproduto = @$_POST['nomeproduto'];
	$query = "SELECT *
			  FROM produto 
			  WHERE id > 0 ";
	$query .= ($cdbarras ? " AND cdbarras LIKE '%$cdbarras%' " : "");
	$query .= ($nomeproduto ? " AND nomeproduto LIKE '%$nomeproduto%' " : "");
	$query .= " ORDER by id";
	$result = mysqli_query($con,$query);
	
	//echo $query;

/*	
	echo "<pre>";
	echo $query;
	echo mysql_error();
	echo "</pre>";
*/
    
	while ($coluna=mysqli_fetch_array($result)) 
	{
		
	?>
   

    <tr>
      <td width="1%"><?php echo $coluna['id']; ?></td>
      <td width="1%"><?php echo $coluna['cdbarras']; ?></td>
      <td width="1%"><?php echo $coluna['nomeproduto']; ?></td>
      <td width="1%"><?php echo $coluna['pcvenda']; ?></td>
      <td width="1%"><?php echo $coluna['estoque']; ?></td>
	   <td width="1%"><img src="./uploads/<?php echo $coluna['filename']; ?>" class="img-up"></td>
	  <td width="1%"><a href="atualizaproduto.php?&id=<?php echo $coluna['id']; ?>"><button class="botao-editar">EDITAR</button></a></td>	  
    </tr>
	

    <?php
	
	} // fim while
?>
				</table>
<?php	
}
?>
		</main>
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