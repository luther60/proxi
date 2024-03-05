<?php session_start();
 require_once __DIR__.'/../../admin/template_admin/header_admin.php';
 require_once __DIR__.'/../../lib/error.php';
 require_once __DIR__.'/../../lib/pdo.php';
 require_once __DIR__.'/../../lib/recipes_config.php';
//Si pas de session, on redirige vers accueil (A la fermeture du client, la session est détruite)
 if(!isset($_SESSION['user'])) {
  getIndex();
 }

 $recipes = getRecipes($pdo);
 
 ?>

<h1 class="hello_admin">Bienvenue dans la gestion des recettes <?= $_SESSION['user']['firstname'] ?></h1>

<div class="delete"><a href="create_recipe.php">Créer une nouvelle recette</a></div>

<main>
  
  <section class="card_recipe">
    <?php foreach($recipes as $recipe) { ?>
    <article class="content_recipeAdmin">
      <img class="img_recipe" src="<?=$recipe['img']?>" alt="<?=$recipe['img']?>">
      <h3 class="text_recipe"><?=$recipe['name']?></h3>
      <h4 class="text_recipe"><?=$recipe['category']?></h4>
      <h4 class="text_recipe"><?=$recipe['time']?></h4>
      <h4 class="text_recipe"><?=$recipe['cook']?></h4>
      <div class="contains_button">
      <a class="update_card" href="update_recipe.php?id=<?=$recipe['id']?>">Modifier</a>
      <a class="delete_card" href="delete_recipe.php?id=<?=$recipe['id']?>">Supprimer</a>
      </div>
    </article>
    <?php } ?>
  </section>
  
</main>

<?php require_once __DIR__.'/../../template/footer_sanitize.php'; ?>