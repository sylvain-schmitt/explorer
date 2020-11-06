<?php
use App\AUTH\NewError;
use App\AUTH\NewRegister;
use App\AUTH\VerifUser;
use App\HTML\RegisterForm;

$title = 'Inscription';
$form = new RegisterForm;
$error = new NewError;
$user =  new NewRegister;
$num_row = new VerifUser;
if($_POST){
    if(isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['password']) && !empty($_POST['password'])
    && isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])){
        if($num_row->verifuser() == 1){
            $_SESSION['erreur'] = "Ce nom d'utilisateur est déjà pris";
            
        }else{
            $user->newuser();
            header('Location: /');
        }

    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
  }

?>
<?php if(!empty($_SESSION['erreur'])): echo $error->error(); endif; ?>
<?= $form->register(); ?> 


