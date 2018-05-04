<hmtl>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    
    <style rel="stylesheet" type="text/css">
    @import url("fontes.css");
  </style>
</head>
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
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

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


<!--Fim do Java Script -->

<body>
<div class="container">
<form method="post" action="#">
<div class="row">
    <div class="col-25">
        <label>Nome:</label>
    </div>
    <div class="col-75">    
            <input name="nome" type="text" id ="nome"  placeholder="NOME"/>
        </label><br/>
    </div>
</div>
 <div class="row">
     <div class="col-25">   
        <label>Sobrenome:
    </div>
    <div class="col-75">       
        <input name="sbnome" type="text" id ="sbnome" placeholder="SOBRENOME" />
    </label><br/>
    </div>
</div>
        <label>Telefone:
        <input name="fone" type="text" id ="fone"  placeholder="(xx) x xxxx-xxxx"/>
        </label><br/>
        
        <label>Cep:
        <input name="cep" type="text" id="cep" placeholder="CEP" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />
        <label>Rua:
        <input name="rua" type="text" id="rua"/></label><br />
        <label>Numero:
        <input name="numero" type="text" id="numero" placeholder="Numero"/></label><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" /></label><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" /></label><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2" /></label><br />
        <input name="botao" type="submit" value="Salvar"></label><br />
      </form>
</div>

</body>

</html>