 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">
     <div class="copyright">
         &copy; Copyright <strong><span>Mars FutureTech</span></strong>. All Rights Reserved
     </div>
     <div class="credits">
         <!-- All the links in the footer should remain intact. -->
         <!-- You can delete the links only if you purchased the pro version. -->
         <!-- Licensing information: https://bootstrapmade.com/license/ -->
         <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
         Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
     </div>
 </footer><!-- End Footer -->

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
         class="bi bi-arrow-up-short"></i></a>
 <!-- Vendor JS Files -->

 <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/apexcharts/apexcharts.min.js"></script>
 <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/chart.js/chart.umd.js"></script>
 <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/echarts/echarts.min.js"></script>
 <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/quill/quill.min.js"></script>
 <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/simple-datatables/simple-datatables.js"></script>
 <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/tinymce/tinymce.min.js"></script>
 <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/php-email-form/validate.js"></script>
 <!-- Template Main JS File -->
 <script src="<?= base_url('assets/') ?>vendorsAdmin/js/main.js"></script>
 <script src="<?= base_url('assets/') ?>vendorsAdmin/js/jquery.min.js"></script>
 <script>
$(document).ready(function() {
    $('.confirm-delete').click(function(e) {

        confirmDialog = confirm("Vous voulez-vous supprimer cet article du catalogue ?");
        if (confirmDialog) {
            var id = $(this).val();
            //alert(id);

            $.ajax({
                type: "DELETE",
                url: "<?= base_url('/Article/delete/')?>" + id,
                success: function(response) {
                    $('#catalogue').load(location.href + ' #catalogue>*', '');
                }
            });
        }
    });

    $('.updateProfile').submit(function(e) {
        e.preventDefault();
        var formulaire = $(this);
        var post_url = formulaire.attr('action');
        var post_data = formulaire.serialize();
        val = $('#loader').val();
        $('#loader').empty().append(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
        );
        $.ajax({
            type: "POST",
            url: post_url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 4000,

            success: function(response) {

                var obj = JSON.parse(response);


                $('#firstname').val(obj.firstname);
                $('#work').empty().append(obj.profession);
                $('#names').empty().append(obj.firstname + " " + obj.lastname);
                $('.identites').empty().append(obj.firstname + " " + obj.lastname);
                $('#lastname').val(obj.lastname);

                $('#adresses').empty().append(obj.adresses);
                $('#Address').val(obj.adresses);
                $('#phoneNumber').empty().append(obj.telephone);
                $('#Phone').val(obj.telephone);

                $('#emailAdress').empty().append(obj.email);
                $('#Address').val(obj.email);


                $('#setProfile').attr("src", obj.profile);
                $('#myProfile').attr("src", obj.profile);


                $('#profession').empty().append(obj.profession);
                $('.profession').empty().append(obj.profession);
                $('#message').text(obj.message).addClass(
                    'alert alert-success alert-dismissible fade show').append(
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                );
                window.location.reload();
                //$('#profile').load(location.href + '#profile>*','');
            }
        });
    });



    $('#createPost').submit(function(e) {
        e.preventDefault();
        var formulaire = $(this);
        var post_url = formulaire.attr('action');
        var post_data = formulaire.serialize();
        val = $('#envoi').val();
        var val = $('#envoi').children();
        var value = $('#envoi').text();
        $('#envoi').empty().append(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
        );
        $.ajax({
            type: "POST",
            url: post_url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 3000,

            success: function(response) {

                var obj = JSON.parse(response);
                if (obj.statut == true) {
                    $('#catalogue').load(location.href + ' #catalogue>*', '');
                    $('#envoi').empty().append(val).append(value)

                } else {
                    location.href = 'javascript:history.back()';
                }

            },
            error: function() {
                $('.resultat').html("echec envoi ");
                location.href = 'javascript:history.back()';
            }
        });
    });


    $('#updatePost').submit(function(e) {
        e.preventDefault();
        var formulaire = $(this);
        var post_url = formulaire.attr('action');
        var post_data = formulaire.serialize();
        val = $('#envoi').val();
        var val = $('#envoi').children();
        var value = $('#envoi').text();
        $('#envoi').empty().append(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
        );
        $.ajax({
            type: "POST",
            url: post_url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 3000,

            success: function(response) {

                var obj = JSON.parse(response);
                if (obj.statut == true) {
                    $('#catalogue').load(location.href + ' #catalogue>*', '');
                    $('#envoi').empty().append(val).append(value)
                    location.href = 'javascript:history.back()';

                } else {
                    location.href = 'javascript:history.back()';
                }

            },
            error: function() {
                $('.resultat').html("echec envoi ");
                location.href = 'javascript:history.back()';
            }
        });
    });


    $('#newArticle').submit(function(e) {
        e.preventDefault();
        var formulaire = $(this);
        var post_url = formulaire.attr('action');
        var post_data = formulaire.serialize();
        val = $('#envoi').val();
        var val = $('#envoi').children();
        var value = $('#envoi').text();
        $('#envoi').empty().append(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
        );
        $.ajax({
            type: "POST",
            url: post_url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 3000,

            success: function(response) {

                var obj = JSON.parse(response);
                if (obj.statut == true) {
                    $('#catalogue').load(location.href + ' #catalogue>*', '');
                    $('#envoi').empty().append(val).append(value)

                } else {
                    location.href = 'javascript:history.back()';
                }

            },
            error: function() {
                $('.resultat').html("echec envoi ");
                location.href = 'javascript:history.back()';
            }
        });
    });

    $('#newRayon').submit(function(e) {
        e.preventDefault();
        var formulaire = $(this);
        var post_url = formulaire.attr('action');
        var post_data = formulaire.serialize();
        val = $('#envoiRayon').val();
        var val = $('#envoiRayon').children();
        var value = $('#envoiRayon').text();
        $('#envoiRayon').empty().append(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
        );
        $.ajax({
            type: "POST",
            url: post_url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 3000,

            success: function(response) {

                var obj = JSON.parse(response);
                if (obj.statut == true) {

                    $('#envoiRayon').empty().append(val).append(value)

                } else {
                    location.href = 'javascript:history.back()';
                }

            },
            error: function() {
                $('.resultat').html("echec envoi ");
                location.href = 'javascript:history.back()';
            }
        });
    });

    $('#newCategorie').submit(function(e) {
        e.preventDefault();
        var formulaire = $(this);
        var post_url = formulaire.attr('action');
        var post_data = formulaire.serialize();
        val = $('#envoiCategorie').val();
        var val = $('#envoiCategorie').children();
        var value = $('#envoiCategorie').text();
        $('#envoiCategorie').empty().append(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
        );
        $.ajax({
            type: "POST",
            url: post_url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 3000,

            success: function(response) {

                var obj = JSON.parse(response);
                if (obj.statut == true) {

                    $('#envoiCategorie').empty().append(val).append(value)

                } else {
                    //document.location.href = = site_url('Catalogue/rayon')?>;
                    window.location.reload();
                }

            },
            error: function() {
                $('.resultat').html("echec envoi ");
                location.href = 'javascript:history.back()';
            }
        });
    });



    $('#createUser').submit(function(e) {
        e.preventDefault();
        var formulaire = $(this);
        var post_url = formulaire.attr('action');
        var post_data = formulaire.serialize();
        var val = $('#envoi').children();
        var value = $('#envoi').text();
        $('#envoi').empty().append(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
        );
        $.ajax({
            type: "POST",
            url: post_url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 4000,

            success: function(response) {

                var obj = JSON.parse(response);
                if (obj.status == true) {
                    location.href = 'Control/welcome';

                } else {
                    location.href = 'Control/register';
                }
                $("button", form).text(btntxt);
            },
            error: function() {
                $('.resultat').html("echec envoi ");
                location.href = 'Control/register';
            }
        });
    });


    const removePanier = $('a.removePanier');
    removePanier.on("click", (e) => {
        e.preventDefault()
        e.stopPropagation()
        $.ajax({
            type: "GET",
            url: e.currentTarget.href,
            success: function(response) {
                var obj = JSON.parse(response)
                if (obj.error) {
                    alert(obj.message);
                }

                $('#total').empty().append(data.total)
                $('#totCount').empty().append(data.count)
                $('#countPanier').empty().append(data.count)
                $('li.PanierCard').load(location.href + ' li.PanierCard>*', '')

            }


        });
    });

});



function afficherAvancement(e) {
    if (e.lengthComputable) {
        $('progress').attr({
            value: e.loaded,
            max: e.total
        });
    }
}
 </script>