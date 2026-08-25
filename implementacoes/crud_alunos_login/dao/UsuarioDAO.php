<?php
#Classe DAO para o model de Usuario

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Usuario.php");

class UsuarioDAO {
    

    public function findById(int $id) {
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM usuarios 
                WHERE id = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        if(count($result) == 0)
           return null;
           
        if(count($result) > 1)
           die("Mais de um usuário encontrado para o login e senha!");

        $usuarios = $this->mapUsuarios($result);
        return $usuarios[0];
    }

    public function findByLoginSenha(string $login, string $senha) {
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM usuarios 
                WHERE BINARY login = ? AND BINARY senha = ?";
        
        $stm = $conn->prepare($sql);    
        $stm->execute([$login, $senha]);
        $result = $stm->fetchAll();

        if(count($result) == 0)
           return null;
           
        if(count($result) > 1)
           die("Mais de um usuário encontrado para o login e senha!");

        $usuarios = $this->mapUsuarios($result);
        return $usuarios[0];
    }

    public function alterar(Usuario $usuario) {
        try {
            $conn = Connection::getConnection();

            $sql = "UPDATE usuarios SET nome = ?, login = ?, 
                            senha = ?, img_perfil = ?
                    WHERE id = ?";
            $stm = $conn->prepare($sql);
            $stm->execute([
                $usuario->getNome(), $usuario->getLogin(),
                $usuario->getSenha(), $usuario->getImgPerfil(),
                $usuario->getId()
            ]);
            return "";
        } catch(PDOException $e) {
            $erro = "Erro ao salvar o aluno. Tente novamente.";
            if(AMB_DEV)
                $erro .= "<br>" . $e->getMessage();  
            return $erro;
        }
    }

    private function mapUsuarios(array $result) {
        $usuarios = array();

        foreach($result as $reg) {
            $usuario = new Usuario($reg['id'], $reg['nome'], 
                                   $reg['login'], $reg['senha'],
                                   $reg['img_perfil']);
                                   

            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }

}