<?php 

 $title = 'Explorer';

 ?>

<?php include 'block/navbar.html' ?>


<div class="container-fluid h-100">
  <div class="row h-100">
    <aside class="col-12 col-md-2 p-0 bg-light">
        <div class="w-20 border">
  <h6 class="pt-3 pl-3">Dossier</h6>
  <hr>
  <ul class="mb-1 pl-3 pb-2" id="myUL">
    <li><i class="caret fas fa-angle-right rotate"></i> 
        <span><i class="far fa-folder-open ic-w mx-1"></i>Imgages</span>
            <ul class="nested">
                <a href="../upload/image/bg6.jpg"><li>bg6.jpg</li></a>
            </ul>
    </li>
    <li><i class="caret fas fa-angle-right rotate"></i> 
        <span><i class="far fa-folder-open ic-w mx-1"></i>Documents</span>
            <ul class="nested">
            <a href="../upload/document/document.pdf"><li>documet.pdf</li></a>
            </ul>
    </li>
    <li><i class="caret fas fa-angle-right rotate"></i> 
        <span><i class="far fa-folder-open ic-w mx-1"></i>Fichiers</span>
            <ul class="nested">
            <a href="../upload/fichier/logo.png"><li>logo.png</li></a>
            </ul>
    </li>
  </ul>
</div>
    </aside>
    <main class="col">
     <h1 class="text-center">Explorateur de fichier</h1>
    </main>
  </div>
</div>
  


<?php include 'block/footer.html' ?>


