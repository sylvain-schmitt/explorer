<?php 

session_start();
 $title = 'Explorer';
 if(empty($_SESSION['user'])){
   header('Location: /');
}
$role = $_SESSION['user']['role'];

function lister_dossiers($rep)  
{  
	if(is_dir($rep))  
	{  
		if($iteration = opendir($rep))  
		{  
			while(($fichier = readdir($iteration)) !== false)  
			{  
				if($fichier != "." && $fichier != ".." )  
				{  
					echo   "<div class=\" col-lg-2 col-md-4 col-6 folder item\"><a class='underlineHover' href=\"files/$fichier\"><img src='../assets/img/folder-app.ico'><li class='d text-center'> " . ucfirst($fichier) . " </li></a></div>";
				}  
			}  
			closedir($iteration);  
		}  
	} 
 
} 

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
	<?php
                        if(!empty($_SESSION['erreur'])):
                            echo '<div class=" mt-4 alert alert-danger alert-dismissible fade show" role="alert">
                    '. $_SESSION['erreur'].'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    $_SESSION['erreur'] = "";
                    endif;
                    ?>
                    <?php
                        if(!empty($_SESSION['message'])):
                            echo '<div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
                    '. $_SESSION['message'].'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    $_SESSION['message'] = "";
                    endif;
					?>			
			<div class="row explore ">
				<?php lister_dossiers("upload"); ?>
			</div>
	</div>
	<div class="text-center tool">
            <div class="btn-group" role="group" aria-label="Basic example">
				<?php if($role === 'admin'): ?>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#creerDossier">Créer un dossier</button>
                <button type="button" class="btn btn-secondary">Middle</button>
				<button type="button" class="btn btn-secondary">Right</button>
				<?php endif; ?>
            </div>
	</div>
	<!-- Modal -->
<form action="" method="post">
	<div class="modal fade" id="creerDossier" tabindex="-1" role="dialog" aria-labelledby="creerDossier" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="creerDossier">Créer un dossier</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
		  <div class="form-group">
				  <label for="nom">Nom du dossier</label>
				<input  type="text" id="nom" name="nom" value="" />
		  </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			<button type="submit"  class="btn btn-primary">Créer</button>
		  </div>
		</div>
	  </div>
	</div>
</form>

</div>
  

