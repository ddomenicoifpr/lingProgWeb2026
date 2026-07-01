<?php

require_once(__DIR__ . "/../dao/AlunoDAO.php");

class AlunoController {

    public function listar() {
        $alunoDAO = new AlunoDAO();
        return $alunoDAO->list();
    }

}