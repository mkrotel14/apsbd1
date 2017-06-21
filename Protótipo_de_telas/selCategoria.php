<?php
    include 'inc/funcoes.php';
    $array = selectAllCategorias();
?>

<html>
    <head>
        <title>Busca de Categorias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3>Lista de Categorias</h3>
        <table border="1">
                <thead>
                    <tr>
                        <th>Nome da Categoria</th>
                        <th>Descrição</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($array as $categoria) {
                    ?>
                    
                    <tr>
                        <td><?=$categoria["nomecategoria"]?></td>
                        <td><?=$categoria["descricaocategoria"]?></td>
                        <td>
                            <form name="alterar" action="altCategoria.php" method="POST">
                                <input type="hidden" name="idcategoriaproduto" value="<?=$categoria["idcategoriaproduto"]?>"/>
                                <input type="submit" value="Editar" name="editar"/>
                            </form>
                        </td>
                        <td>
                            <form name="excluir" action="inc/funcoes.php" method="POST">
                                <input type="hidden" name="idcategoriaproduto" value="<?=$categoria["idcategoriaproduto"]?>"/>
                                <input type="hidden" name="acao" value="excluirCategoria"/>
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
