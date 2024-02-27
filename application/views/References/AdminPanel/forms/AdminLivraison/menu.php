<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?=site_url('Control/welcome')?>">
                <i class="bx bxs-home"></i>
                <span>Home</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-takeaway-fill"></i><span>Planifier Livraisons</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?=site_url('Meteo/Journalier')?>">
                        <i class="bi bi-circle"></i><span>Meteo du jour</span>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('Livraison/CustomersDelivery')?>">
                        <i class="bi bi-circle"></i><span>Livraisons</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?=site_url('Livraison/Livreurs')?>">
                <i class="ri-team-fill"></i>
                <span>Livreur</span>
            </a>
        </li><!-- End Profile Page Nav -->




        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Statistiques</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('Livraison/States')?>">
                        <i class="bi bi-circle"></i><span>Livraisons</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('Livraison/States')?>">
                        <i class="bi bi-circle"></i><span>Commandes Non Livr&eacute;es</span>
                    </a>
                </li>
                <li>
                    <a href="charts-echarts.html">
                        <i class="bi bi-circle"></i><span>Livraisons Par Villes</span>
                    </a>
                </li>
                <li>
                    <a href="charts-echarts.html">
                        <i class="bi bi-circle"></i><span>Livraisons Par Communes</span>
                    </a>
                </li>
                <li>
                    <a href="charts-echarts.html">
                        <i class="bi bi-circle"></i><span>Livraisons Par Livreurs</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-heading">Pages</li>


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear-fill"></i></i><span>Configuration</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?=site_url('user/profile')?>">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li><!-- End Profile Page Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?=site_url('user/Agents')?>">

                        <i class="bx bxs-user-account"></i>
                        <span>G&eacute;rer Agent</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?=site_url('User/questions');?>">
                        <i class="bi bi-question-circle"></i>
                        <span>F.A.Q</span>
                    </a>
                </li><!-- End F.A.Q Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?=site_url('User/contacts');?>">
                        <i class="bi bi-envelope"></i>
                        <span>Contact</span>
                    </a>
                </li><!-- End Contact Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="pages-register.html">
                        <i class="bi bi-card-list"></i>
                        <span>Register</span>
                    </a>
                </li><!-- End Register Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?=site_url('user/login');?>">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Login</span>
                    </a>
                </li><!-- End Login Page Nav -->

                >
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= site_url('user/userLogout') ?>">
                <i class="bi bi-box-arrow-left"></i>
                <span>Deconnexion</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->