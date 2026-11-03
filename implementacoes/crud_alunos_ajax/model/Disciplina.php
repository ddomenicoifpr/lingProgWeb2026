<?php
#Arquivo com a declaração da classe Disciplina

require_once(__DIR__ . "/Curso.php");

class Disciplina {

    private int $id;
    private ?string $codigo;
    private ?string $nome;
    private ?Curso $curso;

    public function __construct($id=0) {
        $this->id = $id;
        $this->curso = null;
    }

    public function __toString() {
        return $this->codigo . " - " . $this->nome;
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

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCurso(): ?Curso
    {
        return $this->curso;
    }

    public function setCurso(?Curso $curso): self
    {
        $this->curso = $curso;

        return $this;
    }
}