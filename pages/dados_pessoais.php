<?php

require_once 'db.php';

$teste = false; //REDUNDÂNCIA APENAS PARA TESTAR OS ERROS COM BASE EM $teste

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


    if(isset($_POST['submit'])){
        
        //IF PARA REDUNDÂNCIA, SEM USO
        $arquivo = $_FILES['file'];

        $arquivoNovo = explode('.',$arquivo['name']);
        $extensao = strtolower(end($arquivoNovo));
        $tiposPermitidos = array('pdf', '');

        if(!in_array($extensao, $tiposPermitidos)){
            die('Atenção! Houve entrada de um tipo de arquivo não permitido no campo de anexos! Sua solicitação não foi enviada!!');
        } else {
            //echo 'Upload foi feito com sucesso!';
            move_uploaded_file($arquivo['tmp_name'],'../Attachments/'.$arquivo['name']);
        }

        $arquivo2 = $_FILES['file2'];
        $arquivoNovo2 = explode('.', $arquivo2['name']);
        $extensao2 = strtolower(end($arquivoNovo2));
    
        if(!in_array($extensao2, $tiposPermitidos)){
            die('Atenção! Houve entrada de um tipo de arquivo não permitido no campo de anexos! Sua solicitação não foi enviada!!');
        } else {
            //echo 'Upload do segundo arquivo foi feito com sucesso!<br>';
            move_uploaded_file($arquivo2['tmp_name'], '../Attachments/'.$arquivo2['name']);
        }

        $arquivo3 = $_FILES['file3'];
        $arquivoNovo3 = explode('.', $arquivo3['name']);
        $extensao3 = strtolower(end($arquivoNovo3));
    
        if(!in_array($extensao3, $tiposPermitidos)){
            die('Atenção! Houve entrada de um tipo de arquivo não permitido no campo de anexos! Sua solicitação não foi enviada!!');
        } else {
           // echo 'Upload do terceiro arquivo foi feito com sucesso!<br>';
            move_uploaded_file($arquivo3['tmp_name'], '../Attachments/'.$arquivo3['name']);
        }

        $arquivo4 = $_FILES['file4'];
        $arquivoNovo4 = explode('.', $arquivo4['name']);
        $extensao4 = strtolower(end($arquivoNovo4));
    
        if(!in_array($extensao4, $tiposPermitidos)){
            die('Atenção! Houve entrada de um tipo de arquivo não permitido no campo de anexos! Sua solicitação não foi enviada!!');
        } else {
            //echo 'Upload do quarto arquivo foi feito com sucesso!<br>';
            move_uploaded_file($arquivo4['tmp_name'], '../Attachments/'.$arquivo4['name']);
        }

        $arquivo5 = $_FILES['file5'];
        $arquivoNovo5 = explode('.', $arquivo5['name']);
        $extensao5 = strtolower(end($arquivoNovo5));
    
        if(!in_array($extensao5, $tiposPermitidos)){
            die('Atenção! Houve entrada de um tipo de arquivo não permitido no campo de anexos! Sua solicitação não foi enviada!!');
        } else {
            //echo 'Upload do quinto arquivo foi feito com sucesso!<br>';
            move_uploaded_file($arquivo5['tmp_name'], '../Attachments/'.$arquivo5['name']);
        }

    }

    // Chama o código do arquivo pdf.php
    include '../pdf.php';

    // Chama o código do arquivo mail.php
    include 'mail.php';

    // Redireciona para a página index.php após a execução dos arquivos pdf.php e mail.php
    header("Location: ../index.php");
    exit(); // Encerra o script após o redirecionamento
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
            max-width: 1026px;
            height: 1058px;
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

        h3 {
            text-align: center;
            margin-bottom: 30px;
        }

        .formulario {
            margin-top: 10px;
        }

        .d-btn {
            margin-top: 7%;
        }

        .btn {
            width: 180px;
            height: 58px;
            font-size: 20px;
            border-radius: 15px;
        }

        .s-finish {
            max-width: 726px;
            height: 658px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .s-finish img {
            height: 150px;
        }

        @media (min-width:361px) and (max-width:767px) {

            
            body {
                height: 100%;
            }

            section {
                max-width: 926px;
                height: 1860px;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .s-finish {
            max-width: 726px;
            height: 758px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

            h3 {
                font-size: 25px;
            }

            .btn {
            width: 360px;
            height: 48px;
            font-size: 20px;
            border-radius: 10px;
            }
        }

        @media (max-width:360px){
            body {
                height: 100%;
            }

            section {
                max-width: 926px;
                height: 1860px;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .s-finish {
            max-width: 726px;
            height: 758px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            h3 {
                font-size: 25px;
            }

            .btn {
            width: 360px;
            height: 48px;
            font-size: 20px;
            border-radius: 10px;
            }

            .s-finish h3 {
                font-size: 25px;
            }

            .s-finish img {
                height: 100px;
            }
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="container">
        <form class="needs-validation" method="post" id="form" enctype="multipart/form-data" novalidate>
            <section id="pg1" class="mx-auto">
                <div class="bar-green"></div>
                <div class="p-4 mx-3">
                    <h3>Formulário de Requerimento</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="validationCustom01" name="nome"
                                placeholder="Digite seu nome" required>
                            <div class="invalid-feedback">
                                Por favor digite seu nome
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom02" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" placeholder="Digite seu CPF" name="usr_cpf"
                                required onblur="validarCPF(this)">
                            <div class="invalid-feedback" id="cpfError">
                                Por favor digite um CPF válido.
                            </div>
                        </div>
                        <div class="col-md-3">
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
                                    aria-describedby="inputGroupPrepend" name="email" oninput="validateEmail(this)"
                                    required>
                                <span id="error_email" class="error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">RG</label>
                            <input type="number" class="form-control" id="validationCustom04"
                                placeholder="Digite seu RG" name="usr_rg" required>
                            <div class="invalid-feedback">
                                número do RG
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Órgão expedidor</label>
                            <input type="text" class="form-control" id="validationCustom05" name="usr_org" required>
                            <div class="invalid-feedback">
                                órgão expedidor
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Campus</label>
                            <input type="text" class="form-control" placeholder="Digite seu campus" id="inputEmail4"
                                name="campus" required>
                            <div class="invalid-feedback">
                                informe o campus
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="inputMatricula4" class="form-label">Número de matrícula</label>
                            <input type="text" class="form-control" id="inputMatricula4" name="num_matricula" required>
                            <div class="invalid-feedback">
                                informe o número de matrícula
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputCurso" class="form-label">Curso</label>
                            <input type="text" class="form-control" placeholder="Digite seu curso" id="inputCurso"
                                name="curso" required>
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
                            <select id="inputRequerimento" class="form-select" name="InputRequerimento">
                                <option selected>Selecione o tipo de requisição</option>
                                <option value="1">Admissão por Transferência e Análise Curricular</option>
                                <option value="2">Ajuste de Matrícula Semestral</option>
                                <option value="3">Autorização para cursar disciplinas em outras Instituições de Ensino
                                    Superior</option>
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
                                <option value="24">Reintegração ( ) Estágio ( ) Entrega do Relatório de Estágio ( ) TCC
                                </option>
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
                            <div id="fileUploadContainer" class="row">

                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <input class="form-control-file" type="file" id="formFile1" name="file">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <input class="form-control-file" type="file" id="formFile2" name="file2">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <input class="form-control-file" type="file" id="formFile3" name="file3">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <input class="form-control-file" type="file" id="formFile4" name="file4">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <input class="form-control-file" type="file" id="formFile5" name="file5">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Observações</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="obs"></textarea>
                        </div>
                        <div class="d-btn d-flex justify-content-center">
                            <button type="button" class="btn btn-success" id="botao">Próximo</button>
                        </div>
            </section>

            <section style="display: none;" id="finish" class="s-finish mx-auto">
                <div class="bar-green"></div>
                <div class="p-4 mx-3">

                    <div class="d-flex justify-content-center" style="margin-top: 100px;">
                        <img src="final.png" alt="Descrição da imagem">
                    </div>


                    <h3 style="margin-top: 50px;" class="d-flex justify-content-center">O SRE está pronto para gerar a
                        sua requisição!</h3>
                    <p class="d-flex justify-content-center" style="text-align: center;">Caso tenha certeza de que seus
                        dados estão corretos clique no botão FINALIZAR para fazer o envio do seu requerimento. Caso
                        Contrário, clique em VOLTAR e edite seus dados!</p>


                    <div class="d-btn d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" style="margin-right: 30px;"
                            onclick="voltarFinish()">Voltar</button>
                        <button class="btn btn-success" type="submit" name="submit" id="submitinput">Finalizar</button>
                    </div>
                </div>
            </section>
        </form>
    </div>
    
    <script>

        function validarCPF(cpfInput) {
            let cpf = cpfInput.value.replace(/[^\d]/g, ''); // Remove tudo que não é número

            if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
                // Verifica se o CPF tem 11 dígitos e não é uma sequência de números repetidos
                mostrarErro(cpfInput);
                return false;
            }

            // Validação dos dígitos verificadores
            let soma = 0;
            let resto;

            // Valida o primeiro dígito verificador
            for (let i = 1; i <= 9; i++) {
                soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
            }

            resto = (soma * 10) % 11;
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf.substring(9, 10))) {
                mostrarErro(cpfInput);
                return false;
            }

            // Valida o segundo dígito verificador
            soma = 0;
            for (let i = 1; i <= 10; i++) {
                soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
            }

            resto = (soma * 10) % 11;
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf.substring(10, 11))) {
                mostrarErro(cpfInput);
                return false;
            }

            // Se passou na validação
            removerErro(cpfInput);
            return true;
        }

        function mostrarErro(cpfInput) {
            cpfInput.classList.add('is-invalid');
            document.getElementById('cpfError').style.display = 'block';
        }

        function removerErro(cpfInput) {
            cpfInput.classList.remove('is-invalid');
            document.getElementById('cpfError').style.display = 'none';
        }


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
            const submitButton = document.getElementById('botao');

            submitButton.addEventListener('click', (event) => {
                // Simular o envio do formulário
                form.dispatchEvent(new Event('submit'));
            });

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        swal({
                            title: "nada bom!",
                            text: "Reveja as informações do formulário",
                            icon: "error",
                        });
                    }
                    else {
                        const elemento = document.getElementById('pg1');
                        elemento.style.display = 'none';
                        const finish = document.getElementById('finish');
                        finish.style.display = 'block';
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

        const descriptions = {
            "1": {
                text: "Anexe: Declaração de Transferência, Histórico Escolar do Ensino Fundamental (original), Histórico Escolar do Ensino Médio (original), Histórico Escolar do Ensino Superior (original) e Ementa das disciplinas cursadas com Aprovação.",
                color: "green", showFileUpload: true,
            },
            "6": { text: "No campo de Observações, especifique o ano e semestre.", color: "green" },
            "10": { text: "Anexe: Atestado Médico/Cópia da CTPS - Identificação e Contrato, e Declaração da Empresa com o respectivo horário.", color: "green", showFileUpload: true, },
            "13": { text: "No campo de Observações, especifique o ano de conclusão e o semestre.", color: "green" },
            "14": { text: "No campo de Observações, especifique o ano de conclusão e o semestre.", color: "green" },
            "15": { text: "Anexe: Atestado Médico/Declaração de Unidade Militar.", color: "green", showFileUpload: true },
            "19": { text: "No campo de Observações, especifique o ano e semestre.", color: "green" },
            "20": {
                text: "Anexe: Histórico Escolar do Ensino Fundamental (original)/Histórico Escolar do Ensino Médio (original)/Histórico Escolar do Ensino Superior (original) e Ementa das disciplinas cursadas com Aprovação.",
                color: "green", showFileUpload: true
            },
            "21": { text: "Anexe: Atestado Médico, Declaração da Empresa com o respectivo horário, Ementas das disciplinas cursadas com Aprovação. ", color: "green", showFileUpload: true },
            "27": { text: "Anexe: Atestado Médico/Declaração de Unidade Militar. No campo de observações, especifique o turno. ", color: "green", showFileUpload: true },
            "28": { text: "No campo de Observações, especifique a unidade (1ª,2ª,3ª,4ª ou Exame final), Nome do componente curricular, Nome do professor, Período, Turno que cursou, Ano/Semestre. ", color: "green" },
            "29": { text: "No campo de Observações, especifique a unidade (1ª,2ª,3ª,4ª ou Exame final), Nome do componente curricular, Nome do professor, Período, Turno que cursou, Ano/Semestre. ", color: "green" },
            "30": { text: "No campo de Observações, especifique a unidade (1ª,2ª,3ª,4ª ou Exame final), Nome do componente curricular, Nome do professor, Período, Turno que cursou, Ano/Semestre. ", color: "green" },
        };

        document.getElementById('inputRequerimento').addEventListener('change', function () {
            const selectedValue = this.value;
            const descriptionDiv = document.getElementById('description');
            descriptionDiv.style.fontSize = "13px";
            const fileUploadSection = document.getElementById('fileUploadSection');
            const fileUploadContainer = document.getElementById('fileUploadContainer');

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

        function voltarFinish() {
            const elemento = document.getElementById('pg1');
            elemento.style.display = 'block';
            const finish = document.getElementById('finish');
            finish.style.display = 'none';
        }

    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js "> </script>
</body>

</html>