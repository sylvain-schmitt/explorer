<?php
namespace App\AUTH;

class NewError{

    public function error(){

        return <<<HTML
              <div class="container mt-4" ><div class="alert alert-danger" role="alert"> {$_SESSION['erreur']}</div></div>
         
 HTML;       
     }
 

}