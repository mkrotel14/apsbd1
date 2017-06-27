<?php
    include 'inc/funcoes.php';
       $produto = selectIdProduto($_POST["idproduto"]);
       $banco = abrirBanco();
?>
<html>
    <head>
        <title>Alterar Produto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Produto" action="inc/funcoes.php" method="POST" onsubmit="return validaProduto()">
            <table>
                <tr>
                    <td>Nome do Produto:</td>
                    <td><input type="text" name="nomeproduto" id="nomeproduto" value="<?= utf8_encode($produto['nomeproduto']);?>" size="60" /></td>
                </tr>
                <tr>
                    <td>Lote:</td>
                    <td><input type="text" name="lote" size="15" id="lote" value="<?=$produto['lote']?>"/></td>                   
                </tr>
                <tr>
                    <td>Valor da Venda:</td>
                    <td><input type="text" name="valorvenda" size="15" id="valorvenda" value="<?=$produto['valorvenda']?>" /></td>
                    
                </tr>
                <tr>
                    <td>Valor da Compra:</td>
                    <td><input type="text" name="valorcompra" size="15" id="valorcompra" value="<?=$produto['valorcompra']?>" /></td> 
                    
                </tr>
                <tr>
                    <td>Qtd. Estoque:</td>
                    <td><input type="text" name="qtdestoque" id="qtdestoque" size="10" value="<?=$produto['qtdestoque']?>"/></td>
                </tr>
                <tr>
                     <td>Categoria Produto:</td>
                     <td><select name="categoriaproduto_idcategoriaproduto" id="categoriaproduto" >
                            <option value="">Escolha a Categoria</option>
                            <?php
                                $sql = "SELECT * FROM categoriaproduto ORDER BY nomecategoria";
                                $resultado_categoria = $banco->query($sql);
                                while($row_categorias = mysqli_fetch_assoc($resultado_categoria)){                               
                                    echo '<option value="'.$row_categorias['idcategoriaproduto'].'">'.utf8_encode($row_categorias['nomecategoria']).'</option>';
                                }
                            ?>
                        </select></td>                  
                </tr>
                <tr>
                    <td>Seção do Produto:</td>
                    <td><select name="localproduto_idlocalproduto" id="localproduto" >
                            <option value="">Escolha a Seção</option>
                            <?php
                                $sql = "SELECT * FROM localproduto ORDER BY secaoproduto";
                                $resultado_local = $banco->query($sql);
                                while($row_local = mysqli_fetch_assoc($resultado_local)){ 
                                    echo '<option value="'.$row_local['idlocalproduto'].'">'.utf8_encode($row_local['secaoproduto']).'</option>';          
                                }
                            ?>
                        </select></td>
                </tr>                                                                                 
            </table>
            <br><br>
            <table>
                <tbody>
                    <tr>
                        <td><input type="hidden" name="acao" value="alterarProduto"/>
                            <input type="hidden" name="idproduto" value="<?=$produto["idproduto"]?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Atualizar Produto"/>
            <input type="reset" value="Limpar Dados"/><br><br>
            
        </form>        
        <script src="js/campo_obrigatorio.js"></script>
    </body>
</html>