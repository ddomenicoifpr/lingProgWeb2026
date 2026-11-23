
const urlBase = 
    document.getElementById("confUrlBase").dataset.urlBase;

const selDisc  = document.querySelector("#selDisciplina");
const inputAno = document.querySelector("#txtAno");

listarDisciplinasAssinc();
function listarDisciplinasAssinc() {
    //Limpar as opções do select de disciplinas
    selDisc.innerHTML = "";

    //Criar um opção vazia
    criarOpcao(0, "---Selecione---");

    //Recebe o ID do curso selecionado
    const idCurso = document.getElementById("selCurso").value;
    const url = 
        urlBase + "/api/lista_disciplinas.php?id_curso=" + idCurso;

    //Recuperar o ID previamente selecionado
    const idDiscSelecionada = selDisc.getAttribute("idSelecionada");
    //console.log(idDiscSelecionada);

    //Realiza a requisição AJAX - Forma assíncrona
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    
    //Função callback - será chamada quando chegar a resposta do servidor
    xhttp.onload = function() {
        //console.log("Após resposta");
        var json = xhttp.responseText;
        
        //Criar as options a partir do JSON recebido
        var disciplinas = JSON.parse(json);
        disciplinas.forEach(disc => {
            criarOpcao(disc.id,
                    disc.codigo + " - " + disc.nome,
                    idDiscSelecionada);
        }); 
    }
    
    xhttp.send();
    //console.log("Após o envio da requisição!");
    
}

//listarDisciplinas();
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

    //Recuperar o ID previamente selecionado
    const idDiscSelecionada = selDisc.getAttribute("idSelecionada");
    //console.log(idDiscSelecionada);

    //Criar as options a partir do JSON recebido
    var disciplinas = JSON.parse(json);
    disciplinas.forEach(disc => {
        criarOpcao(disc.id,
                   disc.codigo + " - " + disc.nome,
                   idDiscSelecionada);
    }); 
    
}

function criarOpcao(id, descricao, idSelecionada=-1) {
    var option = document.createElement("option");
    option.value     = id;
    option.innerHTML = descricao;
    
    if(id == idSelecionada)
        option.selected  = true;

    selDisc.appendChild(option);
}

function salvarTurma() {
    //alert("Chamou!");

    //Capturar os dados do formulário
    var idDisc = selDisc.value;
    var ano    = inputAno.value;

    var dados = new FormData();
    dados.append("disciplina", idDisc);
    dados.append("ano", ano);

    const url = urlBase + "/api/salvar_turma.php";

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", url);

    //Função executada quando a resposta chega
    xhttp.onload = function() {
        var resposta = xhttp.responseText;
        alert(resposta);
    }

    //Envia a requisição
    xhttp.send(dados);

}
