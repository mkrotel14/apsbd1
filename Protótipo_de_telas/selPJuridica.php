<?php
    include 'inc/funcoes.php';
    $array_pessoa = selectAllPJuridica();
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
                        <th>Razão Social</th>
                        <th>Nome Fantasia</th>
                        <th>CNPJ</th>
                        <th>Inscrição Estadual</th>
                        <th>Telefone</th>
                        <th>E-Mail</th>
                        <th>Rua</th>
                        <th>CEP</th>
                        <th>Bairro</th>
                        <th>Número</th>
                        <th>Complemento</th>
                        <th>Cidade</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($array_pessoa as $pessoa) { 
                    ?>
                    <tr>
                        <td><?=$produto["nomeproduto"]?></td>
                        <td><?=$produto["lote"]?></td>
                        <td><?=$produto["valorvenda"]?></td>
                        <td><?=$produto["valorcompra"]?></td>
                        <td><?=$produto["qtdestoque"]?></td>
                        <td><?=$produto["categoriaproduto_idcategoriaproduto"]?></td>
                        <td><?=$produto["localproduto_idlocalproduto"]?></td>
                        <td><?=$produto["localproduto_idlocalproduto"]?></td>
                        <td><?=$produto["localproduto_idlocalproduto"]?></td>
                        <td><?=$produto["localproduto_idlocalproduto"]?></td>
                        <td><?=$produto["localproduto_idlocalproduto"]?></td>
                        <td><?=$produto["localproduto_idlocalproduto"]?></td>
                        <td>
                            <form name="alterar" action="altProduto.php" method="POST">
                                <input type="hidden" name="idproduto" value="<?=$produto["idproduto"]?>"/>
                                <input type="submit" value="Editar" name="editar"/>
                            </form>
                        </td>
                        <td>
                            <form name="excluir" action="inc/funcoes.php" method="POST">
                                <input type="hidden" name="idproduto" value="<?=$produto["idproduto"]?>"/>
                                <input type="hidden" name="acao" value="excluirProduto"/>
                                <input type="submit" value="Excluir" name="excluir"/>
                            </form>
                        </td>
                    </tr>
                </tbody>
                    <?php
                        }
                    ?>
        </table>
        <form name="voltar" action="home.html" method="POST"><br>
            <input type="submit" value="Voltar"/>
        </form>
    </body>
</html>
