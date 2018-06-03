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
<!-- <div class="conteudo-3 off">
			<table class="table-estoque">
  <tr>
	<th>Imagem</th>
    <th>Código de Barras</th>
    <th>Nome</th>
    <th>Preço</th>
	<th>Quantidade em estoque</th>
  </tr>
    <tr>
	<td class="img-produto"></td>
    <td><p>01</p></td>
    <td><p>IPHONE</p></td>
    <td><p>smartphone</p></td>
	<td><p>30</p></td>
  </tr>
</table>

            </div> -->




<?php //if (@$_REQUEST['botao'] == "Gerar") { ?>

<div class="conteudo-3 off">
			<table >
<tr class="table-estoque">
    
	<th>ID</th>
    <th>Código de Barras</th>
    <th>Nome</th>
    <th>Preço</th>
    <th>Quantidade em estoque</th>
    <th></th>
  </tr>
<?php

	
	
	$query = "SELECT *
			  FROM produto 
			  WHERE id > 0 ";
	//$query .= ($login ? " AND login LIKE '%$login%' " : "");
	//$query .= ($nivel ? " AND nivel = '$nivel' " : "");
	//$query .= " ORDER by id";
	$result = mysqli_query($con,$query);

/*	
	echo "<pre>";
	echo $query;
	echo mysql_error();
	echo "</pre>";
*/
    
	while ($coluna=mysqli_fetch_array($result)) 
	{
		
	?>
    
    <tr class="img-produto">
      
      <th width="5%"><?php echo $coluna['id']; ?></th>
      <th width="30%"><?php echo $coluna['cdbarras']; ?></th>
      <th width="15%"><?php echo $coluna['nomeproduto']; ?></th>
      <th width="12%"><?php echo $coluna['pcvenda']; ?></th>
      <th width="12%"><?php echo $coluna['estoque']; ?></th>
    <td>
        <a 
            href="atualizaproduto.php?pag=atualizar&id=<?php echo $coluna['id']; ?>"
            >editar</a>
        </td>

    </tr>

    <?php
	
	} // fim while
?>
</table>
<?php	
//}
?>

</body>
</hmtl>