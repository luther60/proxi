<?php session_start();
 require_once 'template_admin/header_admin.php';
 require_once __DIR__.'/../lib/error.php';
//Si pas de session, on redirige vers accueil (A la fermeture du client, la session est détruite)
 if(!isset($_SESSION['user'])) {
  getIndex();
 }


 ?>

<h1 class="hello_admin">Bienvenue dans la gestion des recettes <?= $_SESSION['user']['firstname'] ?></h1>




<?php require_once __DIR__.'/../template/footer_sanitize.php'; ?>