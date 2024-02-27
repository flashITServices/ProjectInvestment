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
                    <li class="breadcrumb-item active">Commandes</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                            <h5 class="card-title">Recent Sales <span>| Today</span></h5>
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/visa.png" alt="Visa">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/cinetPay.png">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/mastercard.png" alt="Visa">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/paypal.png" alt="Visa">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/american-express.png" alt="Visa">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/4289322.png" alt="Visa">

                            <div
                                class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                                <div class="datatable-top">
                                    <div class="datatable-dropdown">
                                        <label>
                                            <select class="datatable-selector">
                                                <option value="5">5</option>
                                                <option value="10" selected="">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                                <option value="25">25</option>
                                            </select> entries per page
                                        </label>
                                    </div>
                                    <div class="datatable-search">
                                        <input class="datatable-input" placeholder="Search..." type="search"
                                            title="Search within table">
                                    </div>
                                </div>
                                <div class="datatable-container"
                                    style="background-image : url(<?php echo base_url('assets/vendorsAdmin/img/icone1.jpg')?>)">
                                    <table class="table table-borderless datatable datatable-table">
                                        <thead>
                                            <tr>

                                                <th data-sortable="true" style="width: 24.18300653594771%;"><a href="#"
                                                        class="datatable-sorter">Numero Transaction</a></th>
                                                <th data-sortable="true" style="width:16.013071895424837% "><a href="#"
                                                        class="datatable-sorter">Date</a></th>
                                                <th data-sortable="true" style="width: 28.56209150326798%;"><a href="#"
                                                        class="datatable-sorter">Price</a></th>
                                                <th data-sortable="true" style="width: 10.947712418300654%;"><a href="#"
                                                        class="datatable-sorter">Description</a></th>
                                                <th data-sortable="true" style="width:10.294117647058822%; ;"><a
                                                        href="#" class="datatable-sorter">Status</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($CustomerPayment)) foreach($CustomerPayment as $payment) :?>
                                            <tr data-index="4">

                                                <td>
                                                    <p class="badge bg-primary"><?=$payment->getNumeroTransaction();?>
                                                    </p>
                                                </td>


                                                <td>
                                                    <p class="badge bg-primary"><?=$payment->getDate();?></p>
                                                </td>
                                                <td>
                                                    <p class="badge bg-primary">
                                                        CDF <?=$payment->getMontantTransaction();?>
                                                        <?=$payment->getTypePaiement();?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="badge bg-primary"><?=$payment->getDescription();?></p>

                                                </td>
                                                <td><span class="badge bg-success"><?=$payment->getStatut();?></span>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="datatable-bottom">
                                    <div class="datatable-info">Showing 1 to 5 of 5 entries</div>
                                    <nav class="datatable-pagination">
                                        <ul class="datatable-pagination-list"></ul>
                                    </nav>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>



            </div>

            </div>



        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include_once 'forms/footer.php' ?>
    <!-- ======= Footer ======= -->
</body>

</html>