<?php session_start();
 require_once __DIR__.'/../../admin/template_admin/header_admin.php';
 require_once __DIR__.'/../../lib/error.php';
 require_once __DIR__.'/../../lib/pdo.php';
 require_once __DIR__.'/../../lib/users.php';
//Si pas de session, on redirige vers accueil (A la fermeture du client, la session est détruite)
 if(!isset($_SESSION['user'])) {
  getIndex();
 }
$users = getUsers($pdo);
 ?>

<h1 class="hello_admin">Bienvenue dans la gestion des utilisateurs <?= $_SESSION['user']['firstname'] ?></h1>
<p class="info">Dans cette section, tu peux créer, modifier ou supprimer les utilisateurs.</p>
<p class="info">Pour une modification, seul le mot de passe n'est pas modifiable !!</p>
<div class="delete"><a href="create_user.php">Créer un nouvel utilisateur</a></div>

<table class="tableau">
  <caption>
    Liste des utilisateurs
  </caption>
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Mail</th>
      <th scope="col">Role</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($users as $user) { ?>
  <tr>  
    <td scope="col"><?=htmlentities($user['name']);?></td>
    <td scope="col"><?=htmlentities($user['firstname']);?></td>
    <td scope="col"><?=htmlentities($user['mail']);?></td>
    <td scope="col"><?=htmlentities($user['role']);?></td>
    <td scope="col"><a href="update_user.php?id=<?=$user['id']?>">Modifier</a></td>
    <td scope="col"><a href="delete.php?id=<?=$user['id']?>">Supprimer</a></td>
  </tr>
  <?php } ?>
  </tbody>
</table>
<?php require_once __DIR__.'/../../template/footer_sanitize.php'; ?>