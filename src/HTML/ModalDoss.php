<?php
namespace App\HTML;

class ModalDoss{

    public function modalDossier($role){

        return <<<HTML
					
						<div class="btn-group" role="group" aria-label="Basic example">
							<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#creerDossier">Créer un dossier</button>
						</div>
						<div class="btn-group" role="group" aria-label="Basic example">
							<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#">Suppimer un  dossier</button>
						</div>							
						
				</div>
			</div>
			</div>

			<!-- Modal create folder--> 
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
HTML;
    }


}