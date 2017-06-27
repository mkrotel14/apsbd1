<?php
    include 'inc/funcoes.php';
    $banco = abrirBanco();
?>

<html>
    <head>
        <title>Relatório de Compra por Funcionário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Produto" action="inc/funcoes.php" method="POST" />
        <table>
            <tr>
                <td>Funcionário:</td>
                <td><select name="nome">
                <option value="">Selecione o Funcionário</option>
                <?php
                    $sql = "SELECT * FROM pessoa P, fisica F, funcionario FU WHERE P.idpessoa = F.pessoa_idpessoa AND F.idfisica = FU.fisica_idfisica";
                    $resultado_func = $banco->query($sql);
                    while($row_func = mysqli_fetch_assoc($resultado_func)){ 
                        echo '<option value="'.$row_func['idfisica'].'">'.$row_func['nome'].'</option>';
                    }
                ?>
                    </select></td></tr>         
        </table><br>
            <input type="hidden" name="acao" value="relCompraF"/>
            <input type="submit" value="Buscar Compras Realizadas"/>         
        </form>
    </body>
</html>

