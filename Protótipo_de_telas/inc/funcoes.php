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
    
    if($_POST["acao"]=="relProduto"){
        selectProdutoEstado();
    }
    
    if($_POST["acao"]=="relCompraF"){
        selectComprasFunc();
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
    
    if($_POST["acao"]=="alterarPJuridica"){
        updatePJuridica();
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
    
    if($_POST["acao"]=="excluirPJuridica"){
        dropPJuridica();
    }
}
//---------------------------------------------//








//-----------Conectar com o DataBase-----------//

function abrirBanco(){
    $connection = new mysqli("localhost","root","","apsbd1");
    if($connection->connect_error){
        die("Conexão com o banco falhou: " . $connection->connect_error);
    }
    mysqli_set_charset($connection,"utf8");
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
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/ccategoria.php'>
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
    $nomeproduto=$_POST["nomeproduto"];
    
    $ver = "SELECT * FROM produto WHERE nomeproduto = '$nomeproduto'";
    $resultado = $banco->query($ver);
    
    if(mysqli_num_rows($resultado) > 0 ){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cproduto.php'>
            <script type=\"text/javascript\">
                alert(\"Dados de Produto repetidos no Sistema!\");
            </script>
        ";
    }
    else{
    
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
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/csecao.php'>
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
    
//-----INSERT DE PESSOA JURIDICA-----//
    $sql = "INSERT INTO pessoa (tipopessoa) VALUES ('Juridica')";
    $banco->query($sql);
    
    //Seleciona o ID da Pessoa;
    $sql = "SELECT idpessoa FROM pessoa ORDER BY idpessoa DESC LIMIT 1";
    $dadosP = $banco->query($sql);
    $res_idpessoa = $dadosP->fetch_array();
    
    //Insere a Conexão entre Pessoa e Jurídica;
    $sql = "INSERT INTO juridica (cnpj, inscrestad, razaosocial, nomefantasia, pessoa_idpessoa) VALUES ('{$_POST["cnpj"]}', '{$_POST["inscrestad"]}', '{$_POST["razaosocial"]}', '{$_POST["nomefantasia"]}', '".$res_idpessoa['idpessoa']."') ";
    $banco->query($sql);
    
//-----INSERT DE CONTATO-----//
    $sql = "INSERT INTO contato (telefone, email) VALUES ('{$_POST["telefone"]}','{$_POST["email"]}')";
    $banco->query($sql);
    
    //Seleciona o ID do Contato e da Pessoa;
    $sqlC = "SELECT idcontato FROM contato ORDER BY idcontato DESC LIMIT 1";
    $sqlP = "SELECT idpessoa FROM pessoa ORDER BY idpessoa DESC LIMIT 1";
    $dadosC = $banco->query($sqlC);
    $dadosP = $banco->query($sqlP);
    $res_idcontato = $dadosC->fetch_array();
    $res_idpessoa = $dadosP->fetch_array();
    
    //Insere a Conexão entre Pessoa e Contato;
    $sql = "INSERT INTO contatopessoa (pessoa_idpessoa, contato_idcontato) VALUES ('".$res_idpessoa['idpessoa']."','".$res_idcontato['idcontato']."')";
    $banco->query($sql);
    
//-----INSERT DE ENDEREÇO-----//    
    $sql = "INSERT INTO endereco (logradouro, cep, bairro, cidade_idcidade) VALUES ('{$_POST["logradouro"]}','{$_POST["cep"]}','{$_POST["bairro"]}','{$_POST["cidade_idcidade"]}')";
    $banco->query($sql);
    
    //Seleciona o ID do Endereço da Pessoa;
    $sqlE = "SELECT idendereco FROM endereco ORDER BY idendereco DESC LIMIT 1";
    $sqlP = "SELECT idpessoa FROM pessoa ORDER BY idpessoa DESC LIMIT 1";
    $dadosE = $banco->query($sqlE);
    $dadosP = $banco->query($sqlP);
    $res_endereco = $dadosE->fetch_array();
    $res_idpessoa = $dadosP->fetch_array();
    
    //Insere a Conexão entre Pessoa e Endereço;
    $sql = "INSERT INTO enderecopessoa (endereco_idendereco, pessoa_idpessoa, numero, complemento) VALUES ('".$res_endereco['idendereco']."','".$res_idpessoa['idpessoa']."','{$_POST["numero"]}','{$_POST["complemento"]}')";
    $banco->query($sql);
    
    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cpjuridica.php'>
            <script type=\"text/javascript\">
                alert(\"Fornecedor Cadastrado com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/cpjuridica.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Cadastrar um Fornecedor!\");
            </script>
        ";

    }
    $banco->close();
}
//---------------------------------------------//









//-----------SELECT-----------//

function selectAllProduto(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM produto P, categoriaproduto C, localproduto L WHERE P.categoriaproduto_idcategoriaproduto = C.idcategoriaproduto AND P.localproduto_idlocalproduto = L.idlocalproduto ORDER BY nomeproduto";
    $resultado = $banco->query($sql);
    $banco->close();
    
    while($row_lista = $resultado->fetch_array()){
        $array[] = $row_lista;
    }
    if (empty($array)) {
        echo '<h3>Nenhum Produto encontrado no Sistema</h3>';
        exit();
    }
    else{
        return $array;
    }
}
function selectAllSecao(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM localproduto ORDER BY secaoproduto";
    $resultado = $banco->query($sql);
    $banco->close();
    
    while($row_lista = $resultado->fetch_array()){
        $array[] = $row_lista;
    }
    if (empty($array)) {
        echo '<h3>Nenhuma Seção encontrada no Sistema</h3>';
        exit();
    }
    else{
        return $array;
    }
}
function selectAllEstados(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM estado ORDER BY uf";
    $resultado = $banco->query($sql);
    $banco->close();
    
    while($row_lista = $resultado->fetch_array()){
        $array[] = $row_lista;
    }
    if (empty($array)) {
        echo '<h3>Nenhum Estado encontrado no Sistema</h3>';
        exit();
    }
    else{
        return $array;
    }
}
function selectAllCategorias(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM categoriaproduto ORDER BY nomecategoria";
    $resultado = $banco->query($sql);
    $banco->close();
    
    while($row_lista = $resultado->fetch_array()){
        $array[] = $row_lista;
    }
    if (empty($array)) {
        echo '<h3>Nenhuma Categoria encontrada no Sistema</h3>';
        exit();
    }
    else{
        return $array;
    }
    
}
function selectAllCidades(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM cidade C, estado E WHERE C.estado_idestado = E.idestado ORDER BY estado_idestado";
    $resultado = $banco->query($sql);
    $banco->close();
    
    while($row_lista = $resultado->fetch_array()){
        $array[] = $row_lista;
    }
    if (empty($array)) {
        echo '<h3>Nenhuma Cidade encontrada no Sistema</h3>';
        exit();
    }
    else{
        return $array;
    }
}
function selectAllPJuridica(){
    $banco = abrirBanco();
    $sql = "SELECT * FROM pessoa P, juridica J, contato C, contatopessoa CP, enderecopessoa ED, endereco E, cidade CI WHERE P.idpessoa = J.pessoa_idpessoa AND P.idpessoa = ED.pessoa_idpessoa AND E.idendereco = ED.endereco_idendereco AND P.idpessoa = CP.pessoa_idpessoa AND C.idcontato = CP.contato_idcontato AND E.cidade_idcidade = CI.idcidade ORDER BY P.idpessoa";
    $resultado = $banco->query($sql);
    $banco->close();
    
    while($row_lista = $resultado->fetch_array()){
        $array[] = $row_lista;
    }
    if (empty($array)) {
        echo '<h3>Nenhuma Pessoa encontrada no Sistema</h3>';
        exit();
    }
    else{
        return $array;
    }
    
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
function selectIdPessoa($idpessoa){
    $banco = abrirBanco();
    $sql = "SELECT * FROM pessoa P, juridica J, contato C, contatopessoa CP, enderecopessoa ED, endereco E, cidade CI WHERE P.idpessoa ='{$idpessoa}' AND P.idpessoa = J.pessoa_idpessoa AND P.idpessoa = ED.pessoa_idpessoa AND E.idendereco = ED.endereco_idendereco AND P.idpessoa = CP.pessoa_idpessoa AND C.idcontato = CP.contato_idcontato AND E.cidade_idcidade = CI.idcidade ORDER BY P.idpessoa";
    $resultado = $banco->query($sql);
    $banco->close();
    
    return mysqli_fetch_assoc($resultado);
}
function selectProdutoEstado(){
    $banco = abrirBanco();
    
    $estadoP = $_POST['nomeestado'];
    
    $sqlP = "SELECT P.nomeproduto, P.valorvenda FROM produto P, prodvendido PV, venda V, cliente C, fisica F, pessoa PE, enderecopessoa ED, endereco E, cidade CI, estado ES WHERE P.idproduto = PV.produto_idproduto AND V.idvenda = PV.venda_idvenda AND C.idcliente = V.cliente_idcliente AND F.idfisica = C.fisica_idfisica AND PE.idpessoa = F.pessoa_idpessoa AND PE.idpessoa = ED.pessoa_idpessoa AND E.idendereco = ED.endereco_idendereco AND CI.idcidade = E.cidade_idcidade AND CI.estado_idestado = ES.idestado AND ES.nomeestado LIKE '$estadoP'";
    $resP = $banco->query($sqlP);    

    if(mysqli_affected_rows($banco) != 0){
        echo '<h3>Lista de Produtos vendidos para o estado '.$estadoP.'';
        echo '<br><br>';
        while($row_lista = $resP->fetch_array()){
            echo ' 
            <table>
                <thead>
                    <tr>
                        <td><h4>Nome do Produto:</h4></td>
                        <td>'.$row_lista['nomeproduto'].'</td>
                    </tr>    
                </thead> 
                <tbody>
                    <tr>
                        <td><h4>Valor da Venda:</h4></td>
                        <td>'.$row_lista['valorvenda'].'</td> 
                    </tr>
                </tbody>
            </table><hr class="style18">  
            ';
        }
        echo ' 
        <form name="voltar" action="../relProdEst.php" method="POST"><br>
            <input type="submit" value="Voltar"/>
        </form>';
    }
    else{
        echo '<h3>Nenhum Produto vendido para o estado '.$estadoP.'';
        echo ' 
        <form name="voltar" action="../relProdEst.php" method="POST"><br>
            <input type="submit" value="Voltar"/>
        </form>';
    }
    $banco->close();
}
function selectComprasFunc(){
    $banco = abrirBanco();
    $idfisica = $_POST['nome'];
     
    $sqlN = "SELECT nome FROM fisica WHERE idfisica = '$idfisica'";
    $resN = $banco->query($sqlN);
    $row_resN = mysqli_fetch_array($resN);
    
    $sqlF = "SELECT F.nome, J.nomefantasia, PR.nomeproduto, PC.valorunitarioc, PC.qtdcomprada FROM pessoa P, juridica J, fornecedor FO, compra C, produtocomprado PC, produto PR, funcionario FU, fisica F WHERE F.idfisica = 1 AND F.idfisica = FU.fisica_idfisica AND P.idpessoa = J.pessoa_idpessoa AND J.idjuridica = FO.juridica_idjuridica AND FO.idfornecedor = C.fornecedor_idfornecedor AND FU.idfuncionario = C.funcionario_idfuncionario AND C.idcompra = PC.compra_idcompra AND PR.idproduto = PC.produto_idproduto";
    $resF = $banco->query($sqlF);
    
    if(mysqli_affected_rows($banco) != 0 ){
        echo '<h3>Lista de Produtos Comprados do Vendedor: '.$row_resN["nome"].''; 
        echo '<br><br>';
        
        while($row_lista = $resF->fetch_array()){
           echo '    
           <table>
                    <tr>
                        <td><h4>Nome da Empresa:</h4></td>
                        <td>'.$row_lista['nomefantasia'].'</td>
                    </tr>    
                    <tr>
                        <td><h4>Nome do Produto:</h4></td>
                        <td>'.$row_lista['nomeproduto'].'</td> 
                    </tr>
                    <tr>
                        <td><h4>Valor da Compra:</h4></td>
                        <td>'.$row_lista['valorunitarioc'].'</td> 
                    </tr>
                    <tr>
                        <td><h4>Quantidade:</h4></td>
                        <td>'.$row_lista['qtdcomprada'].'</td> 
                    </tr>
            </table><hr>  
            ';           
        }
        echo ' 
        <form name="voltar" action="../relCompFunc.php" method="POST"><br>
            <input type="submit" value="Voltar"/>
        </form>';
    }
    else{
        echo '<h3>Nenhum Produto Comprado pelo vendedor: '.$row_resN["nome"].'';
        echo ' 
        <form name="voltar" action="../relCompFunc.php" method="POST"><br>
            <input type="submit" value="Voltar"/>
        </form>';
    }
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
    $sql = "UPDATE categoriaproduto SET nomecategoria='{$_POST["nomecategoria"]}', descricaocategoria='{$_POST["descricaocategoria"]}' WHERE idcategoriaproduto ='{$_POST["idcategoriaproduto"]}'";
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
function updatePJuridica(){
    $banco = abrirBanco();
    $idpessoa = $_POST['idpessoa'];
    
    $sqlP = "UPDATE juridica SET razaosocial='{$_POST["razaosocial"]}', nomefantasia='{$_POST["nomefantasia"]}', cnpj='{$_POST["cnpj"]}', inscrestad='{$_POST["inscrestad"]}' WHERE pessoa_idpessoa='$idpessoa'";
    $banco->query($sqlP);
    
    $sqlCP = "SELECT contato_idcontato FROM contatopessoa WHERE pessoa_idpessoa='$idpessoa'";
    $dadosCP = $banco->query($sqlCP);
    $res_contatoP = $dadosCP->fetch_assoc();
    
    $sqlC = "UPTADE contato SET telefone='{$_POST["telefone"]}', email='{$_POST["email"]}' WHERE idcontato='".$res_contatoP['contato_idcontato']."'";
    $banco->query($sqlC);
    
    $sqlEP = "SELECT endereco_idendereco FROM enderecopessoa WHERE pessoa_idpessoa='$idpessoa'";
    $dadosEP = $banco->query($sqlEP);
    $res_enderecoP = $dadosEP->fetch_array();
    
    $sqlE = "UPDATE endereco SET logradouro='{$_POST["logradouro"]}', cep='{$_POST["cep"]}', bairro='{$_POST["bairro"]}', cidade_idcidade='{$_POST["cidade_idcidade"]}' WHERE idendereco='".$res_enderecoP['endereco_idendereco']."'";
    $banco->query($sqlE);
    
    $sqlUEP = "UPDATE enderecopessoa SET numero='{$_POST["numero"]}', complemento='{$_POST["complemento"]} WHERE pessoa_idpessoa='$idpessoa'";
    $banco->query($sqlUEP);
    
    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selPJuridica.php'>
            <script type=\"text/javascript\">
                alert(\"Pessoa Jurídica Atualizada com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selPJuridica.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Atualizar uma Pessoa Juridica!\");
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
function dropPJuridica(){
    $banco = abrirBanco();    
    $idpessoa = $_POST['idpessoa'];
    
    $sqlCP = "SELECT contato_idcontato FROM contatopessoa WHERE pessoa_idpessoa='$idpessoa'";
    $dadosCP = $banco->query($sqlCP);
    $res_contatoP = $dadosCP->fetch_assoc();
    
    $sqlC = "DELET FROM contato WHERE idcontato = ".$res_contatoP['contato_idcontato']."'";
    $banco->query($sqlC);
    
    $sqlDCP = "DELETE FROM contatopessoa WHERE pessoa_idpessoa = '$idpessoa'";
    $banco->query($sqlDCP);
    
    $sqlEP = "SELECT endereco_idendereco FROM enderecopessoa WHERE pessoa_idpessoa='$idpessoa'";
    $dadosEP = $banco->query($sqlEP);
    $res_enderecoP = $dadosEP->fetch_array();
    
    $sqlE = "DELETE FROM endereco WHERE idendereco ='".$res_enderecoP['endereco_idendereco']."'";
    $banco->query($sqlE);
    
    $sqlDEP = "DELETE FROM enderecopessoa WHERE pessoa_idpessoa ='$idpessoa'";
    $banco->query($sqlDEP);
    
    $sqlP = "DELETE FROM juridica WHERE pessoa_idpessoa = '$idpessoa'";
    $banco->query($sqlP);
    
    $sqlDP = "DELETE FROM pessoa WHERE idpessoa = '$idpessoa'";
    $banco->query($sqlDP);
    
    if(mysqli_affected_rows($banco) != 0){
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selPJuridica.php'>
            <script type=\"text/javascript\">
                alert(\"Pessoa Jurídica Excluida com sucesso!\");
            </script>
        ";
    }
    else{
        echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/apsbd1/selPJuridica.php'>
            <script type=\"text/javascript\">
                alert(\"Erro ao Excluir uma Pessoa Jurídica!\");
            </script>
        ";
    }
    $banco->close();
}
//---------------------------------------------//


?>