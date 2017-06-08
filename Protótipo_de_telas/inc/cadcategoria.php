<?php

include "conn.php";
        
mysql_query("INSERT INTO categoriaproduto(nomecategoria, descricaocategoria) VALUES ('{$_POST["categ"]}','{$_POST["desc"]}')");

mysql_query()

?>
