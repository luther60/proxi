<?php require_once 'template/header.php';
require_once 'lib/error.php';

?>

<form method="POST" action="/admin/submit.php">
  <h1 class="title">Page de connexion réservé aux administrateurs du site</h1>

  <label for="mail">Saisir votre email&nbsp;:<span aria-label="required">*</span></label>
  <input type="text" id="mail" name="mail" placeholder="Email" required>

  <label for="password">Saisir votre mot de passe&nbsp;:<span aria-label="required">*</span></label>
  <input type="text" id="password" name="password" placeholder="Mot de passe" required>

  <input class="button" type="submit" name="login" value="Se connecter">
</form>

<?php require_once 'template/footer_sanitize.php'; ?>