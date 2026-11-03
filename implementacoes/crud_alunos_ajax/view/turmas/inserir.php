<?php
#Página para incluir uma turma
require_once(__DIR__ . "/../login/verifica.php");

require_once(__DIR__ . "/../../model/Turma.php");
require_once(__DIR__ . "/../../model/Disciplina.php");
require_once(__DIR__ . "/../../controller/TurmaController.php");

$msgErro = null;
$turma = null;
$idCurso = 0; //Utilizado para mater o ID do curso de forma provisória

//Verifica se o formulário foi submetido
if(isset($_POST['ano'])) {
    //Captura os campos for formulário
    $ano = is_numeric($_POST['ano']) ? $_POST['ano'] : null;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : null;
    $idDisciplina = is_numeric($_POST['disciplina']) ? $_POST['disciplina'] : null;

    //Criar o objeto turma
    $turma = new Turma();
    $turma->setAno($ano);
    if($idDisciplina)
        $turma->setDisciplina(new Disciplina($idDisciplina));

    //Chama o controller para salvar a turma
    $turmaCont = new TurmaController();
    $erros = $turmaCont->salvar($turma);

    if(empty($erros)) {
        header("location: listar.php");
        exit;
    }

    //print_r($erros);
    $msgErro = implode("<br>", $erros);
}

include_once(__DIR__ . "/form.php");

?>