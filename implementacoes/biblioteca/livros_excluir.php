<?php

require_once("util/Conexao.php");

//1- Identificar qual livro o usuário quer excluir
//2- Validar se o identificador do livro foi recebido
$id = 0;
if(isset($_GET['id']))
    $id = $_GET['id'];

if($id > 0) {
    //3- Excluir o livro do banco de dados (SQL)
    $conexao = Conexao::getConexao();
    
    $sql = "DELETE FROM livros WHERE id = ?";
    $stm = $conexao->prepare($sql);
    $stm->execute([$id]);

    //4- Redirecionar para a listagem de livros
    header("location: livros.php");

} else {
    echo "Parâmetro ID inválido!<br>";
    echo "<a href='livros.php'>Voltar</a>";
}