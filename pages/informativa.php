<?php

if(isset($_POST['submit'])) {
    header('Location: dados_pessoais.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informativa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="/style/global.css">
  <link rel="stylesheet" href="/style/informativa.css">
  <script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-auth-compat.js"></script>
  <style>

    * {
    margin: 0;
    padding: 0;
}

body {
    background-color: rgb(210, 218, 208);
    height: 100vh;
}
section {
    max-width: 726px;
    height: 698px;
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

p {
    font-size: 15px;
}
.border-top {
    border-width: 1px;
    margin-top: 1rem;
}
.d-btn{
    margin-top: 8%;
}
.btn{
    width: 180px;
    height: 58px;
    font-size:20px;
    border-radius: 15px;
}

@media (max-width:500px){

    body{
        height: 100%;
    }
    section {
        max-width: 500px;
        height: 630px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .btn {
        width: 100%; /* O botão ocupará toda a largura disponível */
        height: 50px;
        font-size: 15px;
    }

    p {
        font-size: 12px;
    }
}
    
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<form action="dados_pessoais.php" method="post">
  <div class="container">
    <section class="mx-auto">
      <div class="bar-green"></div>
      <div class="p-4 mx-3">
        <h2>Requerimento</h2>
        <p class="mt-3">Este formulário tem como propósito auxiliar os estudantes na realização
          de requerimentos de forma digital.</p>
        <p class="mt-3">Preencha o formulário de acordo com a sua necessidade.</p>
        <p class="mt-3">Caso possua alguma dúvida, preparamos um vídeo tutorial que pode ser
          visualizado neste link:
          [<a href="http://bit.ly/tutorial-requerimento">http://bit.ly/tutorial-requerimento</a>]
        </p>
        <p class="mt-3">Para maiores informações, entre em contato com a CRADT através do
          endereço de e-mail
          <a href="emailto:cradt@igarassu.ifpe.edu.br">cradt@igarassu.ifpe.edu.br</a>
        </p>
        <div class="border-top"></div>
        <p class="mt-3"> <strong id="userEmail"></strong> <a href="#" onclick="loginGoogle()">Mudar de conta</a></p>
        <p class="mt-3" style="color: #5E5E5E;">O nome, a foto e o e-mail associados à sua Conta do
          Google serão registrados quando você fizer upload de arquivos e enviar este formulário.</p>
        <div class="d-btn d-flex justify-content-center">
          <button class="btn btn-success" type="submit">Continue</button>
        </div>
      </div>
    </section> 
  </div>
</form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="/js/informativa.js"></script>
</body>

</html>
