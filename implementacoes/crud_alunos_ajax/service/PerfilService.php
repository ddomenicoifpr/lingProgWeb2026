<?php

class PerfilService {

    public function validarPerfil(array $fotoPerfil) {
        $erros = array();

        if($fotoPerfil['size'] <= 0) {
            array_push($erros, "Informe a foto de perfil!");
        }

        return $erros;
    }
}