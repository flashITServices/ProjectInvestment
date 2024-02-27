<?php
  	$keys=[];
	if(isset($_SESSION['panier'])){
		$keys=array_keys($_SESSION['panier']);
	}
	$products;
	if(!empty($keys)){
		$products= $this->db->select('*')->from('Article')->where_in('idArticle',$keys)->get()->result();
	}
	$prixTotal=0;
	$subTotal=0;
	$count=0;
	$rayons=$this->db->get('Rayon');
?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img style="width: 140px;" src="<?= base_url('assets/') ?>vendorsAdmin/img/logo.svg" alt="">


            <span style="width:margin-top:30px;padding-bottom:2px;padding-top:2px;" class="badge bg-success"><em
                    style="top:-70px;font-size:15px;color:white;"><i class="bi bi-check-circle me-1"></i> en
                    ligne</em></span>

        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item" style="margin-right:20px;">
                <button class="btn btn-primary" type="button" disabled="">
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    <span id="horloge"></span>
                </button>
            </li>

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have 4 new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                            <h4>Atque rerum nesciunt</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>1 hr. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                            <h4>Sit rerum fuga</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>2 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer">
                        <a href="#">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">3</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        You have 3 new messages
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/messages-1.jpg" alt=""
                                class="rounded-circle">
                            <div>
                                <h4>Maria Hudson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/messages-2.jpg" alt=""
                                class="rounded-circle">
                            <div>
                                <h4>Anna Nelson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>6 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/messages-3.jpg" alt=""
                                class="rounded-circle">
                            <div>
                                <h4>David Muldon</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>8 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Show all messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->
            <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client')) :?>
            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-gift-fill"></i>
                    <span class="badge bg-primary badge-number">3</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        You have 3 Promotion
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/messages-1.jpg" alt=""
                                class="rounded-circle">
                            <div>
                                <h4>Maria Hudson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/messages-2.jpg" alt=""
                                class="rounded-circle">
                            <div>
                                <h4>Anna Nelson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>6 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="<?= base_url('assets/') ?>vendorsAdmin/img/messages-3.jpg" alt=""
                                class="rounded-circle">
                            <div>
                                <h4>David Muldon</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>8 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Show all messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown PanierCard">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-cart-plus-fill"></i>
                    <span
                        class="badge bg-primary badge-number countPanier"><?php if(isset($_SESSION['countPanier'])) echo $_SESSION['countPanier'];?></span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">

                    <li class="dropdown-header">
                        You have <?=$count;?> Articles
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <?php if(!empty($products)) foreach($products as $product):?>
                    <li class="message-item">
                        <div>
                            <img class="rounded-circle" src="<?= base_url($product->imageArticle) ?>" alt="">
                            <h3 class="text-primary small"><a href="#"><?=$product->designation ;?></a></h3>
                            <h3 class="text-primary small"><span
                                    class="qty"><?= $_SESSION['panier'][$product->idArticle];?></span>Prix unitaire
                                <?=$product->prix;?> &emsp; Prix Total
                                <?= $_SESSION['panier'][$product->idArticle]*$product->prix;?><?=$product->devise ;?>
                            </h3>
                            <a class="removePanier" id="<?='panier'.$product->idArticle?>"
                                href="<?=base_url('panier/delete/'.$product->idArticle);?>"><button
                                    class="btn btn-primary btn-sm"><i class="btn btn-close"></i></button></a>
                            <?php 
                                      $subTotal=$_SESSION['panier'][$product->idArticle]*$product->prix;
                                      $prixTotal+=$subTotal;
                                      $count+=1;
                                    ?>


                        </div>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
            </li>
            <?php endforeach;?>
            <li>
                <hr class="dropdown-divider">
            </li>

            <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
                <small> <span id="count"><?=$count;?></span> Item(s) selected</small>
                <h5>SUBTOTAL:<span
                        id="total"><?=number_format($prixTotal,2,',',' ');?></span><?php if(isset($product->devise)) echo $product->devise ;?>
                </h5>
            </li>

        </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <?php endif;?>

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img id="myImageProfile"
                    src="<?php if(isset($this->session->profile)) echo base_url($this->session->profile)?>"
                    alt="Profile" id="myProfile" class="rounded-circle">
                <span id="myUserName"
                    class="d-none d-md-block dropdown-toggle ps-2"><?php if($this->session->username) echo $this->session->username;?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <?php if(($this->session->typeUser) && ($this->session->typeUser === 'client')) :?>
                    <h6><?php if($this->session->firstname) echo $this->session->firstname;?>
                        <?php if($this->session->lastname) echo $this->session->lastname;?></h6>
                    <span><?php if($this->session->profession) echo $this->session->profession;?></span>
                    <?php else:?>
                    <h6><?php if($this->session->nomService) echo $this->session->nomService;?> </h6>
                    <?php endif;?>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="<?=site_url('user/profile')?>">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="<?=site_url('user/profile')?>">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="<?=site_url('User/questions');?>">
                        <i class="bi bi-question-circle"></i>
                        <span>Need Help?</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="<?= site_url('user/userLogout') ?>">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                </li>

            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<script>
const horloge = function() {
    let date = new Date();
    let heures = date.getHours();
    let minutes = date.getMinutes();
    let secondes = date.getSeconds();
    if (secondes < 10) {
        secondes = '0' + secondes;
    } else if (minutes < 10) {
        minutes = '0' + minutes;
    }
    let affichage = heures + ":" + minutes + ":" + secondes;
    document.querySelector("#horloge").innerHTML = affichage;
}
window.setInterval(horloge, 1000);
</script>