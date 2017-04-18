<?php $customTitle = "Gallery";

$customHead = "<link rel='stylesheet' href='static/css/gallery/base.css'/>
<link rel='stylesheet' href='static/css/gallery/component.css'/>";


include "includes/header.php"; ?>

    <div class="section-title gallery-title">
        <h2>Gallery</h2>
    </div>

<?php $image_dir = 'gallery' ; ?>

<?php $comments = array('Utque aegrum corpus quassari etiam levibus solet offensis.',
    'Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset.',
    'Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener.');
?>
<?php include "includes/gallery-items.php"; ?>


<?php include "includes/footer.php"; ?>