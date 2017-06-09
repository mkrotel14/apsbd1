<?php

include 'conn.php';

$insert_cidade = $link->query("INSERT INTO cidade(nome, estado_idestado) VALUES ('{$_POST["cidade"]}','{$_POST["estados"]}')");

if(mysqli_affected_rows($link) != 0){
    echo " 
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/ccidade.php'>
        <script type=\"text/javascript\">
            alert(\"Cadastro realizado com sucesso!\");
        </script>
    ";
}
else{
    echo " 
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/ccidade.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao Cadastrar!\");
        </script>
    ";
}
mysqli_close($link);
?>

