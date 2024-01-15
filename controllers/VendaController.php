<?php

include_once 'exceptions/QuantidadeInsuficienteException.php';

// Classe Controller das vendas para adiministrar e orquestrar as movimentações do usuário
class VendaController {
    // Injeção de dependência da Classe Venda
    private $venda;
    // Injeção de dependência da Classe BancoDadosMemoria
    private $bancoDados;
    
    public function __construct($venda, $bancoDados) {
        $this->venda = $venda;
        $this->bancoDados = $bancoDados;
    }

    public function cadastrarVenda() {
        try {
            $this->venda->setVenda();
            return $this->listarVendas();
        } catch (QuantidadeInsuficienteException | QuantidadeInvalidaException $e) {
            // Exibe uma mensagem de erro em Tela
            echo '<div style="border: 2px solid red; padding: 10px; background-color: #ffe6e6;">';
            echo "Erro: " . $e->getMessage();
            echo '</div>';
            return null; 
        }
    }

    public function listarVendas() {
        // Retorna todos as vendas do Banco de Dados em Memoria
        return $this->bancoDados->getAllVendas();
    }

}

?>
