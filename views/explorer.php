<?php 
session_start();
 $title = 'Explorer';
 if(empty($_SESSION['user'])){
   header('Location: /');
}
$role = $_SESSION['user']['role'];
// Explorateur de dossier / fichiers
function explore_dir_scan_html($dir, $niv=0, $id=0)
{
	$html = null;
	$html_dirs = null;
	$html_fils = null;
	if($niv==0){ $html .= '	<ul>'."\n"; }
	if ($handle = opendir($dir)) {
		while (false !== ($entry = readdir($handle))) {
			$id++;
			if(is_dir($dir.'/'.$entry)) // dossier
			{
				if($entry!='..' && $entry!='.')
				{
				 $html_dirs .= str_repeat("\t",$niv+1).'<li class="dir" id="div_'.$id.'">'.$entry."\n";
				 $html_dirs .= str_repeat("\t",$niv+2).'<ul class="sub_dir" id="sub_'.$id.'">'."\n";
				 $html_dirs .= explore_dir_scan_html($dir.'/'.$entry, $niv+1, $id);
				}				
			} else { // fichier
				 $html_fils .= str_repeat("\t",$niv+2).'<li class="fil" id="fil_'.$id.'"><a href="'.$dir.'/'.$entry.'" target="_blank">'.$entry.'</a></li>'."\n";
			}
			if(is_dir($dir.'/'.$entry))
			{
				if($entry!='..' && $entry!='.')
				{
				 $html_dirs .= str_repeat("\t",$niv+2).'</ul>'."\n";
				 $html_dirs .= str_repeat("\t",$niv+1).'</li>'."\n";
				}
			}
		}
		closedir($handle);
		$html .= $html_dirs; // dossiers
		$html .= $html_fils; // fichiers
	}    
	if($niv==0){ $html .= '	</ul>'."\n"; }
	return $html;
};
 ?>
 



<div class="container-fluid h-100">
  <div class="row h-100">
    <aside class="col-12 col-md-2 p-0 bg-light">
        <div class="w-20 border">
  <h6 class="pt-3 pl-3 ">Dossier</h6>
  <hr>
  <ul class=" mb-1 pl-3 pb-2" id="myUL">
  <nav id="explorateur-dossier">
<?php echo explore_dir_scan_html('upload'); // ( ../ dossier parent) ?>
</nav>


</li>
</ul>
</div>
    </aside>
    <main class="col">
     <h1 class="text-center">Explorateur de fichier</h1>

     <?php if($role === 'admin'): ?>
    <button>test</button>
    <?php endif; ?> 

    </main>
  </div>
</div>
  

