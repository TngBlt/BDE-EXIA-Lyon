<?php $customTitle = "Gallery";

$customHead = "<link rel='stylesheet' href='static/css/gallery/base.css'/>
<link rel='stylesheet' href='static/css/gallery/component.css'/>";

$customScripts = "
<script src=\"/static/js/jquery-3.1.1.js\"></script>
<script src=\"/static/js/masonry.pkgd.min.js\"></script>
<script src=\"/static/js/imagesloaded.pkgd.min.js\"></script>
<script src='static/js/gallery.js'></script>";

include "includes/header.php"; ?>

<div class=".section-title gallery-title">
    <h2>Gallery</h2>
</div>
<div class="grid effect" id="grid">
    <?php $files = glob('static/img/gallery/*.{jpg,png}',GLOB_BRACE);
    $i = 0;
    print_r($files);
    while ($i < 3) { ?>
        <?php
    foreach($files as $image): ?>

        <div class="item">
            <div class="item-image hidden-item">
                <a href="#" class="image-link">
                    <img src="<?php echo $image ?>" alt="">
                </a>
                <div class="icons-image hidden">
                    <a href="#"><p class="posted-by"><?php echo 'posted by ' ?><span class="posted-by-name"><?php echo 'TngBlt' ?></span></p></a>
                    <a href="#" class="thumbs-up"><p><?php echo '12 '?></p><i class="fa fa-lg fa-thumbs-up" aria-hidden="true"></i></a>
                    <a href="#" class="comments"><p><?php echo '14 '?></p><i class="fa fa-lg fa-comments" aria-hidden="true"></i></a>
                    <a href="#" class="share-alt"><i class="fa fa-lg fa-share-alt" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="item-image item-image-sidepart hidden">
                <div class="item-likes">
                    <a href="#" class="thumbs-up">
                        <p><?php echo '12 '?></p>
                        <i class="fa fa-lg fa-thumbs-up" aria-hidden="true"></i>
                    </a>
                </div>
                <?php
                $comments = array('Utque aegrum corpus quassari etiam levibus solet offensis.',
                    'Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset.',
                    'Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener.');
                foreach($comments as $comment) : ?>

                <div class="item-commment">
                    <p class="item-comment-content"><?php echo $comment?></p>
                </div>

                <?php endforeach; ?>
            </div>
        </div>

    <?php endforeach; ?>
    <?php $i++; ?>
        <?php  }; ?>
   </div>

<?php include "includes/footer.php"; ?>