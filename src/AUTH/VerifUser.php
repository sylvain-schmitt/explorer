<?php
namespace App\AUTH;

use App\Connection;

class VerifUser{

    public  function verifuser(){
        $pdo = Connection::getPDO();
        
        $name = strip_tags($_POST['username']);
        $query = $pdo->query("SELECT * FROM user WHERE username='$name'");
        $num_row = $query->rowCount();
        if ($num_row == 1)
        {
            return $num_row;
        }


    }

}