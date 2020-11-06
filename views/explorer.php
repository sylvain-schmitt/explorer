<?php 
session_start();
 $title = 'Explorer';
 if(empty($_SESSION['user'])){
   header('Location: /');
}
$role = $_SESSION['user']['role'];
/*--*/
 ?>
 



<div class="container-fluid h-100">
  <div class="row h-100">
    <aside class="col-12 col-md-2 p-0 bg-light">
        <div class="w-20 border">
  <h6 class="pt-3 pl-3 ">Dossier</h6>
  <hr>
  <ul class="mb-1 pl-3 pb-2" id="myUL">

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
  

