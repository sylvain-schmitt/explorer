<?php
namespace App\HTML;

class LoginForm{

    public function login(){

        return <<<HTML

            <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first">
                <i id="icon" class="far fa-user fa-2x py-3"></i>
                </div>

                <!-- Login Form -->
                <form action="" method="POST">
                <div class="form-group">
                    <input  type="text" id="login" class="fadeIn second" name="username" placeholder="Nom d'utilisateur" >
                </div>
                <div class="form-group">
                    <input  type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de passe" >
                </div>
                <div class="form-group">
                    <input type="submit" class="fadeIn fourth" value="Connexion">
                </div>
                </form>
                <!-- Remind Passowrd -->
                <div id="formFooter">
                <a class="underlineHover" href="inscription">Inscrivez vous pour accéder à l'explorateur </a>
                </div>

            </div>
            </div>
HTML;

    }


}