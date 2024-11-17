<?php
    class Conexao {
        public static function conectar() {
            return new PDO("mysql:dbname=bdLogin;host=localhost", "root", "");
        }
    }
?>
