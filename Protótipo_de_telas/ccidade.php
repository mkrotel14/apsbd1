<?php
include_once ("inc/conn.php");
?>
<html>
    <head>
        <title>Cadastro de Cidade</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="Cidade" action="inc/cadcidade.php" method="POST">
            Nome da Cidade:
            <input type="text" name="cidade" size="30" />
            UF:
            <select name="estados">
                <option value="">Selecione</option>
                <?php
                $estados = mysqli_query($link, "SELECT * FROM estado");
                /*$estados = "SELECT * FROM estado";
                $estados_return = mysqli_query($link, $estados);*/
                while($row_estados = mysqli_fetch_assoc($estados)){ 
                ?>
                <option value="<?php echo $row_estados['idestado']; ?>"><?php echo $row_estados['nomeestado']; ?>
                </option><?php
                }
                ?>
            </select><br><br>
            <input type="submit" value="Cadastrar Cidade">
            <input type="reset" value="Limpar Dados">
        </form>
    </body>
</html>
			