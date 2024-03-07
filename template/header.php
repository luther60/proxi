<?php
define('_INDEX_HEADER_',' Produits frais, savoureux et locaux|Fruits et légumes frais et de saison|Viande issue d\'élevage local et responsable(boeuf) | Proxi Super Tracy le Mont');

define('_PRODUCTEUR_HEADER_','Viande issue d\'élevage local et responsable(boeuf)|Fruits et légumes frais local et de saison|Jus de fruits,cidre,miel,.... local | Proxi Super Tracy le Mont');

define('_RECETTE_HEADER_','Recettes de cuisine facile, pas cher, rapide | Proxi Super Tracy le Mont');

 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php 
  if($_SERVER['SCRIPT_NAME'] === '/index.php') {
  echo"<meta name="._INDEX_HEADER_."/>" ;
}

  if($_SERVER['SCRIPT_NAME'] === '/producteurs.php') {
    echo"<meta name="._PRODUCTEUR_HEADER_."/>" ;
}

  if($_SERVER['SCRIPT_NAME'] === '/recette_user.php') {
    echo"<meta name="._RECETTE_HEADER_."/>" ;
}
?>
  <link rel="stylesheet" href="css/style.css">
  <link rel="shorcut icon" href="assets/favicon.ico" >
  <title>Proxi Super Tracy le Mont</title>
</head>
<header>
  <nav>
    <img class="logo" id="img_logo" src="/../assets/favicon.ico" alt="Logo magasin Proxi Super">
    <ul class="navbar">
      <li class="input input_nav"><a  href="index.php">Accueil</a></li>
      <li class="input input_nav"><a  href="producteurs.php">Producteurs locaux</a></li>
      <li class="input input_nav"><a  href="recette_user.php">Nos recettes</a></li>
      <li class="input input_nav"><a  href="login.php">Espace pro</a></li>
      <img class="bar" id="navbar" src="assets/icons8-menu-50.png" alt="Barre menu responsive">

    </ul>
  </nav>
</header>
<body>