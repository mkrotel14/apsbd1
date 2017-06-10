<?php
    include 'inc/funcoes.php';
    $banco = abrirBanco();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/cadastro.css">
        <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro de Pessoa</title>
    </head>
    
    <body>
        <form id="pessoa" name="Pessoa" action="cadfisica.php" method="POST">
            <div>
                Cliente
                <input type="radio" name="radio1" value="cliente"/>
                Funcionário
                <input type="radio" name="radio1" value="funcionario" /><br><br>
                Nome:
                <input type="text" name="nome" disabled="true" size="75" />
                RG:
                <input type="text" name="rg" disabled="true" size="20" />
                CPF:
                <input type="text" name="cpf" disabled="true" size="20" />
                Data de Nascimento:
                <input type="text" name="data_nasc" disabled="true" size="20" /><br><br>
                Rua:
                <input type="text" name="rua" disabled="true" size="75" />
                CEP:
                <input type="text" name="cep" disabled="true" size="20" />
                Bairro:
                <input type="text" name="bairro" disabled="true" size="20" /><br><br>
                Estado:
                <select name="estado" id="id_estado" disabled="true">
                    <option value="">Selecione o Estado</option>
                    <?php
                        $sql = "SELECT * FROM estado ORDER BY nomeestado";
                        $resultado = $banco->query($sql);
                        while($row_categ = mysqli_fetch_assoc($resultado)){ 
                    ?>
                    <option value="<?=$row_categ['idestado']?>"><?=$row_categ['nomeestado']?></option>
                    <?php
                        }
                    ?>  
                </select> 
                Cidade:
                <select name="cidade" id="id_cidade" disabled="true">
                    <option value="">Selecione a Cidade</option>
                </select>
                <h3>Contato</h3>          
                Telefone:
                <input type="text" name="telefone" disabled="true" size="20" />
                E-mail:
                <input type="text" name="email" disabled="true" size="30" /><br>
                <h3>Funcionário</h3>
                Função:
                <input type="text" name="funcao" disabled="true" size="50" />
                Data de Admissao:
                <input type="text" name="data_admsc" disabled="true" size="20" />
                Salário:
                <input type="text" name="salario" disabled="true" size="20" />
                Status:
                <input type="text" name="status" disabled="true" size="20" /><br><br>
                Login:
                <input type="text" name="login" disabled="true" size="25" />
                Senha:
                <input type="password" name="senha" disabled="true" size="25" /><br><br>
                <input type="submit" value="Cadastrar Pessoa"/>
                <input type="reset" value="Limpar Dados"/>
            </div>
        </form>
        <script src="js/radio.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1.4.2");
        </script>
        <script type="text/javascript">
            $(function(){
                $('$id_estado').change(function(){
                    if( $(this).val() ){
                        $('#id_cidade').hide();
                        $.getJSON('inc/sub_categoria_cidade.php?search=',{id_estado: $(this).val(), ajax: 'true'}, function(j){
                            var options = '<option value="">Selecione a cidade</option>';
                            for(var i=0 ; i<j.length ; i++){
                                options += '<option value="' + j[i].idcidade + '">' + j[i].nomecidade + '</option>';
                            }
                            $('#id_cidade').html(options).show();
                        });
                    }
                    else{
                        $('id_cidade').html('option value="">- Selecione a cidade -</option>');            
                    }
                });
            });        
        </script>
    </body>
</html>