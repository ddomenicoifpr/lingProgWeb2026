<?php
#Página com o formulário de alunos

require_once(__DIR__ . "/../../controller/CursoController.php");

//Inclui a página que valida se o usuário está logado
require_once(__DIR__ . "/../login/verifica.php");

//Inclui o HEADER
require_once(__DIR__ . "/../include/header.php");

//Inclusão do Menu
require_once(__DIR__ . "/../include/menu.php");


//Lista de curso para carregar o combo
$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
?>

<span id="confUrlBase" 
    data-url-base="<?php echo (BASE_URL); ?>"></span>

<h2><?php echo (!$turma || $turma->getId() <= 0 ? 'Inserir' : 'Alterar') ?> Turma</h2>

<div class="row mb-3">
    <div class="col-6">
        <form name="frmCadastroTurma" method="POST" >
            <div>
                <label for="txtAno" class="form-label">Ano:</label>
                <input type="number" id="txtAno" name="ano" 
                    style="width: 150px;" class="form-control"
                    value="<?php echo ($turma != null ? $turma->getAno() : ''); ?>" />
            </div>

            <div>
                <label for="selCurso" class="form-label">Curso:</label>
                <select id="selCurso" name="curso" class="form-control">
                    <option value="0">---Selecione---</option>
                    <?php foreach($cursos as $c): ?>
                        <option value="<?= $c->getId() ?>"
                            <?php echo (($idCurso == $c->getId()) ? 'selected' : ''); ?>
                        >
                        
                        <?= $c ?></option>
                    <?php endforeach; ?>
                </select>        
            </div>

            <div>
                <label for="selDisciplina" class="form-label">Disciplina:</label>
                <select id="selDisciplina" name="disciplina" class="form-control" >
                    
                </select>        
            </div>

            <input type="hidden" name="id" 
                value="<?php echo ($turma ? $turma->getId() : 0); ?>" />

            <button type="submit" class="btn btn-success mt-3">Gravar</button>
            
        </form>
    </div>

    <div class="col-6">
        <?php if($msgErro): ?>
            <div class="alert alert-danger">
                <?php echo $msgErro; ?>
            </div>
        <?php endif; ?>
        
        <div id="divMsgErro" class="alert alert-danger" style="display: none;">
            
        </div>
    </div> 
</div>

<div>
    <a href="listar.php" class="btn btn-outline-secondary mt-3">Voltar</a>
</div>


<?php 
//Inclui o FOOTER
require_once(__DIR__ . "/../include/footer.php");
?>

