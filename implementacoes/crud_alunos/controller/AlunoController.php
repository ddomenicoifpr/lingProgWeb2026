<?php

require_once(__DIR__ . "/../dao/AlunoDAO.php");
require_once(__DIR__ . "/../service/AlunoService.php");

class AlunoController {

    private AlunoDAO $alunoDAO;
    private AlunoService $alunoService;

    public function __construct() {
        $this->alunoDAO = new AlunoDAO();
        $this->alunoService = new AlunoService();
    }

    public function listar() {
        return $this->alunoDAO->list();
    }

    public function inserir($aluno) {
        //Validar os dados
        $erros = $this->alunoService->validar($aluno);


        //Persistir os dados
        if(empty($erros)) {
            $erroDAO = $this->alunoDAO->insert($aluno);
            if($erroDAO)
               array_push($erros, $erroDAO); 
        }

        return $erros;
    }

}