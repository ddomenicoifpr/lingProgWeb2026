<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Curso.php");

class CursoDAO {

    public function list() {
        $sql = "SELECT * FROM cursos";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute();
        $dados = $stm->fetchAll();
        return $this->map($dados);
    }

    private function map(array $dados) {
        $cursos = array();

        foreach($dados as $d) {
            $curso = new Curso();
            $curso->setId($d['id']);
            $curso->setNome($d["nome"]);
            $curso->setTurno($d["turno"]);

            array_push($cursos, $curso);
        }

        return $cursos;
    }

}