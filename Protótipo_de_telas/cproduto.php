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
        <form name="Produto" action="inc/funcoes.php" method="POST" onsubmit="return validaProduto()"/>
            Nome do Produto:
            <input type="text" name="nomeproduto" id="nomeproduto" size="60" />
            Lote:
            <input type="text" name="lote" id="lote" size="15" /><br><br>
            Valor da Venda:
            <input type="text" name="valorvenda" id="valorvenda" size="15"/>
            Valor da Compra:
            <input type="text" name="valorcompra" id="valorcompra" size="15"/>
            Qtd. Estoque:
            <input type="text" name="qtdestoque" id="qtdestoque" size="10"/><br><br>
            Categoria Produto:
            <select name="categoriaproduto_idcategoriaproduto" id="categoriaproduto">
                <option value="">Selecione a Categoria</option>
                <?php
                    $sql = "SELECT * FROM categoriaproduto";
                    $resultado_categoria = $banco->query($sql);
                    while($row_categorias = mysqli_fetch_assoc($resultado_categoria)){ 
                        echo '<option value="'.$row_categorias['idcategoriaproduto'].'">'.$row_categorias['nomecategoria'].'</option>';
                    }    
                ?>                
            </select>
            Seção do Produto:
            <select name="localproduto_idlocalproduto" id="localproduto" >
                <option value="">Selecione a Seção</option>
                <?php
                    $sql = "SELECT * FROM localproduto";
                    $resultado_local = $banco->query($sql);
                    while($row_local = mysqli_fetch_assoc($resultado_local)){ 
                        echo '<option value="'.$row_local['idlocalproduto'].'">'.$row_local['secaoproduto'].'</option>';
                    }
                ?>             
            </select><br><br>
            <input type="hidden" name="acao" value="inserirProduto"/>
            <input type="submit" value="Cadastrar Produto">
            <input type="reset" value="Limpar Dados">
        </form>
    </body>
</html>