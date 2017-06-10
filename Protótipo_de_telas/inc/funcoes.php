<?php

//-----------Verificação do $_POST-----------//

if(isset($_POST["acao"])){
    if($_POST["acao"]=="inserirEstado"){
        inserirEstado();
    }

    if($_POST["acao"]=="inserirCidade"){
        inserirCidade();
    }

    if($_POST["acao"]=="inserirProduto"){
        inserirProduto();
    }
    
    if($_POST["acao"]=="inserirCategoria"){
        inserirCategoria();
    } 
    
    if($_POST["acao"]=="alterarEstado"){
        updateEstado();
    }
    
    if($_POST["acao"]=="alterarCategoria"){
        updateCategoria();
    }
    
    if($_POST["acao"]=="excluirEstado"){
        dropEstado();
    }
    if($_POST["acao"]=="excluirCategoria"){
        dropCategoria();
    }
}
//-----------Conectar com o DataBase-----------//

function abrirBanco(){
    $connection = new mysqli("localhost","root","","apsbd1");
    if($connection->connect_error){
        die("Conexão com o banco falhou: " . $connection->connect_error);
    }
    return $connection;
}
//-----------INSERT-----------//

function inserirCidade(){
    $banco = abrirBanco();
    $sql = "INSERT INTO cidade(nomecidade, estado_idestado) VALUES ('{$_POST["nomecidade"]}','{$_POST["estado_idestado"]}')";
    $banco->query($sql);
    
    if(mysqli_affected_rows($banco) != 0){
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
    $banco->close();
}

function inserirEstado(){
    $banco = abrirBanco();
    $sql = "INSERT INTO estado(uf, nomeestado) VALUES ('{$_POST["uf"]}','{$_POST["nomeestado"]}')";
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
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
    $banco->close();
}

function inserirCategoria(){
    $banco = abrirBanco();
    $sql = "INSERT INTO categoriaproduto(nomecategoria, descricaocategoria) VALUES ('{$_POST["categ"]}','{$_POST["desc"]}')";
    $banco->query($sql);
    
    if(mysqli_affected_rows($banco) != 0){
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
    $banco->close();
}
function inserirProduto(){
    $banco = abrirBanco();
    $sql = "INSERT INTO produto(nomeproduto, lote, valorvenda, valorcompra, qtdestoque, categoriaproduto_idcategoriaproduto) VALUES ('{$_POST["nome_produto"]}','{$_POST["lote"]}','{$_POST["vvenda"]}','{$_POST["vcompra"]}','{$_POST["qtd_estoque"]}','{$_POST["categoria"]}')";
    $banco->query($sql);
    
    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cproduto.php'>
            <script type=\"text/javascript\">
                alert(\"Cadastro realizado com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cproduto.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Cadastrar!\");
            </script>
        ";
    
    }
    $banco->close();
}
//-----------SELECT-----------//

function selectAllProduto(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM produto ORDER BY nomeproduto";
    $resultado = $banco->query($sql);
    $banco->close();
    
    while($row_lista = $resultado->fetch_array()){
        $array[] = $row_lista;
    }
    return $array;
}

function selectAllEstados(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM estado ORDER BY uf";
    $resultado = $banco->query($sql);
    $banco->close();
    
    while($row_lista = $resultado->fetch_array()){
        $array[] = $row_lista;
    }
    return $array;
}
function selectAllCategorias(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM categoriaproduto ORDER BY nomecategoria";
    $resultado = $banco->query($sql);
    $banco->close();
    
    while($row_lista = $resultado->fetch_array()){
        $array[] = $row_lista;
    }
    return $array;
    
}
function selectIdEstado($idestado){
    $banco = abrirBanco();
    $sql = "SELECT * FROM estado WHERE idestado = '{$idestado}'" ;
    $resultado = $banco->query($sql);
    $banco->close();
    
    return mysqli_fetch_assoc($resultado);

}
function selectIdCategoria($idcategoriaproduto){
    $banco = abrirBanco();
    $sql = "SELECT * FROM categoriaproduto WHERE idcategoriaproduto = '{$idcategoriaproduto}'" ;
    $resultado = $banco->query($sql);
    $banco->close();
    
    return mysqli_fetch_assoc($resultado);
}
//-----------UPDATE-----------//

function updateEstado(){
    $banco = abrirBanco();
    $sql = "UPDATE estado SET uf='{$_POST["uf"]}', nomeestado='{$_POST["nomeestado"]}' WHERE idestado ='{$_POST["idestado"]}'";
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selEstado.php'>
            <script type=\"text/javascript\">
                alert(\"Dado Atualizado com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selEstado.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Atualizar!\");
            </script>
        ";
    }
    $banco->close();
}
function updateCategoria(){
    $banco = abrirBanco();
    $sql = "UPDATE categoriaproduto SET nomecategoria='{$_POST["nomecategoria"]}', descricaocategoria='{$_POST["descricaocategoria"]}' WHERE idcategoriaproduto ='{$_POST["idcategoriaproduto"]}'";
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selCategoria.php'>
            <script type=\"text/javascript\">
                alert(\"Dado Atualizado com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selCategoria.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Atualizar!\");
            </script>
        ";
    }
    $banco->close();
}

//-----------DROP-----------//

function dropEstado(){
    $banco = abrirBanco();
    $sql = "DELETE FROM estado WHERE idestado='{$_POST["idestado"]}'"; 
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selEstado.php'>
            <script type=\"text/javascript\">
                alert(\"Dado Excluido com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selEstado.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Excluir!\");
            </script>
        ";
    }
    $banco->close();
}

function dropCategoria(){
    $banco = abrirBanco();
    $sql = "DELETE FROM categoriaproduto WHERE idcategoriaproduto='{$_POST["idcategoriaproduto"]}'"; 
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selCategoria.php'>
            <script type=\"text/javascript\">
                alert(\"Categoria Excluida com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selCategoria.php'>
            <script type=\"text/javascript\">
                alert(\"Erro: Categoria sendo utilizada em algum Produto\");
            </script>
        ";
    }
    $banco->close();
}

?>