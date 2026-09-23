<?php

require_once(__DIR__ . "/../util/config.php");
require_once(__DIR__ . "/../model/Usuario.php");

class LoginService {

    public function validar(?string $login, ?string $senha): array {
        $erros = array();

        if(! $login)
            array_push($erros, "Informe o login!");

        if(! $senha)
            array_push($erros, "Informe a senha!");
        
        return $erros;
    }

    public function salvarUsuarioSessao(Usuario $usuario) {
        $this->iniciarSessao();
        $_SESSION[SESSAO_USUARIO_ID]   = $usuario->getId();
        $_SESSION[SESSAO_USUARIO_NOME] = $usuario->getNome();
    }

    public function usuarioEstaLogado(): bool {
        $this->iniciarSessao();
        if(isset($_SESSION[SESSAO_USUARIO_ID]))
            return true;
        
        return false;
    }

    public function encerrarSessao() {
        $this->iniciarSessao();

        session_unset();
        session_destroy();
    }

     public function getNomeUsuarioLogado(): string {
        if($this->usuarioEstaLogado())
            return $_SESSION[SESSAO_USUARIO_NOME];

        return "[Erro]";
    }

    private function iniciarSessao() {
        if(session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }


}