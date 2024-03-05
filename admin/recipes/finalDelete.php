<?php session_start();
 require_once __DIR__.'/../../admin/template_admin/header_admin.php';
 require_once __DIR__.'/../../lib/error.php';
 require_once __DIR__.'/../../lib/pdo.php';
 require_once __DIR__.'/../../lib/recipes_config.php';
//Si pas de session, on redirige vers accueil (A la fermeture du client, la session est détruite)
 if(!isset($_SESSION['user'])) {
  getIndex();
  
 }

 if(isset($_GET['id'])) {
  //Récupération de l'image via id pour suppression dans le fichier
  $recipe = getRecipeById($pdo, $_GET['id']);
  unlink($recipe['img']);
  $recipeDelete = deleteRecipe($pdo, $_GET['id']);

 }
 ?>

 <h1 class="hello_admin">La recette à été définitivement supprimé !!</h1>

 <div class="delete"><a href="recettes.php">Retour à la liste des recettes</a></div>


 <?php require_once __DIR__.'/../../template/footer_sanitize.php'; ?>