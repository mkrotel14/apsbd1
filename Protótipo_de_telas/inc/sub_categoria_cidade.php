<?php
    include 'funcoes.php';
    $banco = abrirBanco();

    $id_estado = $_REQUEST['id_estado'];
    
    $sql = "SELECT * FROM cidade WHERE estado_idestado =$id_estado ORDER BY nomecidade";
    $result_sub_cat = mysqli_query($banco, $sql);
    
    while($row_sub_cat = mysqli_fetch_assoc($result_sub_cat)){
        $sub_categoria_cidade[] = array(
            'idcidade' => $row_sub_cat['idcidade'],
            'nomecidade' => utf8_encode($row_sub_cat['nomecidade']),
        );
        
    }
    echo(json_encode($sub_categoria_cidade));
?>
