# Development

To include the gallery to your mockup : 

```php
<?php include "includes/gallery-items.php" ?>
```
To add images you just have to add a new directory in *static/img/* and copy your images in it.

## Change variable 

In the code the images are collected with the glob function, insert the *$image_dir* variable in the path.
Png and Jpg files are accepted.
To change this variable : 
```php 
<?php $image_dir='event1'; ?>
```

## Info

The file `gallery.js` handles functions to create the blocks, and other effects. Some effects
are still under development. 
