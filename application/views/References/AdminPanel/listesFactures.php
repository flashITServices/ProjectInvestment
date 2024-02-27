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
                    <li class="breadcrumb-item active">Factures</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Facture Client</h5>
                            <button type="button" class="btn btn-primary"><i class="bx bxs-pencil"></i> Edit</button> <a
                                href="<?= site_url('Facture/addFacture')?>"><button type="button"
                                    class="btn btn-primary"><i class="ri-add-box-fill"></i> New</button></a>
                            <span>Journal <span class="text-success" style="text-decoration:underline;"> des factures
                                    Client</span></span> &emsp;&emsp;<span>Company <span class="text-success"><img
                                        style="margin-top:-20px;"
                                        src="<?= base_url('assets/') ?>vendorsAdmin/img/logo.svg"></span></span>&emsp;
                            &emsp;<span> Date <span class="text-success" style="text-decoration:underline;">
                                    <?=date('l d F Y'); ?></span></span>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><em class="text-secondary medium">IdFacture</em></th>
                                <th scope="col"><em class="text-secondary medium">Client</em></th>
                                <th scope="col"><em class="text-secondary medium">Contanct</em></th>
                                <th scope="col"><em class="text-secondary medium">Date</em></th>
                                <th scope="col"><em class="text-secondary medium">Prix Total</em></th>


                                <th scope="col"><em class="text-secondary medium">Statut</em></th>
                                <th scope="col"><em class="text-secondary medium">Action</em></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($factures)) foreach($factures as $invoice):?>
                            <tr>
                                <th scope="row"><?=$invoice->getIdFacture();?></th>
                                <td><i class="bi bi-person-lines-fill"></i><?=$invoice->prenom;?> <?=$invoice->nom;?>
                                </td>
                                <td>
                                    <?=$invoice->email;?>
                                    <?=$invoice->telephone;?>
                                </td>
                                <td>
                                    <?=$invoice->date;?>
                                </td>
                                <td>
                                    <?=$invoice->prixTotal;?>
                                    <?=$invoice->devise;?>
                                </td>

                                <td>
                                    <p class="text-primary small"><i
                                            class="bi bi-credit-card-2-back-fill"></i>Encaiss&eacute;e</p>
                                </td>
                                <td>

                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="<?= base_url('Facture/viewFacture/'.$invoice->getIdFacture())?>">
                                            <button type="button" class="badge bg-success btn-sm"><i
                                                    class="bi bi-check-circle me-1"></i></i>Consulter</button></a>


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