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
                <i class="bi bi-cart-check-fill"></i><span>Mes Commandes</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a
                        href="<?php if(isset($this->session->id_user)) echo base_url('Commande/getCommandesClient/'.$this->session->id_user)?>">
                        <i class="bi bi-newspaper"></i><span>Commande</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bx bxs-contact"></i><span> Mes Factures</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a
                        href="<?php if(isset($this->session->id_user)) echo base_url('Facture/getFactureClient/'.$this->session->id_user)?>">
                        <i class="bi bi-circle"></i><span>Factures</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components" data-bs-toggle="collapse" href="#">
                <i class="bi bi-credit-card-2-back"></i><span>Mes Paiements</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a
                        href="<?php if(isset($this->session->id_user)) echo base_url('EtatFinancier/TransactionClient/'.$this->session->id_user)?>">
                        <i class="bi bi-circle"></i><span>Etats Financiers</span>
                    </a>
                </li>

                <li>
                    <a
                        href="<?php if(isset($this->session->id_user)) echo base_url('Paiement/getPaimentClient/'.$this->session->id_user)?>">
                        <i class="bi bi-circle"></i><span>Paiement</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms" data-bs-toggle="collapse" href="#">
                <i class="ri-takeaway-fill"></i><span>Mes Livraisons</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="bi bi-circle"></i><span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Statistiques</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="charts-chartjs.html">
                        <i class="bi bi-circle"></i><span>Chart.js</span>
                    </a>
                </li>
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="bi bi-circle"></i><span>ApexCharts</span>
                    </a>
                </li>
                <li>
                    <a href="charts-echarts.html">
                        <i class="bi bi-circle"></i><span>ECharts</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->



        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#form" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear-fill"></i></i><span>Configuration</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="form" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?=site_url('user/profile')?>">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li><!-- End Profile Page Nav -->

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
                    <a class="nav-link collapsed" href="<?=site_url('user/login');?>">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Login</span>
                    </a>
                </li><!-- End Login Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?=site_url('Control/register');?>">
                        <i class="bi bi-card-list"></i>
                        <span>Register</span>
                    </a>
                </li><!-- End Register Page Nav -->




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