<?php

require_once 'model/classUsuario.php';

    class LoginController {
        private $usuarioModel;

        public function __construct() {
            $this->usuarioModel = new Usuario();
        }

        public function login($nome, $senha) {
            if (empty($nome) || empty($senha)) {
                return;
            }

            $usuario = $this->usuarioModel->login($nome, $senha);
            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = htmlspecialchars($usuario['nome']); 
                header('Location: view/SessaoIniciada.php'); 
                exit();
            } else {
                echo "<script>alert('Nome de usuario ou senha incorretos')</script>";
            }
        }
    }
?>
