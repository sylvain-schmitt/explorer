<?php
$title = 'Inscription';
?>
<?php include 'block/navbar.php' ?>

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="../assets/img/pngegg.png" alt=""/>
                        <h3>Bienvenue.</h3>
                        <input type="submit" name="" value="Connexion"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Explorer</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input method="POST" type="text" class="form-control" placeholder="Votre nom *" name="username" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input method="POST" type="password" class="form-control" placeholder="Votre mot de passe *" name="password" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input method="POST" type="password" class="form-control"  placeholder="Confirmé votre mot de passe *" name="password" value="" />
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
            <?php include 'block/footer.php' ?>