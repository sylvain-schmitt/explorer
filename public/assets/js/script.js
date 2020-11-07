// OUVRIR / FERMER les DOSSIERS : En JavaScript pur (SANS jQuery)
window.onload = function() {
	var explorateur_dirs = document.querySelectorAll('#explorateur-dossier .dir');
	for( index=0; index < explorateur_dirs.length; index++ ) 
	{
	  explorateur_dirs[index].addEventListener('click', function(ev){ opencloseSubDir(this); ev.stopPropagation(); }, false);
	}
};
function opencloseSubDir( dossier ) 
{
  var ul = dossier.querySelector('ul');
  ul.style.display = (ul.style.display!='block')? 'block':'none';
 
}
/*--confiration de mot de passe--*/
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Les mots de passes ne correspondent pas !");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;