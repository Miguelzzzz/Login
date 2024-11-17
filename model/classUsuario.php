<?php

require_once 'classConexao.php';

    class Usuario {
        
        private $conexao;

        public function __construct() {
            $this->conexao = Conexao::conectar();
        }

        public function cadastrar($nome, $senha) {
            try {
                $cadastrar = $this->conexao->prepare("insert into usuarios (nome, senha) values (:nome, :senha)");
                $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
                $cadastrar->bindParam(':nome', $nome);
                $cadastrar->bindParam(':senha', $senhaHash);
                return $cadastrar->execute();
            } catch (PDOException $e) {
                echo "<script>alert'(Erro ao cadastrar:')</script> " . $e->getMessage();
                return false;
            }
        }
        

        public function login($nome, $senha) {
            $login = $this->conexao->prepare("select * from usuarios where nome = :nome");
            $login->bindParam(':nome', $nome);
            $login->execute();
            $usuario = $login->fetch();
        
            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['user_name'] = $usuario['nome'];
                return $usuario;
            }
            return false;
        }

        public function alterarSenha($nome, $senhaAntiga, $senhaNova) {
            try {
                $login = $this->conexao->prepare("select * from usuarios where nome = :nome");
                $login->bindParam(':nome', $nome);
                $login->execute();
                $usuario = $login->fetch();
                if ($usuario && password_verify($senhaAntiga, $usuario['senha'])) {
                    $senhaHash = password_hash($senhaNova, PASSWORD_BCRYPT);
                    $atualizarSenha = $this->conexao->prepare("update usuarios set senha = :senha where nome = :nome");
                    $atualizarSenha->bindParam(':senha', $senhaHash);
                    $atualizarSenha->bindParam(':nome', $nome);
                    return $atualizarSenha->execute();
                } else {
                    return false; 
                }
            } catch (PDOException $e) {
                echo "<script>alert('Problema ao alterar senha: ".$e->getMessage()."')</script>";
                return false;
            }
        }

        public function excluirConta($nome) {
            try {
                $excluir = $this->conexao->prepare("delete from usuarios where nome = :nome");
                $excluir->bindParam(':nome', $nome);
                return $excluir->execute();
            } catch (PDOException $e) {
                echo "<script>alert('Problema ao excluir conta: ".$e->getMessage()."')</script>";
                return false;
            }
        } 
    }
?>
