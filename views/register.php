<?php
use App\AUTH\NewRegister;
use App\Connection;
use App\HTML\RegisterForm;

$title = 'Inscription';
$pdo = Connection::getPDO();
$form = new RegisterForm;
$error = new NewRegister;
$user =  new NewRegister;
if($_POST){
    if(isset($_POST['username']) && !empty($_POST['username'])
    && isset($_POST['password']) && !empty($_POST['password'])
    && isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])){
        $user->newuser();
        header('Location: dossier');

    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
  }
  
?>

<?php if(!empty($_SESSION['erreur'])): echo $error->registererror(); endif; ?>
<?= $form->register(); ?> 


