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
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <marquee>
                                <h5 class="card-title">
                                    <p class="text-success">Cette fenetre donne au client la possibité de voir toutes
                                        les commandes à son active
                                    </p>
                            </marquee>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><em class="text-success medium"><i
                                            class="bx bxl-shopify"></i>Commande</em></th>

                                <th scope="col"><em class="text-success medium"><i
                                            class="bi bi-currency-exchange"></i>Montant</em></th>

                                <th scope="col"><em class="text-success medium"><i
                                            class="bi bi-credit-card-fill"></i>Mode de paiement</em></th>
                                <th scope="col"><em class="text-success medium"><i
                                            class="bi bi-calendar-day-fill">Date</em></th>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bxs-truck"></i>Statut</em></th>

                                <th scope="col"><em class="text-success medium">Action</em></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($commandeClient)) foreach($commandeClient as $order):?>
                            <tr>
                                <td scope="row"><i class="bx bxl-shopify"></i><?= 'S000'.$order->getIdCommande();?></td>

                                <td><?=$order->getMontant()." ".$order->getDevise()?></td>

                                <td><?=$order->getModePaiement()?></td>
                                <td><em class="text-secondary"><?=$order->getDate();?></em></td>
                                <td>
                                    <p class="text-danger small"><i
                                            class="bx bxs-truck"></i><?=$order->getStatutLivraison();?></p>
                                </td>
                                <td>
                                    <div style="width: min-content;" class="btn-group" role="group"
                                        aria-label="Basic mixed styles example">
                                        <a href="<?= base_url('Order/viewOrder/'.$order->getIdCommande())?>"> <button
                                                style="height:47px;" type="button" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-eye-fill"></i>Voir</button></a>

                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

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