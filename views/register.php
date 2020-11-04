<?php
$title = 'Inscription';
if($_POST){
    if(isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['password']) && !empty($_POST['password'])){
  
        header('Location: dossier');
    }
  }
?>

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
                                                <input  type="text" class="form-control" placeholder="Votre nom *" name="username" value="" required/>
                                            </div>
                                            <div class="form-group">
                                                <input  type="password" class="form-control" placeholder="Votre mot de passe *" id="password" name="password" value="" required />
                                            </div>
                                            <div class="form-group">
                                                <input  type="password" class="form-control"  placeholder="Confirmé le mot de passe *" id="confirm_password" name="password" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="submit" class="btnRegister"  value="Inscription"/>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>

