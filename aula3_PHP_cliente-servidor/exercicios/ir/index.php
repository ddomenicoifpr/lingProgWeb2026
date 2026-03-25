<?php

require_once("modelo/ImpostoRenda.php");
require_once("modelo/FormatadorReais.php");
require_once("modelo/FormatadorPercentual.php");

$renda = 0;
if(isset($_GET['renda']))
    $renda = $_GET['renda'];

if($renda <= 0) {
    echo "Informe o parâmetro [renda] com um valor maior que 0!";
    exit; //Comando exit encerra a requisição
}

echo "<h1>Calculadora do Imposto de Renda</h1>";

$impostoRenda = new ImpostoRenda($renda);
echo "<span style='font-weight: bold;'>Renda: </span>" . 
            FormatadorReais::getValorFormatado($impostoRenda->getRenda());
echo "<br><br>";

echo "<span style='font-weight: bold;'>Total do imposto: </span>" . 
            FormatadorReais::getValorFormatado($impostoRenda->getTotalImposto());
echo "<br>";

echo "<span style='font-weight: bold;'>Faixa 1: </span>" . 
            FormatadorReais::getValorFormatado($impostoRenda->getImpostoFaixa1());
echo "<br>";

echo "<span style='font-weight: bold;'>Faixa 2: </span>" . 
            FormatadorReais::getValorFormatado($impostoRenda->getImpostoFaixa2());
echo "<br>";

echo "<span style='font-weight: bold;'>Faixa 3: </span>" . 
            FormatadorReais::getValorFormatado($impostoRenda->getImpostoFaixa3());
echo "<br>";

echo "<span style='font-weight: bold;'>Faixa 4: </span>" . 
            FormatadorReais::getValorFormatado($impostoRenda->getImpostoFaixa4());
echo "<br>";

echo "<span style='font-weight: bold;'>Faixa 5: </span>" . 
            FormatadorReais::getValorFormatado($impostoRenda->getImpostoFaixa5());
echo "<br><br>";

echo "<span style='font-weight: bold;'>Alíquota: </span>" . 
            FormatadorPercentual::getValorFormatado($impostoRenda->getPercentualAliquota());
echo "<br><br>";




