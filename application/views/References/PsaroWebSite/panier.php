<?php
	$keys=[];
	if(isset($_SESSION['panier'])){
		$keys=array_keys($_SESSION['panier']);
	}
					 
	// $product =$this->db->query('SELECT * FROM article WHERE idArticle IN ('.implode(',',$keys).') ');
	$products;
	if(!empty($keys)){
		$products= $this->db->select('*')->from('Article')->where_in('idArticle',$keys)->get()->result();
	}
	$prixTotal=0;
	$subTotal=0;
	$count=0;
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'theme/head.php' ?>

</head>

<body>
    <div><?php include_once 'theme/header.php' ?></div>

    <div class="options"><?php include_once 'theme/menu.php' ?></div>
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Panier Client</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="javascript:history.back();">Home</a></li>
                        <li class="active">Panier</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section" id="idPanier">
        <!-- container -->
        <div class="container" id="panierForm">

            <!-- row -->
            <div class="row">
                <!-- Cart -->

                <!-- Cart -->
                <div class="dropdo">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Your Cart</span>
                        <div class="qty">3</div>
                    </a>
                    <div class="card">
                        <form method="post" action="<?=site_url('panier/update')?>" class="recalculer">
                            <div class="card-body">
                                <h5 class="card-title">Articles</h5>
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <th scope="col">Produit</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Quantite</th>
                                        <th scope="col">Prix Unitaire</th>
                                        <th scope="col">Prix Total</th>
                                        <th scope="col">Action</th>
                                    </thead>
                                    <tbody class="product-widget">
                                        <?php  if(!empty($products)) foreach($products as $product):?>
                                        <tr>
                                            <td scope="row"><img style="width: 90px;height:90px;"
                                                    src="<?= base_url($product->imageArticle) ?>" alt=""></td>
                                            <td scope="row" class="product-name"><a href="#"><?=$product->designation;?>
                                            </td>
                                            <td scope="row" class="qty">
                                                <label class="error">

                                                </label>
                                                <input id="quantite" name="panier[quantity][<?=$product->idArticle;?>]"
                                                    value="<?= $_SESSION['panier'][$product->idArticle];?>" />
                                            </td>
                                            <td scope="row" class="product-price">
                                                <?=number_format($product->prix,2,',',' ');?></span><?=$product->devise;?>
                                            </td>
                                            <td scope="row" class="product-price">
                                                <?=number_format($_SESSION['panier'][$product->idArticle]*$product->prix,2,',',' ');?><?=$product->devise;?>
                                            </td>
                                            <td scope="row"><a class="remove"
                                                    href="<?=base_url('panier/delete/'.$product->idArticle)?>"><button><i
                                                            class="fa fa-close"></i></button></a></td>
                                        </tr>
                                        <?php 
													$subTotal=$_SESSION['panier'][$product->idArticle]*$product->prix;
													$prixTotal+=$subTotal;
													$count+=1;
												?>
                                        <?php endforeach;?>

                                    </tbody>
                                </table>
                                <button type="submit" id="envoi" class="btn btn-primary"><i
                                        class="fa fa-calculator"></i> Recalculer</button>
                            </div>
                        </form>

                    </div>
                    <div class="cart-summary">
                        <small><?php echo $count;$_SESSION['countPanier']=$count;?> Item(s) selected</small>
                        <h5>SUBTOTAL:<?=number_format($prixTotal,2,',',' ');?><?php if(isset($product->devise)) echo $product->devise ;?>
                        </h5>
                    </div>
                    <div class="cart-btns">

                        <a class="btn btn-primary" href="<?=site_url('LignePanier/chechout')?>">Checkout <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Cart -->

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
    <!-- /NEWSLETTER -->

    <!-- /FOOTER -->
    <?php include_once 'theme/footer.php' ?>
    <!-- jQuery Plugins -->
    <script src="<?= base_url('assets/') ?>vendors/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/js/slick.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/js/nouislider.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/js/jquery.zoom.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('assets/') ?>vendors/js/main.js"></script>

    <script>
    $(document).ready(function() {
        let champs = document.querySelectorAll("#quantite");
        for (let saisie of champs) {
            saisie.addEventListener('input', function() {

                if (parseInt($(this).val()) < 1) {
                    $(".error").html("vous avez saisie une mauvaise valeur").animate({
                        fontSize: '15px',
                        color: 'red'

                    }, 'linear');

                } else {
                    $(".error").empty();
                }

            });
        };

        $('.remove').on('click', function(event) {
            event
                .preventDefault(); //fonction javascript qui bloc tout envoi au php, avant d'executer le code JS
            $.get($(this).attr('href'), {}, function(data) {
                if (data.error) {
                    alert(data.message);
                } else {

                    $('#total').empty().append(data.total);
                    $('#totCount').empty().append(data.count);
                    $('#count').empty().append(data.count);

                    $('#panierForm').load(location.href + ' #panierForm>*', '');
                }
            }, 'json');
        });

    });
    </script>

</body>

</html>