<?php

use App\Helper\Helpers;

session_start();
 $title = 'Explorer';
 if(empty($_SESSION['user'])){
   header('Location: /');
}

$file = new Helpers;

$role = $_SESSION['user']['role'];
	$path = explode('files', $_SERVER['REQUEST_URI'])[1];
    $url = 'upload' . $path;

?>

<div class="container-fluid h-100">
	<div class="container ">
			<div class="row explore ">
				<?php $file->lister_fichiers($url); ?>
				<div class="text-center tool">
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-secondary"><a class="underlineTool " href="/dossier">Retour </a></button>
							</div>
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-secondary">Left</button>
								<button type="button" class="btn btn-secondary">Middle</button>
								<button type="button" class="btn btn-secondary">Right</button>
							</div>
						</div>
            </div>
    </div>
</div>