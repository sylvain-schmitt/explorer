<?php

use App\Helper\Helpers;
use App\HTML\ModalUpload;

session_start();
 $title = 'Explorer';
 if ((!isset($_SESSION['user'])) || (empty($_SESSION['user'])))
    {
	header('Location: /');
	exit;
}
$fichiers = null;
$file = new Helpers;
$alert = new Helpers;
$upload = new ModalUpload;
$verif = Helpers::verif_file();

$role = $_SESSION['user']['role'];
$path = explode('files', $_SERVER['REQUEST_URI'])[1];
$url = 'upload' . $path;
$dir = opendir($url);
	
	while($files = readdir($dir)) { 

	if($files != '.' && $files != '..' ) 
	{ 
	$fichiers[] = $files ;
	} 
	} 
	closedir($dir);

if (isset($_POST) && !empty($_POST)) {
	
	if (isset($_POST['fichier']) && !empty($_POST['fichier'])) {
	$nom = $_POST['fichier'];
	if ($nom == 'Sélectionner le fichier à supprimer'){
		$_SESSION['erreur'] = 'veuillez choisir un fichier !';
	}else{
		unlink($url . '/' . $nom);
		$_SESSION['message'] = 'Le fichier a bien été supprimé !';
	}
	
	}
	}

 
	?>

<div class="container-fluid h-100">
	<div class="container ">
	<?php $alert->alert();?>
			<div class="row explore ">
				<?php $file->lister_fichiers($url); ?>
				<div class="text-center tool">
					<div class="btn-group" role="group" aria-label="Basic example">
						<button type="button" class="btn btn-secondary"><a class="underlineTool " href="/dossier">Retour </a></button>
					</div>
					<?php  if($role === 'admin'): ?>
						<?= $upload->upload();?>
						<?php endif; ?>


	</div>
</div>
						<?php if(isset($fichiers)):?>
			<!--Modal delete folder -->
			<form action="" method="post" >
				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="delete">Supprimer un fichier</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
                    <select class="custom-select" name="fichier">
						<option selected>Sélectionner le fichier à supprimer</option>

						<?php foreach($fichiers as $fichier): ?>
						<option   value="<?= $fichier ?>"><?= $fichier ?> </option>
						<?php endforeach ?>
                    </select>
					</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
						<button type="submit"  class="btn btn-primary" onclick="return confirm('Voulez vous vraiment supprimer ce fichier ?')">supprimer</button>
					</div>
					</div>
				</div>
				</div>
			</form>
						<?php endif; ?>