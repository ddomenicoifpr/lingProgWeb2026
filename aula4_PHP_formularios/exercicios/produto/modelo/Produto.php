<?php

class Produto {

    //Atributo
    private string $descricao;
    private string $tipo;
    private string $marca;
    private float $valor;
    private string $linkImg;
    private string $descricaoDetalhada;

    //Métodos
    public function getTipoDesc(): string {
        switch($this->tipo) {
            case "VE":
                return "Vestuário";

            case "LI":
                return "Limpeza";

            case "FE":
                return "Ferramenta";

            case "EL":
                return "Eletrônico";

            case "ED":
                return "Eletrodoméstico";
        }

        return "";
    }


    //GETs e SETs
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getLinkImg(): string
    {
        return $this->linkImg;
    }

    public function setLinkImg(string $linkImg): self
    {
        $this->linkImg = $linkImg;

        return $this;
    }

    public function getDescricaoDetalhada(): string
    {
        return $this->descricaoDetalhada;
    }

    public function setDescricaoDetalhada(string $descricaoDetalhada): self
    {
        $this->descricaoDetalhada = $descricaoDetalhada;

        return $this;
    }
}