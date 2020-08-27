<?php require 'controller/IndexAllControllers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Luisxv</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="/app/css/bootstrap.min.css" />
  <link type="text/css" rel="stylesheet" href="/app/css/slick.css" />
  <link type="text/css" rel="stylesheet" href="/app/css/slick-theme.css" />
  <link type="text/css" rel="stylesheet" href="/app/css/nouislider.min.css" />
  <link rel="stylesheet" href="/app/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="/app/css/style.css" />
  <link type="text/css" rel="stylesheet" href="/app/css/what.css" />
  <link rel="stylesheet" href="/app/css/index.css">
  <link rel="icon" type="/app/public/images/app.ico" href="imagen.ico">
</head>

<body>
  <header>
    <div id="top-header">
      <div class="container">
        <div class="col-md-6">
          <div class="header-search">
            <input class="input" id="search" placeholder="Search here">
            <button onclick="search()" class="search-btn">Search</button>
          </div>
          <?php include 'modalsearch.php' ?>
        </div>
      </div>
    </div>
    <div id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-3 clearfix">
            <div class="header-ctn">
              <div class="dropdown">
              </div>
              <div class="menu-toggle">
                <a href="#">
                  <i class="fa fa-bars"></i>
                  <span>Menu</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <nav id="navigation">
    <div class="container">
      <div id="responsive-nav">
        <ul class="main-nav nav navbar-nav">
          <li><a href="/app/informacion">Información</a></li>
          <li><a href="/app/tecnologia">Tecnologia</a></li>
          <li><a href="/app/audio">Audio</a></li>
          <li><a href="/app/electrodomesticos">Electrodomésticos</a></li>
          <li><a href="/app/hogar">Hogar</a></li>
          <li><a href="/app/muebles">Muebles</a></li>
          <li><a href="/app/belleza">Belleza</a></li>
          <li><a href="/app/contacto.php">Contactos</a></li>
        </ul>
      </div>
    </div>
  </nav>