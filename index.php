<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadinho JWT</title>
    <link rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/menu.css">
</head>

<body>
    <div class="wrapper">

        <div class="menu">
            <img src="./assets/images/logo.png" alt="Logo">
            <ul>
                <li><a href="?page=cadastro_produtos">Cadastro de Produtos</a></li>
                <li><a href="?page=venda_produto">Venda de Produtos</a></li>
            </ul>
        </div>

        <div class="menu-conteudo-principal">
            <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    include("pages/$page.php");
                }
            ?>
        </div>
    </div>
</body>

</html>