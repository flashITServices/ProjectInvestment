<!DOCTYPE html>
<html>
<head>
	<title>Application</title>
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
        
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Chart Js <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
              
            <h1>Bonjour</h1>
            <p>Votre pseuso est <?php echo $pseudo;?></p>

            <p>Votre email <?php echo $email;?></p>

            <p>
                <?php if($en_ligne): ?>
                    Vous etes en ligne
                <?php else: ?>
                    Vous n'etes pas en ligne
                <?php endif; ?>
            </p>

            <a href="<?php echo site_url();?>">acceuil</a>
            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bar graph <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="barChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Radar <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="canvasRadar"></canvas>
                  </div>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div>
      
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
    <script>
        const valeur= <?php echo json_encode($etat); ?>;
        console.log(valeur);
        var canvasElement=document.getElementById("barChart");   
        const data={
                labels:["Apple","Nasgaq","Microsoft"],
                datasets:[{ 
                    label:"Entreprises cotées",
                    data:valeur,
                    backgroundColor:[
                        "rgba(255,159,64,0.2)", //orange
                        "rgba(255,99,132,0.2)", //red
                        "rgba(54,162,235,0.2)", //blue
                        ],
                    borderColor:[
                        "rgba(255,159,64,1)", //orange
                        "rgba(255,99,132,1)", //red
                        "rgba(54,162,235,1)", //blue
                        ,
                    ],
                    borderWidth: 1,
                },
            ]};

        var config= {
            type:"bar",
            data,
            options:{
                scales:{
                    y:{
                        beginAtZero:true
                    }
                }
            }
        };
        var chartCookie=new Chart(canvasElement,config)

        
            </script> 

</body>
</html>
