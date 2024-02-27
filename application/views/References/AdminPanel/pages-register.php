<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HyperPsaro</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/') ?>vendors/img/6205235.png" rel="icon">
    <link href="<?= base_url('assets/') ?>vendors/img/6205235.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/') ?>vendorsAdmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendorsAdmin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendorsAdmin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendorsAdmin/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendorsAdmin/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendorsAdmin/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendorsAdmin/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/') ?>vendorsAdmin/css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendorsAdmin/css/background.css" rel="stylesheet">
    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="wrapper options">
                            <header class="options">
                                <div style="width:300px;" class="logo">
                                    <img style="height:max-content;width:max-content;" alt="">
                                </div>
                                <nav>
                                    <ul>
                                        <li><a href="#"><em>SuperMarket</em></a></li>
                                        <li><a href="#"><em>Factories</em></a></li>
                                        <li><a href="<?=site_url('site/acceuil');?>"><em>Product</em></a></li>
                                        <li><a href="#"><em>Support</em></a></li>
                                        <li><a href="<?=site_url('user/login');?>" class="btn"><em>Sign In</em></a></li>
                                    </ul>
                                </nav>

                            </header>

                        </div><!-- End Logo -->
                        <div class="content">
                            <div class="text">
                                <div class="img">
                                    <div class="social-icone">
                                        <img src="<?= base_url('assets/') ?>vendorsAdmin/img/174861.png" alt="">
                                        <img src="<?= base_url('assets/') ?>vendorsAdmin/img/185977.png" alt="">
                                        <img src="<?= base_url('assets/') ?>vendorsAdmin/img/4494475.png" alt="">
                                        <img src="<?= base_url('assets/') ?>vendorsAdmin/img/4494477.png" alt="">
                                        <img src="<?= base_url('assets/') ?>vendorsAdmin/img/4494497.png" alt="">
                                    </div>
                                    <img class="email-icon" src="<?= base_url('assets/') ?>vendorsAdmin/img/e-mail.png"
                                        alt="">
                                </div>
                            </div>
                            <div class="img">
                                <div class="social-icone">
                                    <img src="<?= base_url('assets/') ?>vendorsAdmin/img/174861.png" alt="">
                                    <img src="<?= base_url('assets/') ?>vendorsAdmin/img/185977.png" alt="">
                                    <img src="<?= base_url('assets/') ?>vendorsAdmin/img/4494475.png" alt="">
                                    <img src="<?= base_url('assets/') ?>vendorsAdmin/img/4494477.png" alt="">
                                    <img src="<?= base_url('assets/') ?>vendorsAdmin/img/4494497.png" alt="">
                                </div>
                                <img class="email-icon" src="<?= base_url('assets/') ?>vendorsAdmin/img/e-mail.png"
                                    alt="">
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div id="form"
                            class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3 ">

                                <div class="card-body">
                                    <div class="pt-4 pb-2">

                                        <h5 class="card-title text-center pb-0 fs-4"> <img style="width: 450px;"
                                                src="<?= base_url('assets/') ?>vendorsAdmin/img/logo.svg" alt=""></h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                        <p class="resultat"></p>
                                    </div>

                                    <form class="row g-3 needs-validation" enctype="multipart/form-data" id="createUser"
                                        action="<?=site_url('Control/CreateAccount')?>" method="post"
                                        style="width: 700px;" novalidate>
                                        <div class="col-4">
                                            <label for="yourUsername" class="form-label">Firstname</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-person-check"></i></span>
                                                <input type="text" name="firstname"
                                                    value="<?php echo set_value('firstname'); ?>" class="form-control"
                                                    id="yourUsername" required>
                                                <div class="invalid"><?= form_error('firstname');?></div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label for="yourUsername" class="form-label">Lastname</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-person-check"></i></span>
                                                <input type="text" name="lastname"
                                                    value="<?php echo set_value('lastname'); ?>" class="form-control"
                                                    id="yourUsername" required>
                                                <div class="invalid"><?= form_error('lastname');?></div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label for="yourUsername" class="form-label">Birthday</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-calendar-date-fill"></i></span>
                                                <input type="date" name="birthday" class="form-control">
                                                <div class="invalid-feedback">Please choose a date.</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="yourUsername" class="form-label">Gender</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-people-fill"></i></span>
                                                <select name="gender" class="form-select"
                                                    aria-label="Default select example">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label for="yourUsername" class="form-label">Phone</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-telephone-x-fill"></i></span>
                                                <input type="text" name="phone"
                                                    value="<?php echo set_value('phone'); ?>" class="form-control"
                                                    id="yourUsername" required>
                                                <div class="invalid"><?= form_error('phone');?></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-at"></i></span>
                                                <input type="text" name="username"
                                                    value="<?php echo set_value('username'); ?>" class="form-control"
                                                    id="yourUsername" required>
                                                <div class="invalid"><?= form_error('username');?></div>
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <label for="yourUsername" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-envelope-fill"></i></span>
                                                <input type="email" name="email"
                                                    value="<?php echo set_value('email'); ?>" class="form-control"
                                                    id="yourEmail" required>
                                                <div class="invalid"><?= form_error('email');?>

                                                </div>
                                                <small id="valideEmail"></small>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="yourUsername" class="form-label">Password</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" onclick="hideshow()"
                                                    id="inputGroupPrepend"><i class="bi bi-eye-slash-fill"></i></span>
                                                <input type="password" id="password1"
                                                    value="<?php echo set_value('password'); ?>" name="password"
                                                    class="form-control" id="yourPassword" required>
                                                <span style="position: absolute;right:15px;top:7px;"
                                                    onclick="hideshow()">
                                                    <i id="slash" class="fa fa-eye-slash"></i>
                                                    <i id="eye" class="fa fa-eye"></i>
                                                </span>
                                                <div class="invalid"><?= form_error('password');?></div>
                                                <small id="passWord"></small>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <label for="yourUsername" class="form-label">Profile</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-file-person-fill"></i></span>
                                                <input class="form-control" name="profile"
                                                    value="<?php echo set_value('profile'); ?>" type="file" id="">
                                                <?= isset($_SESSION['upload']) ? '<div style="height:50px;" class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'.$_SESSION['upload'].'</div>':'';?>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="yourUsername" class="form-label">City</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="city" value="<?php echo set_value('city'); ?>"
                                                    class="form-control" id="inputCity">
                                                <div class="invalid"><?= form_error('city');?></div>
                                            </div>
                                        </div>
                                        <div class="col-4">



                                            <label for="yourUsername" class="form-label">State</label>
                                            <select name="state" id="inputState" class="form-select">
                                                <option selected value="">Kinshasa</option>
                                                <option selected value="">Kinshasa</option>
                                                <option value="Haut-Katanga">Haut-Katanga</option>
                                                <option value="Lualaba">Lualaba</option>
                                                <option value="Nord-kivu">Nord-kivu</option>
                                                <option value="Sud-Kivu">Sud-Kivu</option>
                                                <option value="Ituri">Ituri</option>
                                                <option value="Maidombe">Maidombe</option>
                                                <option value="Maniema">Maniema</option>
                                                <option value="Gbadolite">Gbadolite</option>
                                                <option value="Mbandaka">Mbandaka</option>
                                                <option value="Bas-Uele">Bas-Uele</option>
                                                <option value="Haut-Uele">Haut-Uele</option>
                                                <option value="Kasai-central">Kasai-central</option>
                                                <option value="Kasai-oriental">Kasai-oriental</option>
                                                <option value="Lomami">Lomami</option>
                                                <option value="Nord-ubangi">Nord-ubangi</option>
                                                <option value="Sud-Ubangi">Sud-Ubangi</option>
                                                <option value="Sankuru">Sankuru</option>
                                                <option value="Equateur">Equateur</option>
                                                <option value="Tanganyka">Tanganyka</option>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label for="yourUsername" class="form-label">Job</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-briefcase-fill"></i></span>
                                                <select name="work" class="form-select"
                                                    aria-label="Default select example">
                                                    <option value="Customer">Customer</option>
                                                    <option value="Provider">Provider</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Sales Director">Sales Director</option>
                                                    <option value="Seller">Seller</option>
                                                    <option value="Businessman">Businessman</option>
                                                    <option value="Doctor">Doctor</option>
                                                    <option value="Hair Stylist">Hair Stylist</option>
                                                    <option value="Transport Agent">Transport Agent</option>
                                                    <option value="Unemployed">Unemployed</option>
                                                    <option value="Engineer">Engineer</option>
                                                    <option value="Professor">Professor</option>
                                                    <option value="Technician">Technician</option>
                                                    <option value="Real State Agent">Real State Agent</option>
                                                    <option value="Public Function Agent">Public Function Agent
                                                    </option>
                                                    <option value="Marketing Agent">Marketing Agent</option>
                                                    <option value="Marketing Agent">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="yourUsername" class="form-label">Adresse</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-geo-alt-fill"></i></span>
                                                <input type="text" name="adresse" placeholder="1234, Street"
                                                    class="form-control" id="yourUsername" required>
                                                <div class="invalid"><?= form_error('adresse');?></div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept
                                                    the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-secondary w-100 " id="envoi" type="submit"><i
                                                    class="bi bi-person-plus-fill"></i>Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="<?=site_url('user/login');?>">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>


        </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include_once 'forms/footer.php' ?>
    <!-- ======= Footer ======= -->

    <script>
    function hideshow() {
        var password = document.getElementById("password1");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");

        if (password.type === 'password') {
            password.type = "text";
            slash.style.display = "block";
            eye.style.display = "none";
        } else {
            password.type = "password";
            slash.style.display = "none";
            eye.style.display = "block";
        }

    }



    let form = document.querySelector('#createUser')
    form.email.addEventListener('input', function() {
        validEmail(this);
    });

    form.password.addEventListener('input', function() {
        validPassword(this);

    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (validEmail(form.email) && validPassword(form.password)) {
            form.submit();
        }
    });

    const validPassword = function(inputPassword) {

        let msg;
        let valid = false;
        let small = document.querySelector('#passWord');
        //AU moins 1 maj 
        if (inputPassword.value.length < 3) {
            msg = 'Le mot de passe doit contenir au moins 3 caracteres';
        } else if (!/[A-Z]/.test(inputPassword.value)) {
            msg = 'Le mot de passe doit contenir au moins 1 majuscule';
        } else if (!/[a-z]/.test(inputPassword.value)) {
            msg = 'Le mot de passe doit contenir au moins 1 minuscule';

        } else if (!/[0-9]/.test(inputPassword.value)) {
            msg = 'Le mot de passe doit contenir au moins 1 chiffre';
        } else {
            msg = 'Le mot de passe est Valide';
            valid = true;
        }

        if (valid) {
            small.innerHTML = 'Mot de passe Valide';
            small.classList.remove('text-danger');
            small.classList.add('text-success');
            return true;
        } else {
            small.innerHTML = msg;
            small.classList.remove('text-success');
            small.classList.add('text-danger');
            return false;
        }
    }
    const validEmail = function(inputMail) {
        let emailRegExp = new RegExp('^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'g');
        let testEmail = emailRegExp.test(inputMail.value);
        let small = document.querySelector('#valideEmail');
        if (testEmail) {

            small.innerHTML = 'Adresse Valide';
            small.classList.remove('text-danger');
            small.classList.add('text-success');
            return true;
        } else {
            small.innerHTML = 'Adresse Non Valide';
            small.classList.remove('text-success');
            small.classList.add('text-danger');
            return false;
        }
    };
    //Création des expression reguliere pour la validation d 'email
    </script>
</body>

</html>