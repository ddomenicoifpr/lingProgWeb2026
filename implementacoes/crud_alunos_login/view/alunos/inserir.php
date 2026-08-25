<?php

require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../model/Curso.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErro = "";
$aluno = NULL;

//Verificação: formulário já foi submetido?
if(isset($_POST['nome'])) {
    //1- Capturar os dados preenchidos no formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL;
    $estrang = trim($_POST['estrangeiro']) ? trim($_POST['estrangeiro']) : NULL;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL;  

    //2- Criar um objeto Aluno para persistí-lo
    $aluno = new Aluno();
    $aluno->setId(0);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrang);

    $curso = new Curso();
    $curso->setId($idCurso);
    $aluno->setCurso($curso);

    //3- Validar os dados
    //4- Persistir o objeto
    $alunoCont = new AlunoController();
    $erros = $alunoCont->inserir($aluno);

    if(empty($erros)) 
        header("location: listar.php");
    else
        $msgErro = implode("<br>", $erros);
}

require_once(__DIR__ . "/form.php");
?>