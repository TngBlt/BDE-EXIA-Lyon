<?php
$customScripts = $customScripts."
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
                        <img src="<?php echo $image ;?>" alt="">
                    </a>
                    <div class="icons-image hidden">
                        <a href="#"><p class="posted-by"><?php echo 'posted by '; ?><span class="posted-by-name"><?php echo 'TngBlt' ;?></span></p></a>
                        <a href="#" class="thumbs-up"><p><?php echo '12 ';?></p><i class="fa fa-lg fa-thumbs-up" aria-hidden="true"></i></a>
                        <a href="#" class="comments"><p><?php echo '14 ';?></p><i class="fa fa-lg fa-comments" aria-hidden="true"></i></a>
                        <a href="#" class="share-alt"><i class="fa fa-lg fa-share-alt" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="item-image item-image-sidepart hidden">
                    <div class="item-likes">
                        <a href="#" class="thumbs-up">
                            <p><?php echo '12 '?>
                            <i class="fa fa-lg fa-thumbs-up" aria-hidden="true"></i></p>
                        </a>
                    </div>
                    <div class="item-comments widget widget-primary">
                        <?php foreach($comments->comments as $comment): ?>
                            <div class="item-commment">
                                <p class="item-comment-content"><span class="comment-name"><?php echo $comment->name; ?></span> - <?php echo $comment->content; ?></p>
                                <p><span class="comment-date">on <?php echo $comment->date; ?></span></p>
                            </div>
                            <hr class="half-rule"/>
                        <?php endforeach; ?>

                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <textarea class="form-control" id="comment" rows="3"></textarea>
                            </div>
                            <div class="form-group add-comment">
                                <button class="btn btn-default">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } ?>
</div>