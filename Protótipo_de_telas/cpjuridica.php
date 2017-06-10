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
            <input type="text" name="Primeiro Nome" value="" size="75" />
            Nome Fantasia:
            <input type="text" name="RG" value="" size="75" /><br><br>
            CNPJ:
            <input type="text" name="CPF" value="" size="25" />
            Inscrição Estadual:
            <input type="text" name="Data Nsc" value="" size="25" />
            <h3>Contato</h3>
            Telefone:
            <input type="text" name="contato" size="20">
            E-mail:
            <input type="text" name="contao" size="30"><br><br>
            <h3>Endereço de Cobrança</h3>
            Rua:
            <input type="text" name="endereco" size="50" />
            CEP:
            <input type="text" name="endereco" size="20" />
            Bairro:
            <input type="text" name="endereco" size="20" /><br><br>
            Cidade:
            <select name="cidades">
                <option value="" size="30"></option>
            </select>
            Estado:
            <select name="estados">
                <option value="" size="7"></option>
            </select> <br><br>
            <input type="submit" value="Cadastrar Pessoa" name="cad" />
            <input type="reset" value="Limpar Dados" name="limpar" />
        </form>
    </body>
</html>