<?php
namespace App\Helper;

class Helpers{

    public function alert(){

        if(!empty($_SESSION['erreur'])):
            echo '<div class=" mt-4 alert alert-danger alert-dismissible fade show" role="alert">
    '. $_SESSION['erreur'].'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    $_SESSION['erreur'] = "";
    endif;
    
        if(!empty($_SESSION['message'])):
            echo '<div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
    '. $_SESSION['message'].'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    $_SESSION['message'] = "";
    endif;
    return ;

    }


    public function lister_dossiers($rep)  
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
     return $rep;
    } 


    
public function lister_fichiers($rep)  
{  
	if(is_dir($rep))  
	{  
		if($iteration = opendir($rep))  
		{  
			while(($fichier = readdir($iteration)) !== false)  
			{  
				
				$extends = explode('.', $fichier)[1];
                $ext = strtolower ($extends);
				$path = explode('files', $_SERVER['REQUEST_URI'])[1];
                $url = '/upload' . $path;
				if($fichier != "." && $fichier != "..")  
				{  

					if ($ext == 'pdf'){
						echo   "<div class=\" col-lg-2 col-md-4 col-6 folder item\"><a  class='underlineHover' target=\"blank\"  href=\"$url/$fichier\"><img src='../assets/img/pdf.png'><li class='d text-center'> " . ucfirst($fichier) . " </li></a></div>";
					}
					if ($ext == 'jpg' ){
						echo   "<div class=\" col-lg-2 col-md-4 col-6 folder item\"><a  class='underlineHover' target=\"blank\" href=\"../pdf?$url/$fichier\"><p><img src='../assets/img/jpg.png'><li class='d text-center'> " . ucfirst($fichier) . " </p></a></li></div>";
					}
					if ($ext == 'jpeg' ){
						echo   "<div class=\" col-lg-2 col-md-4 col-6 folder item\"><a  class='underlineHover' target=\"blank\" href=\"../pdf?$url/$fichier\"><p><img src='../assets/img/jpg.png'><li class='d text-center'> " . ucfirst($fichier) . " </p></a></li></div>";
					}
					if ($ext == 'png' ){
						echo   "<div class=\" col-lg-2 col-md-4 col-6 folder item\"><a  class='underlineHover' target=\"blank\" href=\"../pdf?$url/$fichier\"><p><img src='../assets/img/png.png'><li class='d text-center'> " . ucfirst($fichier) . " </p></a></li></div>";
					}
				} 
			}if($ext == ''){
				echo "<div class='error-template'><h1>Le dossier est vide !</h1></div>";
			}  
			 
			closedir($iteration);  
		}
		  
	}
    return $rep;
} 

public static function verif_file(){
    $path = explode('files', $_SERVER['REQUEST_URI'])[1];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
		// Vérifie si le fichier a été uploadé sans erreur.
		if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "pdf" => "application/pdf", "png" => "image/png");
			$filename = $_FILES["photo"]["name"];
			$filetype = $_FILES["photo"]["type"];
			$filesize = $_FILES["photo"]["size"];
	
			// Vérifie l'extension du fichier
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!array_key_exists($ext, $allowed)) echo "<div class=\"container\"><div class=\" mt-4 alert alert-danger alert-dismissible fade show\" role=\"alert\">
			Erreur : Veuillez sélectionner un format de fichier valide.
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
				  <span aria-hidden=\"true\">&times;</span>
				</button>
			</div></div>" ;
	
			// Vérifie la taille du fichier - 5Mo maximum
			$maxsize = 5 * 1024 * 1024;
			if($filesize > $maxsize) echo "<div class=\"container\"><div class=\" mt-4 alert alert-danger alert-dismissible fade show\" role=\"alert\">
			Erreur: La taille du fichier est supérieure à la limite autorisée.
				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
				  <span aria-hidden=\"true\">&times;</span>
				</button>
			</div></div>" ;
	
			// Vérifie le type MIME du fichier
			if(in_array($filetype, $allowed)){
				// Vérifie si le fichier existe avant de le télécharger.
				if(file_exists('upload/' . $path . '/' . $_FILES["photo"]["name"])){
					$_SESSION['erreur'] = $_FILES["photo"]["name"] . " existe déjà.";
				} else{
					$_FILES["photo"]["name"] = str_replace(" ", "-", $_FILES["photo"]["name"]);
					move_uploaded_file($_FILES["photo"]["tmp_name"], 'upload/' . $path. '/' . $_FILES["photo"]["name"]);
					$_SESSION['message'] = "Votre fichier a été téléchargé avec succès.";
				} 
			} else{

				$_SESSION['erreur'] = "Erreur: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
			}
		} 
	}
    return;
}

}