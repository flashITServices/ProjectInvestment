<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Nos 4 supermach&eacute;s à Lubumbashi et Kinshasa couvrent une superficie totale de 7,500m²
                            et proposent aux consommateurs des produits haut de gamme locaux et d'importation qui
                            réponde à tout besoin domestique. Nous avons plus de 20,000 produits importés d'UE, Afrique
                            du sud, d'autres pays africains,des USA, d'Amerique Latine et d'Asie. </p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="#">Boulangerie et Patisserie</a></li>
                            <li><a href="#">Alimentation Fine</a></li>
                            <li><a href="#">Boucherie</a></li>
                            <li><a href="#">Plats du jour</a></li>
                            <li><a href="#">Boissons</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Mars
                            FutureTech</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->
<!-- jQuery Plugins -->


<script src="<?= base_url('assets/') ?>vendors/js/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/slick.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/nouislider.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/jquery.zoom.min.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/main.js"></script>
<script async src="<?= base_url('assets/') ?>vendors/js/Menu.js"></script>
<script src="<?= base_url('assets/') ?>vendors/js/app.js"></script>

<script>
(function($) {
    "use strict"

    /*$('.addPanier').on('click',function(event){
		
			event.preventDefault();//fonction javascript qui bloc tout envoi au php, avant d'executer le code JS
			$.get($(this).attr('href'),{},function(data){
				if(data.error){
					alert(data.message);
				}else{
					if(confirm(data.message +" voulez vous consulter votre panier")){
						location.href='LignePanier/panier';
					}else{
						$('#total').empty().append(data.total);
						$('#totCount').empty().append(data.count);
						$('#count').empty().append(data.count);
						$('#countPanier').load(location.href + ' #countPanier>*', '');
						$('#panierForm').load(location.href + ' #panierForm>*', '');
					}
				}
			},'json');
			return false;

   		 });*/

    const addpanier = document.querySelectorAll('.addPanier');
    addpanier.forEach(addpanier => {
        addpanier.addEventListener('click', function(event) {
            event.preventDefault();
            $.get($(this).attr('href'), {}, function(data) {
                if (data.error) {
                    alert(data.message);
                } else {
                    if (confirm(data.message + " voulez vous consulter votre panier")) {
                        location.href = 'LignePanier/panier';
                    } else {
                        $('#total').empty().append(data.total);
                        $('#totCount').empty().append(data.count);
                        $('#count').empty().append(data.count);
                        $('#countPanier').load(location.href + ' #countPanier>*', '');
                        $('#panierForm').load(location.href + ' #panierForm>*', '');
                    }
                }
            }, 'json');
            return false;
        }, {
            once: false
        })
    });



    $('.removePanier').on('click', function(e) {
        e.preventDefault()
        e.stopPropagation()
        console.log($(this))
        $.get($(this).attr('href'), {}, function(data) {
            if (data.error) {
                alert(data.message)
            }
            $('#total').empty().append(data.total)
            $('#totCount').empty().append(data.count)
            $('#count').empty().append(data.count)
            $('#countPanier').load(location.href + ' #countPanier>*', '')
            $('#panierForm').load(location.href + ' #panierForm>*', '')
            $('#idPanier').load(location.href + ' #idPanier>*', '')
        });
    });


    $('.recal').submit(function(e) {
        e.preventDefault()
        var form = $(this)
        var val = $('#envoi').children()
        var value = $('#envoi').text()
        $('#envoi').empty().append(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
        );

        var url = form.attr('action')
        var data = form.serialize()
        $.ajax({
            type: "POST",
            url: url,
            contentType: false,
            cache: false,
            processData: false,
            timeout: 3000,
            success: function(response) {
                console.log(response)
                $('#total').empty().append(data.total)
                $('#totCount').empty().append(data.count)
                $('#count').empty().append(data.count)
                $('#countPanier').load(location.href + ' #countPanier>*', '')
                $('#idPanier').load(location.href + ' #idPanier>*', '')
                $('#envoi').empty().append(val).append(value)
            }
        });

    });



})(jQuery);
</script>