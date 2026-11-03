<?php
#Arquivo com a declaração da classe Usuario

class Usuario {

    private ?int $id;
    private ?string $nome;
    private ?string $login;
    private ?string $senha;
    private ?string $imgPerfil;

    //Construtor da classe
    public function __construct($id=0, $nome=null, $login=null, 
                                $senha=null, $imgPerfil=null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
        $this->imgPerfil = $imgPerfil;
    }

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

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getSenha(): ?string
    {
        return $this->senha;
    }

    public function setSenha(?string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    public function getImgPerfil(): ?string
    {
        return $this->imgPerfil;
    }

    public function setImgPerfil(?string $imgPerfil): self
    {
        $this->imgPerfil = $imgPerfil;

        return $this;
    }
}

?>