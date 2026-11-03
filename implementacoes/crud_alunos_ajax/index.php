<?php
require_once(__DIR__ . "/util/config.php");

//Código de teste de usuário logado
//session_start();
//echo $_SESSION[SESSAO_USUARIO_NOME];

require_once(__DIR__ . "/view/login/verifica.php");

require_once(__DIR__ . "/view/include/header.php");
require_once(__DIR__ . "/view/include/menu.php");
?>


<div class="row mt-3 justify-content-center">
    <div class="col-3">
        <div class="card text-center">
            <img class="card-image-top mx-auto"
                src="img/card_alunos.png"
                style="max-width: 100%; max-height: 200px; object-fit: cover;" />

            <div class="card-body">
                <h5 class="card-title">Alunos</h5>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="<?= BASE_URL ?>/view/alunos/listar.php" 
                            class="card-link">
                        Listagem de Alunos</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-3">
		<div class="card text-center">
			<img class="card-image-top mx-auto"
				src="img/card_turmas.png"
				style="max-width: 100%; max-height: 200px; object-fit: cover;" />

			<div class="card-body">
				<h5 class="card-title">Turmas</h5>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<a href="<?= BASE_URL ?>/view/turmas/listar.php"
						class="card-link">
						Listagem de Turmas</a>
				</li>
			</ul>
		</div>
	</div>
</div>


<?php
require_once(__DIR__ . "/view/include/footer.php");
?>

