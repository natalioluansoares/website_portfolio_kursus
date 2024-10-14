
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Landing Page | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url()?>templateadministrator/assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?= base_url()?>templateadministrator/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>templateadministrator/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="<?= base_url()?>templateadministrator/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    </head>

    <body class="loading" data-layout-config='{"darkMode":false}'>

        <!-- NAVBAR START -->
        <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark">
            <div class="container">

                <!-- logo -->
                <a href="index.html" class="navbar-brand me-lg-5">
                    <img src="<?= base_url()?>templateadministrator/assets/images/logo.png" alt="" class="logo-dark d-none d-lg-inline-flex" height="18">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <!-- menus -->
                <ul class="ms-auto align-items-left d-lg-none text-primary">
                    <li class="nav-item me-0">
                        <a class="nav-link dropdown-toggle arrow-none d-lg-none" data-bs-toggle="dropdown" id="topbar-languagedrop" href="#"      role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= base_url(lang('homeLogin.flagPortofolio'))?>" alt="user-image" class="me-1" height="16"> <span class="align-middle d-none d-sm-inline-block"><?=lang('homeLogin.lianPortofolio') ?></span> <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu align-items-center" aria-labelledby="topbar-languagedrop" style="width: 20%;">

                        <!-- item-->
                        <a href="<?= base_url('/English/homeadministrator')?>" class="dropdown-item notify-item d-lg-none">
                            <img src="<?= base_url()?>templateadministrator/assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                        </a>

                        <a href="<?= base_url('/Portuguesa/homeadministrator')?>" class="dropdown-item notify-item d-lg-none">
                            <img src="<?= base_url()?>templateadministrator/assets/images/flags/portugal_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Portuguesa</span>
                        </a>

                        <!-- item-->
                        <a href="<?= base_url('/Indonesia/homeadministrator')?>" class="dropdown-item notify-item d-lg-none">
                            <img src="<?= base_url()?>templateadministrator/assets/images/flags/indonesia_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Indonesia</span>
                        </a>

                        <!-- item-->
                        <a href="<?= base_url('/Tetum/homeadministrator')?>" class="dropdown-item notify-item d-lg-none">
                            <img src="<?= base_url()?>templateadministrator/assets/images/flags/timor_leste_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Tetum</span>
                        </a>
                        </div>
                    </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                    <!-- left menu Sidebar -->
                    
                        <?= $this->include('templateestudante/sidebar') ?>
                    

                    <!-- right menu -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item me-0">
                            <!-- Full Template -->
                            <a class="nav-link dropdown-toggle arrow-none d-none d-lg-inline-flex" data-bs-toggle="dropdown" id="topbar-languagedrop" href="#"      role="button" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= base_url(lang('homeLogin.flagPortofolio'))?>" alt="user-image" class="me-1" height="16"> <span class="align-middle d-none d-sm-inline-block"><?=lang('homeLogin.lianPortofolio') ?></span> <i class="mdi mdi-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu align-items-center" aria-labelledby="topbar-languagedrop" style="width: 15%;">

                                <!-- item-->
                                <a href="<?= base_url('/English/homeestudante')?>" class="dropdown-item notify-item d-none d-lg-inline-flex">
                                    <img src="<?= base_url()?>templateadministrator/assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                                </a>

                                <a href="<?= base_url('/Portuguesa/homeestudante')?>" class="dropdown-item notify-item d-none d-lg-inline-flex">
                                    <img src="<?= base_url()?>templateadministrator/assets/images/flags/portugal_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Portuguesa</span>
                                </a>

                                <!-- item-->
                                <a href="<?= base_url('/Indonesia/homeestudante')?>" class="dropdown-item notify-item d-none d-lg-inline-flex">
                                    <img src="<?= base_url()?>templateadministrator/assets/images/flags/indonesia_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Indonesia</span>
                                </a>

                                <!-- item-->
                                <a href="<?= base_url('/Tetum/homeestudante')?>" class="dropdown-item notify-item d-none d-lg-inline-flex">
                                    <img src="<?= base_url()?>templateadministrator/assets/images/flags/timor_leste_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Tetum</span>
                                </a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- NAVBAR END -->

        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 animate__animated animate__slideInLeft">
                        <div class="mt-md-4">
                            
                            <h3 class="text-white fw-normal mb-4 mt-3 hero-title">
                               <?= lang('homeEstudante.websiteEstudante'); ?>
                            </h3>
                            <p class="mb-4 font-16 text-white-50"><?= lang('homeEstudante.mottoEstudante'); ?><span>[<?= lang('homeEstudante.evanjelhoEstudante'); ?>]</span></p>
                            <div>
                                <span class="text-white ms-1"><strong><?= helperEstudante()->naran_kompletos ?></strong></span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-2 animate__animated animate__slideInRight">
                        <div class="text-md-end mt-3 mt-md-0">
                            <img src="<?= base_url()?>templateadministrator/assets/images/startup.svg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END FEATURES 2 -->

        <?= $this->renderSection('estudante') ?>
        <!-- START PRICING -->
        

        <!-- START FOOTER -->
        <footer class="bg-dark py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="<?= base_url()?>templateadministrator/assets/images/logo.png" alt="" class="logo-dark" height="18">
                        <p class="text-muted mt-4">Hyper makes it easier to build better websites with
                            <br> great speed. Save hundreds of hours of design
                            <br> and development by using it.</p>

                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>

                    </div>

                    <div class="col-lg-2 mt-3 mt-lg-0">
                        <h5 class="text-light">Company</h5>

                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">About Us</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Documentation</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Blog</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Affiliate Program</a></li>
                        </ul>

                    </div>

                    <div class="col-lg-2 mt-3 mt-lg-0">
                        <h5 class="text-light">Apps</h5>

                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Ecommerce Pages</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Email</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Social Feed</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Projects</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Tasks Management</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 mt-3 mt-lg-0">
                        <h5 class="text-light">Discover</h5>

                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Help Center</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Our Products</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Privacy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-5">
                            <p class="text-muted mt-4 text-center mb-0">© 2018 - 2021 Hyper. Design and coded by
                                Coderthemes</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->

        <!-- bundle -->
        <script src="<?= base_url()?>templateadministrator/assets/js/vendor.min.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/app.min.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/aktivoestudante.js"></script>
        <script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>

        <script src="<?= base_url() ?>templateadministrator/assets/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="<?= base_url() ?>templateadministrator/assets/sweetalert2/sweetalert.min.js"></script>
        <script src="<?= base_url() ?>templateadministrator/assets/sweetalert2/sweetalert2.all.min.js"></script>

        
        <script src="<?= base_url()?>templateadministrator/assets/js/js/popper.min.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/js/bootstrap.min.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/js/modernizr.min.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/js/waves.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.nicescroll.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.scrollTo.min.js"></script>

    </body>

</html>