<?php

use App\Helper\Helpers;
use App\HTML\ModalUpload;

session_start();
 $title = 'Explorer';
 if(empty($_SESSION['user'])){
   header('Location: /');
}

$file = new Helpers;
$alert = new Helpers;
$upload = new ModalUpload;

$role = $_SESSION['user']['role'];
$path = explode('files', $_SERVER['REQUEST_URI'])[1];
$url = 'upload' . $path;

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// Vérifie si le fichier a été uploadé sans erreur.
		if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "pdf" => "document/pdf", "png" => "image/png");
			$filename = $_FILES["photo"]["name"];
			$filetype = $_FILES["photo"]["type"];
			$filesize = $_FILES["photo"]["size"];
	
			// Vérifie l'extension du fichier
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!array_key_exists($ext, $allowed)) echo "<div class=\"container\"><div class=\" mt-4 alert alert-danger alert-dismissible fade show\" role=\"alert\">
			'Erreur : Veuillez sélectionner un format de fichier valide.'
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
				  <span aria-hidden=\"true\">&times;</span>
				</button>
			</div></div>" ;
	
			// Vérifie la taille du fichier - 5Mo maximum
			$maxsize = 5 * 1024 * 1024;
			if($filesize > $maxsize) echo "<div class=\"container\"><div class=\" mt-4 alert alert-danger alert-dismissible fade show\" role=\"alert\">
			'Erreur: La taille du fichier est supérieure à la limite autorisée.'
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
				  <span aria-hidden=\"true\">&times;</span>
				</button>
			</div></div>" ;"Erreur: La taille du fichier est supérieure à la limite autorisée.";
	
			// Vérifie le type MIME du fichier
			if(in_array($filetype, $allowed)){
				// Vérifie si le fichier existe avant de le télécharger.
				if(file_exists('upload/' . $path . '/' . $_FILES["photo"]["name"])){
					$_SESSION['erreur'] = $_FILES["photo"]["name"] . " existe déjà.";
				} else{
					move_uploaded_file($_FILES["photo"]["tmp_name"], 'upload/' . $path. '/' . $_FILES["photo"]["name"]);
					$_SESSION['message'] = "Votre fichier a été téléchargé avec succès.";
				} 
			} else{
				$_SESSION['erreur'] = "Erreur: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
			}
		} else{
			$_SESSION['erreur'] = "Erreur: " . $_FILES["photo"]["erreur"];
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