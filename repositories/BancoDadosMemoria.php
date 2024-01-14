<?php

// Inicia a sessão ou recupera uma existente
session_start();

// Para facilitar a homologação criei essa Classe para simular um Banco de Dados
class BancoDadosMemoria {

    public function __construct() {
        // Para simular um primeiro dados na tela, adicionei esses exemplos no construtor
        if (!isset($_SESSION['bancoDadosProdutos'])) {
            $_SESSION['bancoDadosProdutos'] = [
                ['nome' => 'Feijão', 'preco' => 9.05, 'quantidade' => 20],
                ['nome' => 'Arroz', 'preco' => 5.89, 'quantidade' => 20],
            ];
        }
    }

    // Realiza uma inserção na lista/tabela de produtos
    public function insertProduto($data) {
        $_SESSION['bancoDadosProdutos'][] = $data;
    }

    // Retorna todo o conteúdo da lista de produtos
    public function getAllProdutos() {
        return $_SESSION['bancoDadosProdutos'];
    }

}

?>