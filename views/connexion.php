<?php
$title = 'Connection';

if($_POST){
  if(isset($_POST['username']) && !empty($_POST['username'])
  && isset($_POST['password']) && !empty($_POST['password'])){

      header('Location: dossier');
  }
}
?>


<h1 class="text-center">Bienvenu sur l'explorateur de fichier</h1>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    <i id="icon" class="far fa-user fa-2x"></i>
    </div>

    <!-- Login Form -->
    <form action="" method="POST">
      <input  type="text" id="login" class="fadeIn second" name="username" placeholder="Nom d'utilisateur" required>
      <input  type="text" id="password" class="fadeIn third" name="password" placeholder="Mot de passe" required>
      <input type="submit" class="fadeIn fourth" value="Connexion">
    </form>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="inscription">Inscrivez vous pour accéder à l'explorateur </a>
    </div>

  </div>
</div>
