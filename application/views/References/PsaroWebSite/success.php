<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'theme/head.php' ?>
    <style>
    .pricing .title {

        background: #1ABB9C;
        height: 110px;
        color: #fff;
        padding: 15px 0 0;
        text-align: center;

    }

    .pricing_features ul li {
        margin-top: 10px;
    }

    h2,
    h1,
    h3 {
        color: #fff;
        text-align: center;

    }

    .pricing_features {
        background: #FAFAFA;
        padding: 20px 15px;
        min-height: 230px;
        font-size: 13.5px;
    }

    .x_content {
        padding: 0 5px 6px;
        float: left;
        clear: both;
        margin-top: 5px;
    }

    .pricing_footer {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        text-align: center;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }

    .pricing .title span {
        background: rgba(51, 51, 51, .28);
        padding: 2px 5px;
    }

    .pricing_footer p {

        font-size: 13px;
        padding: 10px 0 2px;
        display: block;
    }
    </style>
</head>

<body>
    <div><?php include_once 'theme/header.php' ?></div>
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Checkout</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="javascript:history.back();">Home</a></li>
                        <li><a href="javascript:history.back();">Checkout</a></li>
                        <li class="active">success</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span>
                        </button>
                        <strong><?= isset($_SESSION['commande'])? $_SESSION['commande']:"" ;?> </strong>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">

                <div class="col-md-12">

                    <!-- price element -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="pricing">
                            <div class="title">
                                <h2>Commandes <i class="fa fa-fax"></i></h2>
                                <h2><?php if(isset($newCustomerOrder)) echo number_format($newCustomerOrder[0]->getMontant(),2,',','').' '.$newCustomerOrder[0]->getDevise();?>
                                </h2>
                            </div>
                            <div class="x_content">
                                <div class="">
                                    <div class="pricing_features">
                                        <ul class="list-unstyled text-left">
                                            <li><i class="fa fa-calendar text-success"></i> <strong>
                                                    <?php if(isset($newCustomerOrder)) echo $newCustomerOrder[0]->getDate();?>
                                                </strong></li>
                                            <li><i class="fa fa-credit-card text-success"></i> <strong
                                                    class="text-success">
                                                    <?php if(isset($newCustomerOrder)) echo $newCustomerOrder[0]->getModePaiement();?></strong>
                                            </li>

                                            <li><i class="fa fa-check text-success"></i> <strong
                                                    class="text-success">Cash on
                                                    Delivery</strong></li>

                                            <li><i class="fa fa-truck text-danger"></i> <strong class="text-danger">
                                                    <?php if(isset($newCustomerOrder)) echo $newCustomerOrder[0]->getStatutLivraison();?></strong>
                                            </li>
                                            <li><i class="fa fa-times text-success"></i> <strong>Allowed</strong> to be
                                                exclusing per sale</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pricing_footer">
                                    <a href="javascript:void(0);" class="btn btn-success btn-block"
                                        role="button">Download <i class="fa fa-download"></i><span> now!</span></a>
                                    <p>
                                        <a href="<?=site_url('user/login');?>"><i class="fa fa-users"></i>Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- price element -->

                    <!-- price element -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="pricing ui-ribbon-container">
                            <div class="ui-ribbon-wrapper">
                                <div class="ui-ribbon">

                                </div>
                            </div>
                            <div class="title">
                                <h2>Factures <i class="fa fa-book"></i></h2>
                                <h2><?php if(isset($newCustomerOrder)) echo number_format($newCustomerOrder[0]->prixNet,2,',','').' '.$newCustomerOrder[0]->devise;?>
                                </h2>
                                <span>Recently</span>
                            </div>
                            <div class="x_content">
                                <div class="">
                                    <div class="pricing_features">
                                        <ul class="list-unstyled text-left">
                                            <li><i class="fa fa-map-marker text-success"></i>
                                                <?php if(isset($newCustomerOrder)) echo $newCustomerOrder[0]->adresseFacturation;?>
                                                <strong>
                                                </strong>
                                            </li>
                                            <li><i class="fa fa-calendar text-success"></i>
                                                <strong>
                                                    <?php if(isset($newCustomerOrder)) echo $newCustomerOrder[0]->date;?></strong>
                                                storage
                                            </li>
                                            <?php if(isset($newCustomerOrder)) foreach($newCustomerOrder as $facture):?>
                                            <li><i class="fa fa-barcode text-success text-success"></i><strong>
                                                    <?= substr($facture->designation,0,30);?></strong></li>
                                            <li><i class="fa fa-bitbucket text-success"></i> <strong>
                                                    <?= $facture->quantite;?> Delivery</strong></li>
                                            <li><i class="fa fa-check text-success"></i>TVA <strong>
                                                    16,00%</strong></li>
                                            <li><i class="fa fa-money text-danger"></i> <strong>
                                                    <?=number_format($facture->prixUnitaire,2,',','');?></strong>
                                            </li>
                                            <li><i class="fa fa-shopping-cart text-danger"></i>
                                                <strong><?=number_format($facture->prixTotalLigne,2,',','');?></strong>
                                                to be exclusing per sale
                                            </li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pricing_footer">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-block"
                                        role="button">Download <i class="fa fa-download"></i><span> now!</span></a>
                                    <p>
                                        <a href="<?=site_url('user/login');?>"><i class="fa fa-users"></i>Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- price element -->

                    <!-- price element -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="pricing">
                            <div class="title">
                                <h2>Client<i class="fa fa-truck"></i></h2>

                                <span>Recently</span>
                            </div>
                            <div class="x_content">
                                <div class="">
                                    <div class="pricing_features">
                                        <ul class="list-unstyled text-left">

                                            <li><i class="fa fa-user text-success"></i>
                                                <?= isset($newCustomerOrder) ? $newCustomerOrder[0]->prenom :""; ?>
                                                <strong>

                                                    <?= isset($newCustomerOrder) ? $newCustomerOrder[0]->nom :""; ?></strong>
                                            </li>
                                            <li><i class="fa fa-phone text-success"></i> <strong>
                                                    <?= isset($newCustomerOrder) ? $newCustomerOrder[0]->telephone :""; ?></strong>
                                            </li>

                                            <li><i class="fa fa-envelope-square text-success"></i> <strong>
                                                    <?= isset($newCustomerOrder) ? $newCustomerOrder[0]->email :""; ?>
                                                </strong></li>
                                            <li><i class="fa fa-briefcase text-success"></i>
                                                <?= isset($newCustomerOrder) ? $newCustomerOrder[0]->profession :""; ?>
                                                <strong>
                                                </strong>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="pricing_footer">
                                    <a href="javascript:void(0);" class="btn btn-success btn-block"
                                        role="button">Download <i class="fa fa-download"></i><span> now!</span></a>
                                    <p>
                                        <a href="<?=site_url('user/login');?>"><i class="fa fa-users"></i>Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- price element -->

                    <!-- price element -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="pricing">
                            <div class="title">
                                <h2>Paiements <i class="fa fa-credit-card"></i></h2>
                                <h2><i
                                        class="fa fa-money"></i><?php if(isset($newCustomerOrder)) echo number_format($newCustomerOrder[0]->montantTransaction,2,',','').' '.$newCustomerOrder[0]->devise;?>
                                </h2>
                                <span>Recently</span>
                            </div>
                            <div class="x_content">
                                <div class="">
                                    <div class="pricing_features">
                                        <ul class="list-unstyled text-left">
                                            <li><i class="fa fa-credit-card text-success"></i> <strong>
                                                    <?= isset($newCustomerOrder) ? $newCustomerOrder[0]->numeroTransaction :""; ?></strong>
                                            </li>

                                            <li><i class="fa fa-check text-success"></i>
                                                <?= isset($newCustomerOrder) ? $newCustomerOrder[0]->numTelephone :""; ?>
                                                <strong> </strong>
                                            </li>
                                            <li><i class="fa fa-calendar text-success"></i> <strong>
                                                    <?= isset($newCustomerOrder) ? $newCustomerOrder[0]->date :""; ?>
                                                </strong></li>
                                            <li><i class="fa fa-check text-success"></i>
                                                <?= isset($newCustomerOrder) ? $newCustomerOrder[0]->description :""; ?><strong>
                                                </strong></li>

                                            <li><i class="fa fa-check text-success"></i> <strong>
                                                    <?= isset($newCustomerOrder) ? $newCustomerOrder[0]->typePaiement :""; ?></strong>
                                                to be
                                                exclusing per sale</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pricing_footer">
                                    <a href="javascript:void(0);" class="btn btn-success btn-block"
                                        role="button">Download<i class="fa fa-download"></i> <span> now!</span></a>
                                    <p>
                                        <a href="<?=site_url('user/login');?>"><i class="fa fa-users"></i>Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- price element -->
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
    <div class="ui-pnotify dark ui-pnotify-fade-normal ui-pnotify-in ui-pnotify-fade-in ui-pnotify-move"
        style="display: none; width: 300px; right: 36px; top: 36px; cursor: auto;" aria-live="assertive"
        aria-role="alertdialog">
        <div class="alert ui-pnotify-container alert-info ui-pnotify-shadow" role="alert" style="min-height: 16px;">
            <div class="ui-pnotify-closer" aria-role="button" tabindex="0" title="Close"
                style="cursor: pointer; visibility: hidden; display: none;"><span
                    class="glyphicon glyphicon-remove"></span></div>
            <div class="ui-pnotify-sticker" aria-role="button" aria-pressed="true" tabindex="0" title="Unstick"
                style="cursor: pointer; visibility: hidden; display: none;"><span class="glyphicon glyphicon-play"
                    aria-pressed="true"></span></div>
            <div class="ui-pnotify-icon"><span class="glyphicon glyphicon-info-sign"></span></div>
            <h4 class="ui-pnotify-title">PNotify</h4>
            <div class="ui-pnotify-text" aria-role="alert">Welcome. Try hovering over me. You can click things behind
                me, because I'm non-blocking.</div>
        </div>
    </div>

    <!-- /FOOTER -->
    <?php include_once 'theme/footer.php' ?>


</body>

</html>