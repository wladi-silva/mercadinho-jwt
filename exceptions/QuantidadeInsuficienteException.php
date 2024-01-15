<?php

class QuantidadeInsuficienteException extends Exception {
    
    public function __construct($mensagem = "<b>Quantidade do Produto</b> é maior do que a quantidade em estoque.", $codigo = 0, Exception $anterior = null) {
        parent::__construct($mensagem, $codigo, $anterior);
    }

}

?>
