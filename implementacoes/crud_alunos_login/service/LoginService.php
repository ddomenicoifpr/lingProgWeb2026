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
        session_start();
        $_SESSION[SESSAO_USUARIO_ID]   = $usuario->getId();
        $_SESSION[SESSAO_USUARIO_NOME] = $usuario->getNome();
    }

}