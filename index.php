

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  
  <title>Localiza CEP</title>

  <!--LINKS-->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
  <link rel="stylesheet" href="https://unpkg.com/bulma@0.6.2/css/bulma.css">
  <link rel="stylesheet" href="./css/style.css">

  <script data-ad-client="ca-pub-3792509935669870" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>
<body class="wrapper">
  <div class="main">

  <!--LOGO-->
    <header class="header-logo">
      <div class="hero-body">
        <div class="container">
          <img class="logo" src="img/logo.png" alt="Logo Localiza Cep">
        </div>
      </div>
    </header>

    <!--FORM-->
    <section class="section">
      <div class="container">
        <form id="search" method="get">
          <div class="field">
            <div class="control has-icons-left has-icons-right">
              <input id="zipcode" name="zipcode" class="input is-hovered is-large" type="text" placeholder="Digite o CEP" maxlength="9" autocomplete="off" tabindex="1" autofocus required>
              <p class="help has-text-grey">Exemplo: 01001-001</p>
              <span class="icon is-small is-left">
                <i class="fa fa-map-pin"></i>
              </span>
            </div>
          </div>
        </form>
      </div>

      <!--PHP-->
      <?php

          $address=(object)[
            'cep' => '',
            'logradouro' =>'',
            'complemento' =>'',
            'bairro' =>'',
            'localidade' =>'',
            'uf' =>'',
            'ddd' =>''
          ];

          if (isset ($_GET['zipcode'])){
          $cep = addslashes($_GET['zipcode']);
          $url = "https://viacep.com.br/ws/${cep}/xml/";

          $address = simplexml_load_file($url);  
          }
          
     ?>      
        <!--RESULTADO DA PESQUISA-->
      <div id="output" class="container">
        <h3>Último CEP pesquisado</h3>
        <article class="message">
          <div class="message-header">
            <p>CEP: <strong><?php echo $address->cep ?></strong></p>
            <!--<button class="delete" aria-label="delete"></button>-->
          </div>
          
          <div id="result-body" class="message-body">
            <ul>
              <li><strong>CEP: </strong><?php echo $address->cep ?></li>
              <li><strong>Rua: </strong><?php echo $address->logradouro ?></li>
              <li><strong>Complemento: </strong><?php echo $address->complemento ?></li>
              <li><strong>Bairro: </strong><?php echo $address->bairro ?></li>
              <li><strong>Cidade: </strong><?php echo $address->localidade ?></li>
              <li><strong>Estado: </strong><?php echo $address->uf ?></li>
              <li><strong>DDD: </strong><?php echo $address->ddd ?></li>
            </ul>
          </div>

        </article>
      </div>
    </section>
  </div>
  
  <footer class="footer">
    <div class="container">
      <footer class="content has-text-centered">
        <p>Desenvolvido por <a href="https://github.com/dantas-felipe" class="is-link" target="_blank">Felipe Dantas</a></p>
      </footer>
    </div>
  </footer>

  <script src="https://unpkg.com/vanilla-masker@1.2.0/build/vanilla-masker.min.js"></script>
  <script src="./js/app.js"></script>
</body>
</html>
