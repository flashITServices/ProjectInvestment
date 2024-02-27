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
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Carousel</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Components</li>
                    <li class="breadcrumb-item active">Carousel</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <?php if(isset($postes)) foreach($postes as $poste) :?>
                <div style="height:270px;" class="col-lg-3">


                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><i
                                    class="bx bxs-barcode"></i><?=substr($poste->getDesignation(),0,15)?></h4>

                            <!-- Slides with indicators -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img style="margin-left:40px;height:100px;"
                                            src="<?=base_url( $poste->getImageArticle()); ?>" class="d-block w-50"
                                            alt="...">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <div class="progress mt-3">
                                                    <?php $percent=$poste->getQuantiteEnVente()/10;?>
                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                        role="progressbar" style="width: <?=$percent?>%"
                                                        aria-valuenow="<?=$percent?>" aria-valuemin="0"
                                                        aria-valuemax="500">
                                                        <?=round($percent=$poste->getQuantiteEnVente()/100,2);?>%</div>
                                                </div>

                                                <span
                                                    class="badge bg-light btn btn-outline-secondary text-dark small"><i
                                                        class="bi bi-cart-check-fill"></i><?=$poste->getQuantiteEnVente()?><?=$poste->getUnites()?>
                                                    <?=$poste->getPrix()?> <?=$poste->getDevise()?>

                                                </span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div><!-- End Slides with indicators -->

                        </div>
                    </div>


                </div>
                <?php endforeach;?>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include_once 'forms/footer.php' ?>
    <!-- ======= Footer ======= -->
</body>

</html>