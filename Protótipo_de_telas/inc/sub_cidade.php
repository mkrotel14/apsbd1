<?php
    include 'funcoes.php';
    $banco = abrirBanco();

    $estado = $_REQUEST['id_estado'];
    
    $sql = "SELECT * FROM cidade WHERE estado_idestado ='$estado' ORDER BY nomecidade";
    $resultado = $banco->query($sql);
    
    while($row_cidade = mysqli_fetch_assoc($resultado)){
        $sub_cidade[] = array(
            'idcidade' => $row_cidade['idcidade'],
            'nomecidade' => $row_cidade['nomecidade'],
        );
    }
    echo (json_encode($sub_cidade));
?>
