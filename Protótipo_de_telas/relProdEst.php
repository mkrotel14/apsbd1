<?php
    include 'inc/funcoes.php';
?>

<html>
    <head>
        <title>Relatório de Produto por Estado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Produto" action="inc/funcoes.php" method="POST" />
        <table>
            <tr>
                <td>Nome do Estado:</td>
                <td><input type="text" name="nomeestado" size="60" /></td>    
            </tr>          
        </table><br>
            <input type="hidden" name="acao" value="relProduto"/>
            <input type="submit" value="Buscar Produto"/>         
        </form>
    </body>
</html>