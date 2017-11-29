<?php
session_start();
unset($_SESSION['aliment']);
?>
<!doctype html>
<html lang='fr'>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Site de coktails">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="Coco&ded">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css" media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
  <?php require 'header.php'; ?>

  <main class="page-main"> <!-- zone principale de la page -->
  <?php //require 'vueAccueil.php'; ?>
  </main>

  <?php require 'footer.php'; ?>
</body>
</html>