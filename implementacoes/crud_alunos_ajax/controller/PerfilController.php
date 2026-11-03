<?php

require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../model/Usuario.php");
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

    public function alterar(Usuario $usuario, array $fotoPerfil) {
        //1- Validar o arquivo
        $erros = $this->perfilService->validarPerfil($fotoPerfil);
        if($erros) {
            return $erros;
        }


        //2- Salvar o arquivo em um diretório
        $nomeArquivo = $this->arquivoService->salvarArquivo($fotoPerfil);
        if($nomeArquivo) {
            $nomeArquivoAntigo = $usuario->getImgPerfil();
        
            //3- Atualizar o registro do usuário no banco de dados (caminho)
            $usuario->setImgPerfil($nomeArquivo);
            $this->usuarioDAO->alterar($usuario);

            //4- Remover o arquivo antigo (caso exista)
            if($nomeArquivoAntigo)
                $this->arquivoService->removerArquivo($nomeArquivoAntigo);
        } else {
            return array("Erro ao salvar o arquivo!");
        }




        return array();
    }



}
