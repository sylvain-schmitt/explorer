<?php require '../vendor/autoload.php';



$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new App\Router(dirname(__DIR__) . '/views');
$router
    ->match('/', 'connexion', 'home')
    ->match('/inscription', 'register', 'inscription')
    ->match('/dossier', 'explorer', 'dossier')
    ->match('/deconnexion', 'logout', 'deconnexion')
    ->match('/files/[*:slug]', 'fichier', 'files')

    ->run();