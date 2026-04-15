<?php

class Conexao {

    private PDO $conexao = null;

    public function getConexao(): PDO {
        if($this->conexao == null) {
            //Criar a conexao
        }  

        return $this->conexao;
    }
}