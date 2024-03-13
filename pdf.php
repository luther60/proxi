<?php

use Spipu\Html2Pdf\Html2Pdf;
require_once 'lib/pdo.php';
require_once 'lib/recipes_config.php';
 require_once './vendor/autoload.php';
//Récuperation de la recette
$recipe = getRecipeById($pdo, $_GET['id']);
//Variable contenant le html à transformer en PDF
$test = 
//Définition de marge sur la page(facultatif)
 '<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" >

  <style>
  h1{text-align: center; margin: 20px; }
  p{text-align: center;font-size: 18px}
  h2{color: #b37799; text-align: center; font-family: dejavusans; font-size: 1.5em; margin: 5px}
  div{text-align: center}
  img{width: 50%; height:150px; margin: 30px} 
  </style>

  <h1>'.$recipe['name'].'</h1>
  <div>
  <img src="admin/recipes/'.$recipe['img'].'">
  </div>
  <h2>Type de plats</h2>
  <p>'.$recipe['category'].'</p>

  <h2>Temps de préparation</h2>
  <p>'.$recipe['time'].' min</p>

  <h2>Temps de cuisson</h2>
  <p>'.$recipe['cook'].' min</p>

  <h2>Liste des ingrédients :</h2>
  <p>'.nl2br($recipe['ingredients']).' min</p>

  <h2 >Préparation :</h2>
  <p>'.nl2br($recipe['product']).' min</p>

</page>
';

//Instanciation d'un nouveau PDF (Portrait,Format,Langue,Unicode)
$html2pdf = new Html2Pdf('P','A4','fr',true,'UTF-8');
//Génération du PDF
$html2pdf->writeHTML($test);
//Choix du nom de fichier
$html2pdf->output('Recette '.$recipe['name'].'.pdf');

?>

