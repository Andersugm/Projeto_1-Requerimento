<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tela Inicial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
    height: 658px;
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
    font-size: 20px;
    padding: 90px;
    font-weight: 650;
    margin-top: -30px;
}

.btn{
    width: 250px;
    height: 50px;
    font-size:16px;
    font-weight: 500;
}

@media (min-width: 513px) and (max-width: 769px){
    
  body{
      height: 100%;
  }

  section {
        max-width: 500px;
        height: 630px;
        margin-top: 10px;
        margin-bottom: 10px;
  }  

  p {
    font-size: 20px;
    padding: 30px;
    font-weight: 650;
    margin-top: 30px;
  }
  .btn{
    width: 450px;
    height: 50px;
    font-size:15px;
    font-weight: 500;
    margin-top: 50px;
  }
}

@media (min-width: 360px) and (max-width: 512px){

  body{
      height: 100%;
  }

  section {
        max-width: 500px;
        height: 630px;
        margin-top: 10px;
        margin-bottom: 10px;
  }  

  p {
    font-size: 15px;
    padding: 20px;
    font-weight: 650;
    margin-top: 90px;
    
  }
  .btn{
    width: 300px;
    height: 50px;
    font-size:15px;
    font-weight: 500;
    margin-top: 80px;
  }

}
</style>

</head>

<body class="d-flex justify-content-center align-items-center">
  <div class="container">
    <section class="mx-auto">
      <div class= "bar-green"></div>

      <div class="d-flex justify-content-center" style="margin-top: 20px;">
        <img src="../img/logo.png" class="img-fluid" alt="IFPE logo" style="max-width: 100%;">
      </div>

      <p class="text-center">
        Para dar prosseguimento ao preenchimento do formulário de requerimento, faça login preferencialmente com seu e-mail institucional
      </p>

      <div class="d-flex justify-content-center mb-3">
        <button class="btn btn-light border" onclick="loginGoogle()" type="button">
          <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google logo"
            style="height: 20px; margin-right: 10px;">
          Continue com o Google
        </button>
      </div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-app-compat.js";></script>
  <script src="https://www.gstatic.com/firebasejs/10.13.0/firebase-auth-compat.js";></script>
  <script src="/js/index.js"></script>
</body>
</html>