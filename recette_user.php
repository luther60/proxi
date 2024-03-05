<?php 
require_once 'lib/pdo.php';
require_once 'lib/recipes_config.php';
require_once 'template/header.php';
?>

<?php
$recipes = getRecipes($pdo);
$recipesFilter = json_encode($recipes);
$resultFilter = file_put_contents('lib/recipes.json', $recipesFilter);
?>

<main id="recipe_user">

</main>

<?php require_once 'template/footer_recipe.php'; ?>