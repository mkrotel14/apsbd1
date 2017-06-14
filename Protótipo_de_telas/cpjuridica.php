<?php
    include 'inc/funcoes.php';
    $banco = abrirBanco();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/pessoa.css">
        <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
        <title>Cadastro de Pessoa</title>
    </head>
    
    <body>
        <form name="juridico" action="cadjuridica.php" method="POST">
            Razao Social:
            <input type="text" name="razaosocial" value="" size="75" />
            Nome Fantasia:
            <input type="text" name="nomefantasia" value="" size="75" /><br><br>
            CNPJ:
            <input type="text" name="cnpj" value="" size="25" />
            Inscrição Estadual:
            <input type="text" name="inscrestad" value="" size="25" />
            <h3>Contato</h3>
            Telefone:
            <input type="text" name="telefone" size="20">
            E-mail:
            <input type="text" name="email" size="30"><br><br>
            <h3>Endereço de Cobrança</h3>
            Rua:
            <input type="text" name="logradouro" size="50" />
            CEP:
            <input type="text" name="cep" size="20" />
            Bairro:
            <input type="text" name="bairro" size="20" /><br><br>
            Cidade:
            <select name="cidade_idcidade" id="id_cidade">
                <option value="">Selecione a Cidade</option>
            </select><br><br> 
            <input type="hidden" name="pessoa_idpessoa"/>
            <input type="hidden" name="acao" value="inserirPJuridica"/>
            <input type="submit" value="Cadastrar Fornecedor">
            <input type="reset" value="Limpar Dados">
        </form>
        <form name="selPJuridica" action="selPJuridica.php" method="POST">
            <input type="submit" value="Buscar Fornecedores"/>
        </form>>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/sub_cidade.js"></script>
    </body>
</html>