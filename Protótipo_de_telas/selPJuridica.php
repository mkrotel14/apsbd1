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
        <h3>Lista de Pessoas Jurídicas</h3>
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
                        foreach ($array_pessoa as $PJuridica) { 
                    ?>
                    <tr>
                        <td><?=$PJuridica["razaosocial"]?></td>
                        <td><?=$PJuridica["nomefantasia"]?></td>
                        <td><?=$PJuridica["cnpj"]?></td>
                        <td><?=$PJuridica["inscrestad"]?></td>
                        <td><?=$PJuridica["telefone"]?></td>
                        <td><?=$PJuridica["email"]?></td>
                        <td><?=$PJuridica["logradouro"]?></td>
                        <td><?=$PJuridica["cep"]?></td>
                        <td><?=$PJuridica["bairro"]?></td>
                        <td><?=$PJuridica["numero"]?></td>
                        <td><?=$PJuridica["complemento"]?></td>
                        <td><?=$PJuridica["nomecidade"]?></td>
                        <td>
                            <form name="alterar" action="altPJuridica.php" method="POST">
                                <input type="hidden" name="idpessoa" value="<?=$PJuridica["idpessoa"]?>"/>
                                <input type="submit" value="Editar" name="editar"/>
                            </form>
                        </td>
                        <td>
                            <form name="excluir" action="inc/funcoes.php" method="POST">
                                <input type="hidden" name="idpessoa" value="<?=$PJuridica["idpessoa"]?>"/>
                                <input type="hidden" name="acao" value="excluirPJuridica"/>
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
