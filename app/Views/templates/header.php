<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="icon" href="https://www.iconpacks.net/icons/2/free-plant-icon-1573-thumb.png" type="image/png" sizes="16x16">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous" defer></script>
  <script src="https://kit.fontawesome.com/ec29234e56.js" crossorigin="anonymous" defer></script>
  <script src="<?= base_url('assets/js/script.js') ?>" defer></script>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <title><?= esc($tab) ?></title>
</head>

<body>
  <header>
    <div id="home_logo">
      <a href="<?= base_url('/') ?>">
        <h1>Planti</h1>
        <img src="https://www.iconpacks.net/icons/2/free-plant-icon-1573-thumb.png" alt="">
      </a>
    </div>
    <div class="dropdown">
      <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Planti
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?= base_url('tipos') ?>">Cadastro de Tipos</a></li>
        <li><a class="dropdown-item" href="<?= base_url('cadastroPlanta') ?>">Cadastro de Plantas</a></li>
        <li><a class="dropdown-item" href="<?= base_url('cuidadosTodas') ?>">Cuidados - Todas</a></li>
      </ul>
    </div>
  </header>