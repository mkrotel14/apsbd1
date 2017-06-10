<!DOCTYPE html>
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
                    <li><a href="#">Cadastros</a>
                        <ul>
                            <li><a href="#">Gerenciar Pessoas</a>
                                <ul>
                                    <li><a href="cpfisica.php" target="Frame">Física</a></li>
                                    <li><a href="cpjuridica.php" target="Frame">Jurídica</a></li>
                                </ul>
                            </li>
                            <li><a href="ccategoria.php" target="Frame">Gerenciar Categoria de produto</a></li>
                            <li><a href="cproduto.php" target="Frame">Gerenciar Produto</a></li>
                            <li><a href="cestado.php" target="Frame">Gerenciar Estado</a></li>
                            <li><a href="ccidade.php" target="Frame">Gerenciar Cidade</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Relatórios</a>
                        <ul>
                            <li><a href="#.php" target="Frame">Clientes(Física)</a></li>
                            <li><a href="#.php" target="Frame">Clientes(Juridica)</a></li>
                            <li><a href="#.php" target="Frame">Fornecedor</a></li>
                            <li><a href="#.php" target="Frame">Produtos</a></li>
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
