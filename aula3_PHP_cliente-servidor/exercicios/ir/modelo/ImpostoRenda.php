<?php

class ImpostoRenda {

    //Atributos
    private float $renda;
    private float $impostoFaixa1;
    private float $impostoFaixa2;
    private float $impostoFaixa3;
    private float $impostoFaixa4;
    private float $impostoFaixa5;

    //Métodos
    public function __construct(float $renda)
    {
        $this->renda = $renda;
        $this->impostoFaixa1 = 0;
        $this->impostoFaixa2 = 0;
        $this->impostoFaixa3 = 0;
        $this->impostoFaixa4 = 0;
        $this->impostoFaixa5 = 0;
    }

    //Método para retornar o total de imposto
    public function getTotalImposto() {
        $this->calcularImpostoFaixas();

        return $this->impostoFaixa1 +
                $this->impostoFaixa2 +
                $this->impostoFaixa3 +
                $this->impostoFaixa4 +
                $this->impostoFaixa5;
    }

    //Método para retornar o percentual da alíquota de imposto sobre a renda
    public function getPercentualAliquota() {
        return ($this->getTotalImposto() / $this->renda) * 100;
    }

    //Método para calcular o imposto, faixa a faixa
    private function calcularImpostoFaixas() {
        $this->impostoFaixa1 = 0;
    
        $this->impostoFaixa2 = $this->getValorImpostoFaixa(3036.00, 3553.31, 7.5);
        $this->impostoFaixa3 = $this->getValorImpostoFaixa(3553.31, 4688.85, 15.0);
        $this->impostoFaixa4 = $this->getValorImpostoFaixa(4688.85, 5830.85, 22.5);
        $this->impostoFaixa5 = $this->getValorImpostoFaixa(5830.85, 999999999.99, 27.5);
    }

    //Método para calcular o imposto de uma faixa
    private function getValorImpostoFaixa(float $minFaixa, 
                                          float $maxFaixa, float $aliquota): float {
        if($this->renda > $minFaixa) {
            if($this->renda < $maxFaixa)
                $maxFaixa = $this->renda;

            return ($maxFaixa - $minFaixa) * ($aliquota / 100);
        }

        return 0.0;
    }

    //GETs e SETs
    public function getRenda(): float
    {
        return $this->renda;
    }

    public function setRenda(float $renda): self
    {
        $this->renda = $renda;

        return $this;
    }

    public function getImpostoFaixa1(): float
    {
        return $this->impostoFaixa1;
    }

    public function setImpostoFaixa1(float $impostoFaixa1): self
    {
        $this->impostoFaixa1 = $impostoFaixa1;

        return $this;
    }

    public function getImpostoFaixa2(): float
    {
        return $this->impostoFaixa2;
    }

    public function setImpostoFaixa2(float $impostoFaixa2): self
    {
        $this->impostoFaixa2 = $impostoFaixa2;

        return $this;
    }

    public function getImpostoFaixa3(): float
    {
        return $this->impostoFaixa3;
    }

    public function setImpostoFaixa3(float $impostoFaixa3): self
    {
        $this->impostoFaixa3 = $impostoFaixa3;

        return $this;
    }

    public function getImpostoFaixa4(): float
    {
        return $this->impostoFaixa4;
    }

    public function setImpostoFaixa4(float $impostoFaixa4): self
    {
        $this->impostoFaixa4 = $impostoFaixa4;

        return $this;
    }

    public function getImpostoFaixa5(): float
    {
        return $this->impostoFaixa5;
    }

    public function setImpostoFaixa5(float $impostoFaixa5): self
    {
        $this->impostoFaixa5 = $impostoFaixa5;

        return $this;
    }

    
}