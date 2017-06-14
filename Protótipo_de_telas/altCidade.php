<?php
    include 'inc/funcoes.php';
       $cidade = selectIdCidade($_POST["idcidade"]);
       $banco = abrirBanco();
?>
<html>
    <head>
        <title>Cadastro de Cidade</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Cidade" action="inc/funcoes.php" method="POST" onsubmit="return validaCidade()">
            <table>
                <tr>
                    <td>Nome da Cidade:</td>
                    <td><input type="text" id="nomecidade" name="nomecidade" size="25" value="<?=$cidade['nomecidade']?>"/></td>
                </tr>
                <tr>
                    <td>UF:</td>
                    <td><select name="estado_idestado" id="id_estado">
                        <option value="">Selecione o Estado</option>
                        <?php
                            $sql = "SELECT * FROM estado ORDER BY nomeestado";
                            $resultado = $banco->query($sql);
                            while($row_estados = $resultado->fetch_array()){ 
                        ?>
                        <option value="<?=$row_estados['idestado']?>"><?=$row_estados['nomeestado']?></option>
                        <?php
                            }
                        ?>
                    </select></td>
                </tr>
            </table>
            <br><br>
            <table>
                <tbody>
                    <tr>
                        <td><input type="hidden" name="acao" value="alterarCidade"/>
                            <input type="hidden" name="idcidade" value="<?=$cidade["idcidade"]?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Atualizar Cidade"/>
            <input type="reset" value="Limpar Dados"/><br><br>
            
        </form>        
        <script src="js/campo_obrigatorio.js"></script>
    </body>
</html>
			