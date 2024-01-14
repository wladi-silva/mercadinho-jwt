<?php

class PrecoInvalidoException extends Exception {
    
    public function __construct($mensagem = "<b>Preço do Produto</b> não pode ser menor ou igual a zero.", $codigo = 0, Exception $anterior = null) {
        parent::__construct($mensagem, $codigo, $anterior);
    }

}

?>
