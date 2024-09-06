<?php

if(isset($_POST['submit'])) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>finalizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background-color: rgb(210, 218, 208);">
  <form action="http://localhost/PROJETO1.1/conf_pdf/projeto_teste/index.php" method="post">

      <div class="container">
        <section class="mx-auto"
          style="max-width: 726px; height: 658px; background-color: white; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
          <div style="background-color: rgb(16, 161, 16); height: 12px; border-radius: 15px 15px 0 0;"></div>
          <div class="p-4 mx-3">

            <div class="d-flex justify-content-center" style="margin-top: 100px;">
              <img style="height: 150px;" src="final.png" alt="Descrição da imagem">
            </div> 

            
            <h3 style="margin-top: 50px;" class="d-flex justify-content-center" >Solicitação enviada</h3>
            <p class="d-flex justify-content-center" style="text-align: center;">Seu formulário foi enviado com sucesso <br> aguarde o retorno em seu e-mail </p>
          </div>

          <div class="d-btn d-flex justify-content-center">
          <input class="btn btn-success" type="submit" name="submit" id="submitinput"></input> 
          </div>
        </section>

</form>

          <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>