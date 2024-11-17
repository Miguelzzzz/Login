<?php
session_start(); 
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php'); 
    exit();
}

require_once '../controller/UsuarioController.php';
$usuarioController = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['alterarSenha'])) {
        $senhaAntiga = $_POST['txtSenhaAntiga'];
        $senhaNova = $_POST['txtSenhaNova'];

        if ($usuarioController->alterarSenha($_SESSION['usuario'], $senhaAntiga, $senhaNova)) {
            echo "<script>alert('Senha alterada com sucesso!');</script>";
        } else {
            echo "<script>alert('Senha antiga incorreta!');</script>";
        }
    }

    if (isset($_POST['excluirConta'])) {
        if ($usuarioController->excluirConta($_SESSION['usuario'])) {
            session_unset();
            session_destroy();
            header("Location: ../index.php");
            exit();
        } else {
            echo "<script>alert('Erro ao excluir conta!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessão Iniciada</title>
    <link rel="stylesheet" href="./css/sessao.css">
</head>
<body>
    <main>
        <section style="display: flex; align-items: center;">
            <div>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?></div>
            <form action="../controller/Logout.php" method="POST">
                <button type="submit">Logout</button>
            </form>
        </section>

        <section>
            <h2>Alterar Senha</h2>
            <form action="" method="POST">
                <label for="txtSenhaAntiga">Senha Antiga:</label>
                <input type="password" id="txtSenhaAntiga" name="txtSenhaAntiga" required>

                <label for="txtSenhaNova">Nova Senha:</label>
                <input type="password" id="txtSenhaNova" name="txtSenhaNova" required><br>

                <button type="submit" name="alterarSenha">Alterar Senha</button>
            </form>
        </section>

        <section>
            <h2>Excluir Conta</h2>
            <form action="" method="POST">
                <button type="submit" name="excluirConta" onclick="return confirm('Tem certeza que deseja excluir sua conta?')">Excluir Conta</button>
            </form>
        </section>
    </main>
    
    <footer>Desenvolvedor: Miguel</footer>
</body>
</html>

