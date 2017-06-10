<?php
include 'inc/funcoes.php';
$banco = abrirBanco();
?>
<html>
    <head>
        <title>Cadastro de Cidade</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Cidade" action="inc/funcoes.php" method="POST">
            Nome da Cidade:
            <input type="text" name="nomecidade" size="30" />
            UF:
            <select name="estado_idestado">
                <option value="">Selecione</option>
                <?php
                $sql = "SELECT * FROM estado ORDER BY nomeestado";
                $resultado = $banco->query($sql);
                while($row_estados = $resultado->fetch_array()){ 
                ?>
                <option value="<?=$row_estados['idestado']?>"><?=$row_estados['nomeestado']?></option>
                <?php
                }
                ?>
            </select><br><br>
            <input type="hidden" name="acao" value="inserirCidade"/>
            <input type="submit" value="Cadastrar Cidade">
            <input type="reset" value="Limpar Dados">
        </form>
    </body>
</html>
			