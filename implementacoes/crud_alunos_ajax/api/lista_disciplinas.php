<?php

require_once(__DIR__ . "/../controller/DisciplinaController.php");

//1- Entrada - ID do Curso
$idCurso = 0;
if(isset($_GET["id_curso"]))
    $idCurso = $_GET["id_curso"];

//echo $idCurso;

//2- Saída
$disciplinaCont = new DisciplinaController();
$disciplinas = $disciplinaCont->listarPorCurso($idCurso);

echo json_encode($disciplinas, 
                JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

