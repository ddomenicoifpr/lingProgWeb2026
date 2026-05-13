
function validarForm() {
    //1- Pegar os valores dos inputs do formulário
    var titulo = document.getElementById('titulo').value;
    var genero = document.querySelector("#genero").value;
    var autor = document.querySelector("#autor").value;
    var qtdPag = document.querySelector("#qtdPag").value;

    //alert(titulo + " - " + genero + " - " + autor + " - " + qtdPag);

    var erros = [];

    //2- Validar os dados preenchidos
    if(titulo.trim() == '') {
        erros.push("Informe o título!");
    }

    if(genero.trim() == '') {
        erros.push("Informe o gênero!");        
    }

    if(autor.trim() == '') {
        erros.push("Informe o autor!");
    }

    if(qtdPag.trim() == '') {
        erros.push("Informe o número de páginas!");
    }

    if(erros.length > 0) {
        var divMsgErro = document.querySelector("#msgErro");
        divMsgErro.innerHTML = erros.join("<br>");
        divMsgErro.style.display = "block";
        return false;
    }
    

    //3- Após validar, retorna verdadeiro para submeter o form
    return true;
}