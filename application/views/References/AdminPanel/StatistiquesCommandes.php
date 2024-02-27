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
            <h1>Chart.js</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=site_url('Control/welcome')?>">Home</a></li>
                    <li class="breadcrumb-item">Statistiques</li>
                    <li class="breadcrumb-item active">Statistiques Commandes</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <p>Chart.JS Examples. You can check the <a href="https://www.chartjs.org/docs/latest/samples/"
                target="_blank">official website</a> for more examples.</p>

        <section class="section">
            <div class="row">
                <!-- Reports -->
                <div class="col-lg-12">
                    <div class="card">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                            <h5 class="card-title">Reports <span>/Today</span></h5>

                            <!-- Line Chart -->
                            <div id="reportsChart"></div>

                            <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                    series: [{
                                        name: 'Sales',
                                        data: <?= json_encode($ventes) ?>,
                                    }, {
                                        name: 'Revenue',
                                        data: <?= json_encode($benefices) ?>
                                    }, {
                                        name: 'Expenses',
                                        data: <?= json_encode($charges) ?>
                                    }],
                                    chart: {
                                        height: 350,
                                        type: 'area',
                                        toolbar: {
                                            show: false
                                        },
                                    },
                                    markers: {
                                        size: 4
                                    },
                                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                    fill: {
                                        type: "gradient",
                                        gradient: {
                                            shadeIntensity: 1,
                                            opacityFrom: 0.3,
                                            opacityTo: 0.4,
                                            stops: [0, 90, 100]
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        curve: 'smooth',
                                        width: 2
                                    },
                                    xaxis: {
                                        type: 'datetime',
                                        categories: <?= json_encode($date) ?>
                                    },
                                    tooltip: {
                                        x: {
                                            format: 'dd/MM/yy HH:mm'
                                        },
                                    }
                                }).render();
                            });
                            </script>
                            <!-- End Line Chart -->

                        </div>

                    </div>
                </div><!-- End Reports -->



                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Commande selon les clients<img
                                    src="<?= base_url('assets/') ?>vendorsAdmin/img/Agent (2).png"
                                    class="rounded-circle" alt="..."> </h5>

                            <!-- Line Chart -->
                            <canvas id="lineChart" style="max-height: 400px;"></canvas>
                            <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#lineChart'), {
                                    type: 'line',
                                    data: {
                                        labels: <?= json_encode($labels) ?>,

                                        datasets: [{
                                            label: 'Line Chart',
                                            data: <?= json_encode($sommes) ?>,
                                            fill: false,
                                            borderColor: 'rgb(75, 192, 192)',
                                            tension: 0.1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                            </script>
                            <!-- End Line CHart -->

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Statiques des ventes<img
                                    src="<?= base_url('assets/') ?>vendorsAdmin/img/office-chart-area-stacked.png"
                                    class="rounded-circle" alt="..."></h5>

                            <!-- Column Chart -->
                            <div id="columnChart"></div>

                            <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#columnChart"), {
                                    series: [{
                                        name: 'Net Profit',
                                        data: <?= json_encode($benefices) ?>
                                    }, {
                                        name: 'Revenue',
                                        data: <?= json_encode($ventes) ?>
                                    }, {
                                        name: 'Free Cash Flow',
                                        data: <?= json_encode($charges) ?>
                                    }],
                                    chart: {
                                        type: 'bar',
                                        height: 350
                                    },
                                    plotOptions: {
                                        bar: {
                                            horizontal: false,
                                            columnWidth: '55%',
                                            endingShape: 'rounded'
                                        },
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        show: true,
                                        width: 2,
                                        colors: ['transparent']
                                    },
                                    xaxis: {
                                        categories: <?= json_encode($date) ?>,
                                    },
                                    yaxis: {
                                        title: {
                                            text: '$ (thousands)'
                                        }
                                    },
                                    fill: {
                                        opacity: 1
                                    },
                                    tooltip: {
                                        y: {
                                            formatter: function(val) {
                                                return "$ " + val + " thousands"
                                            }
                                        }
                                    }
                                }).render();
                            });
                            </script>
                            <!-- End Column Chart -->

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Commandes <img
                                    src="<?= base_url('assets/') ?>vendorsAdmin/img/office-chart-bar-percentage.png"
                                    class="rounded-circle" alt="..."></h5>

                            <!-- Bar Chart -->
                            <div id="barChart" style="min-height: 400px;" class="echart"></div>

                            <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#barChart")).setOption({
                                    xAxis: {
                                        type: 'category',
                                        data: <?= json_encode($etat) ?>
                                    },
                                    yAxis: {
                                        type: 'value'
                                    },
                                    series: [{
                                        data: <?= json_encode($analyse) ?>,
                                        type: 'bar'
                                    }]
                                });
                            });
                            </script>
                            <!-- End Bar Chart -->

                        </div>
                    </div>
                </div>



                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Commandes</h5>

                            <!-- Pie Chart -->
                            <div id="pieChart"></div>

                            <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#pieChart"), {
                                    series: <?= json_encode($analyse) ?>,
                                    chart: {
                                        height: 350,
                                        type: 'pie',
                                        toolbar: {
                                            show: true
                                        }
                                    },
                                    labels: <?= json_encode($etat) ?>
                                }).render();
                            });
                            </script>
                            <!-- End Pie Chart -->

                        </div>
                    </div>
                </div>



            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- ======= Footer ======= -->
    <?php include_once 'forms/footer.php' ?>
    <!-- ======= Footer ======= -->
</body>

</html>