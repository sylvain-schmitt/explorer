<?php
namespace App\AUTH;

use PDO;
use Exception;
use App\Connection;

class NewRegister{



    public function newuser(){
        $pdo = Connection::getPDO();
        
        $name = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
        $role = 'user';
        $sql = "INSERT INTO user (username, password, role) VALUES (:username, :password, :role)";
        $query = $pdo->prepare($sql);

        $query->bindValue(':username', $name, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->bindValue(':role', $role, PDO::PARAM_STR);
        
        $ok = $query->execute();

        if($ok === false){
            throw new Exception("Impossible de créer l'utilisateur {$name}");
        }
        
        return $ok;
    }



}