<?php

session_start();

require_once 'model/classUsuario.php';

    class CadastrarController {
        private $classUser;

        public function __construct() {
            $this->classUser = new Usuario();
        }

        public function cadastrar($nome, $senha) {
            if (empty($nome) || empty($senha)) {
                echo "<script>alert('Nome ou senha vazia')</script>";
                header('Location: index.php');
                exit();
            }
            echo "<script>alert('Conta criada com sucesso!')</script>";
            $this->classUser->cadastrar($nome, $senha);
        }
    }
    new CadastrarController();
?>

