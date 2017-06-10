<?php

include 'conn.php';

$listaProduto = $link->query("SELECT * FROM produto ORDER BY nomeproduto");
while($row_lista = mysqli_fetch_array($listaProduto)){
    $gurpo[] = $row_lista;
}

?>

