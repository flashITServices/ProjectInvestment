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
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cart-check-fill"></i><span>Commandes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('Commande/getCommandes')?>">
                        <i class="bi bi-newspaper"></i><span>Commande</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('Paiement/getPaiements')?>">
                        <i class="bi bi-circle"></i><span>Paiement</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#client-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people-fill"></i><span>Client</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="client-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('Client/getClients')?>">
                        <i class="bi bi-users"></i><span>Listes Clients</span>
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
            <a class="nav-link collapsed" data-bs-target="#components-fact" data-bs-toggle="collapse" href="#">
                <i class="bx bxs-contact"></i><span>Facturation</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-fact" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('Facture/getFacture')?>">
                        <i class="bi bi-circle"></i><span>Factures</span>
                    </a>
                </li>

                <li>
                    <a href="<?= site_url('Facture/addFacture')?>">
                        <i class="bi bi-circle"></i><span>Nouvelle Facture</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gift-fill"></i></i><span>Promotions </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bag-check-fill"></i><span>Marche</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?=site_url('Article/ProduitsMarche')?>">
                        <i class="bi bi-circle"></i><span>Nos Produits</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('Overall/States')?>">
                        <i class="bi bi-circle"></i><span>Evolution Marche</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Statistiques</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('Commandes/States')?>">
                        <i class="bi bi-circle"></i><span>Commandes</span>
                    </a>
                </li>

                <li>
                    <a href="<?= site_url('Overall/States')?>">
                        <i class="bi bi-circle"></i><span>Generales </span>
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
                    <a class="nav-link collapsed" href="<?=site_url('Control/register');?>">
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