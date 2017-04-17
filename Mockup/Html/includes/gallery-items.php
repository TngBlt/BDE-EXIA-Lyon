<?php
$customScripts = "
<script src=\"/static/js/jquery-3.1.1.js\"></script>
<script src=\"/static/js/masonry.pkgd.min.js\"></script>
<script src=\"/static/js/imagesloaded.pkgd.min.js\"></script>
<script src='/static/js/gallery.js'></script>";
?>

<div class="grid effect" id="grid">

    <?php if (isset($image_dir))
    {
        $pattern = "static/img/".$image_dir."/*.{jpg,png}";
        $files = glob($pattern,GLOB_BRACE);

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
                </div>
            </div>
        <?php endforeach; ?>
    <?php } ?>
</div>