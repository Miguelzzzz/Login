<div class="cadastrar">

    <?php require_once 'controller/CadastrarController.php';
        $cadastrarController = new CadastrarController();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviarCadastro'])) {
            $cadastrarController->cadastrar($_POST['txtNicknameCad'], $_POST['txtSenhaCad']);
        }
    ?>

    <form action="" method="POST">
        <legend>
            <b>Cadastrar Usuario</b>
        </legend>
    <br>      
        <input type="text" id="nickname" placeholder="Nome de usuário:" name="txtNicknameCad" required><br>
        <input type="password" id="senha" placeholder="Senha:" name="txtSenhaCad" maxlength="30" required><br>
        <button type="submit" name="enviarCadastro" style="background-color: #212121; color:#fff;">Cadastrar</button>
    </form>
    
</div>
