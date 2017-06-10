<?php
    include 'inc/funcoes.php';
    $banco = abrirBanco();
?>

<html>
    <head>
        <title>Cadastro de Produto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Produto" action="inc/funcoes.php" method="POST">
            Nome do Produto:
            <input type="text" name="nome_produto" size="60" />
            Categoria Produto:
            <select name="categoria">
                <option value="">Selecione</option>
                <?php
                $sql = "SELECT * FROM categoriaproduto";
                $categoria = $banco->query($sql);
                while($row_categorias = $categoria->fetch_array()){ 
                ?>
                <option value="<?=$row_categorias['idcategoriaproduto']?>"><?=$row_categorias['nomecategoria']?>
                </option><?php
                }
                ?>
            </select><br><br>
            Lote:
            <input type="text" name="lote" size="15" />
            Qtd. Estoque:
            <input type="text" name="qtd_estoque" size="10"><br><br>
            Valor da Compra:
            <input type="text" name="vcompra" size="15">
            Valor da Venda:
            <input type="text" name="vvenda" size="15"><br><br>
            <input type="hidden" name="acao" value="inserirProduto"/>
            <input type="submit" value="Cadastrar Produto">
            <input type="reset" value="Limpar Dados">
        </form>
        <form name="selProduto" action="selProduto.php" method="POST">
            <input type="submit" value="Buscar Produtos"/>
        </form> 
    </body>
</html>