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
                                <h5 class="card-title text-success">Nos Clients <img
                                        src="<?= base_url('assets/') ?>vendorsAdmin/img/Agent (2).png" alt="Profile"
                                        id="myProfile" class="rounded-circle">, outils de visualisation des commandes
                                    par client
                                    pour les campagnes de promotions </h5>
                            </marquee>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->



                    <div class="row">
                        <?php $count=0;?>
                        <?php if(isset($clients)) foreach($clients as $client):?>
                        <div class="col-xl-4">

                            <div class="card">
                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                    <img style="width:100px;" src="<?=base_url($client->getPhotoProfile()); ?>"
                                        alt="Profile" class="rounded-circle">
                                    <h4 class="text-secondary medium"><?=$client->getPrenom();?> <?=$client->getNom();?>
                                    </h4>
                                    <h5 class="text-danger small"><?=$client->getProfession();?></h5>

                                    <h5 class="text-secondary medium"> <i
                                            class="bx bxs-cart btn btn-primary"><?php if(isset($commandesClient)) echo $commandesClient[$count]?></i>Commandes
                                        Actives </h5>
                                    <?php $count++;?>
                                    <div class="social-links mt-2">
                                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php endforeach;?>

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