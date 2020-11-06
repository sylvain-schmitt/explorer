<?php

use App\AUTH\NewError;
use App\AUTH\NewLogin;
use App\HTML\LoginForm;

$title = 'Connection';
$form = new LoginForm;
$error = new NewError;


if (isset($_POST) && !empty($_POST)) {

    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
        $user = NewLogin::login();
        session_start();
        if (!$user) {
            $_SESSION['erreur'] =  'Nom et/ou mot de passe invalide';
        } else {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id'    => $user['id'],
                    'username'  => $user['username'],
                    'role' => $user['role']
                ];
                header('Location: dossier');
            } else {
                $_SESSION['erreur'] = 'Nom et/ou mot de passe invalide';
            }
        }
    } else {
        $_SESSION['erreur'] = "Veuillez remplir tous les champs...";
    }
}
?>


<h1 class="text-center">Bienvenue sur l'explorateur de fichier</h1>
<?php if (!empty($_SESSION['erreur'])) : echo $error->error();
endif; ?>
<?= $form->login(); ?>