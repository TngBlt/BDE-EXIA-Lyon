# Mockups du site

Ces mockups utilisent PHP pour l'inclusion des templates.

Pour lancer un serveur assurez vous d'avoir installé la dernière version de PHP sur votre machine puis éxécutez le script `server.sh`. Cela va lancer un serveur local simple accessible a l'adresse [localhost:8081](http://localhost:8081/).

## Développement

Pour développer votre mockup vous pouvez commencer par le squelette de page suivant :

```php
<?php include "includes/header.php"; ?>

<!-- Votre code ICI -->

<?php include "includes/footer.php"; ?>

```

Ce squelette intègre tout le code d'en tête ainsi que la balise de début de section de la page. L'ensemble des balises fermantes sont gèrés par le script `footer.php`.

### Variable de modification

Vopus pouvez modifier les éléments inclus a l'aide de 3 variables : 

* **$customTitle** Ajoute un titre avant la mention "BDE CESI Lyon"
* **$customHead** Permet d'ajouter des éléments dans la balise head de la page comme du CSS
* **$customScripts** Permet d'ajouter des éléments a la fin de la page comme du Javascript

Toutes ces variables doivent êtres définis en premier dans la page.

```php
<?php
$customTitle = "Un titre personnalisé";
$customHead = "<link rel='stylesheet' href='my.css'/>";
$customScripts = "<script src='app.js'></script>";
include "includes/header.php"; ?>

<!-- Votre code ICI -->

<?php include "includes/footer.php"; ?>

```