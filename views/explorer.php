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


?>
 
 



<div class="container-fluid h-100">
	<div class="container ">
			<div class="row explore ">
				<?php lister_dossiers("upload"); ?>
			</div>
	</div>
	<div class="text-center tool">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary">Left</button>
                <button type="button" class="btn btn-secondary">Middle</button>
                <button type="button" class="btn btn-secondary">Right</button>
            </div>
    </div>

</div>
  

