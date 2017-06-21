<?php
    include 'inc/funcoes.php';
    $array_secao = selectAllSecao();
?>

<html>
    <head>
        <title>Busca de Seções</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3>Lista de Seções</h3>
        <table border="1">
                <thead>
                    <tr>
                        <th>Nome da Seção</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($array_secao as $local) {
                    ?>
                    
                    <tr>
                        <td><?=$local["secaoproduto"]?></td>
                        <td>
                            <form name="alterar" action="altSecao.php" method="POST">
                                <input type="hidden" name="idlocalproduto" value=<?=$local["idlocalproduto"]?>/>
                                <input type="submit" value="Editar" name="editar"/>
                            </form>
                        </td>
                        <td>
                            <form name="excluir" action="inc/funcoes.php" method="POST">
                                <input type="hidden" name="idlocalproduto" value="<?=$local["idlocalproduto"]?>"/>
                                <input type="hidden" name="acao" value="excluirSecao"/>
                                <input type="submit" value="Excluir" name="excluir"/>
                            </form>
                        </td>
                    </tr>
                    <?php                   
                    }
                    ?>
                </tbody>
            </table>
        <form name="voltar" action="home.html" method="POST"><br>
            <input type="submit" value="Voltar"/>
        </form>
    </body>
</html>