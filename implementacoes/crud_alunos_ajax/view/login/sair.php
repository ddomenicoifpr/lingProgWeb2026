<?php

//Página para encerrar o login
require_once(__DIR__ . "/../../controller/LoginController.php");
require_once(__DIR__ . "/../../util/config.php");

$loginCont = new LoginController();
$loginCont->deslogar();

header("location: " . BASE_URL . "/view/login/login.php");