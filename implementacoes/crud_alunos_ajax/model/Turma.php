<?php
#Arquivo com a declaração da classe Turma

require_once(__DIR__ . "/Disciplina.php");

class Turma {

    private int $id;
    private ?int $ano;
    private ?Disciplina $disciplina;

    public function __construct() {
        $this->id = 0;
        $this->disciplina = null;
    }

    //GETs e SETs
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getAno(): ?int
    {
        return $this->ano;
    }

    public function setAno(?int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    public function getDisciplina(): ?Disciplina
    {
        return $this->disciplina;
    }

    public function setDisciplina(?Disciplina $disciplina): self
    {
        $this->disciplina = $disciplina;

        return $this;
    }
}