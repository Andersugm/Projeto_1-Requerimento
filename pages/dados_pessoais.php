<?php

require_once 'db.php';

$teste = false;

if (isset($_POST['submit'])) {
    $teste = true;
}

if ($teste === true) {

    $nome = $_POST['nome'];
    $usr_cpf = $_POST['usr_cpf'];
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $usr_rg = $_POST['usr_rg'];
    $usr_org = $_POST['usr_org'];
    $campus = $_POST['campus'];
    $num_matricula = $_POST['num_matricula'];
    $curso = $_POST['curso'];
    $periodo = $_POST['periodo'];
    $turno = $_POST['turno'];
    $tipo_vinculo = $_POST['tipo_vinculo'];
    $InputRequerimento = $_POST['InputRequerimento'];
    $obs = $_POST['obs'];

    $stmt = $pdo->prepare("INSERT INTO requerimentos (nome, usr_cpf, contato, email, usr_rg, usr_org, campus, num_matricula, curso, periodo, turno, tipo_vinculo, InputRequerimento, obs) 
        VALUES (?, ?, ? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ) ");

    $stmt->execute([$nome, $usr_cpf, $contato, $email, $usr_rg, $usr_org, $campus, $num_matricula, $curso, $periodo, $turno, $tipo_vinculo, $InputRequerimento, $obs]);

    header('location: finish.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Pessoais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/global.css">
    <link rel="stylesheet" href="/style/dados_pessoais.css">
    <style>
        * {
    margin: 0;
    padding: 0;
}

body {
    background-color: rgb(210, 218, 208);
    height: 100%;
    margin-top: 30px;
    margin-bottom: 30px;
}
section {
    max-width: 726px;
    height: 998px;
    background-color: white;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.bar-green {
    background-color: rgb(16, 161, 16);
    height: 12px;
    width: 100%;
    border-radius: 15px 15px 0 0;
}
    
h3{
   text-align: center;
   margin-bottom: 30px;
}

.formulario {
    margin-top: 10px;
}
.d-btn{
    margin-top: 7%;
}
.btn {
    width: 170px;
    height: 48px;
    font-size: 20px;
    border-radius: 15px;
}

@media (min-width:777px) and (max-width:1540px){

h3{
    font-size: 20px;
}

    body{
        height: 100%;
    }
    section {
        max-width: 726px;
        height: 960px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
}
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="container">
        <section class="mx-auto">
            <div class="bar-green"></div>
            <div class="p-4 mx-3">
                <h3>Formulário de Requerimento</h3>
                <form class="needs-validation" method="post" id="form" novalidate>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="validationCustom01" name="nome" placeholder="Digite seu nome"
                                required>
                                <div class="invalid-feedback">
                                Por favor digite seu nome
                        </div>
                        </div>
                        <div class="col-3">
                            <label for="validationCustom02" class="form-label">CPF</label>
                            <input type="number" class="form-control" id="validationCustom02" placeholder="Digite seu CPF" name="usr_cpf"
                                required>
                                <div class="invalid-feedback">
                                Por favor digite seu CPF
                        </div>
                        </div>
                        <div class="col-3">
                            <label for="validationCustom03" class="form-label">Número de Celular</label>
                            <input type="number" class="form-control" placeholder="(DDD)+9xxxxxxxx"
                                id="validationCustom03" name="contato" required>
                                <div class="invalid-feedback">
                                número de telefone
                        </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" name="email" oninput="validateEmail(this)" required>
                                    <span id="error_email" class="error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="validationCustom04" class="form-label">RG</label>
                            <input type="number" class="form-control" id="validationCustom04"
                                placeholder="Digite seu RG" name="usr_rg" required>
                                <div class="invalid-feedback">
                                número do RG
                        </div>
                        </div>
                        <div class="col-3">
                            <label for="validationCustom05" class="form-label">Órgão expedidor</label>
                            <input type="text" class="form-control" id="validationCustom05" name="usr_org" required>
                            <div class="invalid-feedback">
                            órgão expedidor
                        </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Campus</label>
                            <input type="text" class="form-control" placeholder="Digite seu campus" id="inputEmail4" name="campus" required >
                            <div class="invalid-feedback">
                                informe o campus 
                        </div>
                        </div>

                        <div class="col-md-6">
                            <label for="inputMatricula4" class="form-label">Número de matrícula</label>
                            <input type="text" class="form-control" id="inputMatricula4" name="num_matricula" required >
                            <div class="invalid-feedback">
                                informe o número de matrícula
                        </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputCurso" class="form-label">Curso</label>
                            <input type="text" class="form-control" placeholder="Digite seu curso" id="inputCurso" name="curso" required >
                            <div class="invalid-feedback">
                                Informe o curso
                        </div>
                        </div>
                        <div class="col-md-2">
                            <label for="inputPeriodo" class="form-label">Período</label>
                            <select id="inputPeriodo" class="form-select" name="periodo">
                                <option selected>Escolha...</option>
                                <option value="1">1º</option>
                                <option value="2">2º</option>
                                <option value="3">3º</option>
                                <option value="4">4º</option>
                                <option value="5">5º</option>
                                <option value="6">6º</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="inputTurno" class="form-label">Turno</label>
                            <select id="inputTurno" class="form-select" name="turno">
                                <option selected>Escolha...</option>
                                <option value="MANHÃ">Manhã</option>
                                <option value="TARDE">Tarde</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="inputSituacao" class="form-label">Situação</label>
                            <select id="inputSituacao" class="form-select" name="tipo_vinculo">
                                <option selected>Escolha...</option>
                                <option value="1">Matriculado</option>
                                <option value="2">Graduado</option>
                                <option value="3">Desvinculado</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputRequerimento" class="form-label">Tipo de requisição</label>
                            <select id="inputRequerimento" class="form-select" name="InputRequerimento" >
                                <option selected>Selecione o tipo de requisição</option>
                                <option value="1">Admissão por Transferência e Análise Curricular</option>
                                <option value="2">Ajuste de Matrícula Semestral</option>
                                <option value="3">Autorização para cursar disciplinas em outras Instituições de Ensino Superior</option>
                                <option value="4">Cancelamento de Matrícula</option>
                                <option value="5">Cancelamento de Disciplina</option>
                                <option value="6">Certificado de Conclusão</option>
                                <option value="7">Certidão - Autenticidade</option>
                                <option value="8">Complementação de Matrícula</option>
                                <option value="9">Cópia Xerox de Documento</option>
                                <option value="10">Declaração de Colação de Grau e Tramitação de Diploma</option>
                                <option value="11">Declaração de Matrícula ou Matrícula Vínculo</option>
                                <option value="12">Declaração de Monitoria</option>
                                <option value="13">Declaração para Estágio</option>
                                <option value="14">Diploma 1ªvia/2ªvia</option>
                                <option value="15">Dispensa da prática de Educação Física</option>
                                <option value="16">Declaração Tramitação de Diploma</option>
                                <option value="17">Ementa de disciplina</option>
                                <option value="18">Guia de Transferência</option>
                                <option value="19">Histórico Escolar</option>
                                <option value="20">Isenção de disciplinas cursadas</option>
                                <option value="21">Justificativa de falta(s) ou prova 2º chamada</option>
                                <option value="22">Matriz curricular</option>
                                <option value="23">Reabertura de Matrícula</option>
                                <option value="24">Reintegração ( ) Estágio ( ) Entrega do Relatório de Estágio ( ) TCC</option>
                                <option value="25">Reintegração para Cursar</option>
                                <option value="26">Solicitação de Conselho de Classe</option>
                                <option value="27">Trancamento de Matrícula</option>
                                <option value="28">Transferência de Turno</option>
                                <option value="29">Outros</option>
                            </select>
                        </div>
                        <div id="description" class="mt-1" style="display: none;"></div>
                        
                        <div id="fileUploadSection" class="mt-3" style="display: none;">
                            <label for="formFile1" class="form-label">Anexar arquivos</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <input class="form-control-file" type="file" id="formFile1">
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control-file" type="file" id="formFile2">
                                </div>
                                <div class="col-md-3">
                                    <input class="form-control-file" type="file" id="formFile3">
                                </div>
                            </div>
                        </div>
                          <div class="col-md-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Observações</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obs" ></textarea>
                          </div>
                          <div class="d-btn d-flex justify-content-center">
                         <input class="btn btn-success" type="submit" name="submit" id="submitinput"></input> 
                          </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script>
    function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(email.value)) {
        // Mostrar mensagem de erro
        document.getElementById('error_email').textContent = 'Por favor, insira um endereço de e-mail válido.';
        event.preventDefault()
        event.stopPropagation()
    } else {
        // Ocultar mensagem de erro
        document.getElementById('error_email').textContent = '';
    }
}


// Validação do bootstrap
(() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation') 
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      
      swal({
            title: "nada bom!",
            text: "Reveja as informações do formulário",
            icon: "error",
        });

      form.classList.add('was-validated')
    }, false)
  })
})()

        const descriptions = {
            "1":{text:  "Anexe: Declaração de Transferência, Histórico Escolar do Ensino Fundamental (original), Histórico Escolar do Ensino Médio (original), Histórico Escolar do Ensino Superior (original) e Ementa das disciplinas cursadas com Aprovação.", 
                 color: "green", showFileUpload: true},
            "6":{text:"No campo de Observações, especifique o ano e semestre.", color: "green" }, 
            "10":{text:"Anexe: Atestado Médico/Cópia da CTPS - Identificação e Contrato, e Declaração da Empresa com o respectivo horário.", color: "green", showFileUpload: true} ,
            "13": {text:"No campo de Observações, especifique o ano de conclusão e o semestre.", color:"green"},
            "14": {text:"No campo de Observações, especifique o ano de conclusão e o semestre.", color:"green"},
            "15": {text:"Anexe: Atestado Médico/Declaração de Unidade Militar.", color:"green", showFileUpload: true},
            "19": {text:"No campo de Observações, especifique o ano e semestre.", color:"green"},
            "20": {text:"Anexe: Histórico Escolar do Ensino Fundamental (original)/Histórico Escolar do Ensino Médio (original)/Histórico Escolar do Ensino Superior (original) e Ementa das disciplinas cursadas com Aprovação.", 
                   color:"green", showFileUpload: true},
            "21": {text:"Anexe: Atestado Médico, Declaração da Empresa com o respectivo horário, Ementas das disciplinas cursadas com Aprovação. ", color:"green", showFileUpload: true},
            "27": {text:"Anexe: Atestado Médico/Declaração de Unidade Militar. No campo de observações, especifique o turno. ", color:"green", showFileUpload: true},
            "28": {text:"No campo de Observações, especifique a unidade (1ª,2ª,3ª,4ª ou Exame final), Nome do componente curricular, Nome do professor, Período, Turno que cursou, Ano/Semestre. ", color:"green"},
            "29": {text:"No campo de Observações, especifique a unidade (1ª,2ª,3ª,4ª ou Exame final), Nome do componente curricular, Nome do professor, Período, Turno que cursou, Ano/Semestre. ", color:"green"},
            "30": {text:"No campo de Observações, especifique a unidade (1ª,2ª,3ª,4ª ou Exame final), Nome do componente curricular, Nome do professor, Período, Turno que cursou, Ano/Semestre. ", color:"green"},
        };
    
        document.getElementById('inputRequerimento').addEventListener('change', function() {
        const selectedValue = this.value;
        const descriptionDiv = document.getElementById('description');
        descriptionDiv.style.fontSize = "13px";
        const fileUploadSection = document.getElementById('fileUploadSection');

        if (descriptions[selectedValue]) {
            descriptionDiv.textContent = descriptions[selectedValue].text;
            descriptionDiv.style.color = descriptions[selectedValue].color;
            descriptionDiv.style.display = 'block';  // Exibe a descrição

            if (descriptions[selectedValue].showFileUpload) {
                fileUploadSection.style.display = 'block';  // Exibe a aba de anexos
            } else {
                fileUploadSection.style.display = 'none';  // Esconde a aba de anexos se não for necessária
            }
        } else {
            descriptionDiv.style.display = 'none';  // Esconde a descrição se nenhuma opção for selecionada
            fileUploadSection.style.display = 'none';  // Esconde a aba de anexos por padrão
        }
    });

    </script>
    <script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js "> </script> 
</body>
</html>
