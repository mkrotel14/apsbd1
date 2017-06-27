<?php
    include 'inc/funcoes.php';
    $pessoa = selectIdPessoa($_POST["idpessoa"]);
    $banco = abrirBanco();
?>
<html>
    <head>
        <title>Alterar Pessoa Juridica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="PessoaJuridica" action="inc/funcoes.php" method="POST">
            <table>
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="idpessoa" value="<?=$pessoa['idpessoa']?>" size="3" disabled="disabled" onsubmit="return validaPJuridica()"/></td>
                </tr>
                <tr>
                    <td>Razao Social:</td>
                    <td><input type="text" name="razaosocial" id="razaosocial" value="<?=$pessoa['razaosocial']?>" size="60" /></td>
                </tr>
                <tr>
                    <td>Nome Fantasia:</td>
                    <td><input type="text" name="nomefantasia" id="nomefantasia" size="60" value="<?=$pessoa['nomefantasia']?>"/></td>                   
                </tr>
                <tr>
                    <td>CNPJ:</td>
                    <td><input type="text" name="cnpj" id="cnpj" size="25" value="<?=$pessoa['cnpj']?>" /></td>
                    
                </tr>
                <tr>
                    <td>Inscrição Estadual:</td>
                    <td><input type="text" name="inscrestad" id="inscrestad" size="25" value="<?=$pessoa['inscrestad']?>" /></td> 
                    
                </tr>
                <td><center>--- CONTATO ---</center></td>
                <tr>
                    <td>Telefone:</td>
                    <td><input type="text" name="telefone" id="telefone" size="20" value="<?=$pessoa['telefone']?>"/></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" id="email" size="20" value="<?=$pessoa['email']?>"/></td>
                </tr>
                <td><center>--- Endereço de Cobrança ---</center></td>
                <tr>
                    <td>Rua:</td>
                    <td><input type="text" name="logradouro" id="logradouro" size="20" value="<?=$pessoa['logradouro']?>"/></td>
                </tr>
                <tr>
                    <td>CEP:</td>
                    <td><input type="text" name="cep" id="cep" size="20" value="<?=$pessoa['cep']?>"/></td>
                </tr>
                <tr>
                    <td>Bairro:</td>
                    <td><input type="text" name="bairro" id="bairro" size="20" value="<?=$pessoa['bairro']?>"/></td>
                </tr>
                <tr>
                    <td>Número:</td>
                    <td><input type="text" name="numero" id="numero" size="20" value="<?=$pessoa['numero']?>"/></td>
                </tr>
                <tr>
                    <td>Complemento:</td>
                    <td><input type="text" name="complemento" size="20" value="<?=$pessoa['complemento']?>"/></td>
                </tr>
                <tr>
                     <td>Cidade:</td>
                    <td><select name="cidade_idcidade" id="id_cidade">
                            <option value="">Selecione a Cidade</option>
                            <?php
                                $sql = "SELECT * FROM cidade ORDER BY nomecidade";
                                $resultado_cidade = $banco->query($sql);
                                while($row_cidades = mysqli_fetch_assoc($resultado_cidade)){ 
                                    echo '<option value="'.$row_cidades['idcidade'].'">'.utf8_encode($row_cidades['nomecidade']).'</option>';
                                }
                            ?>
                        </select></td>                  
                </tr>                                                                                
            </table>
            <br><br>
            <table>
                <tbody>
                    <tr>
                        <td><input type="hidden" name="acao" value="alterarPJuridica"/>
                            <input type="hidden" name="idpessoa" value="<?=$pessoa["idpessoa"]?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Atualizar Pessoa Juridica"/>
            <input type="reset" value="Limpar Dados"/><br><br>    
        </form>        
        <script src="js/campo_obrigatorio.js"></script>
    </body>
</html>