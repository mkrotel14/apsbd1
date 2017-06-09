<?php

include 'conn.php';

$insert_estado = $link->query("INSERT INTO estado(uf, nomeestado) VALUES ('{$_POST["uf"]}','{$_POST["nomeestado"]}')");

if(mysqli_affected_rows($link) != 0){
    echo " 
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cestado.php'>
        <script type=\"text/javascript\">
            alert(\"Cadastro realizado com sucesso!\");
        </script>
    ";
}
else{
    echo " 
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cestado.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao Cadastrar!\");
        </script>
    ";
}
mysqli_close($link);
?>


