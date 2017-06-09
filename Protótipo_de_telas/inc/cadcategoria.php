<?php

include "conn.php";

$insert_categoria = $link->query("INSERT INTO categoriaproduto(nomecategoria, descricaocategoria) VALUES ('{$_POST["categ"]}','{$_POST["desc"]}')");

if(mysqli_affected_rows($link) != 0){
    echo " 
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/ccategoria.php'>
        <script type=\"text/javascript\">
            alert(\"Cadastro realizado com sucesso!\");
        </script>
    ";
}
else{
    echo " 
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/ccategoria.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao Cadastrar!\");
        </script>
    ";
}
mysqli_close($link);
?>



