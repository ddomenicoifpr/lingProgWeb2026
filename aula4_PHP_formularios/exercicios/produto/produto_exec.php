<?php

require_once("modelo/Produto.php");

$produto = new Produto();
$produto->setDescricao($_POST['descricao']);
$produto->setTipo($_POST['tipo']);
$produto->setMarca($_POST['marca']);
$produto->setValor($_POST['valor']);
$produto->setLinkImg($_POST['linkImg']);
$produto->setDescricaoDetalhada($_POST['descricaDet']);

//print_r($produto);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do produto</title>
</head>
<body>
    <h1>Dados do Produto</h1>

    <div>
        <span style="font-weight: bold;">Descrição: </span>
        <span><?= $produto->getDescricao() ?></span>
    </div>

    <div>
        <span style="font-weight: bold;">Tipo: </span>
        <span><?= $produto->getTipoDesc() ?></span>
    </div>

    <div>
        <span style="font-weight: bold;">Marca: </span>
        <span><?= $produto->getMarca() ?></span>
    </div>

    <div>
        <span style="font-weight: bold;">Valor: </span>
        <span><?= $produto->getValor() ?></span>
    </div>

    <div>
        <img src="<?= $produto->getLinkImg() ?>" width="100">
    </div>

    <div>
        <span style="font-weight: bold;">Descrição detalhada: </span>
        <span><?= $produto->getDescricaoDetalhada() ?></span>
    </div>


    <div>
        <a href="produto_form.php">Alterar produto</a>    
    </div>
</body>
</html>