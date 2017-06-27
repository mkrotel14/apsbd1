<?php
    include 'inc/funcoes.php';
      $local = selectIdSecao($_POST["idlocalproduto"]);     
?>
<html>
    <head>
        <title>Cadastro de Estado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Secao" action="inc/funcoes.php" method="POST" onsubmit="return validaSecao()">
            <table>
                <tr>
                    <td>Nome da Seção(Letra - Letra)ou(Numero - Numero):</td>
                    <td><input type="text" id="secao" name="secaoproduto" size="20" value="<?= utf8_encode($local['secaoproduto']);?>"/></td>
                </tr>
            </table>
            <br><br>
            <table>
                <tbody>
                    <tr>
                        <td><input type="hidden" name="acao" value="alterarSecao"/>
                            <input type="hidden" name="idlocalproduto" value="<?=$local["idlocalproduto"]?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Atualizar Seção"/>
            <input type="reset" value="Limpar Dados"/><br><br>
            
        </form>  
        <script src="js/campo_obrigatorio.js"></script>
    </body>
</html>