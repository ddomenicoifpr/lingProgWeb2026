<?php

require_once(__DIR__ . "/../dao/CursoDAO.php");

class CursoController {

    public function listar() {
        $cursoDao = new CursoDAO();
        return $cursoDao->list();
    }

}