<?php

namespace App\HTML;

class RegisterForm{

    public function register()
    {
        return <<<HTML
        <form action="" method="post">
            <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="../assets/img/pngegg.png" alt=""/>
                        <h3>Bienvenue.</h3>
                    </div>
                        <div class="col-md-9 register-right">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                     <h3 class="register-heading">Explorer</h3>
                                        <div class="row register-form">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                     <input  type="text" class="fadeIn first" placeholder="Votre nom *"  id="username" name="username" value="" />
                                                </div>
                                                <div class="form-group">
                                                    <input  type="password" class="fadeIn second" placeholder="Votre mot de passe *" id="password" name="password" value=""  />
                                                </div>
                                                <div class="form-group">
                                                    <input  type="password" class="fadeIn third"  placeholder="Confirmé mot de passe *" id="confirm_password" name="confirm_password" value="" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="submit" class="fadeIn fourth"  value="Inscription"/>
                                                 </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
HTML;
    }

}