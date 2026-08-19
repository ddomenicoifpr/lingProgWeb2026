<?php
//Teste da conexão com o banco de dados
//require_once(__DIR__ . "/../../util/Connection.php");
//$conn = Connection::getConnection();
//print_r($conn);

require_once(__DIR__ . "/../../controller/AlunoController.php");

//Buscar os alunos -> origem: base de dados
$alunoCont = new AlunoController();
$alunos = $alunoCont->listar();
//print_r($alunos);

//Inclui o cabeçalho da página
require_once(__DIR__ . "/../include/header.php");

require_once(__DIR__ . "/../include/menu.php");
?>

<h3>Listagem de alunos</h3>

<a href="inserir.php" class="btn btn-primary">Inserir</a>

<table class="table table-striped mt-3">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Estrangeiro</th>
        <th>Curso</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach($alunos as $a): ?>
        <tr>
            <td><?= $a->getId() ?></td>
            <td><?= $a->getNome() ?></td>
            <td><?= $a->getIdade() ?></td>
            <td><?= $a->getEstrangeiroDesc() ?></td>
            <td><?= $a->getCurso() ?></td>
            <td>
                <a href="alterar.php?id=<?= $a->getId() ?>">
                    <img src="../../img/btn_editar.png" alt="">
                </a>    
            </td>
            <td>
                <a href="excluir.php?id=<?= $a->getId() ?>"
                    onclick="return confirm('Cofirma a exclusão?');" >
                    <img src="../../img/btn_excluir.png" alt="">
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    

</table>


<?php
//Inclui o rodapé da página
require_once(__DIR__ . "/../include/footer.php");
?>

    
