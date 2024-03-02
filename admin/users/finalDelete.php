<?php session_start();
 require_once __DIR__.'/../../admin/template_admin/header_admin.php';
 require_once __DIR__.'/../../lib/error.php';
 require_once __DIR__.'/../../lib/pdo.php';
 require_once __DIR__.'/../../lib/users.php';
//Si pas de session, on redirige vers accueil (A la fermeture du client, la session est détruite)
 if(!isset($_SESSION['user'])) {
  getIndex();
 }

 if(isset($_GET['id'])) {
   $userDelete = deleteUser($pdo, $_GET['id']);
 }
 ?>

 <h1 class="hello_admin">L'utilisateur à été définitivement supprimé !!</h1>

 <div class="delete"><a href="user_management.php">Retour à la liste des utilisateurs</a></div>


 <?php require_once __DIR__.'/../../template/footer_sanitize.php'; ?>