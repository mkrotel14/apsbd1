<?php
    include 'inc/funcoes.php';
    $array_cidade = selectAllCidades();
?>

<html>
    <head>
        <title>Busca de Cidade</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3>Lista de Cidades</h3>
        <table border="1">
                <thead>
                    <tr>
                        <th>Nome da Cidade</th>
                        <th>Nome do Estado</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($array_cidade as $cidade) {
                    ?>

                    <tr>
                        <td><?=$cidade["nomecidade"]?></td>
                        <td><?=$cidade["nomeestado"]?></td>
                        <td>
                            <form name="alterar" action="altCidade.php" method="POST">
                                <input type="hidden" name="idcidade" value="<?=$cidade["idcidade"]?>"/>
                                <input type="submit" value="Editar" name="editar"/>
                            </form>
                        </td>
                        <td>
                            <form name="excluir" action="inc/funcoes.php" method="POST">
                                <input type="hidden" name="idcidade" value="<?=$cidade["idcidade"]?>"/>
                                <input type="hidden" name="acao" value="excluirCidade"/>
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