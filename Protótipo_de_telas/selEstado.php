<?php
    include 'inc/funcoes.php';
    $array = selectAllEstados();
?>

<html>
    <head>
        <title>Busca de Estados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3>Lista de Estados</h3>
        <table border="1">
                <thead>
                    <tr>
                        <th>UF</th>
                        <th>Nome do Estado</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($array as $estado) {
                    ?>

                    <tr>
                        <td><?=$estado["uf"]?></td>
                        <td><?=$estado["nomeestado"]?></td>
                        <td>
                            <form name="alterar" action="altEstado.php" method="POST">
                                <input type="hidden" name="idestado" value="<?=$estado["idestado"]?>"/>
                                <input type="submit" value="Editar" name="editar"/>
                            </form>
                        </td>
                        <td>
                            <form name="excluir" action="inc/funcoes.php" method="POST">
                                <input type="hidden" name="idestado" value="<?=$estado["idestado"]?>"/>
                                <input type="hidden" name="acao" value="excluirEstado"/>
                                <input type="submit" value="Excluir" name="excluir"/>
                            </form>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <form name="voltar" action="cestado.php" method="POST"><br>
            <input type="submit" value="Voltar"/>
        </form>
    </body>
</html>

