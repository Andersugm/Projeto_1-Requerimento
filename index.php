<?php

require_once 'vendor/autoload.php'; 

//referenciando o namespace da dompdf
use Dompdf\Dompdf;


$pdo = new PDO('mysql:host=localhost; dbname=sre;', 'root', '');

$sql = $pdo->query('SELECT * FROM requerimentos');


while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
    $html = '<h1 style = "margin-top: -6%; margin-bottom: 0%;"> CU --------------------------------- PRODEN/CGA</h1>';
    $html .= '<h3 style = "margin-top: -1%; margin-bottom: 0%;">REQUERIMENTO - ALUNO(A)</h3>';
    $html .= '<table border=1 width = 100%>';
    $html .= '<thead>';
    $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px; width: 25%;">CAMPUS</th>';
    $html .= '<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px; width: 50%;">NOME DO(A) ALUNO(A) (letra de forma)</th>';
    $html .= '<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px; width: 20%;">N° DE MATRÍCULA</th></tr>';
    $html .= '</thead>';
    $html .='<tbody>';
    $html .= '<tr><td style = "background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">'.$linha['campus'] . '</td>';
    $html .= '<td style = "background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">'.$linha['nome'] . '</td>';
    $html .= '<td style = "background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">'.$linha['num_matricula'] . '</td></tr>';
    $html .='</tbody>';
    $html .='</table>';
    $html .= '<table border=1 width = 100%>';
    $html .= '<thead>';
    $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px; width: 13%;">PER/MOD/SERIE</th>';
    $html .= '<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px; width: 20%;">CURSO / MODALIDADE</th>';
    $html .= '<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px; width: 10.5%;">TURNO</th>';
    $html .= '<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px; width: auto;">TELEFONE FIXO / TELEFONE CELULAR / E-MAIL</th></tr>';
    $html .= '</thead>';
    $html .='<tbody>';
    $html .= '<tr><td style = "background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">'.$linha['periodo'] . '</td>';
    $html .= '<td style = "background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">'.$linha['curso'] . '</td>';
    $html .= '<td style = "background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">'.$linha['turno'] . '</td>';
    $html .= '<td style = "background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">'.$linha['contato'].  $linha['email']. '</td><tr>';
    $html .='</tbody>';
    $html .='</table>';
    $html .= '<table border=1 width = 100%>';
    $html .= '<thead>';
    $html .= '<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px; width: 20%;">CPF</th>';
    $html .= '<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px; width: 13%;">IDENTIDADE</th>';
    $html .= '<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">ORGÃO EXPED.</th>';
    if ($linha['tipo_vinculo'] == 1) {
        $html .= '<th rowspan="2" style="font-size: 12px; border-color: white; padding-left: 8px">(X) Matriculado ( ) Graduado ( ) Desvinculado</th>';
    }else if($linha['tipo_vinculo'] == 2){
        $html .= '<th rowspan="2" style="font-size: 12px; border-color: white; padding-left: 8px">( ) Matriculado (X) Graduado ( ) Desvinculado</th>';
    }else{
        $html .= '<th rowspan="2" style="font-size: 12px; border-color: white; padding-left: 8px">( ) Matriculado ( ) Graduado (X) Desvinculado</th>';
    };
    $html .= '</thead>';
    $html .='<tbody>';
    $html .= '<tr><td style = "background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">'.$linha['usr_cpf'] . '</td>';
    $html .= '<td style = "background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">'.$linha['usr_rg'] . '</td>';
    $html .= '<td style="background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1.1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">'.$linha['usr_org'] . '</td><tr>';
    $html .='</tbody>';
    $html .='</table>';
    $html .= '<table border=1 width = 100%>';
    $html .='<thead>';
    $html .='<tr><th colspan="4" style="font-size: 16px; padding: 3px; text-align: left;">Marque a sua opção desejada abaixo</th></tr>';
    $html .='<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px; width: 5%;">[X]</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px; width: 52%;">ITENS</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px; width: 7%;">ANEXOS -------></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px; width: auto;">DOCUMENTAÇÃO EXIGIDA (ANEXOS)</th></tr>';
    if ($linha['InputRequerimento'] == 1 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Admissão por Transferência e Análise Curricular (anexos) - Solicitação no Protocolo Geral</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;" style = "border: 1px solid #000000; min-height: 40px; ">c,f,g,h,i</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">a - Atestado Médico</th></tr>';
    if ($linha['InputRequerimento'] == 2 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Ajuste de Matrícula Semestral</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">b - Cópia da CTPS - Identificação e Contrato</th></tr>';
    if ($linha['InputRequerimento'] == 3 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Autorização para cursar disciplinas em outras Instituições de Ensino Superior (especifique)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">c - Declaração de Transferência</th></tr>';
    if ($linha['InputRequerimento'] == 4 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Cancelamento de Matrícula</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">d - Declaração da Empresa com o respectivo horário</th></tr>';
    if ($linha['InputRequerimento'] == 5 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Cancelamento de Disciplina (especifique)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">e - Guia de Transferência</th></tr>';
    if ($linha['InputRequerimento'] == 6 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Certificado de Conclusão - Ano ( ) Semestre ( )</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">f - Histórico Escolar do Ensino Fundamental (original)</th></tr>';
    if ($linha['InputRequerimento'] == 7 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Certidão - Autenticidade (especifique)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">g - Histórico Escolar do Ensino Médio (original)</th></tr>';
    if ($linha['InputRequerimento'] == 8 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Complementação de Matrícula (especifique)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">h - Histórico Escolar do Ensino Superior (original)</th></tr>';
    if ($linha['InputRequerimento'] == 9 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Cópia Xerox de Documento (especifique)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">i - Ementas das disciplinas cursadas com Aprovação</th></tr>';
    if ($linha['InputRequerimento'] == 10 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Declaração de Colação de Grau e Tramitação de Diploma (curso tecnológico)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;">a/b, d</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">j - Declaração de Unidade Militar</th></tr>';
    if ($linha['InputRequerimento'] == 11 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Declaração de Matrícula ou Matrícula Vínculo (especifique)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 12 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Declaração de Monitoria</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;"rowspan="3">OBSERVAÇÕES:</th></tr>';
    if ($linha['InputRequerimento'] == 13 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">Declaração para Estágio - Conclusão Ano ( ) Semestre ( )</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 14 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Diploma 1aVia ( ) 2a ( ) - Conclusão Ano ( ) Semestre ( )</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 15 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Dispensa da prática de Educação Física (anexos)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;">a/j</th>';
    $html .='<td rowspan="14"></td></tr>';
    if ($linha['InputRequerimento'] == 16 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Declaração Tramitação de Diploma (técnico)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 17 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Ementa de disciplina - (especifique)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 18 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Guia de Transferência</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 19 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Histórico Escolar - Ano ( ) Semestre ( )</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 20 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Isenção de disciplinas cursadas (anexo)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;">f/g/h,i</th></tr>';
    if ($linha['InputRequerimento'] == 21 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Justificativa de falta(s) ou prova 2 chamada (anexos)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;">a,d,i</th></tr>';
    if ($linha['InputRequerimento'] == 22 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Matriz curricular</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 23 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Reabertura de Matrícula</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 24 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Reintegração ( ) Estágio ( ) Entrega do Relatório de Estágio ( ) TCC</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 25 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Reintegração para Cursar (Solicitar no Protocolo Geral)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 26 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Solicitação de Conselho de Classe</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 27 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Trancamento de Matrícula</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    if ($linha['InputRequerimento'] == 28 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; text-align: left; font-size: 10px;">Transferência de Turno (especifique turno)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;">a/j</th></tr>';
    $html .='</table>';
    $html .= '<table border=1 width = 100%>';
    $html .='</thead>';
    if ($linha['InputRequerimento'] == 29 ) {
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[X]</th>';
    }else{
        $html .= '<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px;">[O]</th>';
    }
    $html .='<th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px; text-align: left;">Outros (relatar abaixo em OBSERVAÇÕES)</th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th>';
    $html .='<th style = "border: 1px solid #000000; min-height: 40px;"></th></tr>';
    $html .='<tr><th style = "border: 1px solid #000000; min-height: 40px; font-size: 10px; text-align: left;" colspan="4">OBSERVAÇÕES:</th></tr>';
    $html .='<tr><td style = "background-color: #e3ecc5; padding: 2px; margin: 0; font-size: 12px; border: 1px solid #000000; min-height: 40px;" colspan="4">.'.$linha['obs'] . '</td></tr>';
    $html .='</thead>';
    $html .='</table>';
}


//instancia da dompdf
$dompdf = new Dompdf;
//converter o html
$dompdf->loadHtml($html);

//orientação
$dompdf-> setPaper('A4', 'portrait');


//renderiza o arquivo
$dompdf->render();

//envia pro navegador
$dompdf->stream('sre.pdf', array('Attachment'=>false));