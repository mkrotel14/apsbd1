<?php
    include 'inc/funcoes.php';
?>
<html>
    <head>
        <title>Cadastro de Categoria</title>
        <link rel="stylesheet" type="text/css" href="css/corpo.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Categoria" action="inc/funcoes.php" method="POST" onsubmit="return validaCategoria()">
            Nome da Categoria:
            <input type="text" id="categoria" name="categ" size="25"/><br><br>
            Descrição da Categoria (máx. 200 caracteres):<br>
            <textarea cols="50" rows="4" maxlength="200" name="desc"></textarea><br><br>
            <input type="hidden" name="acao" value="inserirCategoria"/>
            <input type="submit" value="Cadastrar Categoria"/>
            <input type="reset" value="Limpar Dados"/>
        </form>
        <form name="acao" action="selCategoria.php" method="POST">
            <input type="submit" value="Buscar Categorias"/>
        </form> 
    </body>
    <script src="js/campo_obrigatorio.js"></script>
</html>
			