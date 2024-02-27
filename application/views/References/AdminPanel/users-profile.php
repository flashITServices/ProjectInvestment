<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'forms/head.php' ?>
</head>

<body  id="profile">

  <!-- ======= Header ======= -->
  <!-- ======= Header ======= -->
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

 

  <main id="main" class="main" >

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=site_url('Control/welcome')?>">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img id="setProfile" src="<?php if(isset($this->session->profile)) echo base_url($this->session->profile)?>" alt="Profile" class="rounded-circle">
              <h2 class="identites">
               <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client')) :?> 
                  <?php if(isset($this->session->firstname)) echo $this->session->firstname.' '.$this->session->lastname;?>
              <?php else: ?>
                <?php if(isset($this->session->nomService)) echo $this->session->nomService;?>
              <?php endif;?>
             </h2>
              <h3 class="profession">
                <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client')) :?> 
                    <?= isset($this->session->profession) ? $this->session->profession : $this->session->company;?>
                <?php endif;?>
            </h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
          <div id="message"></div>
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
            
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Nos 4 supermarch&eacute;s &aacute; Lubumbashi et Kinshasa couvrent une superficie totale d'environ  7,500m2 et proposent aux consommmateurs des produits haut de gamme locaux et d'importation qui r&eacute;pondent $&aacute; tout besoin domestique. Nous vendons plus 20,000 produits import&eacute;s d'UE,d'Afrique du sud, d'Autres pays africains, des USA, d'Amerique latine et d'Asie. Les produits d'alimentations fine vendus dans nos magasins sont achemin&eacute;s toutes les semaines, par avion, d'Europe  </p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8" id="names">
                    <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client')) :?> 
                      <?php if(isset($this->session->firstname)) echo $this->session->firstname.' '.$this->session->lastname;?>
                    <?php else: ?>
                      <?php if(isset($this->session->nomService)) echo $this->session->nomService;?>
                    <?php endif;?>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8" id="profession">
                    <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client')) :?> 
                      <?php if(isset($this->session->profession)) echo $this->session->profession;?>
                    <?php else: ?>
                      <?php if(isset($this->session->company)) echo $this->session->company;?>
                    <?php endif;?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8" id="work">
                    <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client')) :?> 
                      <?php if(isset($this->session->profession)) echo $this->session->profession;?>
                    <?php else: ?>
                      <?php if(isset($this->session->company)) echo $this->session->company;?>
                    <?php endif;?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">RDC</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8" id="adresses"><?php if(isset($this->session->adresses)) echo $this->session->adresses;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8" id="phoneNumber"> <?php if(isset($this->session->telephone)) echo $this->session->telephone;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8" id="emailAdress"><?php if(isset($this->session->email)) echo $this->session->email;?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                 
                  <form method="post" class="updateProfile"  enctype="multipart/form-data" action="<?php if(isset($this->session->id_user)) echo base_url('user/update/').$this->session->id_user;?>">
                        <div class="row mb-3">
                        
                          <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                          <div class="col-md-8 col-lg-9">
                          <img id="newImage" src="<?php if(isset($this->session->profile)) echo base_url($this->session->profile)?>" alt="Profile" class="rounded-circle">
                          <input name="imageFile" hidden type="text" class="form-control" id="image" value="<?php if(isset($this->session->profile)) echo base_url($this->session->profile)?>"> 
                            <div class="pt-2">
                            <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client')) :?>
                              <div class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"><input type="file" name="imageProfile" /></i></div>
                            <?php else : ?>
                              <a class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                            <?php endif;?>  
                              <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                            </div>
                            <?= isset($_SESSION['upload']) ? '<div style="height:50px;" class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'.$_SESSION['upload'].'</div>':'';?>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">idUser</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="idUser" readonly="readonly" type="text" class="form-control" id="fullName" value="<?php if(isset($this->session->id_user)) echo $this->session->id_user;?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label"> FirstName</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="firstname" type="text" class="form-control" id="firstname" value="<?= isset($this->session->firstname) && $this->session->typeUser === 'client' ? $this->session->firstname: $this->session->nomService;?>">

                          </div>
                        </div>
                    <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client')) :?> 
                        <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">LastName</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="lastname" type="text" class="form-control" id="lastname" value="<?= isset($this->session->lastname) ? $this->session->lastname : $this->session->nomService;?>">
                          </div>
                        </div>
                      <?php endif;?>

                        <div class="row mb-3">
                          <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                          <div class="col-md-8 col-lg-9">
                            <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="company" type="text" class="form-control" id="company" value="<?= isset($this->session->profession) && $this->session->typeUser === 'client' ? $this->session->profession : $this->session->company;?>">
                            
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="job" type="text" class="form-control" id="Job" value="<?= isset($this->session->profession) && $this->session->typeUser === 'client' ? $this->session->profession : $this->session->company;?>">
                           
                          </div>
                        </div>

                      <?php if(($this->session->typeUser) && ($this->session->typeUser != 'client')) :?> 
                          <div class="row mb-3">
                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">CodeService</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="codeService" value="<?php if(isset($this->session->codeService)) echo $this->session->codeService;?>" type="text" class="form-control" id="CodeService">
                            
                            </div>
                          </div>
                      <?php endif;?>


                        <div class="row mb-3">
                          <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="country" type="text" class="form-control" id="Country" value="RDC">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="address" type="text" class="form-control" id="Address" value="<?php if(isset($this->session->adresses)) echo $this->session->adresses;?>">
                            
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="Phone" value="<?php if(isset($this->session->telephone)) echo $this->session->telephone;?>">
                            
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="Email" value="<?php if(isset($this->session->email)) echo $this->session->email;?>">
                          
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                          </div>
                        </div>

                        <div class="text-center">
                          <button type="submit" id="loader"  class="btn btn-primary">Save Changes</button>
                        </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include_once 'forms/footer.php' ?>

   <!-- ======= Footer ======= -->
  
</body>

</html>