<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'forms/head.php' ?>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include_once 'forms/header.php' ?>
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <!-- ======= Sidebar ======= -->
    <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client' || $this->session->typeUser ==="Client")) :?>
    <?php include_once 'forms/menu.php'?>
    <?php elseif(($this->session->typeUser) && ($this->session->typeUser === 'livraison')) :?>
    <?php include_once 'forms/AdminLivraison/menu.php'?>
    <?php elseif(($this->session->typeUser) && ($this->session->typeUser === 'maintenance')) :?>
    <?php include_once 'forms/AdminMaintenance/menu.php'?>
    <?php elseif(($this->session->typeUser) && ($this->session->typeUser === 'commande')) :?>
    <?php include_once 'forms/AdminClients/menu.php'?>
    <?php endif;?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Gestion Catalogue</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:history.back()">Home</a></li>
                    <li class="breadcrumb-item">Configuration</li>
                    <li class="breadcrumb-item active">G&eacute; Agents</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Espace de Cr&eacute;ation Agent</h5>
                            <p class="message"></p>
                            <!-- General Form Elements -->
                            <form class="row g-3 needs-validation" id="createAgent" enctype="multipart/form-data"
                                action="<?=site_url('Agent/CreateAgent')?>" method="post">
                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Matricule</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><img
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/VCardEmptyContact@2xOK.png"
                                                alt="Profile" id="myProfile" class="rounded-circle"></span>
                                        <input type="text" name="matricule"
                                            value="<?php echo set_value('matricule'); ?>" class="form-control"
                                            id="yourUsername" required>
                                        <div class="invalid"><?= form_error('matricule');?></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Code Service</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><img
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/1_standby@2xer.png"
                                                alt="Profile" id="myProfile" class="rounded-circle"></i></span>
                                        <input type="text" name="codeService"
                                            value=" <?php if(($this->session->codeService)) echo $this->session->codeService; ?> "
                                            class="form-control" id="yourUsername" required>
                                        <div class="invalid"><?= form_error('codeService');?></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i
                                                class="bi bi-envelope-fill"></i></span>
                                        <input type="email" name="email" value="<?php echo set_value('email'); ?>"
                                            class="form-control" id="yourEmail" required>
                                        <div class="invalid"><?= form_error('email');?>

                                        </div>
                                        <small id="valideEmail"></small>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Firstname</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><img
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/VCardEmptyContact@2xOK.png"
                                                alt="Profile" id="myProfile" class="rounded-circle"></span>
                                        <input type="text" name="firstname"
                                            value="<?php echo set_value('firstname'); ?>" class="form-control"
                                            id="yourUsername" required>
                                        <div class="invalid"><?= form_error('firstname');?></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Lastname</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><img
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/VCardEmptyContact@2xOK.png"
                                                alt="Profile" id="myProfile" class="rounded-circle"></span>
                                        <input type="text" name="lastname" value="<?php echo set_value('firstname'); ?>"
                                            class="form-control" id="yourUsername" required>
                                        <div class="invalid"><?= form_error('firstname');?></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Phone</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><img
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/3_3g_s.png"
                                                alt="Profile" id="myProfile" class="rounded-circle"></span>
                                        <input type="text" name="phone" value="<?php echo set_value('phone'); ?>"
                                            class="form-control" id="yourUsername" required>
                                        <div class="invalid"><?= form_error('phone');?></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Fonction</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><img
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/EMOJI_normal.png"
                                                alt="Profile" id="myProfile" class="rounded-circle"></span>
                                        <input type="text" name="fonction" value="<?php echo set_value('fonction'); ?>"
                                            class="form-control" id="yourUsername" required>
                                        <div class="invalid"><?= form_error('fonction');?></div>
                                    </div>
                                </div>





                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Date
                                        Recrutement</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i
                                                class="bi bi-calendar-date-fill"></i></span>
                                        <input type="date" name="recrutement" class="form-control">
                                        <div class="invalid-feedback">Please choose a date.</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Gender</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><img
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/Agent (2).png"
                                                alt="Profile" id="myProfile" class="rounded-circle"></span>
                                        <select name="gender" class="form-select" aria-label="Default select example">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="yourUsername" class="form-label">Nom Service</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><img
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/myspace.png"
                                                alt="Profile" id="myProfile" class="rounded-circle"></span>
                                        <input type="text" name="nomService"
                                            value=" <?php if(($this->session->nomService)) echo $this->session->nomService; ?> "
                                            class="form-control" id="yourUsername" required>
                                        <div class="invalid"><?= form_error('nomService');?></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Adresse</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i
                                                class="bi bi-geo-alt-fill"></i></span>
                                        <input type="text" name="adresse" placeholder="1234, Street"
                                            class="form-control" id="yourUsername" required>
                                        <div class="invalid"><?= form_error('adresse');?></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group has-validation">

                                        <button type="submit" id="envoie" class="btn btn-primary"><img
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/header_invite_to_chat_white.png"
                                                alt="Profile" id="myProfile" class="rounded-circle">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                </form><!-- End General Form Elements -->

            </div>
            </div>


            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include_once 'forms/footer.php' ?>
    <!-- ======= Footer ======= -->
    <script>
    $(document).ready(function() {
        $('#createAgent').submit(function(e) {
            e.preventDefault();
            var formulaire = $(this);
            var post_url = formulaire.attr('action');
            var post_data = formulaire.serialize();
            val = $('#envoie').val();
            var val = $('#envoie').children();
            var value = $('#envoie').text();
            $('#envoie').empty().append(
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
                    console.log(response);

                    var obj = JSON.parse(response);
                    console.log(obj)

                    // console.log(obj.statut);
                    // debugger;
                    var message =
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">Agent Crée avec succès <button type = "button"class = "btn-close" data - bs - dismiss = "alert" aria - label = "Close" > </button> </div > '
                    var errorMSG =
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">Echec  Création, Veuillez Saisir les informations correctes, le Matricule doit etre Unique pour un Agent <button type = "button" class = "btn-close" data - bs - dismiss = "alert" aria - label = "Close" > </button> </div > '
                    if (obj.statut) {
                        $('#cadreAgent').load(location.href + ' #cadreAgent>*',
                            '');
                        $('#envoie').empty().append(val).append(value);
                        $('.message').empty().append(message)
                        //location.href = 'Agents';

                    } else {
                        $('#envoie').empty().append(val).append(value);

                        $('.message').empty().append(errorMSG)
                        //window.location.reload();
                    }

                },
                error: function() {
                    $('.resultat').html("echec envoi ");

                    window.location.href = 'javascript:history.back()';
                }

            });

        });
    });
    </script>
</body>

</html>