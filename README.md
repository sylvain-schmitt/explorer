###Installer Mysql:

https://dev.mysql.com/downloads/file/?id=499589

Choisir server only

Laisser tout les params' par défaut 
Choisir comme mot de passe toortoor


- Click droit «Ce PC»

- Propriétés

- Paramètres système avance 

- En bas variables d’environnement, 
- Selectionner path dans les variables systèmes
- Puis cliquer sur modifier 
- "Nouveau"
- Et coller l’url : `C:\Program Files\MySQL\MySQL Server 8.0\bin`



- Redémarrer
- Puis ouvrir PHPStorm ou terminal de VS CODE
- Taper la commande mysql -v 
- Si une erreur de type "Access denied" c’est bon 
-Aller dans le dossier puis clic droit « Git Bash Here »
- lancer le serveur intern de PHP : 127.0.0.1:8080 -t public
- aller sur l’adresse  