<?php
    include 'inc/funcoes.php';
    $categoria = selectIdCategoria($_POST["idcategoriaproduto"]);
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
            <table>
                <tr>
                    <td>Nome da Categoria:</td>
                    <td><input type="text" id="categoria" name="nomecategoria" size="25" value="<?=$categoria['nomecategoria']?>"/></td>
                </tr>
                <tr>
                    <td>Descrição da Categoria (máx. 200 caracteres):</td>
                    <td><textarea cols="50" rows="4" maxlength="200" name="descricaocategoria"><?=$categoria['descricaocategoria']?></textarea></td>
                </tr>
            </table>
            <br><br>
            <table>
                <tbody>
                    <tr>
                        <td><input type="hidden" name="acao" value="alterarCategoria"/>
                            <input type="hidden" name="idcategoriaproduto" value="<?=$categoria["idcategoriaproduto"]?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Atualizar Categoria"/>
            <input type="reset" value="Limpar Dados"/>
        </form>
    </body>
    <script src="js/campo_obrigatorio.js"></script>
</html>