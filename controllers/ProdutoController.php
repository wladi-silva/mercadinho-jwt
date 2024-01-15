<?php

include_once 'exceptions/QuantidadeInvalidaException.php';
include_once 'exceptions/PrecoInvalidoException.php';

// Classe Controller dos produtos para adiministrar e orquestrar as movimentações do usuário
class ProdutoController {
    // Injeção de dependência da Classe Produto
    private $produto;
    // Injeção de dependência da Classe BancoDadosMemoria
    private $bancoDados;

    public function __construct($produto, $bancoDados) {
        $this->produto = $produto;
        $this->bancoDados = $bancoDados;
    }

    public function cadastrarProduto($data) {
        try {
            // Cadastrar um novo Produto
            $this->produto->setProduto($data);

            // Adicionar o novo produto ao BancoDadosMemoria
            $this->bancoDados->insertProduto($data);

            // Atualiza a visualização com os detalhes do novo produto
            $produtos = $this->listarProdutos();
            return $produtos;
        } catch (PrecoInvalidoException | QuantidadeInvalidaException $e) {
            // Exibe uma mensagem de erro em Tela
            echo '<div style="border: 2px solid red; padding: 10px; background-color: #ffe6e6;">';
            echo "Erro: " . $e->getMessage();
            echo '</div>';
            return null; 
        }
    }

    public function listarProdutos() {
        // Retorna todos os produtos do Banco de Dados em Memoria
        return $this->bancoDados->getAllProdutos();
    }

}

?>
