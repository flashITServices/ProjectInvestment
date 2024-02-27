<!DOCTYPE html>
<html lang="en">

<head id="head">
    <?php include_once 'forms/head.php' ?>
    <style>
    @media print {
        #frame {
            position: absolute;
            top: 0;
            left: 0;
        }

        #myHead {
            visibility: hidden;
        }





    }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <div id="myHead"><?php include_once 'forms/header.php' ?></div>
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
                    <li class="breadcrumb-item ">Facture</li>
                    <li class="breadcrumb-item active">Detail Facture</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <section id="frame">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Facture Client</h5>
                                <?php if(($this->session->typeUser) && ($this->session->typeUser != 'client')) :?>
                                <a href="<?= site_url('Facture/addFacture')?>"><button type="button"
                                        class="badge border-secondary border-1 text-secondary"><i
                                            class="ri-add-box-fill"></i>
                                        New</button></a> <button type="button"
                                    class="badge border-secondary border-1 text-secondary"><i class="bx bxs-pencil"></i>
                                    Edit</button>
                                <?php endif;?>
                                <div class="card info-card customers-card" style="height:280px;margin-bottom:-20px;">

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

                                    <div class="card-body" id="entete">
                                        <h5 class="card-title"><img style="width:140px;margin-top:-20px;"
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/logo.svg"></h5>

                                        <div class="d-flex align-items-center" style="width:390px;margin-top:-20px;">

                                            <div class="ps-3">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">

                                                        <div class="ps-3 ">
                                                            <h6 class="">
                                                                <p class="text-muted small pt-2 ps-1">Facture
                                                                    N°<?= isset($factures) ? $factures[0]->getIdFacture() :""; ?>
                                                                </p>
                                                            </h6>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="margin-top:-25px;">
                                                    <h6 style="font-size:medium;">Customer</h6>
                                                    <div class="text-muted small pt-2 ps-1"><i
                                                            class="bx bxs-user-detail"></i>
                                                        <?= isset($factures) ? $factures[0]->prenom :""; ?>
                                                        <?= isset($factures) ? $factures[0]->nom :""; ?>
                                                    </div>
                                                    <div class="text-secondary small pt-1 fw-bold"> <i
                                                            class="bi bi-geo-alt"></i>
                                                        RDC <span
                                                            class="text-muted small pt-2 ps-1"><?= isset($factures) ? $factures[0]->adresseFacturation :""; ?></span>
                                                    </div>
                                                    <div class="text-muted small pt-2 ps-1"><i
                                                            class="ri-phone-fill"></i>
                                                        Tel
                                                        <?= isset($factures) ? $factures[0]->telephone :""; ?><i
                                                            class="ri-mail-open-fill"></i><?= isset($factures) ? $factures[0]->email :""; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="d-flex align-items-right"
                                            style="margin-left:500px;margin-top:-200px;">
                                            <div class="ps-3">
                                                <div
                                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bx bxl-shopify"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6 style="font-size:medium;">Invoice Date</h6><span
                                                        class="text-muted small pt-2 ps-1"><?=date("D-M-Y");?></span>
                                                    <div><span class="text-secondary small pt-1 fw-justify"> <i
                                                                class="bi bi-cart-check-fill"></i>SalesPerson</span><span
                                                            class="text-secondary small pt-1 fw-bold"> &emsp;
                                                            &emsp;
                                                            Customer Service</span></div>
                                                    <div><span class="text-secondary small pt-1 fw-justify"> <i
                                                                class="bi bi-envelope-fill"></i>Email</span><span
                                                            class="text-secondary small pt-1 fw-bold"> &emsp;
                                                            hyperpsarosarl@gmail.com</span></div>
                                                    <div><span class="text-secondary small pt-1 fw-justify"> <i
                                                                class="bi bi-telephone-fill"></i>Telephone</span><span
                                                            class="text-secondary small pt-1 fw-bold"> &emsp;
                                                            &emsp;(+243)826 963 363</span></div>
                                                    <div><span class="text-secondary small pt-1 fw-justify"> <i
                                                                class="bi bi-geo-alt-fill"></i>Adresse</span><span
                                                            class="text-secondary small pt-1 fw-bold"> N°17,
                                                            Chauss&eacute;e
                                                            Mzee Laurent D&eacute;sir&eacute; Kabila</span>
                                                    </div>
                                                    <div><span class="text-secondary small pt-1 fw-justify"> <i
                                                                class="ri-currency-fill"></i>Currency</span><span
                                                            class="text-secondary small pt-1 fw-bold">&emsp;
                                                            &emsp;
                                                            &emsp;&emsp; CDF</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped" id="corps">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Produit</th>
                                        <th scope="col">Quantite</th>
                                        <th scope="col">Prix unitaire</th>
                                        <th scope="col">Taxes</th>
                                        <th scope="col">Prix Total</th>
                                    </tr>
                                </thead>
                                <?php $count=1;?>
                                <tbody>
                                    <?php if(isset($factures)) foreach($factures as $facture):?>
                                    <tr>
                                        <th scope="row"><?=$count;?></th>
                                        <td>
                                            <p class="text-secondary small pt-1 fw-bold">
                                                <?= substr($facture->designation,0,30);?></p>
                                        </td>
                                        <td>
                                            <p class="text-secondary small pt-1 fw-bold">
                                                <?=$facture->quantite;?></p>
                                        </td>
                                        <td>
                                            <p class="text-secondary small pt-1 fw-bold">CDF
                                                <?=number_format($facture->prixUnitaire,2,',','');?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="badge border-secondary border-1 text-secondary">
                                                16%</p>
                                        </td>
                                        <td>
                                            <p class="text-secondary small pt-1 fw-bold">CDF
                                                <?=number_format($facture->prixTotalLigne,2,',','');?>
                                            </p>
                                        </td>
                                        <?php $count++;?>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

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
                                                        <th class="text-success small" scope="col">Tax
                                                            Description</th>
                                                        <th class="text-success small" scope="col">Tax Account
                                                        </th>
                                                        <th class="text-success small" scope="col">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Taxe sur La Valeur Ajoutée</td>
                                                        <td>16.00%</td>
                                                        <td><?=number_format($factures[0]->prixTotal*0.16,2,',','')?>
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
                                                        <th class="text-success small" scope="col">UnTaxed
                                                            Amount</th>
                                                        <th class="text-success small" scope="col">Tax</th>
                                                        <th class="text-success small" scope="col">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?=number_format($factures[0]->prixTotal*0.84,2,',','')?>
                                                        </td>
                                                        <td><?=number_format($factures[0]->prixTotal*0.16,2,',','')?>
                                                        </td>
                                                        <td><?=number_format($factures[0]->prixTotal,2,',','')?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- End Customers Card -->
                    </section>
                    <button type="button" id="printBill" class="btn btn-primary"><i class="bx bxs-printer"></i>
                        Print</button><button type="button" id="printfacture" class="btn btn-primary"><i
                            class="bx bxs-printer"></i> Export</button>
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
        $("button#printBill").on("click", (e) => {

            var restorePage = document.body.innerHTML;
            var entete = document.querySelector('#entete');

            var corps = document.querySelector('#corps');

            var pieds = document.querySelector('#pieds');
            $('body').empty().append(entete).append(corps).append(pieds);

            window.print();
            document.body.innerHTML = restorePage;

        })
    });
    </script>
</body>

</html>