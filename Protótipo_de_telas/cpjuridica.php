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
        <form name="Juridica" action="inc/funcoes.php" method="POST" onsubmit="return validaPJuridica()">
            Razao Social:
            <input type="text" name="razaosocial" id="razaosocial" value="" size="75" />
            Nome Fantasia:
            <input type="text" name="nomefantasia" id="nomefantasia" value="" size="75" /><br><br>
            CNPJ:
            <input type="text" name="cnpj" value="" id="cnpj" size="25" />
            Inscrição Estadual:
            <input type="text" name="inscrestad" id="inscrestad" value="" size="25" />
            <h3>Contato</h3>
            Telefone:
            <input type="text" name="telefone" id="telefone" size="20">
            E-mail:
            <input type="text" name="email" id="email" size="30"><br><br>
            <h3>Endereço de Cobrança</h3>
            Rua:
            <input type="text" name="logradouro" id="logradouro" size="50" />
            CEP:
            <input type="text" name="cep" id="cep" size="20" />
            Bairro:
            <input type="text" name="bairro" id="bairro" size="20" />
            Número:
            <input type="text" name="numero" id="numero" size="10"/><br><br>
            Complemento:
            <input type="text" name="complemento" size="15"/>
            Cidade:
            <select name="cidade_idcidade" id="id_cidade">
                <option value="">Selecione a Cidade</option>
                <?php
                    $sql = "SELECT * FROM cidade ORDER BY nomecidade";
                    $resultado_cidade = $banco->query($sql);
                    while($row_cidades = mysqli_fetch_assoc($resultado_cidade)){ 
                        echo '<option value="'.$row_cidades['idcidade'].'">'.$row_cidades['nomecidade'].'</option>';
                    }
                ?>
            </select><br><br> 
            <input type="hidden" name="acao" value="inserirPJuridica"/>
            <input type="submit" value="Cadastrar Pessoa">
            <input type="reset" value="Limpar Dados">
        </form>
        <script src="js/campo_obrigatorio.js"></script>
    </body>
</html>