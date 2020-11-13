<?php

use App\Helper\Helpers;
use App\HTML\ModalDoss;

session_start();
$title = 'Explorer';
if ((!isset($_SESSION['user'])) || (empty($_SESSION['user'])))
    {
	header('Location: /');
	exit;
}
$role = $_SESSION['user']['role'];
$rep = new Helpers;
$alert = new Helpers;
$folder = new ModalDoss;

$dirname = 'upload'; 
$dir = opendir($dirname); 

while($file = readdir($dir)) { 
if($file != '.' && $file != '..' ) 
{ 
$folders[] = $file ; 

} 
} 
closedir($dir);  

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

if (isset($_POST) && !empty($_POST)) {
	
	if (isset($_POST['folder']) && !empty($_POST['folder'])) {
	$nom = $_POST['folder'];
	if (is_dir('upload/' . $nom)) {
	rmdir('upload/' . $nom);
	$_SESSION['message'] = 'Le répertoire a bien été supprimé!';
	}
	
	}
	}

?>

<div class="container-fluid h-100">
	<div class="container ">
	<?php $alert->alert();?>			
			<div class="row explore ">
				<?php $rep->lister_dossiers('upload');?>

				<div class="text-center tool">

						
					<?php  if($role === 'admin'): ?> 
						<?= $folder->modalDossier(); ?>
					<?php endif; ?>
			<!--Modal delete folder -->
			<form action="" method="post">
				<div class="modal fade" id="supprDossier" tabindex="-1" role="dialog" aria-labelledby="supprDossier" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="supprDossier">Supprimer un dossier</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
                    <select class="custom-select" name="folder">
						<option selected>Sélectionner le dossier à supprimer</option>
						<?php foreach($folders as $folder): ?>
						<option   value="<?= $folder ?>"><?= $folder ?> </option>
						<?php endforeach ?>

                    </select>
					</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
						<button type="submit"  class="btn btn-primary" onclick="return confirm('Voulez vous vraiment supprimer ce dossier ?')">supprimer</button>
					</div>
					</div>
				</div>
				</div>
			</form>	
		</div>
	</div>	
</div>
  

