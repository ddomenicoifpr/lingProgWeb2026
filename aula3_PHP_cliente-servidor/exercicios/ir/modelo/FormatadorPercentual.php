<?php

class FormatadorPercentual {

    public static function getValorFormatado(float $valor) {
        return number_format($valor, 1, ",", ".") . "%";
    }

}