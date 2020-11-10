<?php

use App\Helper\Helpers;
use App\HTML\ModalDoss;

session_start();
 $title = 'Explorer';
 if(empty($_SESSION['user'])){
   header('Location: /');
}
$role = $_SESSION['user']['role'];

$rep = new Helpers;
$alert = new Helpers;
$folder = new ModalDoss;
if (isset($_POST) && !empty($_POST)) {

    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
		$nom = $_POST['nom']; // Le nom du répertoire à créer
		 // Vérifie si le répertoire existe :
			if (is_dir('upload/' . $nom)) {
				$_SESSION['erreur'] = 'Le répertoire existe déjà!';  
				}
// Création du nouveau répertoire
else { 
	mkdir('upload/' . $nom);
	$_SESSION['message'] ='Le répertoire '.$nom.' vient d\'être créé!';      
	}


	}
}
?>

<div class="container-fluid h-100">
	<div class="container ">
	<?php $alert->alert();?>			
			<div class="row explore ">
				<?php $rep->lister_dossiers("upload"); ?>

				<div class="text-center tool">

						
					<?php  if($role === 'admin'): ?> 
						<?= $folder->modalDossier($role); ?>
					<?php endif; ?>
				

</div>
  

