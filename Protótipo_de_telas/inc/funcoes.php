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
    
    if($_POST["acao"]=="inserirSecao"){
        inserirSecao();
    }
    
    if($_POST["acao"]=="inserirPJuridica"){
        inserirPJuridica();
    }
    
    if($_POST["acao"]=="alterarEstado"){
        updateEstado();
    }
       
    if($_POST["acao"]=="alterarCategoria"){
        updateCategoria();
    }
    
    if($_POST["acao"]=="alterarSecao"){
        updateSecao();
    }
    
    if($_POST["acao"]=="alterarProduto"){
        updateProduto();
    }
    
    if($_POST["acao"]=="alterarCidade"){
        updateCidade();
    }
    
    if($_POST["acao"]=="excluirEstado"){
        dropEstado();
    }
    if($_POST["acao"]=="excluirCategoria"){
        dropCategoria();
    }
    
    if($_POST["acao"]=="excluirSecao"){
        dropSecao();
    }
    
    if($_POST["acao"]=="excluirCidade"){
        dropCidade();
    }
    
    if($_POST["acao"]=="excluirProduto"){
        dropProduto();
    }
}
//---------------------------------------------//








//-----------Conectar com o DataBase-----------//

function abrirBanco(){
    $connection = new mysqli("localhost","root","","apsbd1");
    if($connection->connect_error){
        die("Conexão com o banco falhou: " . $connection->connect_error);
    }
    return $connection;
}
//---------------------------------------------//









//-----------INSERT-----------//

