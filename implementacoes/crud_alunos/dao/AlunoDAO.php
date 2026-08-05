<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Aluno.php");

class AlunoDAO {

    public function list() {
        $sql = "SELECT a.*, c.nome nome_curso, c.turno turno_curso 
                FROM alunos a
                JOIN cursos c ON (c.id = a.id_curso)";
        
        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute();
        
        $dados = $stm->fetchAll();
        return $this->map($dados);
    }

    public function insert(Aluno $aluno) {
        try {
            $sql = "INSERT INTO alunos (nome, idade, estrangeiro, id_curso)
                    VALUES (:nome, :idade, :estrang, :id_curso)";

            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindValue("nome", $aluno->getNome());
            $stm->bindValue("idade", $aluno->getIdade());
            $stm->bindValue("estrang", $aluno->getEstrangeiro());
            $stm->bindValue("id_curso", $aluno->getCurso()->getId());
            $stm->execute();
            return "";
        } catch(PDOException $e) {
            return "Erro ao salvar o aluno. Tente novamente.";
        }
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
            $curso->setNome($d["nome_curso"]);
            $curso->setTurno($d["turno_curso"]);
            $aluno->setCurso($curso);

            array_push($alunos, $aluno);
        }
        return $alunos;
    }

}