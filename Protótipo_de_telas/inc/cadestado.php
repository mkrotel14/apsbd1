<?php

$link = mysqli_connect("localhost", "root", "", "apsbd1");

if(!$link){
    die("Falha na conexao com o banco" . mysqli_connect_error());
}
else{
    //echo "conectado ao banco de dados";
}

$uf_estado = $_POST['uf'];
$nome_estado =  $_POST['nomeestado'];

$insert_estado = $link->query("INSERT INTO estado(uf, nomeestado) VALUES ('$uf_estado','$nome_estado))");
/*
$insert_estado = "INSERT INTO estado(uf, nomeestado) VALUES ('$uf_estado','$nome_estado))";
$resultado_estado = mysqli_query($connection, $insert_estado);
*/
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


