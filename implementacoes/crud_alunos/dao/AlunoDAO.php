<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Aluno.php");

class AlunoDAO {

    public function list() {
        $sql = "SELECT * FROM alunos";
        
        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute();
        
        $dados = $stm->fetchAll();
        return $this->map($dados);
    }

    private function map(array $dados) {
        $alunos = array();
        foreach($dados as $d) {
            $aluno = new Aluno();
            $aluno->setId($d['id']);
            $aluno->setNome($d["nome"]);
            $aluno->setIdade($d["idade"]);
            $aluno->setEstrangeiro($d["estrangeiro"]);
            
            $curso = new Curso();
            $curso->setId($d["id_curso"]);
            $aluno->setCurso($curso);

            array_push($alunos, $aluno);
        }
        return $alunos;
    }

}