<?php

$link = mysqli_connect("localhost", "root", "", "apsbd1");

if(!$link){
    die("Falha na conexao com o banco" . mysqli_connect_error());
}
else{
    //echo "conectado ao banco de dados";
}
?>
