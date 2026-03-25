<?php

class FormatadorReais {

    public static function getValorFormatado(float $valor) {
        return "R$ " . number_format($valor, 2, ",", ".");
    }

}