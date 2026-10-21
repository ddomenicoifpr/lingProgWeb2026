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

//Atualizar a variável com base no parâmetro sucesso (igual a 1)
$exibeSucesso = false;
if(isset($_GET["sucesso"]) && $_GET["sucesso"] == 1)
    $exibeSucesso = true;

//Receber os dados do formulário
if(isset($_FILES["foto"])) {
    
    $fotoPerfil = $_FILES["foto"];

    $perfiCont = new PerfilController();
    $erros = $perfiCont->alterar($usuario, $fotoPerfil);

    if($erros)
        $msgErro = implode("<br>", $erros);
    else {
        header("location: perfil.php?sucesso=1");
        exit;
    }
}



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
        <?php if($usuario->getImgPerfil()): ?>
            <?php if(file_exists(DIR_ARQUIVOS . "/" . $usuario->getImgPerfil())): ?>            
                <div>
                    <img src="<?= URL_ARQUIVOS . "/" . $usuario->getImgPerfil() ?>" 
                        alt="Imagem de perfil"
                        style="height: 250px; width: auto;" >            
                </div>
            <?php else: ?>
                <span>Arquivo não encontrado: <?= $usuario->getImgPerfil() ?></span>
            <?php endif; ?>    
        <?php else: ?>
            <span>Sem imagem de perfil.</span>
        <?php endif; ?>
    </div>

    <?php if($exibeSucesso): ?>
        <div class="col-12 mb-2">
            <div class="alert alert-success">Foto atualizada com sucesso!</div>        
        </div>
    <?php endif; ?>

</div>
    
<div class="row mt-5">
    
    <div class="col-6">
        <form id="frmUsuario" method="POST" 
            action="perfil.php" enctype="multipart/form-data" >
            
            <div class="mb-3">
                <label class="form-label" for="txtFoto">Foto de perfil: </label>
                <input class="form-control" type="file" 
                    id="txtFoto" name="foto"
                     />
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