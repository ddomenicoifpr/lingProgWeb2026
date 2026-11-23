<?php

require_once(__DIR__ . "/../model/Turma.php");
require_once(__DIR__ . "/../controller/TurmaController.php");

$idDisciplina = (is_numeric($_POST["disciplina"]) and $_POST["disciplina"] > 0)
                    ? $_POST["disciplina"] : NULL;
$ano          = is_numeric($_POST["ano"]) ? $_POST["ano"] : NULL; 


$turma = new Turma();
$turma->setAno($ano);

$disciplina = new Disciplina($idDisciplina);
$turma->setDisciplina($disciplina);

$turmaCont = new TurmaController();
$erros = $turmaCont->salvar($turma);

$msgErro = implode("<br>", $erros);
echo $msgErro;

