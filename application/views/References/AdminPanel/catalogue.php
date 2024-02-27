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
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=site_url('Control/welcome')?>">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">

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

                                <div class="card-body">
                                    <h5 class="card-title">Sales <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card revenue-card">

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

                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>$3,264</h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->


                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">

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

                                <div class="card-body">
                                    <h5 class="card-title">Provider Orders <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                    </div><!-- End Revenue Card -->
                </div>
                <div class="row">

                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Gestion des articles du Catalogue</h5>


                                <?php if($this->session->flashdata('status')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    <?=$this->session->flashdata('status');?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php endif;?>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalDialogScrollable">
                                    <i class="bx bxs-plus-square"></i> Cr&eacutee Article
                                </button>

                                <div class="modal fade" id="modalDialogScrollable" tabindex="-1" style="display: none;"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Creation Article</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Ajout Article</h5>
                                                        <p><code>Formulaire de creation des articles</code> </p>
                                                        <form class="row g-3" method="post" id="createPost"
                                                            action="<?=site_url('article/create')?>"
                                                            enctype="multipart/form-data">
                                                            <div class="col-12">
                                                                <label for="validationDefaultUsername"
                                                                    class="form-label">Designation</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-cart-check-fill"></i></span>
                                                                    <input type="text" name="designation"
                                                                        value="<?= set_value('designation'); ?>"
                                                                        class="form-control"
                                                                        id="validationDefaultUsername"
                                                                        aria-describedby="inputGroupPrepend2" required>
                                                                    <div class="invalid-feedback">
                                                                        <?= form_error('designation');?></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="validationDefaultUsername"
                                                                    class="form-label">Quantite</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-hourglass-split"></i></span>
                                                                    <input type="number" name="quantite"
                                                                        value="<?= set_value('quantite'); ?>"
                                                                        class="form-control"
                                                                        id="validationDefaultUsername"
                                                                        aria-describedby="inputGroupPrepend2" required>
                                                                    <div class="invalid-feedback">
                                                                        <?= form_error('designation');?></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="validationDefaultUsername"
                                                                    class="form-label">Unite&eacute;</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-funnel-fill"></i></span>
                                                                    <input type="text" name="unite"
                                                                        value="<?= set_value('unite'); ?>"
                                                                        class="form-control"
                                                                        id="validationDefaultUsername"
                                                                        aria-describedby="inputGroupPrepend2" required>
                                                                    <div class="invalid-feedback">
                                                                        <?= form_error('unite');?></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="validationDefaultUsername"
                                                                    class="form-label">Prix</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-currency-exchange"></i></span>
                                                                    <input type="text" name="prix"
                                                                        value="<?= set_value('prix'); ?>"
                                                                        class="form-control"
                                                                        id="validationDefaultUsername"
                                                                        aria-describedby="inputGroupPrepend2" required>
                                                                    <div class="invalid-feedback">
                                                                        <?= form_error('prix');?></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="validationDefaultUsername"
                                                                    class="form-label">Devise</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-cash-stack"></i></span>
                                                                    <input type="text" placeholder="CDF"
                                                                        value="<?= set_value('devise'); ?>"
                                                                        name="devise" class="form-control"
                                                                        id="validationDefaultUsername"
                                                                        aria-describedby="inputGroupPrepend2" required>
                                                                    <div class="invalid-feedback">
                                                                        <?= form_error('devise');?></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="validationDefaultUsername"
                                                                    class="form-label">Date Creation</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-calendar-date-fill"></i></span>
                                                                    <input type="date" name="date" class="form-control"
                                                                        id="validationDefaultUsername"
                                                                        aria-describedby="inputGroupPrepend2" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="validationDefault04"
                                                                    class="form-label">Categorie</label>
                                                                <select class="form-select" name="categorie"
                                                                    id="validationDefault04" required>
                                                                    <option selected disabled value="">Choose...
                                                                    </option>
                                                                    <?php if(isset($categories)) foreach($categories as $row ) 
                                                      {
                                                    ?>
                                                                    <option value="<?= $row->getDesignation();?>">
                                                                        <?= $row->getDesignation();?></option>
                                                                    <?php	} ?>
                                                                </select>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="validationDefault04"
                                                                    class="form-label">Rayon</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-folder-symlink-fill"></i></span>
                                                                    <select class="form-select" name="rayon"
                                                                        id="validationDefault04" required>
                                                                        <option selected disabled value="">Choose...
                                                                        </option>
                                                                        <?php if(isset($rayonsArticle)) foreach($rayonsArticle as $row ) 
                                                      {
                                                    ?>
                                                                        <option value="<?= $row->getIdRayon();?>">
                                                                            <?= $row->getDesignations();?></option>
                                                                        <?php	} ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="validationDefaultUsername"
                                                                    class="form-label">Image</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-file-image"></i></span>
                                                                    <input type="file" name="image" class="form-control"
                                                                        id="validationDefaultUsername"
                                                                        aria-describedby="inputGroupPrepend2" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="invalidCheck2" required>
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        Agree to terms and conditions
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button id="envoi" class="btn btn-primary"
                                                                    type="submit"><i
                                                                        class="bi bi-plus"></i>Create</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Table with stripped rows -->
                                <table class="table datatable" id="catalogue">

                                    <thead>
                                        <tr>
                                            <th scope="col">Image</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($articles))  foreach( $articles as $row ) 
                            
                                {
                            ?>

                                        <tr>
                                            <th scope="row" class="post-item clearfix"><a href="#"><img width="40px;"
                                                        src="<?=base_url( $row->imageArticle); ?>" alt=""></a></th>
                                            <td><span
                                                    class="text-secondary fw-bold"><?= substr($row->designation,0,20);?></span>
                                            </td>
                                            <td><span class="text-secondary fw-bold"><?= $row->categorie;?></span></td>
                                            <td class="fw-bold"><span
                                                    class="text-secondary fw-bold"><?= $row->quantiteEnVente;?>
                            </div> <span class="text-secondary"><?= $row->unites;?></span></td>
                            <td class="fw-bold"><span class="text-secondary fw-bold"><?= $row->prix;?>
                                    <?= $row->devise;?></span></td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td class="fw-bold">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="<?=base_url('article/edit/'.$row->idArticle)?>"><button type="button"
                                            class="btn btn-outline-info badge bg-primary btn-sm"><i
                                                class="bx bxs-pencil">Edit</i></button></a>
                                    <button type="button" value="<?= $row->idArticle;?>"
                                        class="btn btn-outline-danger badge bg-danger btn-sm confirm-delete"><i
                                            class="ri-delete-bin-2-fill">Delete</i></button>
                                </div>

                            </td>
                            </tr>
                            <?php	}
                      
                      ?>
                            </tbody>
                            </table>
                            <!-- End Table with stripped rows -->


                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main><!-- End #main -->


    <?php include_once 'forms/footer.php' ?>

</body>

</html>