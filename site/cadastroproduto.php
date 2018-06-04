<?php

include ('config.php');
include ('remover_acentos.php');
//include('upload.php');
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
    <?php include 'header.php'?>
    <main>
        <?php include 'menu-lateral.php'?>
        <div class="conteudo-2">
            <div class="conteudo-center-970">
            <form class="formulario-footer-padrao-3" method="post" action="#" enctype="multipart/form-data">
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
                    <input type="file" name="fileToUpload" id="fileToUpload" required="required">								
                    <div class="engloba-botoes">
                    <button type="submit" name="botao" value="Salvar" >Salvar</button>
                        <button>Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?php
include ('config.php');
    
if(@$_REQUEST['botao'] == "Salvar")
{
    
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists(@$target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if (@$_FILES["fileToUpload"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if(@$imageFileType != "jpg" && @$imageFileType != "png" && @$imageFileType != "jpeg"
    && @$imageFileType != "gif" ) {
       ?> <script>
        alert('Desculpe, somente, JPG,JPEG,PNG e GIF são aceitos');
        </script>
        
        <?php
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        ?>
        <script>
        alert('Desculpe, seu arquivo não foi salvo');
        </script>
        <?php
        //echo "Sorry, your file was not uploaded.";
    
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $cdbarras = @$_POST['cdbarras'];
            $nomeproduto = @$_POST['nomeproduto'];
            $segmento = @$_POST['segmento'];
            $categoria = @$_POST['categoria'];
            $pccusto = @$_POST['pccusto'];
            $mgvenda = @$_POST['mgvenda'];
            $pcvenda = @$_POST['pcvenda'];
            $estoque = @$_POST['estoque'];
            $dtcadastro =@$_POST['dtcadastro'];
            $lastupdate = $_SESSION["nome_usuario"];
            $file_name = basename( $_FILES["fileToUpload"]["name"]);
            //$id = $_REQUEST['id'];
        
            // echo $nome;
            // echo $sbnome;
            // echo $fone;
            // echo $cep;
            // echo $rua;
            // echo $numero;
            // echo $bairro;
            // echo $cidade;
            // echo $uf;
            //echo $file_name;
            
            $query= "INSERT INTO produto (cdbarras,nomeproduto,segmento,categoria,pccusto,mgvenda,pcvenda,estoque,dtcadastro,filename,lastupdate)values('$cdbarras','$nomeproduto','$segmento','$categoria','$pccusto','$mgvenda','$pcvenda','$estoque','$dtcadastro','$file_name','$lastupdate')";
            /*$query = "UPDATE produto 
            SET 
            cdbarras='$cdbarras', 
            nomeproduto='$nomeproduto', 
            segmento ='$segmento',
            categoria='$categoria',
            pccusto=$pccusto,
            mgvenda='$mgvenda',
            pcvenda=$pcvenda,
            estoque=$estoque,
            filename='$file_name',
            lastupdate='$lastupdate' 
            where id=$id";
            //echo $query;*/
            $result=mysqli_query($con,$query);
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            ?>
            <script>
            alert('Produto adicionado com sucesso!');
            window.location.href ="estoque.php";
            </script>
            <?php
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


}


?>