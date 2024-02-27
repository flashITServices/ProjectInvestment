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
            <h1>Gestion Catalogue</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:history.back()">Home</a></li>
                    <li class="breadcrumb-item">Catalogue</li>
                    <li class="breadcrumb-item active">G&eacute;rer Catalogue</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Espace de Cr&eacute;ation jour des articles</h5>

                            <!-- General Form Elements -->
                            <form method="post" id="newArticle" action="<?=site_url('article/create')?>"
                                enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Designation</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-cart-check-fill"></i></span>
                                            <input type="text" name="designation" placeholder="Désignation Article"
                                                value="<?= set_value('designation'); ?>" class="form-control"
                                                id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                                required>
                                            <div class="invalid-feedback"><?= form_error('designation');?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Quantite</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-hourglass-split"></i></span>
                                            <input type="number" placeholder="quantité disponible" name="quantite"
                                                value="<?= set_value('quantite'); ?>" class="form-control"
                                                id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                                required>
                                            <div class="invalid-feedback"><?= form_error('quantite');?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Unite&eacute;</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-funnel-fill"></i></span>
                                            <input type="text" placeholder="Unité Article" name="unite"
                                                value="<?= set_value('unite'); ?>" class="form-control"
                                                id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                                required>
                                            <div class="invalid-feedback"><?= form_error('unite');?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Prix</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-currency-exchange"></i></span>
                                            <input type="text" placeholder="Prix Article" name="prix"
                                                value="<?= set_value('prix'); ?>" class="form-control"
                                                id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                                required>
                                            <div class="invalid-feedback"><?= form_error('prix');?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Devise</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-cash-stack"></i></span>
                                            <input type="text" placeholder="CDF" value="<?= set_value('devise'); ?>"
                                                name="devise" class="form-control" id="validationDefaultUsername"
                                                aria-describedby="inputGroupPrepend2" required>
                                            <div class="invalid-feedback"><?= form_error('devise');?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-file-image"></i></span>
                                            <input type="file" name="image" class="form-control"
                                                id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                                required>
                                            <?= isset($_SESSION['upload']) ? '<div style="height:50px;" class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'.$_SESSION['upload'].'</div>':'';?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Date Cr&eacute;ation</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-calendar-date-fill"></i></span>
                                            <input type="date" name="date" class="form-control"
                                                id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Categorie</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="categorie"
                                            aria-label="Default select example">
                                            <option selected disabled value="">Choose...</option>
                                            <?php if(isset($Categorie)) foreach($Categorie as $row ) 
                              {
                            ?>
                                            <option value="<?= $row->getIdCategorie();?>"><?= $row->getDesignation();?>
                                            </option>
                                            <?php	} ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Rayon</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-folder-symlink-fill"></i></span>
                                            <select class="form-select" aria-label="multiple select example">
                                                <option selected>Open this select menu</option>
                                                <?php if(isset($Rayon)) foreach($Rayon as $row ) 
                             {
                          ?>
                                                <option value="<?= $row->getIdRayon();?>"><?= $row->getDesignations();?>
                                                </option>
                                                <?php	} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Create</label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-primary" id="envoiRayon" type="submit"><i
                                                class="bi bi-plus"></i>Create</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Espace de gestion de rayon</h5>

                            <!-- Advanced Form Elements -->
                            <form method="post" id="newRayon" action="<?=site_url('rayon/create')?>">
                                <div class="row mb-5">
                                    <label class="col-sm-2 col-form-label">Nom rayon </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-basket-fill"></i></span>
                                            <input type="text" name="nomRayon" placeholder="nom du rayon"
                                                value="<?= set_value('nomRayon'); ?>" class="form-control"
                                                id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                                required>
                                            <div class="invalid-feedback"><?= form_error('nomRayon');?></div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Description </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-vector-pen"></i></span>
                                            <textarea class="form-control" placeholder="La déscription du rayon"
                                                name="description" aria-label="With textarea"></textarea>
                                            <div class="invalid-feedback"><?= form_error('description');?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Date Cr&eacute;ation</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-calendar-date-fill"></i></span>
                                            <input type="date" name="date" class="form-control"
                                                id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                                required>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Create</label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-primary" id="envoi" type="submit"><i
                                                class="bi bi-plus"></i>Create</button>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->

                            <h5 class="card-title">Espace de gestion de categorie</h5>

                            <form method="post" id="newCategorie" action="<?=site_url('categorie/create')?>">
                                <div class="row mb-5">
                                    <label class="col-sm-2 col-form-label">Designation Categorie </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-funnel-fill"></i></span>
                                            <input type="text" name="designation" placeholder="Désignation Categorie"
                                                value="<?= set_value('designation'); ?>" class="form-control"
                                                id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                                required>
                                            <div class="invalid-feedback"><?= form_error('designation');?></div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Associ&eacute; au rayon</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-folder-symlink-fill"></i></span>
                                            <select name="idRayon" class="form-select"
                                                aria-label="multiple select example">
                                                <option selected>Open this select menu</option>
                                                <?php if(isset($Rayon)) foreach($Rayon as $row ) 
                              {
                            ?>
                                                <option value="<?= $row->getIdRayon();?>"><?= $row->getDesignations();?>
                                                </option>
                                                <?php	} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Date Cr&eacute;ation</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2"><i
                                                    class="bi bi-calendar-date-fill"></i></span>
                                            <input type="date" name="date" class="form-control"
                                                id="validationDefaultUsername" aria-describedby="inputGroupPrepend2"
                                                required>
                                        </div>
                                    </div>

                                </div>
                                <label class="col-sm-2 col-form-label">Create</label>
                                <div class="col-sm-10">
                                    <button class="btn btn-primary" id="envoiCategorie" type="submit"><i
                                            class="bi bi-plus"></i>Create</button>
                                </div>
                        </div>
                        </form><!-- End General Form Elements -->

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