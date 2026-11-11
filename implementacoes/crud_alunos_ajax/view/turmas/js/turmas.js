
const urlBase = 
    document.getElementById("confUrlBase").dataset.urlBase;

const selDisc = document.querySelector("#selDisciplina");

listarDisciplinas();

function listarDisciplinas() {
    //Limpar as opções do select de disciplinas
    selDisc.innerHTML = "";

    //Criar um opção vazia
    criarOpcao(0, "---Selecione---");

    //Recebe o ID do curso selecionado
    const idCurso = document.getElementById("selCurso").value;
    const url = 
        urlBase + "/api/lista_disciplinas.php?id_curso=" + idCurso;

    //Realiza a requisição AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url, false);
    xhttp.send();
    
    var json = xhttp.responseText;
    //console.log(json);

    //Criar as options a partir do JSON recebido
    var disciplinas = JSON.parse(json);
    disciplinas.forEach(disc => {
        criarOpcao(disc.id,
                   disc.codigo + " - " + disc.nome);
    }); 
    
}

function criarOpcao(id, descricao) {
    var option = document.createElement("option");
    option.value     = id;
    option.innerHTML = descricao;
    selDisc.appendChild(option);
}