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
   <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client')) :?> 
        <?php include_once 'forms/menu.php'?>
  <?php elseif(($this->session->typeUser) && ($this->session->typeUser === 'livraison')) :?>    
        <?php include_once 'forms/AdminLivraison/menu.php'?>
  <?php elseif(($this->session->typeUser) && ($this->session->typeUser === 'maintenance')) :?> 
        <?php include_once 'forms/AdminMaintenance/menu.php'?>
  <?php elseif(($this->session->typeUser) && ($this->session->typeUser === 'commande')) :?> 
        <?php include_once 'forms/AdminClients/menu.php'?>
  <?php endif;?>
  <!-- End Sidebar-->>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Gestion Catalogue</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=site_url('Control/welcome')?>">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Espace de Mise &agrave; jour des articles</h5>
             
              <!-- General Form Elements -->
              <form method="post" id="updatePost" action="<?php if(isset($article)) echo base_url('article/update/').$article[0]->getIdArticle();?>" enctype="multipart/form-data">
                <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Id</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend2"><i class="bx bx-key"></i></span>
                          <input type="text" readonly name="idArticle" value="<?php if(isset($article)) echo $article[0]->getIdArticle();?>" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                
                        </div>
                      </div>
                </div>
                   
                 <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Designation</label>
                    <div class="col-sm-10">                  
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-cart-check-fill"></i></span>
                        <input type="text" name="designation" value="<?php if(isset($article)) echo $article[0]->getDesignation();?>" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                        <div class="invalid-feedback"><?= form_error('designation');?></div>
                      </div>
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Quantite</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-hourglass-split"></i></span>
                          <input type="number" name="quantite" value="<?php if(isset($article)) echo $article[0]->getQuantiteEnVente();?>" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                          <div class="invalid-feedback"><?= form_error('quantite');?></div> 
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Unite&eacute;</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-funnel-fill"></i></span>
                        <input type="text" name="unite" value="<?php if(isset($article)) echo $article[0]->getUnites();?>" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                        <div class="invalid-feedback"><?= form_error('unite');?></div> 
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Prix</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-currency-exchange"></i></span>
                      <input type="text" name="prix" value="<?php if(isset($article)) echo $article[0]->getPrix();?>" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                      <div class="invalid-feedback"><?= form_error('prix');?></div> 
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Devise</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-cash-stack"></i></span>
                      <input type="text" placeholder="CDF" value="<?php if(isset($article)) echo $article[0]->getDevise();?>" name="devise" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                      <div class="invalid-feedback"><?= form_error('devise');?></div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                      <div class="input-group">
                      <div class="col-md-8 col-lg-9">
                        <img style="width: 180px;height:90px;"  src="<?php if(isset($article)) echo base_url($article[0]->getImageArticle())?>" alt="Profile">
                        <div class="pt-2">
                          <div class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"><input type="file" name="image" value="<?php if(isset($article)) echo base_url($article[0]->getImageArticle())?>"/></i>
                              <input type="text" name="imageFile" hidden="hidden" value="<?php if(isset($article)) echo base_url($article[0]->getImageArticle())?>">
                        </div>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                          <?= isset($_SESSION['upload']) ? '<div style="height:50px;" class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'.$_SESSION['upload'].'</div>':'';?>
                        </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date Cr&eacute;ation</label>
                  <div class="col-sm-10">
                     <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-calendar-date-fill"></i></span>
                        <input type="date" name="date" value="<?php if(isset($article)) echo $article[0]->getDateAjout();?>" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                      </div>
                  </div>
                </div>
              
                <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Categorie</label>
                  <div class="col-sm-10">
                  <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-folder-symlink-fill"></i></span>
                      <input type="text"  value="<?php if(isset($article)) echo $article[0]->getCategorie();?>" name="categorie" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                      <div class="invalid-feedback"><?= form_error('devise');?></div>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Rayon</label>
                  <div class="col-sm-10">
                  <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend2"><i class="bx bxl-shopify"></i></span>
                      <input type="text"  value="<?php if(isset($rayonsArt)) echo $rayonsArt;?>" name="rayon" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                      <div class="invalid-feedback"><?= form_error('devise');?></div>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Update</label>
                  <div class="col-sm-10">
                    <button class="btn btn-primary" id="envoi" type="submit"><i class="bx bx-rotate-right"></i>Update</button>
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
              <form>
                
                <div class="row mb-5">
                  <label for="inputText" class="col-sm-2 col-form-label">Id</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-key-fill"></i></span>
                          <input type="text" readonly name="idArticle" value="<?= set_value('idArticle'); ?>" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>             
                        </div>
                      </div> 
                  <label class="col-sm-2 col-form-label">Nom rayon </label>
                  <div class="col-sm-10">
                     <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-basket-fill"></i></span>
                        <input type="text" name="nomRayon" value="<?= set_value('nomRayon'); ?>" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                        <div class="invalid-feedback"><?= form_error('nomRayon');?></div> 
                      </div>
                  </div>
              

                  <label class="col-sm-2 col-form-label">Description </label>
                    <div class="col-sm-10">
                      <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-vector-pen"></i></i></span>
                          <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
                          <div class="invalid-feedback"><?= form_error('nomRayon');?></div> 
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date Cr&eacute;ation</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-calendar-date-fill"></i></span>
                          <input type="date" name="date" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                        </div>
                    </div> 
                    <label class="col-sm-2 col-form-label">Create</label>
                  <div class="col-sm-10">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-plus"></i>Create</button>
                  </div>      
                </div>
              </form><!-- End General Form Elements -->

              <h5 class="card-title">Espace de gestion de categorie</h5>

              <form>
                <div class="row mb-5">
                <label for="inputText" class="col-sm-2 col-form-label">Id</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-key-fill"></i></span>
                          <input type="text" readonly name="idArticle" value="<?= set_value('idArticle'); ?>" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                
                        </div>
                      </div>
                  <label class="col-sm-2 col-form-label">Designation Categorie </label>
                  <div class="col-sm-10">
                     <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2"></label><i class="bi bi-vector-pen"></i></span>
                        <input type="text" name="designation" value="<?= set_value('designation'); ?>" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                        <div class="invalid-feedback"><?= form_error('designation');?></div> 
                      </div>
                  </div>
                  <label class="col-sm-2 col-form-label">Associ&eacute; au rayon</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-folder-symlink-fill"></i></span>
                        <select class="form-select"  aria-label="multiple select example">
                          <option selected>Open this select menu</option>
                          <?php if(isset($rayonsSelect)) foreach($rayonsSelect as $row ) 
                             {
                          ?>                           
                              <option value="<?= $row->getIdRayon();?>"><?= $row->getDesignations();?></option>
                         <?php	} ?>
                        </select>
                    </div>
                  </div>
                </div>

                <div class="row mb-5">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date Cr&eacute;ation</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend2"><i class="bi bi-calendar-date-fill"></i></span>
                          <input type="date" name="date" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                        </div>
                    </div> 
                    <label class="col-sm-2 col-form-label">Create</label>
                  <div class="col-sm-10">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-plus"></i>Create</button>
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