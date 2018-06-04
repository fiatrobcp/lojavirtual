	<?php

	include ('config.php');
	include ('remover_acentos.php');
	require('verifica.php');
	?>
	<!-- Funcao Java Script para o CEP-->
<script type="text/javascript" >
        function limpa_formulário_cep() 
        {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
           
        }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                //document.getElementById('numero').value="";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/unicode/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
</script>
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
    			<div class="conteudo-1">
					<div class="conteudo-center-970">
						<form class="formulario-footer-padrao-3" method="post" action="#">
							<input type="hidden" name="email">
							<input type="text" name="nome" placeholder="NOME" required="required" id ="nome">
							<input type="text" name="sbnome" placeholder="SOBRENOME" required="required" id ="sbnome">
							<input type="text" name="telefone" placeholder="TELEFONE">
							<input type="text" name="cep" placeholder="CEP" required="required" maxlength="9" onblur="pesquisacep(this.value);">
							<input type="text" name="uf" placeholder="UF" required="required" id ="uf">
							<input type="text" name="cidade" placeholder="Cidade" required="required" id ="cidade">
							<input type="text" name="bairro" placeholder="Bairro" required="required" id ="bairro">
							<input type="text" name="rua" placeholder="RUA" required="required" id ="rua">
							<input type="text" name="numero" placeholder="Numero" required="required" id ="numero">							
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
        if ($_SESSION["UsuarioNivel"] != "ADM") echo "<script>alert('Você não é Administrador!');top.location.href='index.php';</script>"; 
		if(@$_REQUEST['botao'] == "Salvar")
		{
			$nome = @$_POST['nome'];
			$nome = removeAcentos($nome);
			$sbnome = @$_POST['sbnome'];
			$sbnome = removeAcentos($sbnome);
			$fone = @$_POST['telefone'];
			$cep = @$_POST['cep'];
			$rua = @$_POST['rua'];
			$rua = removeAcentos($rua);
			$numero = @$_POST['numero'];
			$bairro = @$_POST['bairro'];
			$bairro = removeAcentos($bairro);
			$cidade = @$_POST['cidade'];
			$cidade = removeAcentos($cidade);
			$uf = @$_POST['uf'];
		
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