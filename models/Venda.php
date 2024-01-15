<?php

include 'Produto.php';
include 'repositories/BancoDadosMemoria.php';

class Venda {
    // Injeção de dependência da Classe Produto
    private $produto;
    /* Injeção de dependência da Classe BancoDadosMemoria, para seguir o solicitado no desafio
        irei utilizar no model, porém as regras de negócio e consultas devem ficar na camada service. */
    private $bancoDados;
    private $quantidade;
    private $desconto;


    public function __construct(Produto $produto, $quantidade, $desconto, BancoDadosMemoria $bancoDados) {
        $this->produto = $produto;
        $this->bancoDados = $bancoDados;
        $this->quantidade = $quantidade;
        $this->desconto = $desconto;
    }

    public function setVenda() {
        // Verificação de quantidade
        $this->produto->validarQuantidade($this->quantidade);
        
        // Busca o produto em BancoDadosMemoria
        $produtoEstoque = $this->bancoDados->procurarProduto($this->produto->getNome());

        if (isset($produtoEstoque)) {
            // Valida o estoque do produto
            if ($produtoEstoque['quantidade'] >= $this->quantidade) {

                // Atualiza o estoque do produto após a venda
                $this->bancoDados->atualizarEstoque($this->produto, $this->quantidade);
                
                // Registra a venda no BancoDadosMemoria
                $this->bancoDados->insertVenda([
                    'nome' => $this->produto->getNome(),
                    'quantidade' => $this->quantidade
                ]);

                // Retorna os detalhes da última venda
                return $this->getVenda(); 

            } else {
                // Quantidade insuficiente no estoque
                throw new QuantidadeInsuficienteException();
            }
        }
    }

    public function getVenda() {
        return [
            'produto' => $this->produto->getProduto(),
            'quantidade' => $this->quantidade,
            'desconto' => $this->desconto
        ];
    }

}

?>
