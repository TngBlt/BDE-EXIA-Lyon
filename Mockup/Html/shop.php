<?php
$customTitle = "Shop";

$customHead = "<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/shop.css\"/>";

$customActions = "<li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Purchases</a></li>
<li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Waiting Purchases</a></li>";

include "includes/header.php"; ?>

<div class="shop row">

    <section class="shop-section col-12 col-lg-8">

        <div class="widget widget-primary shop-jumbotron">
            <h2 class="shop-jumbotron-title">Welcome</h2>
            <h3 class="widget-offset shop-jumbotron-lead">On the BDE's goodies shop</h3>
            <form class="row shop-search-form" >
                <input type="text" placeholder="Search" class="form-control col-11"/>
                <button class="button button-invisible col-1">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>

        <div class="product-section row justify-content-center">

            <?php

            $pattern = "static/img/gallery/*.{jpg,png}";
            $files = glob($pattern,GLOB_BRACE);
            $i = 1;

            foreach($files as $image){
                $i++;?>

            <article class="product widget col-auto">
                <div class="product-image">
                    <img src="<?= $image ?>" alt="MyItem <?= $i ?>"/>
                </div>
                <div class="product-desc">
                    <h4 class="product-title">
                        MyItem <?= $i ?>
                    </h4>
                    <div class="product-price">
                        <?= random_int(1,$i*15) ?>€
                        <nav class="product-menu">
                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                        </nav>
                    </div>
                </div>
            </article>

            <?php } ?>
        </div>
        
    </section>

    <aside class="widgets col-12 col-lg-4">

        <div class="cart widget">

            <h4 class="widget-title widget-offset">Cart</h4>

            <ul class="cart-item-list">
                <li class="cart-item">MyItem 1 <div class="cart-item-right"><div class="cart-item-price">15€</div><a href="#" class="cart-item-remove"><i class="fa fa-times"></i></a></div></li>
                <li class="cart-item">MyItem 2 <div class="cart-item-right"><div class="cart-item-price">55€</div><a href="#" class="cart-item-remove"><i class="fa fa-times"></i></a></div></li>
                <li class="cart-item">MyItem 3 <div class="cart-item-right"><div class="cart-item-price">8€</div><a href="#" class="cart-item-remove"><i class="fa fa-times"></i></a></div></li>
            </ul>

            <button class="button button-primary">Purchase</button>

        </div>

    </aside>

</div>

<?php include "includes/footer.php"; ?>
