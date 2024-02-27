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
    <style>
    .form-select {
        padding-right: 300px;
        color: beige;
        background-color: slategrey;
    }

    #paymentNumber {

        outline: none;
    }
    </style>
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
                    <h3 class="breadcrumb-header">Checkout</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="javascript:history.back();">Home</a></li>
                        <li class="active">Checkout</li>
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
                <form method="post" id="passerCommande" enctype="multipart/form-data"
                    action="<?=site_url('Grant/Order')?>">
                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Billing address| Adresse Facturation</h3>
                            </div>
                            <?php if (isset($this->session->utilisateur)):?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                                <strong> <?php  echo $this->session->utilisateur?> </strong>
                            </div>

                            <?php endif;?>

                            <?php if (isset($this->session->validation)):?>

                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                                </button>
                                <strong> <?php  echo $this->session->validation?> </strong>
                            </div>

                            <?php endif;?>

                            <div class="form-group">
                                <input class="input" type="text" value="<?php echo set_value('first-name'); ?>"
                                    name="first-name" required placeholder="First Name">
                                <div class="">
                                    <?= form_error('first-name', '<div class="alert alert-danger">', '</div>');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="input" required type="text" value="<?php echo set_value('last-name'); ?>"
                                    name="last-name" placeholder="Last Name">
                                <div class="alert ">
                                    <?= form_error('last-name', '<div class="alert alert-danger">', '</div>');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="input" required type="email" value="<?php echo set_value('email'); ?>"
                                    name="email" placeholder="Email">
                                <div class="">
                                    <?= form_error('email','<div class="alert alert-danger">', '</div>');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="input" required type="text" name="address"
                                    value="<?php echo set_value('address'); ?>" placeholder="Address">
                                <div class="">
                                    <?= form_error('address', '<div class="alert alert-danger">', '</div>');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="form-label">State</label>
                                <select name="state" class="form-select" aria-label="Default select example"
                                    style="width:100%; height:40px;">
                                    <option selected value="Kinshasa">Kinshasa</option>
                                    <option value="Haut-Katanga">Haut-Katanga</option>
                                    <option value="Lualaba">Lualaba</option>
                                    <option value="Nord-kivu">Nord-kivu</option>
                                    <option value="Sud-Kivu">Sud-Kivu</option>
                                    <option value="Ituri">Ituri</option>
                                    <option value="Maidombe">Maidombe</option>
                                    <option value="Maniema">Maniema</option>
                                    <option value="Gbadolite">Gbadolite</option>
                                    <option value="Mbandaka">Mbandaka</option>
                                    <option value="Bas-Uele">Bas-Uele</option>
                                    <option value="Haut-Uele">Haut-Uele</option>
                                    <option value="Kasai-central">Kasai-central</option>
                                    <option value="Kasai-oriental">Kasai-oriental</option>
                                    <option value="Lomami">Lomami</option>
                                    <option value="Nord-ubangi">Nord-ubangi</option>
                                    <option value="Sud-Ubangi">Sud-Ubangi</option>
                                    <option value="Sankuru">Sankuru</option>
                                    <option value="Equateur">Equateur</option>
                                    <option value="Tanganyka">Tanganyka</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country"
                                    value="<?php echo set_value('country'); ?>" placeholder="Country">
                                <div class="">
                                    <?= form_error('country', '<div class="alert alert-danger">', '</div>');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" value="<?php echo set_value('city'); ?>" name="city"
                                    placeholder="City">
                                <div class="">
                                    <?= form_error('city', '<div class="alert alert-danger">', '</div>');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="input" type="tel" name="phone" value="<?php echo set_value('phone'); ?>"
                                    placeholder="Telephone">
                                <div class="">
                                    <?= form_error('phone', '<div class="alert alert-danger">', '</div>');?>
                                </div>
                            </div>
                            <h3 class="title">Remplir les infos Utilisateurs</h3>
                            <div class="form-group">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="login-account">
                                    <label for="login-account">
                                        <span></span>
                                        Loggin Account
                                    </label>
                                    <div class="caption">
                                        <div class="form-group">
                                            <input class="input" type="text"
                                                value="<?php echo set_value('username'); ?>" name="username"
                                                placeholder="Username">
                                            <div class="">
                                                <?= form_error('username', '<div class="alert alert-danger">', '</div>');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="password"
                                                value="<?php echo set_value('password'); ?>" name="password"
                                                placeholder="Password">
                                            <div class="">
                                                <?= form_error('password', '<div class="alert alert-danger">', '</div>');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="create-account">
                                    <label for="create-account">
                                        <span></span>
                                        Create Account?
                                    </label>
                                    <div class="caption">
                                        <div class="form-group">
                                            <input class="input" type="email" value="<?php echo set_value('emailA'); ?>"
                                                name="emailA" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="genre" class="form-label">Genre</label>
                                            <select name="genderA" class="form-select"
                                                aria-label="Default select example" style="width:100%; height:40px;">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input class="input" type="text"
                                                value="<?php echo set_value('addressA'); ?>" name="addressA"
                                                placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" value="<?php echo set_value('cityA'); ?>"
                                                name="cityA" placeholder="City">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text"
                                                value="<?php echo set_value('countryA'); ?>" name="countryA"
                                                placeholder="Country">
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="form-label">State</label>
                                            <select name="stateA" class="form-select"
                                                aria-label="Default select example" style="width:100%; height:40px;">
                                                <option selected value="Kinshasa">Kinshasa</option>
                                                <option value="Haut-Katanga">Haut-Katanga</option>
                                                <option value="Lualaba">Lualaba</option>
                                                <option value="Nord-kivu">Nord-kivu</option>
                                                <option value="Sud-Kivu">Sud-Kivu</option>
                                                <option value="Ituri">Ituri</option>
                                                <option value="Maidombe">Maidombe</option>
                                                <option value="Maniema">Maniema</option>
                                                <option value="Gbadolite">Gbadolite</option>
                                                <option value="Mbandaka">Mbandaka</option>
                                                <option value="Bas-Uele">Bas-Uele</option>
                                                <option value="Haut-Uele">Haut-Uele</option>
                                                <option value="Kasai-central">Kasai-central</option>
                                                <option value="Kasai-oriental">Kasai-oriental</option>
                                                <option value="Lomami">Lomami</option>
                                                <option value="Nord-ubangi">Nord-ubangi</option>
                                                <option value="Sud-Ubangi">Sud-Ubangi</option>
                                                <option value="Sankuru">Sankuru</option>
                                                <option value="Equateur">Equateur</option>
                                                <option value="Tanganyka">Tanganyka</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="job" class="form-label">Job</label>
                                            <select name="job" class="form-select" aria-label="Default select example"
                                                style="width:100%; height:40px;">
                                                <option value="Customer">Customer</option>
                                                <option value="Provider">Provider</option>
                                                <option value="Student">Student</option>
                                                <option value="Sales Director">Sales Director</option>
                                                <option value="Seller">Seller</option>
                                                <option value="Businessman">Businessman</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Hair Stylist">Hair Stylist</option>
                                                <option value="Transport Agent">Transport Agent</option>
                                                <option value="Unemployed">Unemployed</option>
                                                <option value="Engineer">Engineer</option>
                                                <option value="Professor">Professor</option>
                                                <option value="Technician">Technician</option>
                                                <option value="Real State Agent">Real State Agent</option>
                                                <option value="Public Function Agent">Public Function Agent</option>
                                                <option value="Marketing Agent">Marketing Agent</option>
                                                <option value="Marketing Agent">Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input class="input" type="date" name="birthday" placeholder="Birthday">
                                        </div>
                                        <div class="form-group">
                                            <label for="profile" class="form-label">Photo Profile</label>
                                            <input class="profile" type="file" name="profile" placeholder="Profile">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="tel"
                                                value="<?php echo set_value('telephone'); ?>" name="telephone"
                                                placeholder="Telephone">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="text" name="usernameA"
                                                value="<?php echo set_value('usernameA'); ?>" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input class="input" type="password" name="passwordA"
                                                placeholder="Password">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Billing Details -->

                        <!-- Shiping Details -->
                        <div class="shiping-details">
                            <div class="section-title">
                                <h3 class="title">Shiping address | Adresse Livraison</h3>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="shiping-address">
                                <label for="shiping-address">
                                    <span></span>
                                    Ship to a diffrent address?
                                </label>
                                <div class="caption">

                                    <div class="form-group">
                                        <input class="input" type="text" value="<?php echo set_value('addressShip'); ?>"
                                            name="addressShip" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="stateShip" class="form-label">State</label>
                                        <select name="stateShip" class="form-select" aria-label="Default select example"
                                            style="width:100%; height:40px;">
                                            <option selected value="Kinshasa">Kinshasa</option>
                                            <option value="Haut-Katanga">Haut-Katanga</option>
                                            <option value="Lualaba">Lualaba</option>
                                            <option value="Nord-kivu">Nord-kivu</option>
                                            <option value="Sud-Kivu">Sud-Kivu</option>
                                            <option value="Ituri">Ituri</option>
                                            <option value="Maidombe">Maidombe</option>
                                            <option value="Maniema">Maniema</option>
                                            <option value="Gbadolite">Gbadolite</option>
                                            <option value="Mbandaka">Mbandaka</option>
                                            <option value="Bas-Uele">Bas-Uele</option>
                                            <option value="Haut-Uele">Haut-Uele</option>
                                            <option value="Kasai-central">Kasai-central</option>
                                            <option value="Kasai-oriental">Kasai-oriental</option>
                                            <option value="Lomami">Lomami</option>
                                            <option value="Nord-ubangi">Nord-ubangi</option>
                                            <option value="Sud-Ubangi">Sud-Ubangi</option>
                                            <option value="Sankuru">Sankuru</option>
                                            <option value="Equateur">Equateur</option>
                                            <option value="Tanganyka">Tanganyka</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" value="<?php echo set_value('cityShip'); ?>"
                                            name="cityShip" placeholder="City">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" value="<?php echo set_value('countryShip'); ?>"
                                            name="countryShip" placeholder="Country">
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- /Shiping Details -->

                        <!-- Order notes -->
                        <div class="order-notes">
                            <textarea class="input" required name="description"
                                value="<?php echo set_value('description'); ?>"
                                placeholder="Veuillez donner une petite description sur votre Achat"></textarea>
                        </div>
                        <!-- /Order notes -->
                    </div>

                    <!-- Order Details -->
                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Your Order</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>PRODUCT</strong></div>
                                <div><strong>TOTAL</strong></div>
                            </div>
                            <div class="order-products">
                                <?php  if(!empty($products)) foreach($products as $product):?>
                                <div class="order-col">
                                    <div><?= $_SESSION['panier'][$product->idArticle];?> <?=$product->unites;?>
                                        <?=$product->designation;?></div>

                                    <div><?=number_format($product->prix,2,',',' ');?></span> <?=$product->devise;?>
                                    </div>
                                </div>
                                <?php 
											$subTotal=$_SESSION['panier'][$product->idArticle]*$product->prix;
											
											$prixTotal+=$subTotal;
											$count+=1;
										?>
                                <input class="input"
                                    value="<?=number_format($_SESSION['panier'][$product->idArticle]*$product->prix,2,',',' ');?>"
                                    type="text" name="PrixTotalLigne" hidden>
                                <?php endforeach;?>

                            </div>
                            <div class="order-col">
                                <div>Shiping</div>
                                <div><strong>FREE</strong></div>
                            </div>
                            <div style="font-size:20px;" class="order-col">
                                <div><strong>TOTAL</strong></div>
                                <div><em
                                        class="order-total"><?php if(isset($product->devise)) echo $product->devise ;?></em>
                                </div>
                                <div><strong class="order-total"><?=number_format($prixTotal,2,',',' ');?><input
                                            class="input" value="<?=number_format($prixTotal,2,',',' ');?>" type="text"
                                            name="total" hidden></strong></div>
                            </div>
                        </div>
                        <div class="payment-method">

                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-4">
                                <label for="payment-4">
                                    <span></span>
                                    CinetPay<img src="<?= base_url('assets/') ?>vendorsAdmin/img/cinetPay.png">
                                </label>
                                <div class="caption">
                                    <p><input class="input" id="paymentNumber" type="text"
                                            value="<?php echo set_value('paymentNumber'); ?>" name="paymentNumber"
                                            placeholder="Phone number"></p>
                                </div>
                            </div>
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-1">
                                <label for="payment-1">
                                    <span></span>
                                    Direct Bank Transfer <img src="<?= base_url('assets/') ?>vendorsAdmin/img/visa.png"
                                        alt="Visa">
                                </label>
                                <div class="caption">
                                    <p><input class="input" type="text"
                                            value="<?php echo set_value('carteBancaire'); ?>" name="carteBancaire"
                                            placeholder="Card number"></p>
                                </div>
                            </div>
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-2">
                                <label for="payment-2">
                                    <span></span>
                                    MasterCard<img src="<?= base_url('assets/') ?>vendorsAdmin/img/mastercard.png"
                                        alt="Visa">
                                </label>
                                <div class="caption">
                                    <p>
                                    <p><input class="input" type="text"
                                            value="<?php echo set_value('chequeBancaire'); ?>" name="chequeBancaire"
                                            placeholder="Card number"></p>
                                    </p>
                                </div>
                            </div>
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-3">
                                <label for="payment-3">
                                    <span></span>
                                    Paypal System <img src="<?= base_url('assets/') ?>vendorsAdmin/img/paypal.png"
                                        alt="Visa">
                                </label>
                                <div class="caption">
                                    <p>
                                    <p><input class="input" type="text" value="<?php echo set_value('paypal'); ?>"
                                            name="paypal" placeholder="Card number"></p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" required id="terms">
                            <label for="terms">
                                <span></span>
                                I've read and accept the <a href="#">terms & conditions</a>
                            </label>
                        </div>
                        <button type="submit" id="valider" class="primary-btn order-submit"><i
                                class="fa fa-credit-card"></i>&emsp14; Place order</button>
                    </div>
                    <!-- /Order Details -->
                </form>
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
    <!-- /NEWSLETTER -->

    <!-- /FOOTER -->
    <?php include_once 'theme/footer.php' ?>
    <script>
    $(document).ready(function() {
        const form = $("#passerCo")

        form.submit((e) => {
            e.preventDefault();

            var post_url = form.attr('action');
            var post_data = form.serialize();

            var val = $('#valider').children();
            var value = $('#valider').text();
            $('#valider').empty().append(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
            );

            $.ajax({
                type: "POST",
                url: post_url,
                data: post_data,
                contentType: false,
                cache: false,
                processData: false,
                timeout: 5000,
                success: function(response) {
                    var obj = JSON.stringify(response)
                    console.log(obj)
                    if (obj.statut) {
                        $('#valider').empty().append(val).append(value)

                        window.location.href = 'LignePanier/success';
                    } else {
                        window.location.reload();
                    }

                }
            });
        });

        var inputField = document.querySelector('#paymentNumber')
        /* $('#paymentNumber').keyup(function(e) {
             var ex = new RegExp([ ^ 0 - 9\.] / g, '')
             var saisie = $(this).val()
             if (ex.test(saisie)) {
                 $(this).val(saisie)
             }

             // console.log(removeChar)
         });*/
        inputField.onkeyup = function() {
            var removeChar = this.value.replace(/[^ +0-9\.]/g, '') // This is to remove Aphabets
            var removeDot = removeChar.replace(/\./g, '')

            var formatNumber = removeDot.replace(/\B(?=(\d{4})+(?!\d))/g, "-")
            this.value = formatNumber

        }

    });
    </script>
</body>

</html>