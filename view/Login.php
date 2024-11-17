<div class="login">

    <?php require_once 'controller/LoginController.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviarLogin'])) {
            $loginController = new LoginController();
            $loginController->login($_POST['txtNickname'], $_POST['txtSenha']);
        }
    ?>

    <form action="" method="POST">
        <legend>
            <b>Login</b>     
        </legend> <br>
        <input type="text" id="nickname" placeholder="Insira seu nome de usuário:" name="txtNickname" required><br>
        <input type="password" id="senha" placeholder="Senha:" name="txtSenha" maxlength="30" required><br>
        <button type="submit" name="enviarLogin" style="background-color: #212121; color: #fff;">Entrar</button>
    </form>
        
</div>
