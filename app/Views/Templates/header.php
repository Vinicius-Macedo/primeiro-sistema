<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= URL ?>public/assets/css/main.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Open+Sans:wght@400;700&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/060ecbe3ef.js" crossorigin="anonymous"></script>
  <title>VM Web Design</title>
</head>
<body>
  <header>
    <nav>
      <div class="logo">
        <a href="#">
          <img class="logo" src="assets/img/logo.svg" alt="logo">
        </a>
      </div>
      <ul class="nav-list" role="menu">
        <li><a href="<?= URL ?>">Home</a></li>
        <li><a href="infoPublicas">Informações Públicas</a></li>
        <li><a href="cadastro">Cadastrar</a></li>
      </ul>
      <a href="login" class="fale-comigo">Entrar</a>
      <div id="toggle-icon" aria-label="Abrir Menu" class="toggle-icon" aria-haspoppup="true" earia-controls="nav-list"
        aria-expanded="false">
        <span class="bars"></span>
      </div>
      </div>
    </nav>
  </header>
	<main>