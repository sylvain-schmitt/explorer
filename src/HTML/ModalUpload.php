<?php
namespace App\HTML;

class ModalUpload{

    public function upload(){
        return <<<HTML
        							
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#uploadFichier">Uploader un fichier</button>
							</div>
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete">Suppimer un fichier</button>
							</div>
						</div>
								
				</div>
            </div>
			<!-- Modal upload files--> 
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal fade" id="uploadFichier" tabindex="-1" role="dialog" aria-labelledby="uploadFichier" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="uploadFichier">Uploader un fichier</h5>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
					</div>
					<div class="modal-body">
					<p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .pdf, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
					<div class="custom-file">
						<label for="fileUpload">Fichier:</label>
						<input type="file" name="photo" id="fileUpload">
  						<input type="file" class="custom-file-input" id="customFile" name="monfichier">
					</div>					
					<div class="modal-footer">
						<button  type="submit" name="submit" class="btn btn-primary" value="Upload">Upload</button>
					</div>
					</div>
				</div>
				</div>
            </form>
HTML;
    }


}