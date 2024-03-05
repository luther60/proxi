<?php session_start();
 require_once __DIR__.'/../../admin/template_admin/header_admin.php';
 require_once __DIR__.'/../../lib/error.php';
 require_once __DIR__.'/../../lib/pdo.php';
 require_once __DIR__.'/../../lib/recipes_config.php';
//Si pas de session, on redirige vers accueil (A la fermeture du client, la session est détruite)
 if(!isset($_SESSION['user'])) {
  getIndex();
 }
 
?>
<?php
//Vérification de la présence d'une soumission et de la méthode
if(isset($_POST['update_recipe']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  //Traitement de chaque entrée utilisateur
  if(isset($_POST['id'])) {
    $id_sanitize =htmlentities($_POST['id'],);
    if(!preg_match("/^[0-9]*$/",$id_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour l\'id est incorrect !! </h1>';
    } else {
      $id = $id_sanitize;
    }
  }

  if(isset($_POST['name'])) {
    $name_sanitize = htmlentities($_POST['name']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le nom est incorrect !! </h1>';
    }else {
      $name = $name_sanitize;
    }
  }

  if(isset($_POST['time'])) {
    $time_sanitize = htmlentities($_POST['time'],);
    if(!preg_match("/^[a-zA-Z-0-9 ]*$/",$time_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le temps de préparation est incorrect !! </h1>';
    } else {
      $time = $time_sanitize;
    }
  }

  if(isset($_POST['cook'])) {
    $cook_sanitize = htmlentities($_POST['cook']);
    if(!preg_match("/^[a-zA-Z-0-9 ]*$/",$cook_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le temps de cuisson est incorrect !! </h1>'; 
    } else {
      $cook = $cook_sanitize;
    }
  }

  if(isset($_POST['category'])) {
    $category_sanitize = htmlentities($_POST['category']);
    if(!preg_match("/^[a-zA-Z-0-9]*$/", $category_sanitize )) {
      echo '<h1 class=\'alert\'>Le format utilisé pour la catégorie est incorrect !! </h1>';
    } else {
      $category = $category_sanitize;
    } 
  }

  if(isset($_POST['ingredients'])) {
    $ingredients = htmlspecialchars($_POST['ingredients']);
    }
   
  if(isset($_POST['product'])) {
    $product = htmlspecialchars($_POST['product']); 
    }

  if(isset($_FILES['img'])) {
    $tmpName = $_FILES['img']['tmp_name'];//Fichier temporaire
    $name_file = $_FILES['img']['name'];//Nom de fichier
    $size = $_FILES['img']['size'];//Taille de fichier
    $error = $_FILES['img']['error'];//Type error
    $extensions = ['jpg','png','jpeg'];//Tableau extension accepté
    $maxSize = 2000000;//Taille max du fichier imposé
    $name_explode = explode('.',$name_file);//A partir du ".", on récupère l'extension
    $name_extension = strtolower(end($name_explode));//Mise en minuscule de l'extension(jpg, etc, ...)
    
    if(!in_array($name_extension,$extensions)) {//Comparaison de l'extension par rapport à l'array défini
        echo '<h1 class=\'alert\'>Le format de fichier de l\'image est incorrect (uniquement jpg, png ou jpeg) !! </h1>';
    } else {
      if($size > $maxSize) {//Comparaison de la taille par rapport au max défini
        echo '<h1 class="alert">La taile du fichier est trop volumineux (Max : 2 Mo) !! </h1>';
      } else {
          $rename = uniqid().'.'.$name_file;//creation id unique
      }
     }  
    } 
    //Si présence d'une ancienne image, on la supprime
    if(isset($_POST['current_img'])) {
      $current_img = $_POST['current_img'];
      unlink($current_img);
    }
   
  /*L'image est envoyé à upload uniquement à partir du script ci-dessous car si envoyé avant, elle serait créer peu importe 
  l'issue du script */
  //Si erreur sur l'une des variables
  if(empty($name) || empty($time) || empty($cook) || empty($category) || empty($ingredients) || empty($product)) {
  echo '<h1 class=\'alert\'>La création de la recette à échoué !! </h1>';
} else {
  //Si tout est OK
  $upload = "./upload_recipes/".$rename;
  move_uploaded_file($_FILES['img']['tmp_name'], $upload);
  $img = $upload;
  $updateRecipe = updateRecipe($pdo,$id,$name,$time,$cook,$ingredients,$product,$img,$category);
  echo '<h1 class=\'alert\'>La création de la recette à été effectué !! </h1>';
 }
} 

  if(isset($_GET['id'])) { 
  $recipe = getRecipeById($pdo,$_GET['id']);

  ?>
<img class="img_recipe  modify" src="<?=htmlentities($recipe['img'])?>" alt="<?=htmlentities($recipe['img'])?>">
<h1 class="hello_admin">Formulaire de création d'une nouvelle recette :</h1>

<form method="POST" action="update_recipe.php?id=<?=$_GET['id']?>" enctype="multipart/form-data">

  <label hidden for="id">Id&nbsp;:<span aria-label="required">*</span></label>
  <input hidden id="id" type="text" name="id" required value="<?= htmlentities($recipe['id']); ?>"/>

  <label for="name">Nom de la recette&nbsp;:<span aria-label="required">*</span></label>
  <input id="name" type="text" name="name" required value="<?=htmlentities($recipe['name'])?>"/>

  <label for="time">Temps de préparation&nbsp;:<span aria-label="required">*</span></label>
  <input id="time" type="text" name="time" value="<?=htmlentities($recipe['time'])?>"/>

  <label for="cook">Temps de cuisson&nbsp;:<span aria-label="required">*</span></label>
  <input id="cook" type="text" name="cook" required value="<?=htmlentities($recipe['cook'])?>"/>

  <label for="category">Type de plat&nbsp;:<span aria-label="required">*</span></label>
  <input id="category" type="text" name="category" required placeholder="entrée,dessert,plat..." value="<?=htmlentities($recipe['category'])?>"/>

  <label for="ingredients">Liste des ingrédients&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="ingredients" name="ingredients" rows="20" cols="80" required placeholder="Ingrédients..."><?=htmlentities($recipe['ingredients'])?></textarea>

  <label for="product">Préparation&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="product" name="product" rows="20" cols="80" required placeholder="Déroulement de la recette..."><?=htmlentities($recipe['product'])?></textarea>
  
  <h1 class="hello_admin">Image actuelle :</h1>
  <img class="img_recipe  modify" src="<?=htmlentities($recipe['img'])?>" alt="<?=htmlentities($recipe['img'])?>">
 
  <label for="img">Modifier l'image&nbsp;:<span aria-label="required">*</span></label>
  <input type="file" name="img" required>

  <input hidden  type="text" name="current_img" value="<?=htmlentities($recipe['img'])?>"/>

  <input class="button b_update" type="submit" name="update_recipe" value="Modifier"/>

</form>
<?php }  ?>
 <?php require_once __DIR__.'/../../template/footer_sanitize.php'; ?>