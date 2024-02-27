<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Hyper Psaro</title>
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

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main
        style="background-image : url(<?php echo base_url('assets/vendorsAdmin/img/back2.webp')?>),url(<?php echo base_url('assets/vendorsAdmin/img/back3.webp')?>),url(<?php echo base_url('assets/vendorsAdmin/img/back.webp')?>); background-repeat:no-repeat,no-repeat,no-repeat; background-size:500px,500px,500px;background-position:bottom left,top left,top right;">
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">


                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="<?= base_url('assets/') ?>vendorsAdmin/img/logo.svg" alt="">
                                    <span class="d-none d-lg-block"></span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>



                                    <form method="post" action="<?=site_url('user/home')?>"
                                        class="row g-3 needs-validation" novalidate>
                                        <?= isset($_SESSION['error']) ? '<div style="height:50px;" class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'.$_SESSION['error'].'</div>':validation_errors();?>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-at"></i></span>
                                                <input type="text" name="username"
                                                    value="<?php echo set_value('username'); ?>" class="form-control"
                                                    id="yourUsername" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Password</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"
                                                    onclick="hideshow()"><i class="bi bi-eye-slash-fill"></i></span>
                                                <input type="password" name="password" id="password1"
                                                    value="<?php echo set_value('password'); ?>" class="form-control"
                                                    id="yourPassword" required>
                                                <span style="position: absolute;right:15px;top:7px;"
                                                    onclick="hideshow()">
                                                    <i id="slash" class="fa fa-eye-slash"></i>
                                                    <i id="eye" class="fa fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-6">
                                            <button id="googleOAUTH" class="btn btn-primary w-100" type="button"><i
                                                    class="bi bi-google"></i>oogle</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="<?=site_url('Control/register');?>">Create an account</a></p>
                                        </div>
                                    </form>


                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="https://bootstrapmade.com/">MarsFuture</a>
                            </div>

                        </div>
                    </div>

                </div>

            </section>




        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendorsAdmin/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/') ?>vendorsAdmin/js/main.js"></script>

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
    var googleOAUTH = document.getElementById("googleOAUTH");
    googleOAUTH.addEventListener("click", function() {
        let oauthEndpoint = "https://accounts.google.com/o/oauth2/v2/auth"
        let form = document.createElement("form");
        form.setAttribute("method", "GET");
        form.setAttribute("action", oauthEndpoint);
        let params = {
            "client_id": "842494802300-6h86mntj0uq590g9s5kvr54f9f0jp8n2.apps.googleusercontent.com",
            "redirect_uri": "http://localhost/HPsaroWebSite/index.php/Control/welcome.php",
            "response_type": "code",
            "scope": "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email",
            "include_granted_scopes": "true",
            "state": "state_parameter_passthrough_value",

        };
        for (let p in params) {
            let input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", p);
            input.setAttribute("value", params[p]);
            form.appendChild(input);
        }
        document.body.appendChild(form);
        <?php
            $newdata = array(
						
							'typeUser'	  => 'client',		
							'logged_in' => TRUE,
							);
              	$this->session->set_userdata($newdata);	
        ?>
        form.submit();
    });
    </script>
</body>

</html>