<?php

include "conn.php";

$nome_cidade = $_POST['cidade'];
$id_estado =  $_POST['estados'];

$insert_cidade = "INSERT INTO cidade(nome, estado_idestado) VALUES ('$nome_cidade','$id_estado))";
$resultado_estado = mysqli_query($connection, $insert_cidade);

if(mysqli_affected_rows($connection) != 0){
    echo "Cadastro realizado com Sucesso!";
}
else{
    echo "Erro ao Cadastrar!";
}

?>

