<?php

require_once(__DIR__ . "/../../controller/CursoController.php");

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursos);

require_once(__DIR__ . "/../include/header.php");
?>

<h3>Inserir aluno</h3>

<form action="" method="POST">

    <div>
        <label for="txtNome">Nome: </label>
        <input type="text" id="txtNome" name="nome" 
            placeholder="Informe o nome"
            value="<?= $aluno ? $aluno->getNome() : '' ?>">
    </div>

    <div>
        <label for="txtIdade">Idade: </label>
        <input type="number" id="txtIdade" name="idade" 
            placeholder="Informe a idade"
            value="<?= $aluno ? $aluno->getIdade() : '' ?>">
    </div>

    <div>
        <label for="selEstrang">Estrangeiro: </label>
        <select name="estrangeiro" id="selEstrang">
            <option value="">----Selecione-----</option>
            <option value="S" <?= $aluno && $aluno->getEstrangeiro() == 'S' ? 'selected' : '' ?> >
                Sim</option>
            <option value="N" <?= $aluno && $aluno->getEstrangeiro() == 'N' ? 'selected' : '' ?> >
                Não</option>
        </select>
    </div>

    <div>
        <label for="selCurso">Curso: </label>
        <select name="curso" id="selCurso">
            <option value="">----Selecione-----</option>

            <!-- Cursos criados de forma dinâmica -->
            <?php foreach($cursos as $c): ?>
                <option value="<?= $c->getId() ?>"
                    <?php 
                        if($aluno && $aluno->getCurso()->getId() == $c->getId())
                            echo "selected";
                    ?>
                >
                <?= $c ?></option>        
            <?php endforeach; ?>    

        </select>
    </div>

    <div>
        <button type="submit">Gravar</button>
    </div>
</form>

<div style="color: red;">
    <?= $msgErro ?>
</div>

<a href="listar.php">Voltar</a>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>