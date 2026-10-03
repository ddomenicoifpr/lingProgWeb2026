<?php
include_once(__DIR__ . "/../login/verifica.php");

require_once(__DIR__ . "/../../controller/LoginController.php");
require_once(__DIR__ . "/../../controller/PerfilController.php");

$loginCont = new LoginController();
$usuario = $loginCont->getUsuarioLogado();
if(!$usuario) {
    echo "Usuário não encontrado!";
    exit;
}

$msgErro = "";

//TODO - Receber os dados do formulário

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3>
    Perfil
</h3>

<div class="row mt-2">
    <div class="col-12 mb-2">
        <span class="fw-bold">Nome:</span>
        <span><?= $usuario->getNome() ?></span>
    </div>

    <div class="col-12 mb-2">
        <span class="fw-bold">Login:</span>
        <span><?= $usuario->getLogin() ?></span>
    </div>

    <div class="col-12 mb-2">
        <div class="fw-bold">Foto:</div>
    </div>

</div>
    
<div class="row mt-5">
    
    <div class="col-6">
        <form id="frmUsuario" method="POST" 
            action="perfil.php" enctype="multipart/form-data" >
            
            <div class="mb-3">
                <label class="form-label" for="txtFoto">Foto de perfil: </label>
                <input class="form-control" type="file" id="txtFoto" name="foto" />
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Gravar</button>
            </div>
        </form>            
    </div>

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?= $msgErro ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>