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
<!--Tri par liste déroulante -->
<div class="liste_filter">
<label id="lab_filter" for="filter">Trier les recettes par :</label>
  <select id="filter_recipe">
    <option value="">Veuillez choisir</option>
    <option value="allRecipes">Toutes les recettes</option>
    <optgroup label="Tri par temps"></optgroup>
    <option value="time">Temps de préparation</option>
    <option value="cook">Temps de cuisson</option>
    <optgroup label="Tri type de recettes"></optgroup>
    <option value="Entrée">Entrée</option>
    <option value="Plat">Plat</option>
    <option value="Dessert">Dessert</option>
  </select>
  </div>
<section class="card_recipe"></section>
</main>

<?php require_once 'template/footer_recipe.php'; ?>