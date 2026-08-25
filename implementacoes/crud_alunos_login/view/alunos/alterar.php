<?php

require_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErro = "";
$aluno = NULL;

$alunoCont = new AlunoController();

//Verificação se o usuário já clicou no gravar
if(isset($_POST['nome'])) {
    //Atualizar os dados do aluno no banco de dados
    
    //1- Capturar os dados preenchidos no formulário
    $id = $_POST["id"];
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL;
    $estrang = trim($_POST['estrangeiro']) ? trim($_POST['estrangeiro']) : NULL;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL;

    //2- Criar um objeto Aluno para persistí-lo
    $aluno = new Aluno();
    $aluno->setId($id);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrang);

    $curso = new Curso();
    $curso->setId($idCurso);
    $aluno->setCurso($curso);

    //3- Validar os dados e salvar no banco
    $erros = $alunoCont->alterar($aluno);
    
    if(empty($erros)) 
        header("location: listar.php");
    else
        $msgErro = implode("<br>", $erros);
} else {
    //Carregar os dados do aluno a ser alterado
    $id = 0;
    if(isset($_GET['id']))
        $id = $_GET['id'];
    
    $aluno = $alunoCont->buscarPorId($id);
    if(! $aluno) {
        echo "ID do aluno inválido!<br>";
        echo "<a href='listar.php'>Voltar</a>"; 
        exit;
    }
}

require_once(__DIR__ . "/form.php");