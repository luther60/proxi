<?php 
 require_once __DIR__.'/../admin/template_admin/header_admin.php';
 require_once __DIR__.'/../lib/pdo.php';
 require_once __DIR__.'/../lib/config.php';
 require_once __DIR__.'/../lib/error.php';
?>

<?php

//Si données présente et méthode "POST"
if(isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  //Si une des 2 données et vide ou toutes
  if(empty($_POST['mail']) || empty($_POST['password'])) {
    //Redirection vers login
    redirect();
  }else {
    //Traitement de l'email et password
    $email = filter_var($_POST['mail']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      errMail();
    }
    $password = htmlentities($_POST['password']);
    //Vérification de l'existence de l'utilisateur et de son password
    $user = verifyUser($pdo,$email,$password);
    //Si inconnu ds la table => redirection
    if(empty($user)) {
      redirect();
    }
  }
  //Si user existe bien
  if($user) {
    if($user['role'] === 'admin') {
      session_start();
      $_SESSION['user'] = $user;
      setcookie("useradmin", 'user', time() + 3600, '/');
      header("location: accueil_admin.php");
    }
    if($user['role'] === 'user') {
      session_start();
      $_SESSION['user'] = $user;
      setcookie("user", 'user', time() + 3600, '/');
      header("location: /../../producteurs.php");
  }

  if($user === '') {
    redirect();
  }
    
  }
    
  }
  


?>

<?php require_once __DIR__.'/../template/footer_sanitize.php';?>