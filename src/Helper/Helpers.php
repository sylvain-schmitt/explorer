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
				if($fichier != "." && $fichier != "..")  
				{  

					if ($ext == 'pdf'){
						echo   "<div class=\" col-lg-2 col-md-4 col-6 folder item\"><a  class='underlineHover' href=\"$fichier\"><img src='../assets/img/pdf.png'><li class='d text-center'> " . ucfirst($fichier) . " </li></a></div>";
					}
					if ($ext == 'jpg' ){
						echo   "<div class=\" col-lg-2 col-md-4 col-6 folder item\"><a  class='underlineHover' href=\"$fichier\"><img src='../assets/img/jpg.png'><li class='d text-center'> " . ucfirst($fichier) . " </li></a></div>";
					}
					if ($ext == 'jpeg' ){
						echo   "<div class=\" col-lg-2 col-md-4 col-6 folder item\"><a  class='underlineHover' href=\"$fichier\"><img src='../assets/img/jpg.png'><li class='d text-center'> " . ucfirst($fichier) . " </li></a></div>";
					}
					if ($ext == 'png' ){
						echo   "<div class=\" col-lg-2 col-md-4 col-6 folder item\"><a  class='underlineHover' href=\"$fichier\"><img src='../assets/img/png.png'><li class='d text-center'> " . ucfirst($fichier) . " </li></a></div>";
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

}