<?php
// On déconnecte la session en effaçant totalement $_SESSION
// session_start();
// session_destroy();

// On ne fait que déconnecter l'utilisateur
session_start();
$title = 'Déconnexion';
unset($_SESSION['user']);

header('Location: /');