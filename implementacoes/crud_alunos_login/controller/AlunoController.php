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

    public function buscarPorId(int $id) {
        return $this->alunoDAO->findById($id);
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

    public function alterar($aluno) {
        //Validar os dados
        $erros = $this->alunoService->validar($aluno);

        //Persistir os dados
        if(empty($erros)) {
            $erroDAO = $this->alunoDAO->update($aluno);
            if($erroDAO)
               array_push($erros, $erroDAO); 
        }

        return $erros;
    }

    public function excluir(int $id) {
        return $this->alunoDAO->excluir($id);
    }

}