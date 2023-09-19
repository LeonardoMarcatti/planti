<?php
  $pager = \Config\Services::pager();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" http-equiv="content-type" content="text/html">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="icon" href="<?= base_url('assets/img/plant.png') ?>" type="image/png" sizes="16x16">
   <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous" defer></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous" defer></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
    <div id="headerRight">
      <p>Bem vindo <?= session()->get('nome')?></p>
      <div class="dropdown">
        <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Planti
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?= base_url('tipos') ?>">Cadastro de Tipos</a></li>
          <li><a class="dropdown-item" href="<?= base_url('cadastroPlanta') ?>">Cadastro de Plantas</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="<?= base_url('cuidadosTipos') ?>">Cuidados - Por Tipo</a></li>
          <li><a class="dropdown-item" href="<?= base_url('cuidadosTodas') ?>">Cuidados - Todas</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </header>