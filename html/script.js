//passar páginas
function voltarPagina() {
    window.location.href = "informativa.html"
}
function mudarPagina() {
    window.location.href = "dados_institucionais.html";
    localStorage.nome = document.getElementById("nomep").value;
    localStorage.cpf = document.getElementById("cpf").value;
    localStorage.email = document.getElementById("email").value;
    localStorage.telefone = document.getElementById("telefone").value;
    localStorage.identidade = document.getElementById("identidade").value;
    localStorage.orgao = document.getElementById("orgao").value;
}
function voltarPaginaFinish() {
    window.location.href = "requerimento.html"
}
function voltarPaginaRequerimento() {
    window.location.href = "dados_institucionais.html"
}
function mudarPaginaRequerimento() {
    window.location.href = "finish.html";
}

function mudarPaginaInstitucional() {
    window.location.href = "requerimento.html";
    localStorage.campus = document.getElementById("campus").value;
    localStorage.matricula = document.getElementById("matricula").value;
    localStorage.curso = document.getElementById("curso").value;
    localStorage.periodo = document.getElementById("periodo").value;
    localStorage.turno = document.getElementById("turno").value;
    localStorage.situacao = document.getElementById("situacao").value;


}

function voltarPaginaInstitucional() {
    window.location.href = "dados_pessoais.html"

}

