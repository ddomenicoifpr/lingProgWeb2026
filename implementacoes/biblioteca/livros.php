<?php

//Exibir erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("util/Conexao.php");

$conexao = Conexao::getConexao();
//print_r($conexao);

//Salvar o livro
if(isset($_POST['titulo'])) {
    echo "Já clicou no gravar!";
}

//Listagem dos livros
$sql = "SELECT * FROM livros";
$stm = $conexao->prepare($sql);
$stm->execute();
$livros = $stm->fetchAll();

//echo "<pre>" . print_r($livros, true) . "</pre>";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>
<body>

    <h1>Cadastro de livros</h1>

    <h3>Listagem</h3>

    <table border="1">
        <!-- Cabeçalho -->
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Gênero</th>
            <th>Páginas</th>
        </tr> 

        <!-- Dados -->
        <?php foreach($livros as $l): ?>
            <tr>
                <td><?= $l["id"] ?></td>
                <td><?= $l["titulo"] ?></td>
                <td>
                    <?php
                        if($l['genero'] == 'D')
                            echo "Drama";
                        else if($l['genero'] == 'F')
                            echo "Ficção";
                        else if($l['genero'] == 'R')
                            echo "Romance";
                        else if($l['genero'] == 'O')
                            echo "Outro";                        
                    ?>
                </td>
                <td><?= $l["qtd_paginas"] ?></td>
            </tr>
        
        <?php endforeach; ?>
    </table>


    <h3>Formulário</h3>

    <form action="" method="POST">

        <input type="text" placeholder="Informe o título"
            name="titulo">

        <br><br>

        <select name="genero">
            <option value="">---Selecione o gênero---</option>
            <option value="D">Drama</option>
            <option value="F">Ficção</option>
            <option value="R">Romance</option>
            <option value="O">Outro</option>
        </select>

        <br><br>

        <input type="number" name="paginas" 
            placeholder="Informe o número de páginas">

        <br><br>

        <button>Gravar</button>

    </form>
    
</body>
</html>