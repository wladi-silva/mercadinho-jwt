<?php

class QuantidadeInvalidoException extends Exception {
    
    public function __construct($mensagem = "<b>Quantidade em Estoque</b> não pode ser menor ou igual a zero.", $codigo = 0, Exception $anterior = null) {
        parent::__construct($mensagem, $codigo, $anterior);
    }

}

?>
