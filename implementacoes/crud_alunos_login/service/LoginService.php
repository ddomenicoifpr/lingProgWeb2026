<?php

class LoginService {

    public function validar(?string $login, ?string $senha): array {
        $erros = array();

        if(! $login)
            array_push($erros, "Informe o login!");

        if(! $senha)
            array_push($erros, "Informe a senha!");
        
        return $erros;
    }

}