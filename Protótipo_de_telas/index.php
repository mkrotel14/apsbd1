<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Info Store</title>
    </head>
    
    <body>
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="home.php" target="Frame">Home</a></li>
                    <li><a href="#">Cadastro Produto</a>
                    <ul>
                        <li><a href="ccategoria.php" target="Frame">Categoria</a></li>
                        <li><a href="cproduto.php" target="Frame">Produto</a></li>
                    </ul>
                    </li>
                    <li><a href="#">Cadastro Endereço</a>
                    <ul>
                        <li><a href="cestado.php" target="Frame">Estado</a></li>
                        <li><a href="ccidade.php" target="Frame">Cidade</a></li>
                    </ul>
                    </li>
                    <li><a href="#">Cadastro Pessoa</a>
                    <ul>
                        <li><a href="cpfisica.php" target="Frame">Física</a></li>
                        <li><a href="cpjuridica.php" target="Frame">Jurídica</a></li>
                    </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div>
            <iframe name="Frame" src="home.php"></iframe>      
        </div>
    </body>
</html>
