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

}

new PerfilController();