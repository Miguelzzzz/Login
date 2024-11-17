<?php

require_once '../model/classUsuario.php'; 

    class UsuarioController {

        private $usuarioModel;

        public function __construct() {
            $this->usuarioModel = new Usuario();
        }

        public function alterarSenha($nome, $senhaAntiga, $senhaNova) {
            return $this->usuarioModel->alterarSenha($nome, $senhaAntiga, $senhaNova);
        }

        public function excluirConta($nome) {
            return $this->usuarioModel->excluirConta($nome);
        }
    }
?>
