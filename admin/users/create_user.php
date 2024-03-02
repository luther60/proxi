<?php session_start();
 require_once __DIR__.'/../../admin/template_admin/header_admin.php';
 require_once __DIR__.'/../../lib/error.php';
 require_once __DIR__.'/../../lib/pdo.php';
 require_once __DIR__.'/../../lib/users.php';
//Si pas de session, on redirige vers accueil (A la fermeture du client, la session est détruite)
 if(!isset($_SESSION['user'])) {
  getIndex();
 }
?>
<?php
//Vérification de la présence d'une soumission et de la méthode
if(isset($_POST['create_user']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  //Traitement de chaque entrée utilisateur
  if(isset($_POST['name'])) {
    $name_sanitize = htmlentities($_POST['name']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le nom est incorrect !! </h1>';
    }else {
      $name = $name_sanitize;
    }
  }

  if(isset($_POST['firstname'])) {
    $firstname_sanitize = htmlentities($_POST['firstname'],);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$firstname_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le prénom est incorrect !! </h1>';
    } else {
      $firstname = $firstname_sanitize;
    }
  }

  if(isset($_POST['mail'])) {
    $mail_sanitize = filter_var($_POST['mail']);
    if(!filter_var($mail_sanitize,FILTER_VALIDATE_EMAIL)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le mail est incorrect !! </h1>'; 
    } else {
      $mail = $mail_sanitize;
    }
  }

  if(isset($_POST['password'])) {
    $password_sanitize = $_POST['password'];
    if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{16,}$/", $password_sanitize )) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le mot de passe est incorrect !! </h1>';
    } else {
      $password_hash = password_hash($password_sanitize,PASSWORD_DEFAULT);
      $password = $password_hash;
    } 
  }

  if(isset($_POST['role'])) {
    $role_sanitize = htmlentities($_POST['role']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$role_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le role est incorrect !! </h1>';
    } else {
      $role = $role_sanitize;
    }
  } 
  //Si erreur sur l'une des variables
  if(empty($name) || empty($firstname) || empty($mail) || empty($password) || empty($role)) {
  echo '<h1 class=\'alert\'>La création de l\'utilisateur à échoué !! </h1>';
} else {
  //Si tout est OK
  $createUser = createUser($pdo,$name,$firstname,$mail,$password,$role);
  echo '<h1 class=\'alert\'>La création de l\'utilisateur à été effectué !! </h1>';
}
  
}
?>

<h1 class="hello_admin">Formulaire de création d'un nouvel utilisateur :</h1>
<h2 class="hello_admin">Le mot de passe doit obligatoirement contenir 1 chiffre, une lettre minuscule ET majuscule, 1 caractère 
  spécial, et doit faire au minimum 16 caractères !!
</h2>

<form method="POST" action="create_user.php">

  <label for="name">Nom&nbsp;:<span aria-label="required">*</span></label>
  <input id="name" type="text" name="name" required />

  <label for="firstname">Prénom&nbsp;:<span aria-label="required">*</span></label>
  <input id="firstname" type="text" name="firstname" />

  <label for="mail">Email&nbsp;:<span aria-label="required">*</span></label>
  <input id="mail" type="text" name="mail" required />

  <label for="password">Mot de passe&nbsp;:<span aria-label="required">*</span></label>
  <input id="password" type="text" name="password" required />

  <label for="role">Role&nbsp;:<span aria-label="required">*</span></label>
  <input id="role" type="text" name="role" required />

  <input class="button b_update" type="submit" name="create_user" value="Créer">

</form>

 <?php require_once __DIR__.'/../../template/footer_sanitize.php'; ?>