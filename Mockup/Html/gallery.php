<?php $customTitle = "Gallery";

$customHead = "<link rel='stylesheet' href='static/css/gallery/base.css'/>
<link rel='stylesheet' href='static/css/gallery/component.css'/>";

$customScripts = "
<script src=\"/static/js/jquery-3.1.1.js\"></script>
<script src=\"/static/js/masonry.pkgd.min.js\"></script>
<script src=\"/static/js/imagesloaded.pkgd.min.js\"></script>
<script src='static/js/gallery.js'></script>";

include "includes/header.php"; ?>

<div class="gallery-title">
    <h2>Gallery</h2>
</div>
<div class="grid" id="grid">
    <?php $files = glob('static/img/gallery/*.{jpg,png}',GLOB_BRACE);
    $i = 0;
    while ($i < 3) { ?>
        <?php
    foreach($files as $image): ?>

        <div class="item">
            <div class="item-image">

                <a href="#" class="image-link">
                    <img src="<?php echo $image ?>" alt="">
                </a>
                <div class="icons-image hidden">

                    <a href="#" class="thumbs-up"><p><?php echo '12 '?></p><i class="fa fa-lg fa-thumbs-up" aria-hidden="true"></i></a>
                    <a href="#" class="comments"><p><?php echo '14 '?></p><i class="fa fa-lg fa-comments" aria-hidden="true"></i></a>
                    <a href="#" class="share-alt"><i class="fa fa-lg fa-share-alt" aria-hidden="true"></i></a>
                </div>
            </div>

        </div>

    <?php endforeach; ?>
    <?php $i++; ?>
        <?php  }; ?>
   </div>

<?php include "includes/footer.php"; ?>