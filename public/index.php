<?php require '../vendor/autoload.php';



$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


$router = new AltoRouter();

$router->map('GET|POST', '/', function() {
    require dirname( __DIR__) . '/views/connexion.php';
});
$router->map('GET|POST', '/inscription', function() {
    require dirname( __DIR__) . '/views/register.php';
});
$router->map('GET', '/explorer', function() {
    require dirname( __DIR__) . '/views/explorer.php';
});



$match = $router->match();
$match['target']();
