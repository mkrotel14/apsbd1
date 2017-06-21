<?php
include 'inc/funcoes.php';
$banco = abrirBanco();
?>
<html>
    <head>
        <title>Cadastro de Cidade</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Cidade" action="inc/funcoes.php" method="POST" onsubmit="return validaCidade()">
            Nome da Cidade:
            <input type="text" name="nomecidade" id="nomecidade" size="30" />
            UF:
            <select name="estado_idestado" id="id_estado">
                <option value="">Selecione o Estado</option>
                <?php
                    $sql = "SELECT * FROM estado ORDER BY nomeestado";
                    $resultado_estado = $banco->query($sql);
                    while($row_estados = mysqli_fetch_assoc($resultado_estado)){ 
                        echo '<option value="'.$row_estados['idestado'].'">'.$row_estados['nomeestado'].'</option>';
                    }
                ?>
            </select><br><br>
            <input type="hidden" name="acao" value="inserirCidade"/>
            <input type="submit" value="Cadastrar Cidade">
            <input type="reset" value="Limpar Dados">
        </form>
        <script src="js/campo_obrigatorio.js"></script>
    </body>
</html>
			