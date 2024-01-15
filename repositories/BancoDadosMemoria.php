<?php

// Inicia a sessão ou recupera uma existente
session_start();

// Para facilitar a homologação criei essa Classe para simular um Banco de Dados
class BancoDadosMemoria {

    public function __construct() {
        
        if (!isset($_SESSION['bancoDadosProdutos'])) {
            // Para simular um primeiro dados na tela, adicionei esses exemplos no construtor
            $_SESSION['bancoDadosProdutos'] = [
                ['nome' => 'Feijão', 'preco' => 9.05, 'quantidade' => 20],
                ['nome' => 'Arroz', 'preco' => 5.89, 'quantidade' => 20],
            ];
        }

        if (!isset($_SESSION['bancoDadosVendas'])) {
            $_SESSION['bancoDadosVendas'] = [];
        }

    }
    
    // Atualiza a quantidade do produto 
    public function atualizarEstoque($produto, $quantidade) {
        // Percorre todo os dados cadastrados para achar o produto certo
        foreach ($_SESSION['bancoDadosProdutos'] as &$produtoBanco) {
            if ($produtoBanco['nome'] === $produto->getNome()) {
                // Subtrai a quantidade do produto
                $produtoBanco['quantidade'] -= $quantidade;
                break;
            }
        }
    }


    // Realiza uma inserção na lista/tabela de produtos
    public function insertProduto($data) {
        $_SESSION['bancoDadosProdutos'][] = $data;
    }

    public function procurarProduto($nome) {
        // Percorre todo os dados cadastrados para achar o produto certo
        foreach ($_SESSION['bancoDadosProdutos'] as $produto) {
            if ($produto['nome'] === $nome) {
                // Retorna o produto pesquisado
                return $produto;
            }
        }
        return null;
    }

    // Retorna todo o conteúdo da lista de produtos
    public function getAllProdutos() {
        return $_SESSION['bancoDadosProdutos'];
    }

    // Realiza uma inserção na lista/tabela de produtos
    public function insertVenda($data) {
        $_SESSION['bancoDadosVendas'][] = $data;
    }

    // Retorna todo o conteúdo da lista de produtos
    public function getAllVendas() {
        return $_SESSION['bancoDadosVendas'];
    }

}

?>