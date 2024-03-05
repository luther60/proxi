<?php 
require_once 'lib/pdo.php';
require_once 'lib/recipes_config.php';
require_once 'template/header.php';

if(isset($_GET['id'])) {
 $recipe = getRecipeById($pdo, $_GET['id']);
}
?>

<main class="content_detail">
  <h1 class="title_detail"><?=$recipe['name']?></h1>

  <img class="img_detail" src="admin/recipes/<?=$recipe['img']?>" alt="admin/recipes/<?=$recipe['img']?>">

  <h2 class="subtitle_detail">Type de plats</h2>
  <p class="text_detail"><?=$recipe['category']?></p>

  <h2 class="subtitle_detail">Temps de préparation</h2>
  <p class="text_detail"><?=$recipe['time']?> min</p>

  <h2 class="subtitle_detail">Temps de cuisson</h2>
  <p class="text_detail"><?=$recipe['cook']?> min</p>

  <h2 class="subtitle_detail">Liste des ingrédients :</h2>
  <p class="text_detail"><?=nl2br($recipe['ingredients'])?> min</p>

  <h2 class="subtitle_detail">Préparation :</h2>
  <p class="text_detail"><?=nl2br($recipe['product'])?> min</p>

</main>


<?php require_once 'template/footer.php'; ?>