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

//Si présence d'un post, on protège toutes les valeurs d'éventuels script
if(isset($_POST['update_user']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

  if(isset($_POST['name'])) {
    $name_sanitize =htmlentities($_POST['name']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le nom est incorrect !! </h1>';
    } else {
      $name = $name_sanitize;
    }
  }

  if(isset($_POST['firstname'])) {
    $firstname_sanitize =htmlentities($_POST['firstname']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$firstname_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le prénom est incorrect !! </h1>';
    } else {
      $firstname = $firstname_sanitize;
    }
  }

  if(isset($_POST['mail'])) {
    $mail_sanitize =filter_var($_POST['mail']);
    if(!filter_var($mail_sanitize,FILTER_VALIDATE_EMAIL)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le mail est incorrect !! </h1>'; 
    } else {
      $mail = $mail_sanitize;
    }
  }

  if(isset($_POST['role'])) {
    $role_sanitize =htmlentities($_POST['role']);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$role_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour le role est incorrect !! </h1>';
    } else {
      $role = $role_sanitize;
    }
  }

  if(isset($_POST['id'])) {
    $id_sanitize =htmlentities($_POST['id'],);
    if(!preg_match("/^[0-9]*$/",$id_sanitize)) {
      echo '<h1 class=\'alert\'>Le format utilisé pour l\'id est incorrect !! </h1>';
    } else {
      $id = $id_sanitize;
    }
  }

   //Si erreur sur l'une des variables
   if(empty($name) || empty($firstname) || empty($mail) || empty($id) || empty($role)) {
    echo '<h1 class=\'alert\'>La modification de l\'utilisateur à échoué !! </h1>';
  } else {
    //Si tout est OK
    $updateUser = updateUser($pdo,$id,$name,$firstname,$mail,$role);
    echo '<h1 class=\'alert\'>La modification de l\'utilisateur à été effectué !! </h1>';
  }
}
?>

<?php if(isset($_GET['id'])) { 
  $current_user = getUserById($pdo,$_GET['id']);
  ?>
  
<h1 class="hello_admin">Formulaire de modification d'un utilisateur :</h1>
<h2 class="hello_admin">Ne surtout pas modifier le champs "id" !!</h2>

<form method="POST" action="update_user.php?=id<?= htmlentities($_GET['id'])?>">

  <label for="id">Id&nbsp;:<span aria-label="required">*</span></label>
  <input id="id" type="text" name="id" required value="<?= htmlentities($current_user['id']); ?>"/>

  <label for="name">Nom&nbsp;:<span aria-label="required">*</span></label>
  <input id="name" type="text" name="name" required value="<?= htmlspecialchars($current_user['name']); ?>"/>

  <label for="firstname">Prénom&nbsp;:<span aria-label="required">*</span></label>
  <input id="firstname" type="text" name="firstname" required value="<?= htmlentities($current_user['firstname']); ?>"/>

  <label for="mail">Email&nbsp;:<span aria-label="required">*</span></label>
  <input id="mail" type="text" name="mail" required value="<?= htmlentities($current_user['mail']); ?>"/>

  <label for="role">Role&nbsp;:<span aria-label="required">*</span></label>
  <input id="role" type="text" name="role" required value="<?= htmlentities($current_user['role']); ?>"/>

  <input class="button b_update" type="submit" name="update_user" value="Modifier">

</form>
<?php }  ?>
 <?php require_once __DIR__.'/../../template/footer_sanitize.php'; ?>