<?php

include 'models/Produto.php';
include 'controllers/ProdutoController.php';
include 'repositories/BancoDadosMemoria.php';

// Instância da classe Produto
$produto = new Produto();
// Instância da classe BancoDadosMemoria
$bancoDados = new BancoDadosMemoria();
// Instância da classe ProdutoController
$produtoController = new ProdutoController($produto, $bancoDados);

// Verifica se existe dados do novo produto no POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadastrar'])) {
    // Dados do novo produto
    $novoProduto = [
        'nome' => $_POST['nome'],
        'preco' => $_POST['preco'],
        'quantidade' => $_POST['quantidade'],
    ];

    // Cadastrar o novo produto usando o Controller
    $produtoCadastrado = $produtoController->cadastrarProduto($novoProduto);
}

?>

<head>
    <link rel="stylesheet" href="./assets/css/produtos.css">
</head>

<body>
    <div class="background">
        <div class="conteudo-principal">

            <div class="card">
                <h1 class="titulo-laranja">Cadastro de Produtos</h1>
                <p class="acesso-email">Registre os produtos disponíveis no Mercadinho JWT.</p>

                <form class="formulario-cadastro" method="POST">
                    <div class="campo-laranja">
                        <div class="caixa-info">
                            <label class="texto-label">Nome do Produto</label>
                        </div>
                        <div class="entrada-input">
                            <input maxlength="250" type="text" placeholder="Nome do produto" class="input-padrao" value="" name="nome" required>
                        </div>
                    </div>

                    <div class="campo-laranja">
                        <div class="caixa-info">
                            <label class="texto-label">Preço do Produto</label>
                        </div>
                        <div class="entrada-input">
                            <input type="number" step="0.01" placeholder="0.00" class="input-padrao" value="" name="preco" required>
                        </div>
                    </div>

                    <div class="campo-laranja">
                        <div class="caixa-info">
                            <label class="texto-label">Quantidade em Estoque</label>
                        </div>
                        <div class="entrada-input">
                            <input type="number" placeholder="0" class="input-padrao" value="" name="quantidade" required>
                        </div>
                    </div>

                    <div class="acao-botao">
                        <button type="submit" class="botao-entrar" name="cadastrar">
                            <span class="texto-botao">Cadastrar Produto</span>
                        </button>
                    </div>
                </form>

            </div>

            <div class="card">
                <div class="lista-produtos">
                    <h2 class="titulo-lista">Produtos Cadastrados</h2>
                    <table class="tabela-produtos">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $produtosDoBanco = $bancoDados->getAllProdutos();
                                foreach ($produtosDoBanco as $produto) : ?>
                                    <tr>
                                        <td><?= $produto['nome']; ?></td>
                                        <td><?= $produto['preco']; ?></td>
                                        <td><?= $produto['quantidade']; ?></td>
                                    </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

