<?php

class Curso {
    
    //Atributos
    private ?int $id;
    private ?string $nome;
    private ?string $turno;

    //GETs e SETs
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

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

    public function getTurno(): ?string
    {
        return $this->turno;
    }

    public function getTurnoDesc() {
        if($this->turno == "M")
            return "Matutino";
        else if($this->turno == "V")
            return "Vespertino";
        else if($this->turno == "N")
            return "Noturno";

        return "";
    }

    public function __toString() {
        return $this->nome . " (" . $this->getTurnoDesc() . ")";
    }

    public function setTurno(?string $turno): self
    {
        $this->turno = $turno;

        return $this;
    }
}