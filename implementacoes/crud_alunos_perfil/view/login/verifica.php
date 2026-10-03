<?php

//Página para verificar se o usuário está logado
require_once(__DIR__ . "/../../controller/LoginController.php");
require_once(__DIR__ . "/../../util/config.php");

$loginCont = new LoginController();
if(! $loginCont->usuarioEstaLogado()) {
    //redirecionar para o login
    header("location: " . BASE_URL . "/view/login/login.php");
    exit;
} 
