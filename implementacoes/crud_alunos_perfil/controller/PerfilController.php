<?php

require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../service/PerfilService.php");
require_once(__DIR__ . "/../service/ArquivoService.php");

class PerfilController {

    private UsuarioDAO $usuarioDAO;
    private PerfilService $perfilService;
    private ArquivoService $arquivoService;

    public function __construct() {
        $this->usuarioDAO     = new UsuarioDAO();
        $this->perfilService  = new PerfilService();
        $this->arquivoService = new ArquivoService();
    }

    public function alterar(array $fotoPerfil) {
        //1- Validar o arquivo
        $erros = $this->perfilService->validarPerfil($fotoPerfil);
        if($erros) {
            return $erros;
        }


        //2- Salvar o arquivo em um diretório
        $this->arquivoService->salvarArquivo($fotoPerfil);


        //3- Atulizar o registro do usuário no banco de dados (caminho)


        return array();
    }



}
