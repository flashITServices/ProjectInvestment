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


        <div class=" pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=site_url('Control/welcome')?>">Home</a></li>
                    <li class="breadcrumb-item ">Planier Livraison</li>
                    <li class="breadcrumb-item active">Livraisons</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Livraison Client</h5>
                            <button type="button" class="btn btn-primary"><i class="bx bxs-pencil"></i> Edit</button>
                            <button type="button" class="btn btn-primary"><i class="bx bxs-printer"></i> Print</button>
                            <span>Journal <span class="text-success" style="text-decoration:underline;"> <i
                                        class="bx bxs-truck"></i> des livraisons
                                    Client</span></span> &emsp;&emsp;<span><img
                                    src="<?= base_url('assets/') ?>vendorsAdmin/img/map.png" alt="Profile"
                                    id="myProfile" class="rounded-circle">
                            </span>&emsp; &emsp;
                            <span> Date <span class="text-success" style="text-decoration:underline;">
                                    <?=date('l d F Y'); ?></span></span>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-striped">
                        <thead>

                            <tr>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bxs-truck"></i>Livraison</em></th>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bxl-shopify"></i>Commande</em></th>


                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bi bi-calendar-day-fill"></i>Date</em></th>

                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bx-barcode"></i>Produits</em></th>

                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bxs-truck"></i>Autorisation</em></th>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bxs-truck"></i>Statut</em></th>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bx-barcode"></i>Livreur</em></th>
                                <th scope="col"><em class="text-secondary medium">Action</em></th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php if(isset($livraisons)) foreach($livraisons as $order):?>
                            <tr>
                                <td scope="row"><em class="text-secondary"><i
                                            class="bx bxs-truck"></i><?= 'L000'.$order->idLivraison;?></em>
                                </td>
                                <td><em class="text-secondary small"><i
                                            class="bx bxl-shopify"></i><?= 'S000'.$order->getIdCommande();?></em>
                                </td>

                                <td><em class="text-secondary"><?=$order->getDate();?></em>
                                </td>
                                <td><em class="text-secondary"><i
                                            class="bx bx-barcode"></i><?=$order->quantiteArticle?></em></td>
                                <td>
                                    <?php if($order->getAutorisation() ==0) :?>
                                    <em class="text-secondary">false</em>
                                    <?php else:?>
                                    <em class="text-secondary">true</em>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <?php if($order->matriculeLivreur ==NULL) :?>
                                    <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Aucun
                                        Livreur Assigné</span>

                                    <?php else :?>
                                    <?php $livreur=$this->db->where('matricule', $order->matriculeLivreur)->get('Agent')->result();?>
                                    <span class="badge bg-primary"><img
                                            src="<?= base_url('assets/') ?>vendorsAdmin/img/Agent (2).png"
                                            class="rounded-circle" alt="...">
                                        <?=$livreur[0]->prenom.' '.$livreur[0]->nom;?></span>

                                    <?php endif;?>
                                </td>
                                <td>
                                    <span class="badge bg-secondary"><i
                                            class="bx bxs-truck me-1"></i><?=$order->getStatutLivraison();?></span>

                                </td>
                                <td>
                                    <div style="width: min-content;" class="btn-group" role="group"
                                        aria-label="Basic mixed styles example">
                                        <a href="<?= base_url('Order/viewOrder/'.$order->getIdCommande())?>">
                                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/accept.png"
                                                alt="Profile" id="myProfile" class="rounded-circle"></a>

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