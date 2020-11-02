<?php require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


$router = new AltoRouter();

$router->map('GET', '/', function() {
    require dirname( __DIR__) . '/views/home.php';
});

$match = $router->match();
$match['target']();