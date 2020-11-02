###Créer un explorateur de fichier avec un système d'upload.

- L'utilisateur ayant le role **admin** peut créer + modifier + supprimer un fichier. Parcourir les fichiers et se connecter
- L'utilisateur ayant le role **user** peut parcourir les fichiers + télécharger en .pdf


Il faut une base de donnée avec une table **user** avec les champs (username, password, role)

Vous devez utiliser les packages:

- Altorouter 
- Var-dumper
- Whoops

Type de fichier: png / jpeg / pdf.

Front: Vous pouvez utiliser bootstrap ou css à la maison.

Le fichier composer.json:

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    },
    "require": {
        "altorouter/altorouter": "^2.0",
        "symfony/var-dumper": "^5.1",
        "filp/whoops": "^2.7",
        "fzaninotto/faker": "^1.9",
        "ext-pdo": "*"
    }
}
```