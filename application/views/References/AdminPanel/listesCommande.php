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
                            <h5 class="card-title">Commandes Client</h5>
                            <button type="button" class="btn btn-primary"><i class="bx bxs-pencil"></i> Edit</button>
                            <button type="button" class="btn btn-primary"><i class="bx bxs-printer"></i> Print</button>
                            <span>Journal <span class="text-success" style="text-decoration:underline;"> des commandes
                                    Client</span></span> &emsp;&emsp;&emsp;<span>Company <span class="text-success"
                                    style="text-decoration:underline;"> HyperPsaro</span></span>&emsp; &emsp;&emsp;
                            <span> Date <span class="text-success" style="text-decoration:underline;">
                                    <?=date('l d F Y'); ?></span></span>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-striped">
                        <thead>

                            <tr>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bxl-shopify"></i>Commande</em></th>

                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bxs-user-detail"></i>Client</em></th>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bi bi-calendar-day-fill"></i>Date</em></th>

                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bi bi-currency-exchange"></i>Montant</em></th>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bi bi-credit-card-fill"></i>modePaiement</em></th>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bxs-truck"></i>Autorisation</em></th>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bxs-truck"></i>Statut</em></th>
                                <th scope="col"><em class="text-secondary medium">Action</em></th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php if(isset($Commande)) foreach($Commande as $order):?>
                            <tr>
                                <td scope="row"><em class="text-secondary"><i
                                            class="bx bxl-shopify"></i><?= 'S000'.$order->getIdCommande();?></em>
                                </td>
                                <td><em class="text-secondary small"><i
                                            class="bx bxs-user-detail"></i><?= $order->prenom." ".$order->nom?></em>
                                </td>
                                <td><em class="text-secondary"><?=$order->getDate();?></em></td>
                                <td><em class="text-secondary"><?=$order->getMontant()." ".$order->getDevise()?></em>
                                </td>
                                <td><em class="text-secondary"><i
                                            class="bi bi-credit-card-fill"></i><?=$order->getModePaiement()?></em></td>
                                <td>
                                    <?php if($order->getAutorisation() ==0) :?>
                                    <em class="text-secondary">false</em>
                                    <?php else:?>
                                    <em class="text-secondary">true</em>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <p class="text-danger small"><i
                                            class="bx bxs-truck"></i><?=$order->getStatutLivraison();?></p>
                                </td>
                                <td>
                                    <div style="width: min-content;" class="btn-group" role="group"
                                        aria-label="Basic mixed styles example">
                                        <a href="<?= base_url('Order/viewOrder/'.$order->getIdCommande())?>"> <button
                                                style="height:47px;" type="button"
                                                class="badge bg-success btn btn-outline-success"><i
                                                    class="bi bi-pen-fill"></i>Autoriser</button></a>

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