<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'theme/head.php' ?>
</head>

<body>
    <div><?php include_once 'theme/header.php' ?></div>

    <div class="options"><?php include_once 'theme/menu.php' ?></div>

    <div class="global">
        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="<?= base_url('assets/') ?>vendors/img/Articles/Poissons/rouger.jpg" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Possons<br>Rayon</h3>
                                <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->

                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="<?= base_url('assets/') ?>vendors/img/Articles/Legumes/choix de chine.jpg"
                                    alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Legumes<br>Rayon</h3>
                                <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->

                    <!-- shop -->
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="<?= base_url('assets/') ?>vendors/img/Articles/Fruits/ananas .jpg" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Fruits<br>rayon</h3>
                                <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /shop -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- SECTION -->
        <div class="section tabs-content">
            <!-- container -->
            <div class="container tab-content active" id="home">
                <!-- /row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">L&eacute;gumes et Fruits</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#tab1">Boucherie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Boulangerie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">

                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <?php if (isset($Article20)) foreach ($Article20 as $article) : ?>

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img style="width: 265px;height:270px"
                                                    src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?= $article->getCategorie(); ?></p>
                                                <h3 class="product-name"><a
                                                        href="#"><?= $article->getDesignation(); ?></a></h3>
                                                <h4 class="product-price">
                                                    <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                        class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                                </h4>
                                                <h4 class="product-price">
                                                    <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                    &emsp14;</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a class="add"
                                                            href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                            view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a class="add addPanier"
                                                    href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                        class="add-to-cart-btn panier"><i
                                                            class="fa fa-shopping-cart"></i> add to cart</button></a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <?php endforeach; ?>

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->

                            </div>

                        </div>
                    </div>

                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
                <!-- /row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">L&eacute;gumes et Fruits</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#tab1">Boucherie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Boulangerie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">

                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <?php if (isset($Article7)) foreach ($Article7 as $article) : ?>

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img style="width: 265px;height:270px"
                                                    src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?= $article->getCategorie(); ?></p>
                                                <h3 class="product-name"><a
                                                        href="#"><?= $article->getDesignation(); ?></a></h3>
                                                <h4 class="product-price">
                                                    <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                        class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                                </h4>
                                                <h4 class="product-price">
                                                    <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                    &emsp14;</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a class="add"
                                                            href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                            view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a class="add addPanier"
                                                    href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                        class="add-to-cart-btn panier"><i
                                                            class="fa fa-shopping-cart"></i> add to cart</button></a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <?php endforeach; ?>

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->

                            </div>

                        </div>
                    </div>

                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <ul class="section-tab-nav tab-nav">
                                        <li class="active"><a data-toggle="tab" href="#tab1">L&eacute;gumes et
                                                Fruits</a></li>
                                        <li><a data-toggle="tab" href="#tab1">Boucherie</a></li>
                                        <li><a data-toggle="tab" href="#tab1">Boulangerie</a></li>
                                        <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">

                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <?php if (isset($Article1)) foreach ($Article1 as $article) : ?>

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img style="width: 265px;height:270px"
                                                    src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?= $article->getCategorie(); ?></p>
                                                <h3 class="product-name"><a
                                                        href="#"><?= $article->getDesignation(); ?></a></h3>
                                                <h4 class="product-price">
                                                    <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                        class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                                </h4>
                                                <h4 class="product-price">
                                                    <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                    &emsp14;</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a class="add"
                                                            href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                            view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a class="add addPanier"
                                                    href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                        class="add-to-cart-btn panier"><i
                                                            class="fa fa-shopping-cart"></i> add to cart</button></a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <?php endforeach; ?>

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->

                            </div>

                        </div>
                    </div>
                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->

                <!-- /row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">L&eacute;gumes et Fruits</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#tab1">Boucherie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Boulangerie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">

                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <?php if (isset($Article6)) foreach ($Article6 as $article) : ?>

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img style="width: 265px;height:270px"
                                                    src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?= $article->getCategorie(); ?></p>
                                                <h3 class="product-name"><a
                                                        href="#"><?= $article->getDesignation(); ?></a></h3>
                                                <h4 class="product-price">
                                                    <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                        class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                                </h4>
                                                <h4 class="product-price">
                                                    <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                    &emsp14;</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a class="add"
                                                            href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                            view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a class="add addPanier"
                                                    href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                        class="add-to-cart-btn panier"><i
                                                            class="fa fa-shopping-cart"></i> add to cart</button></a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <?php endforeach; ?>

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->

                            </div>

                        </div>
                    </div>

                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->

                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">L&eacute;gumes et Fruits</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#tab1">Boucherie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Boulangerie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">

                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <?php if (isset($Article9)) foreach ($Article9 as $article) : ?>

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img style="width: 265px;height:270px"
                                                    src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?= $article->getCategorie(); ?></p>
                                                <h3 class="product-name"><a
                                                        href="#"><?= $article->getDesignation(); ?></a></h3>
                                                <h4 class="product-price">
                                                    <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                        class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                                </h4>
                                                <h4 class="product-price">
                                                    <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                    &emsp14;</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a class="add"
                                                            href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                            view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a class="add addPanier"
                                                    href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                        class="add-to-cart-btn panier"><i
                                                            class="fa fa-shopping-cart"></i> add to cart</button></a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <?php endforeach; ?>

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->

                            </div>

                        </div>
                    </div>

                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
                <!-- /row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">L&eacute;gumes et Fruits</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#tab1">Boucherie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Boulangerie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">

                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <?php if (isset($Article10)) foreach ($Article10 as $article) : ?>

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img style="width: 265px;height:270px"
                                                    src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?= $article->getCategorie(); ?></p>
                                                <h3 class="product-name"><a
                                                        href="#"><?= $article->getDesignation(); ?></a></h3>
                                                <h4 class="product-price">
                                                    <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                        class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                                </h4>
                                                <h4 class="product-price">
                                                    <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                    &emsp14;</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a class="add"
                                                            href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                            view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a class="add addPanier"
                                                    href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                        class="add-to-cart-btn panier"><i
                                                            class="fa fa-shopping-cart"></i> add to cart</button></a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <?php endforeach; ?>

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->

                            </div>

                        </div>
                    </div>

                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
                <!-- /row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">L&eacute;gumes et Fruits</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#tab1">Boucherie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Boulangerie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">

                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <?php if (isset($Article5)) foreach ($Article5 as $article) : ?>

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img style="width: 265px;height:270px"
                                                    src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?= $article->getCategorie(); ?></p>
                                                <h3 class="product-name"><a
                                                        href="#"><?= $article->getDesignation(); ?></a></h3>
                                                <h4 class="product-price">
                                                    <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                        class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                                </h4>
                                                <h4 class="product-price">
                                                    <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                    &emsp14;</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a class="add"
                                                            href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                            view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a class="add addPanier"
                                                    href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                        class="add-to-cart-btn panier"><i
                                                            class="fa fa-shopping-cart"></i> add to cart</button></a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <?php endforeach; ?>

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->

                            </div>

                        </div>
                    </div>

                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
                <!-- /row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">L&eacute;gumes et Fruits</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#tab1">Boucherie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Boulangerie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">

                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <?php if (isset($Article8)) foreach ($Article8 as $article) : ?>

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img style="width: 265px;height:270px"
                                                    src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?= $article->getCategorie(); ?></p>
                                                <h3 class="product-name"><a
                                                        href="#"><?= $article->getDesignation(); ?></a></h3>
                                                <h4 class="product-price">
                                                    <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                        class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                                </h4>
                                                <h4 class="product-price">
                                                    <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                    &emsp14;</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a class="add"
                                                            href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                            view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a class="add addPanier"
                                                    href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                        class="add-to-cart-btn panier"><i
                                                            class="fa fa-shopping-cart"></i> add to cart</button></a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <?php endforeach; ?>

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->

                            </div>

                        </div>
                    </div>

                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
                <!-- /row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">New Products</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">L&eacute;gumes et Fruits</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#tab1">Boucherie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Boulangerie</a></li>
                                    <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab1" class="tab-pane active">

                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        <?php if (isset($Article3)) foreach ($Article3 as $article) : ?>

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img style="width: 265px;height:270px"
                                                    src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?= $article->getCategorie(); ?></p>
                                                <h3 class="product-name"><a
                                                        href="#"><?= $article->getDesignation(); ?></a></h3>
                                                <h4 class="product-price">
                                                    <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                        class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                                </h4>
                                                <h4 class="product-price">
                                                    <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                    &emsp14;</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a class="add"
                                                            href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                                class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                            view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a class="add addPanier"
                                                    href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                        class="add-to-cart-btn panier"><i
                                                            class="fa fa-shopping-cart"></i> add to cart</button></a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                        <?php endforeach; ?>

                                    </div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->

                            </div>

                        </div>
                    </div>

                    <!-- Products tab & slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->

            <div class="container tab-content" id="hotDeals">
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">

                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <?php if (isset($Article2)) foreach ($Article2 as $article) : ?>

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="width: 265px;height:270px"
                                                src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= $article->getCategorie(); ?></p>
                                            <h3 class="product-name"><a href="#"><?= $article->getDesignation(); ?></a>
                                            </h3>
                                            <h4 class="product-price">
                                                <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                    class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                            </h4>
                                            <h4 class="product-price">
                                                <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                &emsp14;</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><a class="add"
                                                        href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                            class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                        view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a class="add addPanier"
                                                href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                    class="add-to-cart-btn panier"><i class="fa fa-shopping-cart"></i>
                                                    add to cart</button></a>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    <?php endforeach; ?>

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->

                        </div>

                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <div class="container tab-content" id="boucherie">
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">

                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <?php if (isset($Article10)) foreach ($Article10 as $article) : ?>

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="width: 265px;height:270px"
                                                src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= $article->getCategorie(); ?></p>
                                            <h3 class="product-name"><a href="#"><?= $article->getDesignation(); ?></a>
                                            </h3>
                                            <h4 class="product-price">
                                                <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                    class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                            </h4>
                                            <h4 class="product-price">
                                                <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                &emsp14;</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><a class="add"
                                                        href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                            class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                        view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a class="add addPanier"
                                                href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                    class="add-to-cart-btn panier"><i class="fa fa-shopping-cart"></i>
                                                    add to cart</button></a>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    <?php endforeach; ?>

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->

                        </div>

                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <div class="container tab-content" id="electromenager">
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">

                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <?php if (isset($Article8)) foreach ($Article8 as $article) : ?>

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="width: 265px;height:270px"
                                                src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= $article->getCategorie(); ?></p>
                                            <h3 class="product-name"><a href="#"><?= $article->getDesignation(); ?></a>
                                            </h3>
                                            <h4 class="product-price">
                                                <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                    class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                            </h4>
                                            <h4 class="product-price">
                                                <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                &emsp14;</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><a class="add"
                                                        href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                            class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                        view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a class="add addPanier"
                                                href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                    class="add-to-cart-btn panier"><i class="fa fa-shopping-cart"></i>
                                                    add to cart</button></a>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    <?php endforeach; ?>

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->

                        </div>

                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <div class="container tab-content" id="boisson">
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">

                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <?php if (isset($Article6)) foreach ($Article6 as $article) : ?>

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="width: 265px;height:270px"
                                                src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= $article->getCategorie(); ?></p>
                                            <h3 class="product-name"><a href="#"><?= $article->getDesignation(); ?></a>
                                            </h3>
                                            <h4 class="product-price">
                                                <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                    class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                            </h4>
                                            <h4 class="product-price">
                                                <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                &emsp14;</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><a class="add"
                                                        href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                            class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                        view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a class="add addPanier"
                                                href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                    class="add-to-cart-btn panier"><i class="fa fa-shopping-cart"></i>
                                                    add to cart</button></a>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    <?php endforeach; ?>

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->

                        </div>

                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>

            <div class="container tab-content" id="cosmetique">
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">

                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <?php if (isset($Article20)) foreach ($Article20 as $article) : ?>

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="width: 265px;height:270px"
                                                src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= $article->getCategorie(); ?></p>
                                            <h3 class="product-name"><a href="#"><?= $article->getDesignation(); ?></a>
                                            </h3>
                                            <h4 class="product-price">
                                                <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                    class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                            </h4>
                                            <h4 class="product-price">
                                                <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                &emsp14;</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><a class="add"
                                                        href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                            class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                        view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a class="add addPanier"
                                                href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                    class="add-to-cart-btn panier"><i class="fa fa-shopping-cart"></i>
                                                    add to cart</button></a>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    <?php endforeach; ?>

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->

                        </div>

                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>

            <div class="container tab-content" id="pattisserie">
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">

                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <?php if (isset($Article9)) foreach ($Article9 as $article) : ?>

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="width: 265px;height:270px"
                                                src="<?= base_url($article->getImageArticle()); ?>" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= $article->getCategorie(); ?></p>
                                            <h3 class="product-name"><a href="#"><?= $article->getDesignation(); ?></a>
                                            </h3>
                                            <h4 class="product-price">
                                                <?= $article->getDevise(); ?>&emsp14;<?= $article->getPrix(); ?><del
                                                    class="product-old-price"><?= $article->getPrix() + (0.05 * $article->getPrix()); ?></del>
                                            </h4>
                                            <h4 class="product-price">
                                                <?= $article->getQuantiteEnVente(); ?>&emsp14;<?= $article->getUnites(); ?>
                                                &emsp14;</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><a class="add"
                                                        href="<?= base_url('Article/details/' . $article->getIdArticle()) ?>"><i
                                                            class="fa fa-eye"></i></a><span class="tooltipp">quick
                                                        view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a class="add addPanier"
                                                href="<?= site_url('LignePanier/addPanier') ?>?id=<?= $article->getIdArticle(); ?>"><button
                                                    class="add-to-cart-btn panier"><i class="fa fa-shopping-cart"></i>
                                                    add to cart</button></a>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    <?php endforeach; ?>

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->

                        </div>

                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
        </div>
        <!-- /SECTION -->

        <!-- HOT DEAL SECTION -->
        <div id="hot-deal" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="hot-deal">
                            <ul class="hot-deal-countdown">
                                <li>
                                    <div>
                                        <h3>02</h3>
                                        <span>Days</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>10</h3>
                                        <span>Hours</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>34</h3>
                                        <span>Mins</span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h3>60</h3>
                                        <span>Secs</span>
                                    </div>
                                </li>
                            </ul>
                            <h2 class="text-uppercase">hot deal this week</h2>
                            <p>New Collection Up to 50% OFF</p>
                            <a class="primary-btn cta-btn" href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /HOT DEAL SECTION -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Top selling</h3>
                            <div class="section-nav">
                                <ul class="section-tab-nav tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab2">Fruit</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Legumes</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Boissons</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /section title -->

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <!-- tab -->
                                <div id="tab2" class="tab-pane fade in active">
                                    <div class="products-slick" data-nav="#slick-nav-2">
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="<?= base_url('assets/') ?>vendors/img/Articles/Fruits/jardin-régime-équilibré.webp"
                                                    alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Fruits et Legumes</p>
                                                <h3 class="product-name"><a href="#">Fruits</a></h3>
                                                <h4 class="product-price">cdf 980.00 <del
                                                        class="product-old-price">$990.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add
                                                    to cart</button>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="<?= base_url('assets/') ?>vendors/img/Articles/Fruits/dessus-nourriture-saine-de-nutrition-antioxydante.webp"
                                                    alt="">
                                                <div class="product-label">
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price">$980.00 <del
                                                        class="product-old-price">$990.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add
                                                    to cart</button>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="<?= base_url('assets/') ?>vendors/img/Articles/Fruits/fruits-frais-biologiques-dans-le-jardin-régime-équilibré.webp"
                                                    alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price">$980.00 <del
                                                        class="product-old-price">$990.00</del></h4>
                                                <div class="product-rating">
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add
                                                    to cart</button>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="<?= base_url('assets/') ?>vendors/img/panier-d-épicerie-isolé-sur-fond-blanc.webp"
                                                    alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price">$980.00 <del
                                                        class="product-old-price">$990.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add
                                                    to cart</button>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="<?= base_url('assets/') ?>vendors/img/isolé-sur-fond-blanc.webp"
                                                    alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price">$980.00 <del
                                                        class="product-old-price">$990.00</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                            class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span
                                                            class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add
                                                    to cart</button>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    </div>
                                    <div id="slick-nav-2" class="products-slick-nav"></div>
                                </div>
                                <!-- /tab -->
                            </div>
                        </div>
                    </div>
                    <!-- /Products tab & slick -->

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Top selling</h4>
                            <div class="section-nav">
                                <div id="slick-nav-3" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-3">
                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/ménagers-isolés-sur-blanc.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/ménagers-isolés-sur-blanc.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/188124778-set-of-consumer-electronics.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- product widget -->
                            </div>

                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/appliances-isolated-on-white.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/appliances-on-white-marble-table-in-kitchen.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/appareils-ménagers-de-cuisine-au-magasin.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- product widget -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Top selling</h4>
                            <div class="section-nav">
                                <div id="slick-nav-4" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-4">
                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/mélangeur-blanc-grille-pain-machine-à-café-hachoir-à-viande.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/11975707-bouteilles-de-jus-isolé-sur-blanc.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/11757744-bouteilles-avec-du-jus-isolé-sur-blanc.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- product widget -->
                            </div>

                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/15890881-tas-de-légumes-frais-marché-agricole.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Legume</p>
                                        <h3 class="product-name"><a href="#">légumes-frais</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/22659755-doux-raisin-d-automne-portant-sur-le-comptoir-de-marché.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Fruit</p>
                                        <h3 class="product-name"><a href="#">doux-raisin-d-automne</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/des-nectarines-isolé-sur-blanc.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- product widget -->
                            </div>
                        </div>
                    </div>

                    <div class="clearfix visible-sm visible-xs"></div>

                    <div class="col-md-4 col-xs-6">
                        <div class="section-title">
                            <h4 class="title">Top selling</h4>
                            <div class="section-nav">
                                <div id="slick-nav-5" class="products-slick-nav"></div>
                            </div>
                        </div>

                        <div class="products-widget-slick" data-nav="#slick-nav-5">
                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/viande-crue-fraîche-gros-plan (5).webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/viande-crue-fraîche-gros-plan (4).webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/viande-crue-fraîche-gros-plan (3).webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Viande</p>
                                        <h3 class="product-name"><a href="#">Quartier Arriere</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- product widget -->
                            </div>

                            <div>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/viande-crue-fraîche-gros-plan (2).webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Viande</p>
                                        <h3 class="product-name"><a href="#">Viande vache</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/viande-crue-fraîche-gros-plan (1).webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Viande</p>
                                        <h3 class="product-name"><a href="#">Viande boeuf</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->

                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="<?= base_url('assets/') ?>vendors/img/79942441-étagère-avec-l-oignon-et-l-ail-dans-un-supermarché.webp"
                                            alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Legume</p>
                                        <h3 class="product-name"><a href="#">oignon-et-l-ail</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- product widget -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- NEWSLETTER -->
        <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="newsletter">
                            <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                            <form>
                                <input class="input" type="email" placeholder="Enter Your Email">
                                <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                            </form>
                            <ul class="newsletter-follow">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <div style="clear:both"></div>
        <!-- /NEWSLETTER -->
        <!-- /FOOTER -->
    </div>
    <?php include_once 'theme/footer.php' ?>

</body>

</html>