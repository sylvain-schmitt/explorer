<?php
$title = 'Connection'

?>
<?php include 'block/navbar.php' ?>


<h1 class="text-center">Bienvenu sur l'explorateur de fichier</h1>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    <i id="icon" class="far fa-user fa-2x"></i>
    </div>

    <!-- Login Form -->
    <form>
      <input method="POST" type="text" id="login" class="fadeIn second" name="username" placeholder="Nom d'utilisateur">
      <input method="POST" type="text" id="password" class="fadeIn third" name="password" placeholder="Mot de passe">
      <input type="submit" class="fadeIn fourth" value="Connexion">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="inscription">Inscrivez vous pour accéder à l'explorateur </a>
    </div>

  </div>
</div>
<?php include 'block/footer.php' ?>
