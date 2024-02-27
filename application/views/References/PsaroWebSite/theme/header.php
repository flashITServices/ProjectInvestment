<?php
  	$keys=[];
	if(isset($_SESSION['panier'])){
		$keys=array_keys($_SESSION['panier']);
	}
	$products;
	if(!empty($keys)){
		$products= $this->db->select('*')->from('Article')->where_in('idArticle',$keys)->get()->result();
	}
	$prixTotal=0;
	$subTotal=0;
	$count=0;
	$rayons=$this->db->get('Rayon');
?>
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +(27)112-873-920</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> hyper@psaro.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Siege Social RDC-Lubumbashi <br> N°17 Chauss&eacute;es
                        MZee Laurent D&eacute;sir&eacute; Kabila-Lubumbashi</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                <li><a href="<?=site_url('user/login');?>"><i class="fa fa-user-circle"></i> My Account</a></li>
                <li><a href="#"><i class="fa fa-question"></i> Help</a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="<?= base_url('assets/') ?>vendors/img/logo.svg" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form method="post" action="<?=site_url('Article/getArticle');?>" style="display:inline-flex;">
                            <select name="rayonID" class="input-select" style="display:inline-flex;">
                                <?php foreach($rayons->result() as $rayon):?>
                                <option value="<?=$rayon->idRayon;?>"><?=$rayon->designations;?></option>
                                <?php endforeach;?>
                            </select>
                            <input class="input" name="product" style="display:inline-block;" placeholder="Search here">
                            <button type="submit" style="display:inline-block;" class="search-btn">Search</button>
                        </form>


                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown" id="countPanier">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty"><span
                                        id="totCount"><?= isset($_SESSION['panier']) ? array_sum($_SESSION['panier']):0;?></span>
                                </div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <?php if(!empty($products)) foreach($products as $product):?>
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="<?= base_url($product->imageArticle) ?>" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#"><?=$product->designation ;?></a></h3>
                                            <h4 class="product-price"><span
                                                    class="qty"><?= $_SESSION['panier'][$product->idArticle];?></span>Prix
                                                unitaire <?=$product->prix;?> &emsp; Prix Total
                                                <?= $_SESSION['panier'][$product->idArticle]*$product->prix;?><?=$product->devise ;?>
                                            </h4>
                                            <?php 
																	$subTotal=$_SESSION['panier'][$product->idArticle]*$product->prix;
																	$prixTotal+=$subTotal;
																	$count+=1;
																?>
                                        </div>
                                        <a class="removePanier" id="<?='panier'.$product->idArticle?>"
                                            href="<?=base_url('panier/delete/'.$product->idArticle);?>"><button
                                                class="delete"><i class="fa fa-close"></i></button></a>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                                <div class="cart-summary">
                                    <small> <span id="count"><?php echo $count;$_SESSION['countPanier']=$count;?></span>
                                        Item(s) selected</small>
                                    <h5>SUBTOTAL:<span
                                            id="total"><?=number_format($prixTotal,2,',',' ');?></span><?php if(isset($product->devise)) echo $product->devise ;?>
                                    </h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="<?=site_url('LignePanier/panier')?>">View Cart</a>
                                    <a href="<?=site_url('LignePanier/chechout')?>">Checkout <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->



                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->