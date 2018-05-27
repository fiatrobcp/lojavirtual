<hmtl>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    
    <style rel="stylesheet" type="text/css">
    @import url("main.css");
  </style>
</head>
<body>
<div class="container">
<form method="post" action="#">
<div class="row">
    <div class="col-25">
        <label>Codigo de Barras:</label>
    </div>
    <div class="col-75">    
            <input name="cdbarras" type="text" id ="cdbarras"  placeholder="CODIGO DE BARRAS"/>
        </label><br/>
    </div>
</div>
 <div class="row">
     <div class="col-25">   
        <label>Descrição do Produto:
    </div>
    <div class="col-75">       
        <input name="descprod" type="text" id ="descprod" placeholder="DESCRIÇÃO DO PRODUTO" />
    </label><br/>
    </div>
</div>
        <label>Segmento:
        <input name="segmento" type="text" id ="segmento"  placeholder="SEGMENTO DO PRODUTO"/>
        </label><br/>
        
        <label>Categoria:
        <input name="categoria" type="text" id="categoria" placeholder="CATEGORIA DO PRODUTO" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />
        <label>Preco de custo:
        <input name="pccusto" type="text" id="pccusto" placeholder="Preco de Custo"/></label><br />
        <label>Margem de Venda:
        <input name="mgvenda" type="text" id="mgvenda" placeholder="Margem de Venda"/></label><br />
        <label>Preco de Venda:
        <input name="pcvenda" type="text" id="pcvenda" placeholder="Preco de Venda" /></label><br />
        <label>Estoque:
        <input name="estoque" type="text" id="estoque" placeholder="Estoque" /></label><br />
        <label>Fornecedor:
        <input name="fornecedor" type="text" id="fornecedor" size="2" /></label><br />
        <label>Data da compra:
        <input name="dtcompra" type="text" id="dtcompra" size="2" /></label><br />
        <input name="botao" type="submit" value="Salvar"></label><br />
        <input name="botao" type="submit" value="Cancelar"></label><br />
      </form>
</div>

</body>
<!-- começa o php !-->
<?php
include ('config.php');
if(@$_REQUEST['botao'] == "Salvar")
{
    $cdbarras = @$_POST['cdbarras'];
    $descprod = @$_POST['descprod'];
    $segmento = @$_POST['segmento'];
    $categoria = @$_POST['categoria'];
    $pccusto = @$_POST['pccusto'];
    $mgvenda = @$_POST['mgvenda'];
    $pcvenda = @$_POST['pcvenda'];
    $estoque = @$_POST['estoque'];
    $fornecedor = @$_POST['fornecedor'];
    $dtcompra =@$_POST['dtcompra'];

    // echo $nome;
    // echo $sbnome;
    // echo $fone;
    // echo $cep;
    // echo $rua;
    // echo $numero;
    // echo $bairro;
    // echo $cidade;
    // echo $uf;
    
$query= "INSERT INTO cliente (nome,sobrenome,fone,cep,rua,numero,bairro,cidade,uf) values('$nome','$sbnome','$fone','$cep','$rua','$numero','$bairro','$cidade','$uf')";
$result=mysqli_query($con,$query);

}

?>
<!-- fim do php !-->
</html>