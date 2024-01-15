<?php

include 'models/Venda.php';
include 'controllers/VendaController.php';
include_once 'repositories/BancoDadosMemoria.php';

// Instância da classe BancoDadosMemoria
$bancoDados = new BancoDadosMemoria();

// Verifica se existe dados da nova venda no POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vender'])) {
    // Dados do produto vendido
    $produto = new Produto($_POST['nome']);
    // Instância da classe Venda
    $venda = new Venda($produto, $_POST['quantidade'], $_POST['desconto'], $bancoDados);
    // Instância da classe VendaController
    $vendaController = new VendaController($venda, $bancoDados);

    // Cadastrar o novo produto usando o Controller
    $vendaController->cadastrarVenda();
}

?>

<head>
    <link rel="stylesheet" href="./assets/css/principal.css">
</head>

<body>
    <div class="background">
        <div class="conteudo-principal">

            <div class="card">
                <h1 class="titulo-laranja">Registro de Vendas</h1>
                <p class="acesso-email">Registre as vendas realizadas no Mercadinho JWT.</p>

                <form class="formulario-cadastro" method="POST">
                    <div class="campo-laranja">
                        <div class="caixa-info">
                            <label class="texto-label">Nome do Produto</label>
                        </div>
                        <div class="entrada-input">
                            <select name="nome" class="input-padrao select" required>
                                <option value="" disabled selected>Selecione o produto</option>
                                <?php
                                $produtosBanco = $bancoDados->getAllProdutos();
                                foreach ($produtosBanco as $produto) : ?>
                                    <option value="<?= $produto['nome']; ?>"><?= $produto['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="campo-laranja">
                        <div class="caixa-info">
                            <label class="texto-label">Quantidade do Produto</label>
                        </div>
                        <div class="entrada-input">
                            <input type="number" placeholder="0" class="input-padrao" value="" name="quantidade" required>
                        </div>
                    </div>

                    <div class="campo-laranja">
                        <div class="caixa-info">
                            <label class="texto-label">Desconto</label>
                        </div>
                        <div class="entrada-input">
                            <input type="number" placeholder="0" class="input-padrao" value="" name="desconto" required>
                        </div>
                    </div>

                    <div class="acao-botao">
                        <button type="submit" class="botao-entrar" name="vender">
                            <span class="texto-botao">Registrar Venda</span>
                        </button>
                    </div>
                </form>

            </div>

            <div class="card">
                <div class="lista-vendas">
                    <h2 class="titulo-lista">Vendas Registradas</h2>
                    <table class="tabela-produtos">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $vendasBanco = $bancoDados->getAllVendas();
                            foreach ($vendasBanco as $venda) : ?>
                                <tr>
                                    <td><?= $venda['nome']; ?></td>
                                    <td><?= $venda['quantidade']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>