<?php
namespace App\AUTH;

use PDO;
use App\Connection;


class NewLogin{

    public static function login(){
        $pdo = Connection::getPDO();
        $username = strip_tags($_POST['username']);
        //$password = $_POST['password'];

        $sql = 'SELECT * FROM user WHERE username = :username;';

        // On prépare la requête
        $query = $pdo->prepare($sql);
  
        // On injecte (terme scientifique) les valeurs
        $query->bindValue(':username', $username, PDO::PARAM_STR);
  
        // On exécute la requête
        $query->execute();
  
        // On récupère les données
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

}