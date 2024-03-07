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
if(isset($_POST['create_recipe']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  //Traitement de chaque entrée utilisateur
  if(isset($_POST['name'])) {
    $name_sanitize = htmlspecialchars($_POST['name']);
    $name_sanitize = ucwords($name_sanitize);
    $name = $name_sanitize;
  }

  if(isset($_POST['time'])) {
    $time_sanitize = htmlspecialchars($_POST['time'],);
    if(!preg_match("/^[0-9]*$/",$time_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le temps de préparation est incorrect !! </h1>';
    } else {
      $time = $time_sanitize;
    }
  }

  if(isset($_POST['cook'])) {
    $cook_sanitize = htmlspecialchars($_POST['cook']);
    if(!preg_match("/^[0-9]*$/",$cook_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le temps de cuisson est incorrect !! </h1>'; 
    } else {
      $cook = $cook_sanitize;
    }
  }

  if(isset($_POST['category'])) {
    $category_sanitize = htmlspecialchars($_POST['category']);
    $category_sanitize = ucwords($category_sanitize); 
      $category = $category_sanitize;
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
  $createRecipe = createRecipe($pdo,$name,$time,$cook,$ingredients,$product,$img,$category);
  echo '<h1 class=\'alert\'>La création de la recette à été effectué !! </h1>';
}
} 

?>

<h1 class="hello_admin">Formulaire de création d'une nouvelle recette :</h1>

<form method="POST" action="create_recipe.php" enctype="multipart/form-data">

  <label for="name">Nom de la recette&nbsp;:<span aria-label="required">*</span></label>
  <input id="name" type="text" name="name" required />

  <label for="time">Temps de préparation&nbsp;:<span aria-label="required">*</span></label>
  <input id="time" type="text" name="time" placeholder="Uniquement le chiffre" />

  <label for="cook">Temps de cuisson&nbsp;:<span aria-label="required">*</span></label>
  <input id="cook" type="text" name="cook" required placeholder="Uniquement le chiffre"/>

  <label for="category">Type de plat&nbsp;:<span aria-label="required">*</span></label>
  <input id="category" type="text" name="category" required placeholder="Entrée,dessert,plat..."/>

  <label for="ingredients">Liste des ingrédients&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="ingredients" name="ingredients" rows="20" cols="80" required placeholder="Ingrédients..."></textarea>

  <label for="product">Préparation&nbsp;:<span aria-label="required">*</span></label>
  <textarea id="product" name="product" rows="20" cols="80" required placeholder="Déroulement de la recette..."></textarea>

  <label for="img">Ajouter une image&nbsp;:<span aria-label="required">*</span></label>
  <input type="file" name="img" required>

  <input class="button b_update" type="submit" name="create_recipe" value="Créer">

</form>

 <?php require_once __DIR__.'/../../template/footer_sanitize.php'; ?>