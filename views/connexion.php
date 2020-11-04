<?php
session_start();
use App\Connection;
use App\HTML\LoginForm;

$title = 'Connection';
$form = new LoginForm;
$pdo = Connection::getPDO();

if(isset($_POST) && !empty($_POST)){

  // On vérifie que tous les champs sont remplis
  if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
      // On récupère les valeurs saisies
      $username = strip_tags($_POST['username']);
      $password = $_POST['password'];

      // On vérifie si l'utilisateur existe dans la base de données

      // On écrit la requête
      $sql = 'SELECT * FROM user WHERE username = :username;';

      // On prépare la requête
      $query = $pdo->prepare($sql);

      // On injecte (terme scientifique) les valeurs
      $query->bindValue(':username', $username, PDO::PARAM_STR);

      // On exécute la requête
      $query->execute();

      // On récupère les données
      $user = $query->fetch(PDO::FETCH_ASSOC);
      // Soit on a une réponse dans $user, soit non
      // On vérifie si on a une réponse
      if(!$user){
          echo 'Nom et/ou mot de passe invalide';
      }else{
          // On vérifie que le mot de passe saisi correspond à celui en base
          // password_verify($passEnClairSaisi, $passBaseDeDonnees)
          if(password_verify($password, $user['password'])){
              // On crée la session "user"
              // On ne stocke JAMAIS de données dont on ne maîtrise pas le contenu
              $_SESSION['user'] = [
                  'id'    => $user['id'],
                  'username'  => $user['username']
              ];

              header('Location: dossier');
          }else{
              echo 'Nom et/ou mot de passe invalide';
          }
      }

  }else{
      echo "Veuillez remplir tous les champs...";
  }

}
?>


<h1 class="text-center">Bienvenue sur l'explorateur de fichier</h1>

<?= $form->login(); ?>
