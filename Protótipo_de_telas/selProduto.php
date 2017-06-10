<?php
    include 'inc/funcoes.php';
    $array_categoria = selectAllProduto();
?>

<html>
    <head>
        <title>Busca de Produtos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3>Lista de Produtos</h3>
        <table border="1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Lote</th>
                        <th>Valor da Venda</th>
                        <th>Valor da Compra</th>
                        <th>Qtd. Estoque</th>
                        <th>Categoria</th>
                        <th>Seção</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($array_categoria as $produto) { 
                    ?>
                    <tr>
                        <td><?=$produto["nomeproduto"]?></td>
                        <td><?=$produto["lote"]?></td>
                        <td><?=$produto["valorvenda"]?></td>
                        <td><?=$produto["valorcompra"]?></td>
                        <td><?=$produto["qtdestoque"]?></td>
                        <td><?=$produto["categoriaproduto_idcategoriaproduto"]?></td>
                        <td><?=$produto["localproduto_idlocalproduto"]?></td>
                        <td>Editar</td>
                        <td>Excluir</td>
                    </tr>
                </tbody>
                    <?php
                        }
                    ?>
        </table>
        <form name="voltar" action="cproduto.php" method="POST"><br>
            <input type="submit" value="Voltar"/>
        </form>
    </body>
</html>