function inserirCidade(){
    $banco = abrirBanco();
    $nomecidade = $_POST['nomecidade'];
    $estado_idestado = $_POST['estado_idestado'];
    
    $ver = "SELECT * FROM cidade WHERE nomecidade = '$nomecidade' && estado_idestado = '$estado_idestado'";
    $resultado = $banco->query($ver);
    
    if(mysqli_num_rows($resultado) > 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/ccidade.php'>
            <script type=\"text/javascript\">
                alert(\"Dados de Cidade repetidos no Sistema!\");
            </script>
        ";
    }
    else{
        $sql = "INSERT INTO cidade(nomecidade, estado_idestado) VALUES ('$nomecidade','$estado_idestado')";
        $banco->query($sql);

        if(mysqli_affected_rows($banco) != 0){
            echo " 
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/ccidade.php'>
                <script type=\"text/javascript\">
                    alert(\"Cidade Cadastrada com sucesso!\");
                </script>
            ";
        }
        else{
            echo " 
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/ccidade.php'>
                <script type=\"text/javascript\">
                    alert(\"Erro ao Cadastrar uma Cidade!\");
                </script>
            ";
        }  
    } 
    $banco->close();
}
function inserirEstado(){
    $banco = abrirBanco();
    $uf = $_POST['uf'];
    $nomeestado = $_POST['nomeestado'];
    
    $ver1 = "SELECT * FROM estado WHERE uf = '$uf'";
    $ver2 = "SELECT * FROM estado WHERE nomeestado = '$nomeestado'";
    $resultado1 = $banco->query($ver1);
    $resultado2 = $banco->query($ver2);
    
    if(mysqli_num_rows($resultado1) > 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cestado.php'>
            <script type=\"text/javascript\">
                alert(\"Dados de UF repetidos no Sistema!\");
            </script>
        ";
    }
    elseif(mysqli_num_rows($resultado2) > 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cestado.php'>
            <script type=\"text/javascript\">
                alert(\"Dados de Nome do Estado repetidos no Sistema!\");
            </script>
        ";
    }
    else{
        $sql = "INSERT INTO estado(uf , nomeestado) VALUES ('$uf','$nomeestado')";
        $banco->query($sql);

        if(mysqli_affected_rows($banco) != 0){
            echo " 
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cestado.php'>
                <script type=\"text/javascript\">
                    alert(\"Estado Cadastrado com sucesso!\");
                </script>
            ";
        }
        else{
            echo " 
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cestado.php'>
                <script type=\"text/javascript\">
                    alert(\"Erro ao Cadastrar um Estado!\");
                </script>
            ";
        }
    }
    $banco->close();
}
function inserirCategoria(){
    $banco = abrirBanco();
    $nomecategoria = $_POST['categ'];
    
    $ver = "SELECT * FROM categoriaproduto WHERE nomecategoria = '$nomecategoria'";
    $resultado = $banco->query($ver);
    
    if(mysqli_num_rows($resultado) > 0 ){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cestado.php'>
            <script type=\"text/javascript\">
                alert(\"Dados de Categoria repetidos no Sistema!\");
            </script>
        ";
    }
    else{
        $sql = "INSERT INTO categoriaproduto(nomecategoria, descricaocategoria) VALUES ('$nomecategoria','{$_POST["desc"]}')";
        $banco->query($sql);

        if(mysqli_affected_rows($banco) != 0){
            echo " 
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/ccategoria.php'>
                <script type=\"text/javascript\">
                    alert(\"Categoria Cadastrada com sucesso!\");
                </script>
            ";
        }
        else{
            echo " 
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/ccategoria.php'>
                <script type=\"text/javascript\">
                    alert(\"Erro ao Cadastrar uma Categoria!\");
                </script>
            ";
        }
    }
    $banco->close();
}
function inserirProduto(){
    $banco = abrirBanco();
    
    $sql = "INSERT INTO produto (nomeproduto, lote, valorvenda, valorcompra, qtdestoque, categoriaproduto_idcategoriaproduto, localproduto_idlocalproduto) VALUES ('{$_POST["nomeproduto"]}','{$_POST["lote"]}','{$_POST["valorvenda"]}','{$_POST["valorcompra"]}','{$_POST["qtdestoque"]}','{$_POST["categoriaproduto_idcategoriaproduto"]}','{$_POST["localproduto_idlocalproduto"]}')";
    $banco->query($sql);
    
    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cproduto.php'>
            <script type=\"text/javascript\">
                alert(\"Produto Cadastrado com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cproduto.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Cadastrar um Produto!\");
            </script>
        ";
    
    }
    $banco->close();
}
function inserirSecao(){
    $banco = abrirBanco();
    $secaoproduto = $_POST['secaoproduto'];
    
    $ver = "SELECT * FROM localproduto WHERE secaoproduto = '$secaoproduto'";
    $resultado = $banco->query($ver);
    
    if(mysqli_num_rows($resultado) > 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cestado.php'>
            <script type=\"text/javascript\">
                alert(\"Dados de Seção repetidos no Sistema!\");
            </script>
        ";
    }
    else{
        $sql = "INSERT INTO localproduto (secaoproduto) VALUES ('$secaoproduto')";
        $banco->query($sql);

        if(mysqli_affected_rows($banco) != 0){
            echo " 
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/csecao.php'>
                <script type=\"text/javascript\">
                    alert(\"Seção Cadastrada com sucesso!\");
                </script>
            ";
        }
        else{
            echo " 
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/csecao.php'>
                <script type=\"text/javascript\">
                    alert(\"Erro ao Cadastrar uma Seção!\");
                </script>
            ";

        }  
    }
    
    $banco->close();    
}
function inserirPJuridica(){
    $banco = abrirBanco();
    $sqlP = "INSERT INTO pessoa (tipopessoa) VALUES ('Juridica')";
    $banco->query($sqlP);
    
    //$pessoa_idpessoa = $_GET
    
    $sqlJ = "INSERT INTO juridica (cnpj, increstad, razaosocial, nomefantasia, pessoa_idpessoa) VALUES ('{$_POST["cnpj"]}','{$_POST["increstad"]}','{$_POST["razaosocial"]}','{$_POST["nomefantasia"]}','{$_POST[""]}'";
    $ver = "SELECT * FROM localproduto WHERE secaoproduto = '$secaoproduto'";
    $resultado = $banco->query($ver);
    
    if(mysqli_num_rows($resultado) > 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cestado.php'>
            <script type=\"text/javascript\">
                alert(\"Dados de Seção repetidos no Sistema!\");
            </script>
        ";
    }
    else{
        $sql = "INSERT INTO localproduto (secaoproduto) VALUES ('$secaoproduto')";
        $banco->query($sql);

        if(mysqli_affected_rows($banco) != 0){
            echo " 
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/csecao.php'>
                <script type=\"text/javascript\">
                    alert(\"Seção Cadastrada com sucesso!\");
                </script>
            ";
        }
        else{
            echo " 
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/csecao.php'>
                <script type=\"text/javascript\">
                    alert(\"Erro ao Cadastrar uma Seção!\");
                </script>
            ";

        }  
    }
    
    $banco->close();    
}
//---------------------------------------------//









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

function selectAllSecao(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM localproduto ORDER BY secaoproduto";
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
function selectAllCidades(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM cidade ORDER BY estado_idestado";
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
function selectIdCidade($idcidade){
    $banco = abrirBanco();
    $sql = "SELECT * FROM cidade WHERE idcidade = '{$idcidade}'" ;
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
function selectIdSecao($idlocalproduto){
    $banco = abrirBanco();
    $sql = "SELECT * FROM localproduto WHERE idlocalproduto = '{$idlocalproduto}'" ;
    $resultado = $banco->query($sql);
    $banco->close();
    
    return mysqli_fetch_assoc($resultado);
}
function selectIdProduto($idproduto){
    $banco = abrirBanco();
    $sql = "SELECT * FROM produto WHERE idproduto = '{$idproduto}'" ;
    $resultado = $banco->query($sql);
    $banco->close();
    
    return mysqli_fetch_assoc($resultado);
}
//---------------------------------------------//










//-----------UPDATE-----------//

function updateEstado(){
    $banco = abrirBanco();
    $sql = "UPDATE estado SET uf='{$_POST["uf"]}', nomeestado='{$_POST["nomeestado"]}' WHERE idestado ='{$_POST["idestado"]}'";
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selEstado.php'>
            <script type=\"text/javascript\">
                alert(\"Estado Atualizado com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selEstado.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Atualizar um Estado!\");
            </script>
        ";
    }
    $banco->close();
}
function updateCidade(){
    $banco = abrirBanco();
    $sql = "UPDATE cidade SET nomecidade='{$_POST["nomecidade"]}', estado_idestado='{$_POST["estado_idestado"]}' WHERE idcidade ='{$_POST["idcidade"]}'";
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selCidade.php'>
            <script type=\"text/javascript\">
                alert(\"Cidade Atualizada com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selCidade.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Atualizar uma Cidade!\");
            </script>
        ";
    }
    $banco->close();
}
function updateCategoria(){
    $banco = abrirBanco();
    $sql = "UPDATE categoriaproduto SET nomecategoria='{$_POST["nomecategoria"]}', descricaocategoria='{$_POST["descricaocategoria"]}' WHERE idcategoriaproduto ='{$_POST["idcategoriaproduto"]}' WHERE idcategoriaproduto = '{$_POST['idcategoriaproduto']}'";
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selCategoria.php'>
            <script type=\"text/javascript\">
                alert(\"Categoria Atualizada com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selCategoria.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Atualizar uma Categoria!\");
            </script>
        ";
    }
    $banco->close();
}
function updateSecao(){
    $banco = abrirBanco();
    $sql = "UPDATE localproduto SET secaoproduto='{$_POST["secaoproduto"]}' WHERE idlocalproduto ='{$_POST["idlocalproduto"]}'";
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selSecao.php'>
            <script type=\"text/javascript\">
                alert(\"Seção Atualizada com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selSecao.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Atualizar uma Seção!\");
            </script>
        ";
    }
    $banco->close();
}
function updateProduto(){
    $banco = abrirBanco();
    $idproduto = $_POST['idproduto'];
    $sql = "UPDATE produto SET nomeproduto='{$_POST["nomeproduto"]}', lote='{$_POST["lote"]}', valorvenda='{$_POST["valorvenda"]}', valorcompra='{$_POST["valorcompra"]}',"
    . "qtdestoque='{$_POST["qtdestoque"]}', categoriaproduto_idcategoriaproduto='{$_POST["categoriaproduto_idcategoriaproduto"]}', localproduto_idlocalproduto='{$_POST["localproduto_idlocalproduto"]}' WHERE idproduto ='$idproduto'";
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selProduto.php'>
            <script type=\"text/javascript\">
                alert(\"Produto Atualizado com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selProduto.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Atualizar uma Produto!\");
            </script>
        ";
    }
    $banco->close();
}
//---------------------------------------------//









//-----------DROP-----------//

function dropEstado(){
    $banco = abrirBanco();
    $sql = "DELETE FROM estado WHERE idestado='{$_POST["idestado"]}'"; 
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selEstado.php'>
            <script type=\"text/javascript\">
                alert(\"Estado Excluido com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selEstado.php'>
            <script type=\"text/javascript\">
                alert(\"Erro: Estado sendo utilizada em alguma Cidade!\");
            </script>
        ";
    }
    $banco->close();
}
function dropCidade(){
    $banco = abrirBanco();
    $sql = "DELETE FROM cidade WHERE idcidade='{$_POST["idcidade"]}'"; 
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selCidade.php'>
            <script type=\"text/javascript\">
                alert(\"Cidade Excluida com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selCidade.php'>
            <script type=\"text/javascript\">
                alert(\"Erro: Cidade sendo utilizada em alguma Pessoa!\");
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
                alert(\"Erro: Categoria sendo utilizada em algum Produto!\");
            </script>
        ";
    }
    $banco->close();
}
function dropSecao(){
    $banco = abrirBanco();
    $sql = "DELETE FROM localproduto WHERE idlocalproduto='{$_POST["idlocalproduto"]}'"; 
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selSecao.php'>
            <script type=\"text/javascript\">
                alert(\"Seção Excluida com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selSecao.php'>
            <script type=\"text/javascript\">
                alert(\"Erro: Seção sendo utilizada em algum Produto!\");
            </script>
        ";
    }
    $banco->close();
}
function dropProduto(){
    $banco = abrirBanco();
    $sql = "DELETE FROM produto WHERE idproduto='{$_POST["idproduto"]}'"; 
    $banco->query($sql);

    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selProduto.php'>
            <script type=\"text/javascript\">
                alert(\"Produto Excluido com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selProduto.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Excluir um Produto!\");
            </script>
        ";
    }
    $banco->close();
}
//---------------------------------------------//


?>