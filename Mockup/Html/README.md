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

### Administration

La barre d'administration est visible en passant la pramètre `admin` dans l'url.

> Par exemple `localhost:8081/events.php?admin`

#### Ajouter des actions

Les actions contextuelles peuvent êtres ajoutés en remplissant la variable `$customActions` avec des `li` correctement organisés.

Ci dessous, un exemple d'actions personnalisés : 

```php
$customActions = "<li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Participations</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 1</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 2</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 3</a></li>";
```

### Widgets

Un système de widgets est commun à tout le site. Ce système fournis une organisation en cartes. Pour plus d'infos, rendez vous sur la page [localhost:8081/widget-structure.php](http://localhost:8081/widget-structure.php).

Tout le CSS est contenu dans le fichier `base.css`.