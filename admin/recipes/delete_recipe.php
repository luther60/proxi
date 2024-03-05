<?php session_start();
 require_once __DIR__.'/../../admin/template_admin/header_admin.php';
 require_once __DIR__.'/../../lib/error.php';
 require_once __DIR__.'/../../lib/pdo.php';
 require_once __DIR__.'/../../lib/recipes_config.php';
//Si pas de session, on redirige vers accueil (A la fermeture du client, la session est détruite)
 if(!isset($_SESSION['user'])) {
  getIndex();

 }

//Si présence d'un id dans le GET, on le récupère via la variable user avec en paramètre le GET(id courant) en lieu et place de $id
 if(isset($_GET['id'])) { 
  $recipe = getRecipeById($pdo, $_GET['id']);

  ?>

   <h1 class="hello_admin">Vous êtes sur le point de supprimer cette recette, souhaitez-vous continuer ?</h1>
   <h1 class="hello_admin">L'action est irréversible, en cliquant sur "supprimer définitivement" ,vous allez être redirigé.</h1>
    <ul class="recap">
      <li><?=$recipe['name']?></li>
      <li><?=$recipe['time']?></li>
      <li><?=$recipe['cook']?></li>
    </ul>
    <div class="delete"><a  href="finalDelete.php?id=<?=$_GET['id'];?>">Supprimer définitivement</a></div>
    
<?php } ?>

 <?php require_once __DIR__.'/../../template/footer_sanitize.php'; ?>