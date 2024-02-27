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
                            <marquee
                                class="alert alert-secondary bg-secondary text-light border-0 alert-dismissible fade show">
                                <h5 style="color:aliceblue;" class="card-title">
                                    Cette fenetre donne aux clients la possibité de voir toutes
                                    les factures à son active

                                </h5>
                            </marquee>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><em class="text-secondary medium"><i
                                            class="bx bxs-spreadsheet"></i>Facture</em></th>
                                <th scope="col"><em class="text-secondary medium">Date</em></th>
                                <th scope="col"><em class="text-secondary medium">Prix Total</em></th>
                                <th scope="col"><em class="text-secondary medium">Reduction</em></th>
                                <th scope="col"><em class="text-secondary medium">Prix Net</em></th>
                                <th scope="col"><em class="text-secondary medium">Adresse</em></th>
                                <th scope="col"><em class="text-secondary medium">Action</em></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($facturesClient)) foreach($facturesClient as $invoice):?>
                            <tr>
                                <th scope="row"><i class="bx bxs-spreadsheet"></i><?='F000'.$invoice->getIdFacture();?>
                                </th>
                                <td><?=$invoice->getDate();?></td>
                                <td><?=number_format($invoice->getPrixTotal(),2,',','');?> <?=$invoice->getDevise();?>
                                </td>
                                <td>0</td>
                                <td><?=number_format($invoice->getPrixNet(),2,',','');?> <?=$invoice->getDevise();?>
                                </td>
                                <td><?=$invoice->getAdresseFacturation();?></td>
                                <td>

                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="<?= base_url('Facture/viewFacture/'.$invoice->getIdFacture())?>">
                                            <button type="button" class="badge bg-success btn-sm"><i
                                                    class="bi bi-eye"></i>Consulter</button></a>
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