<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'forms/head.php' ?>
    <style>
    .box-container {

        display: flex;
        flex-wrap: wrap;



    }



    .box {

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        color: white;
    }

    #city {
        background-color: rgba(41, 128, 185, 0.75);
    }

    #temp {
        background-color: rgba(43, 78, 101, 0.75);
    }

    #humidity {
        background-color: rgba(52, 152, 219, 0.75);
    }

    #wind {
        background-color: rgba(143, 146, 154, 0.75);
    }
    </style>
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

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12 ">
                    <div class="row">

                        <!-- Sales Card -->

                        <div class="col-xxl-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Meteo du jour</h5>

                                    <!-- Vertical Form -->
                                    <form class="row g-3" id="formualaire" methode="post">
                                        <div class="col-12">
                                            <label for="inputNanme4" class="form-label">Ville</label>
                                            <input type="text" class="form-control" id="inputCity">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Rechercher</button>

                                        </div>
                                    </form><!-- Vertical Form -->

                                </div>
                            </div>

                        </div>


                        <!-- Revenue Card -->
                        <div class="col-xxl-6 col-md-6">
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

                                <div class="card-body" id="city">
                                    <h5 class="card-title">Ville <span>| This Month</span></h5>

                                    <div class="d-flex align-items-center ">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/weather-showers-day.png"
                                                alt="Profile" id="myProfile" class="rounded-circle">
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="city"></h6>
                                            <span class="text-success small pt-1 fw-bold" id="description"></span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->


                        <!-- Sales Card -->
                        <div class="col-xxl-6 col-md-6">
                            <div class="card ">

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

                                <div class="card-body" id="temp">
                                    <h5 class="card-title">Temperature <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-thermometer-half"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="temp"></h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card ">

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

                                <div class="card-body" id="humidity">
                                    <h5 class="card-title">Humidite <span>| This Month</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="ri-temp-cold-line"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="humidity"></h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->
                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card ">

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

                                <div class="card-body" id="wind">
                                    <h5 class="card-title">Vent <span>| This Month</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/weather-storm.png"
                                                alt="Profile" id="myProfile" class="rounded-circle">
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="wind"></h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card ">

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

                                <div class="card-body" id="temp">
                                    <h5 class="card-title">Temperature Minimale <span>| Maximale</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/weather-few-clouds-3.png"
                                                alt="Profile" id="myProfile" class="rounded-circle">
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="tempMin"></h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->



                    </div>
                </div>
            </div>
        </section>


    </main><!-- End #main -->
    <?php include_once 'forms/footer.php' ?>
    <script>
    $(document).ready(function() {
        const APIKEY = '0609f6b96504ef3e8683e2a1ba72a07f';
        //Ecouteur d'evenement pour la recherche de la meteo par Ville
        document.querySelector('#formualaire').addEventListener('submit', function(e) {
            e.preventDefault();
            let ville = document.querySelector('#inputCity').value;
            console.log(ville);
            apiCall(ville);
        });
        let apiCall = function(city) {
            let url =
                `https://api.openweathermap.org/data/2.5/weather?q=${city}&APPID=${APIKEY}&units=metric&lang=fr`;
            fetch(url).then((response) => response.json().then((data) => {
                document.querySelector('.city').innerHTML =
                    '<i class="bi bi-cloud-drizzle-fill"></i>' +
                    data
                    .name;
                document.querySelector('#description').innerHTML = data.weather[0].description;
                document.querySelector('.temp').innerHTML =
                    '<i class="bi bi-thermometer-half"></i>' + data
                    .main.temp + '°';
                document.querySelector('.tempMin').innerHTML = data
                    .main.temp_min + ' ' + data
                    .main.temp_max + '°';
                document.querySelector('.humidity').innerHTML =
                    '<i class="ri-temp-cold-line"></i>' + data
                    .main
                    .humidity + '%';
                document.querySelector('.wind').innerHTML = '<i class="bx bx-wind"></i>' + data
                    .wind
                    .speed +
                    'km/h';


            })).catch((err) => console.log("Erreur " +
                err));
        };

        //Appel par defaut de L'API
        apiCall('Lubumbashi');
    });
    </script>

</body>

</html>