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
                                <h5 class="card-title">Mes Commandes, pour plus details, cliquez sur la touche <i
                                        class="bi bi-eye-fill"></i>Voir</h5>
                            </marquee>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><em class="text-success medium">ID Commande</em></th>

                                <th scope="col"><em class="text-success medium">Produit</em></th>
                                <th scope="col"><em class="text-success medium">Montant</em></th>
                                <th scope="col"><em class="text-success medium">Reduction</em></th>
                                <th scope="col"><em class="text-success medium">Devise</em></th>
                                <th scope="col"><em class="text-success medium">Date</em></th>

                                <th scope="col"><em class="text-success medium">Action</em></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0;$i<10;$i++):?>
                            <tr>
                                <th scope="row"><?=$i;?></th>
                                <td>500 Product sales</td>
                                <td>1500</td>
                                <td>0</td>
                                <td>CDF</td>
                                <td><?=date("D-M-Y");?></td>

                                <td>
                                    <div style="width: min-content;" class="btn-group" role="group"
                                        aria-label="Basic mixed styles example">
                                        <a href="<?= base_url('Order/viewOrder/'.$i)?>"> <button style="height:47px;"
                                                type="button" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-eye-fill"></i>Voir</button></a>

                                    </div>
                                </td>
                            </tr>
                            <?php endfor;?>
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