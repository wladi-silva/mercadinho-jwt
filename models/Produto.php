<?php

class Produto {
    private $nome;
    private $preco;
    private $quantidade;

    public function setProduto($data) {
        if (isset($data['nome']) && isset($data['preco']) && isset($data['quantidade'])) {
            // Verificação de preço
            $this->validarPreco($data['preco']);
            // Verificação de quantidade
            $this->validarQuantidade($data['quantidade']);

            $this->nome = $data['nome'];
            $this->preco = $data['preco'];
            $this->quantidade = $data['quantidade'];
        }
    }

    public function getProduto() {
        return [
            'nome' => $this->nome,
            'preco' => $this->preco,
            'quantidade' => $this->quantidade
        ];
    }

    // Validar preço menor ou igual a zero
    private function validarPreco($preco) {
        if ($preco <= 0) {
            // Lançar Exception preço invalida 
            throw new PrecoInvalidoException();
        }
    }

    // Validar preço menor ou igual a zero
    private function validarQuantidade($quantidade) {
        if ($quantidade <= 0) {
            // Lançar Exception quantidade invalida 
            throw new QuantidadeInvalidoException();
        }
    }

    
}

?>
