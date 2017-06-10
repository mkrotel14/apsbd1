<?php
    include 'inc/funcoes.php';
       $estado = selectIdEstado($_POST["idestado"]);     
?>
<html>
    <head>
        <title>Cadastro de Estado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Estado" action="inc/funcoes.php" method="POST" onsubmit="return validaEstado()">
            <table>
                <tr>
                    <td> UF:</td>
                    <td><input type="text" id="uf" name="uf" size="2" value="<?=$estado['uf']?>"/></td>
                </tr>
                <tr>
                    <td>Nome do Estado:</td>
                    <td><input type="text" id="nomeestado" name="nomeestado" value="<?=$estado['nomeestado']?>" size="25" /></td>
                </tr>
            </table>
            <br><br>
            <table>
                <tbody>
                    <tr>
                        <td><input type="hidden" name="acao" value="alterarEstado"/>
                            <input type="hidden" name="idestado" value="<?=$estado["idestado"]?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Atualizar Estado"/>
            <input type="reset" value="Limpar Dados"/><br><br>
            
        </form>        
    </body>
    <script src="js/campo_obrigatorio.js"></script>
</html>
			