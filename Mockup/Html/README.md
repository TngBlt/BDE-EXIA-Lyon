# Website's Mockup

These MockUps use PHP to include templates.

To launch a server, make sure to have the latest version of PhP on your computer, then execute the `server.sh` script. It will launch a local server at [localhost:8081](http://localhost:8081/).

## Development

To develop your mockup, you can start by this page's structure :
	
```php
<?php include "includes/header.php"; ?>

<!-- Your code HERE -->

<?php include "includes/footer.php"; ?>

```

This structure includes the header and the first stage of the page's section. The `footer.php`script deals with all the closing tags.

### Change variable

You can change the include elements with these 3 variables :

* **$customTitle** Add a title before "BDE CESI Lyon".
* **$customHead** Allow to add elements in the pages' head tag (like css).
* **$customScripts** Allow to add elements at the end of the page like Javascript.

All these variables must be defined first in the page.

```php
<?php
$customTitle = "A customed title";
$customHead = "<link rel='stylesheet' href='my.css'/>";
$customScripts = "<script src='app.js'></script>";
include "includes/header.php"; ?>

<!-- Your code HERE -->

<?php include "includes/footer.php"; ?>

```

### Administration

The administration toolbar can be seen with the `admin` parameters in the URL.

> For exemple `localhost:8081/events.php?admin`

### Add actions

The contextual actions can be added while filling the `$customActions` variable with `li` well organized.

Here is an exemple :

```php
$customActions = "<li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Participations</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 1</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 2</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 3</a></li>";
```

### Widgets

A widgets system is common to all the website. This system allow a cards organisation. For more infos, check [localhost:8081/widget-structure.php](http://localhost:8081/widget-structure.php). 

All the css is in the `base.css` file.




//French


# Mockups du site

Ces mockups utilisent PHP pour l'inclusion des templates.

Pour lancer un serveur assurez vous d'avoir installé la dernière version de PHP sur votre machine puis exécutez le script `server.sh`. Cela va lancer un serveur local simple accessible a l'adresse [localhost:8081](http://localhost:8081/).

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