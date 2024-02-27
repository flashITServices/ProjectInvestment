<!DOCTYPE html>
<html>
<head>
	<title>Application </title>
     <!-- Bootstrap -->
     <link href="<?= base_url('assets/') ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/') ?>vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/') ?>build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
      <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
            <h1>Accueil</h1>

            <p>Votre username <?php if(isset($login)) echo $login ;?></p>
            <p>Votre password <?php if(isset($pass)) echo $pass ;?></p>
            <p>Votre id <?php if(isset($iduser)) echo $iduser ;?></p>
            <h3>Your file was successfully uploaded!</h3>

            <ul>
                <?php foreach ($upload_data as $item => $value):?>
                    <li><?php echo $item;?>: <?php echo $value;?></li>
                <?php endforeach; ?>
            </ul>

            <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
            
            

            <a href="<?php echo site_url();?>">acceuil</a>
      </div>
    </div>
    

    	<!-- js -->
	<script src="<?= base_url('assets/') ?>vendors/scripts/core.js"></script>
	<script src="<?= base_url('assets/') ?>vendors/scripts/script.min.js"></script>
	<script src="<?= base_url('assets/') ?>vendors/scripts/process.js"></script>
	<script src="<?= base_url('assets/') ?>vendors/scripts/layout-settings.js"></script>
	<script src="<?= base_url('assets/') ?>src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="<?= base_url('assets/') ?>vendors/scripts/apexcharts-setting.js"></script>
     <!-- jQuery -->
     <script src="<?= base_url('assets/') ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?= base_url('assets/') ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/') ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('assets/') ?>vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= base_url('assets/') ?>vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('assets/') ?>build/js/custom.min.js"></script>

</body>
</html>


