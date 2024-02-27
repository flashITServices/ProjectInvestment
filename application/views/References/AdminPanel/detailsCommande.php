<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'forms/head.php' ?>
    <style>
    .gris {

        background-color: burlywood;
    }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include_once 'forms/header.php' ?>
    <!-- End Header -->
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
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=site_url('Control/welcome')?>">Home</a></li>
                    <li class="breadcrumb-item">Commande</li>
                    <li class="breadcrumb-item active">Details Commande</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Commande Client</h5>
                            <?php if(($this->session->typeUser) && ($this->session->typeUser != 'client')) :?>
                            <span>
                                <a href="javascript:history.back();"><button type="button"
                                        class="badge border-secondary border-1 text-secondary"><i
                                            class="bx bx-left-arrow-alt"></i>
                                        Back</button></a>
                                <a href="<?= site_url('Commande/addCommande')?>"><button type="button"
                                        class="badge border-secondary border-1 text-secondary"><i
                                            class="ri-add-box-fill"></i>
                                        New</button></a> <button type="button"
                                    class="badge border-secondary border-1 text-secondary"><i class="bx bxs-pencil"></i>
                                    Edit</button> <button type="button"
                                    class="badge border-secondary border-1 text-secondary"><i
                                        class="bx bxs-envelope"></i>
                                    Send
                                    By Email</button>
                            </span>
                            <?php endif;?>
                            <div id="entete" class="card info-card customers-card"
                                style="height:270px; margin-bottom: -16px;">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title"><img style="width:150px;margin-top:-20px;"
                                            src="<?= base_url('assets/') ?>vendorsAdmin/img/logo.svg"></h5>

                                    <div class="d-flex align-items-center" style="width:490px;margin-top:-20px;">

                                        <div class="ps-3">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bx bxs-user-detail"></i>
                                            </div>
                                            <h6 style="font-size:medium;">Customer</h6>
                                            <span class="text-secondary small pt-1 fw-bold"> <i
                                                    class="bi bi-geo-alt"></i>
                                                RDC </span> <span
                                                class="text-muted small pt-2 ps-1"><?= isset($details)? $details[0]->adresses:"";?>
                                                , <i class="ri-phone-fill"></i> Tel
                                                <?= isset($details)? $details[0]->telephone:"";?> <i
                                                    class="ri-mail-open-fill"></i><?= isset($details)? $details[0]->email:"";?></span>
                                            <div class="text-secondary small pt-1 fw-bold"> <i
                                                    class="bi bi-geo-alt"></i>
                                                Adresse De Facturation <span class="text-muted small pt-2 ps-1">
                                                    <?= isset($details)? $details[0]->adresseFacturation:"";?></span>
                                            </div>
                                            <div class="text-secondary small pt-1 fw-bold"> <i
                                                    class="bi bi-geo-alt"></i>
                                                Adresse De Livraison
                                                <span
                                                    class="text-muted small pt-2 ps-1"><?= isset($details)? $details[0]->adresseLivraison :"";?></span>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="d-flex align-items-right" style="margin-left:560px;margin-top:-200px;">
                                        <div class="ps-3">
                                            <div class="ps-3">
                                                <h6 style="font-size:medium;">Confirmation Date</h6><span
                                                    class="text-muted small pt-2 ps-1"><?=date("D-M-Y");?></span>
                                                <div><span class="text-secondary small pt-1 fw-justify"> <i
                                                            class="bi bi-cart-check-fill"></i>SalesPerson</span><span
                                                        class="text-secondary small pt-1 fw-bold"> &emsp; &emsp;
                                                        Customer Service</span></div>
                                                <div><span class="text-secondary small pt-1 fw-justify"> <i
                                                            class="bx bx-money"></i>Payments Terms</span><span
                                                        class="text-secondary small pt-1 fw-bold">&emsp; &emsp; &emsp;
                                                        Delivered Order</span> </div>
                                                <div><span class="text-secondary small pt-1 fw-justify"> <i
                                                            class="bx bxs-truck"></i>Delivery Method</span><span
                                                        class="text-secondary small pt-1 fw-bold"> Normal Delivery
                                                        Charges</span></div>
                                                <div><span class="text-secondary small pt-1 fw-justify"> <i
                                                            class="bx bx-money"></i>Price</span><span
                                                        class="text-secondary small pt-1 fw-bold">&emsp; &emsp; &emsp;
                                                        <?= isset($details)? $details[0]->prixTotal :"";?> CDF</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="corps" class="card" style="margin-top:-30;">
                            <div class="card-body">
                                <p class="message"></p>
                                <h5 class="card-title">ORDERS</h5>

                                <!-- Default Tabs -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">Orders Lines</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false" tabindex="-1">Suggested Products</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false" tabindex="-1">Orther Information</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2" id="myTabContent">
                                    <div class="tab-pane fade active show" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <!-- Table with stripped rows -->
                                        <table class="table datatable table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Produit</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Quantite </th>
                                                    <th scope="col">Livraison</th>

                                                    <th scope="col">Taxes</th>

                                                    <th scope="col">Prix Total</th>
                                                    <?php if(($this->session->typeUser) && ($this->session->typeUser != 'client') && ($this->session->codeService ==='service@psaroclient'))  :?>
                                                    <th scope="col">Facture</th>
                                                    <?php endif;?>
                                                </tr>
                                            </thead>
                                            <tbody id="NosCommande">
                                                <?php if(isset($details)) foreach($details as $ligne):?>
                                                <tr>
                                                    <th scope="row">
                                                        <p class="small"><img style="width:50px;"
                                                                src="<?= base_url($ligne->imageArticle) ?>"
                                                                alt="Profile"
                                                                class="rounded-circle"><?=$ligne->designation;?></p>
                                                    </th>
                                                    <td>
                                                        <p class="small"><?=$ligne->date;?></p>
                                                    </td>
                                                    <td><?=$ligne->quantite;?></td>
                                                    <td>
                                                        <h6>
                                                            <span class="badge bg-success">
                                                                <i class="bx bxs-truck"></i>
                                                                <?=$ligne->statutLivraison;?><div
                                                                    class="spinner-grow spinner-grow-sm" role="status">
                                                                    <span class="visually-hidden">Loading...</span>
                                                                </div></span>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                        <p style="width:min-content;  height:min-content; border-radius:100%;"
                                                            class="badge bg-secondary text-light border-0 alert-dismissible fade show">
                                                            16.00%</p>
                                                    </td>

                                                    <td><?=$ligne->devise;?> <?=$ligne->prixTotalLigne;?></td>
                                                    <?php if(($this->session->typeUser) && ($this->session->typeUser != 'client') && ($this->session->codeService ==='service@psaroclient'))  :?>
                                                    <td><a id="voirFacture"
                                                            href="<?= base_url('Facture/viewFacture/'.$ligne->idFacture)?>"><button
                                                                type="button"
                                                                class="badge border-secondary border-1 text-secondary"><i
                                                                    class="bi bi-eye-fill"></i>
                                                                Voir</button></a></td>
                                                    <td>
                                                        <?php endif;?>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                        <!-- End Table with stripped rows -->

                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <table class="table datatable table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Produit</th>
                                                    <th scope="col">Description </th>
                                                    <th scope="col">Date</th>

                                                    <th scope="col">Quota en stock</th>
                                                    <th scope="col">Quantite</th>
                                                    <th scope="col">Unites</th>

                                                    <th scope="col">Categorie</th>
                                                    <th scope="col">Prix Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="NosCommande">
                                                <?php if(isset($details)) foreach($details as $ligne):?>
                                                <tr>
                                                    <th scope="row">
                                                        <p class="small"><img style="width:50px;"
                                                                src="<?=base_url($ligne->imageArticle)?>"
                                                                class="rounded-circle" alt="..."></p>

                                                    </th>
                                                    <td>
                                                        <p class="small"><?=$ligne->designation;?></p>
                                                    </td>
                                                    <td>
                                                        <p class="small"><?=$ligne->dateAjout;?></p>
                                                    </td>

                                                    <td>
                                                        <h6>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: <?php $percent=$ligne->quantiteEnVente/10;echo $percent.'%'?>"
                                                                    aria-valuenow="25" aria-valuemin="0"
                                                                    aria-valuemax="100">
                                                                    <?php $percent=$ligne->quantiteEnVente/100;echo $percent.'%'?>
                                                                </div>
                                                            </div>
                                                    </td>
                                                    <td>
                                                        <p style="width:min-content;  height:min-content; border-radius:100%;"
                                                            class="badge bg-secondary text-light border-0 alert-dismissible fade show">
                                                            <?= $percent=$ligne->quantiteEnVente?></p>
                                                    </td>
                                                    <td><?=$ligne->unites;?>

                                                    <td><?=$ligne->categorie;?></td>
                                                    <td><?=$ligne->devise;?> <?=$ligne->prix;?></td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                        <!-- End Table with stripped rows -->

                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis
                                        cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis
                                        accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos
                                        fuga tempore dolor.
                                    </div>
                                </div><!-- End Default Tabs -->

                            </div>
                        </div>


                    </div>
                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12" style="margin-top:-100px;">
                        <div class="card info-card customers-card">

                            <div class="card-body" id="pieds">
                                <div class="d-flex align-items-center" style="width:400px;">

                                    <div class="ps-3">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-success small" scope="col">Tax Description</th>
                                                    <th class="text-success small" scope="col">Tax Account</th>
                                                    <th class="text-success small" scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Taxe sur la Valeur Ajoutee</td>
                                                    <td>16.00%</td>
                                                    <td>
                                                        <?=isset($details)? number_format($details[0]->prixTotal *0.16,2,',','') :"";?>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-flex align-items-right"
                                    style="margin-left:550px;margin-top:-100px;width:400px;">
                                    <div class="ps-3">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-success small" scope="col">UnTaxed Amount</th>
                                                    <th class="text-success small" scope="col">Tax</th>
                                                    <th class="text-success small" scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?=isset($details)? number_format($details[0]->prixTotal *0.84,2,',','') :"";?>
                                                    </td>
                                                    <td><?=isset($details)? number_format($details[0]->prixTotal *0.16,2,',','') :"";?>
                                                    </td>
                                                    <td><?=isset($details)? number_format($details[0]->prixTotal ,2,',','') :"";?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div><!-- End Customers Card -->
                        <?php if(($this->session->typeUser) && ($this->session->typeUser != 'client') && ($this->session->codeService ==='service@psaroclient'))  :?>
                        <a id="autoriser" href="<?= base_url('Order/Granted/'.$details[0]->getIdCommande())?>"><button
                                type="button" class="btn btn-primary"><i class="ri-24-hours-fill"></i>
                                Autoriser</button></a>
                        <?php endif;?>
                        <?php if(($this->session->typeUser) && ($this->session->typeUser != 'client') && ($this->session->codeService ==='service@psarolivraison'))  :?>
                        <form method="post" id="affectation"
                            action="<?=site_url('Grant/Deliver/'.$details[0]->idLivraison)?>">
                            <div class="col-4">

                                <label for="yourUsername" class="form-label">Attribuer Commande à un Livreur</label>
                                <div class="input-group has-validation">

                                    <span class="input-group-text" id="inputGroupPrepend"><img
                                            src="<?= base_url('assets/') ?>vendorsAdmin/img/Agent (2).png"
                                            class="rounded-circle" alt="..."></span>
                                    <select name="matricule" class="form-select" aria-label="Default select example">
                                        <?php if(isset($livreurs)) foreach($livreurs as $livreur):?>
                                        <option value="<?=$livreur->getMatricule();?>"><?=$livreur->getPrenom();?>
                                            <?=$livreur->getNom();?></option>

                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" id="validation" class="btn btn-primary"><i
                                    class="bi bi-people-fill"></i>
                                Associer</button>
                        </form>
                        <?php endif;?>
                        <br>
                        <div>
                            <button type="button" id="printfacture" class="btn btn-primary"><i
                                    class="bx bxs-printer"></i>
                                Print</button><button type="button" id="printfacture" class="btn btn-primary"><i
                                    class="bx bxs-printer"></i>
                                Export</button>
                        </div>

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
        $("button#printfacture").on("click", (e) => {
            var element = $(".card")
            var restorePage = document.body.innerHTML;
            var entete = document.querySelector('#entete');

            var corps = document.querySelector('#corps');

            var pieds = document.querySelector('#pieds');
            $('body').empty().append(entete).append(corps).append(pieds);
            window.print();
            document.body.innerHTML = restorePage;
            //console.log(element);
            //window.print(element);
        })
        let tabs = document.querySelectorAll('tbody tr');
        for (let tr of tabs) {
            tr.addEventListener('click', function() {
                this.classList.toggle('gris');
            });
        }


        let grant = $('#autoriser');

        var val = grant.children();
        var child = val.children();
        var value = grant.text();

        grant.click(function(e) {

            e.preventDefault()
            e.stopPropagation()
            grant.children().empty().append(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...'
            );
            setTimeout(function() {
                $.get(grant.attr('href'), {}, function(data) {
                    var obj = JSON.parse(data);

                    var message =
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">commande autorisée avec succès <button type = "button"class = "btn-close" data - bs - dismiss = "alert" aria - label = "Close" > </button> </div > '
                    var errorMSG =
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">Echec autorisation <button type = "button" class = "btn-close" data - bs - dismiss = "alert" aria - label = "Close" > </button> </div > '
                    if (obj.statut == true) {

                        grant.children().empty().append(child).append(value)
                        $('.message').empty().append(message)
                    } else {
                        $('.message').empty().append(errorMSG)
                    }

                });
            }, 2000);
        });


        $('#affectation').submit(function(e) {
            e.preventDefault();
            var formulaire = $(this);
            var post_url = formulaire.attr('action');
            var post_data = formulaire.serialize();
            var message =
                '<div class="alert alert-success alert-dismissible fade show" role="alert">Livraison affectée avec succès <button type = "button"class = "btn-close" data - bs - dismiss = "alert" aria - label = "Close" > </button> </div > '
            var errorMSG =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">Echec Affectation de la Livraison <button type = "button" class = "btn-close" data - bs - dismiss = "alert" aria - label = "Close" > </button> </div > '
            val = $('#validation').val();
            var val = $('#validation').children();
            var value = $('#validation').text();
            $('#validation').empty().append(
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

                        $('#validation').empty().append(val).append(value)
                        $('.message').empty().append(message)

                    } else {
                        $('.message').empty().append(errorMSG)
                        //location.href = 'javascript:history.back()';
                    }

                },
                error: function() {
                    $('.resultat').html("echec envoi ");
                    location.href = 'javascript:history.back()';
                }

            });

        });



    });
    </script>
</body>

</html>