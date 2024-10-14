<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?= $this->renderSection('title') ?>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link rel="stylesheet" href="<?= base_url(); ?>templatefunsionario/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>templatefunsionario/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>templatefunsionario/assets/css/skin.css">
	<link rel="stylesheet" href="<?= base_url(); ?>templatefunsionario/assets/icons/font-awesome-old/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>templatefunsionario/assets/sweetalert2/sweetalert.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>templatefunsionario/assets/sweetalert2/animate.min.css">

    <!-- Daterange picker -->
    <link href="<?= base_url(); ?>templatefunsionario/assets/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="<?= base_url(); ?>templatefunsionario/assets/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="<?= base_url(); ?>templatefunsionario/assets/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="<?= base_url(); ?>templatefunsionario/assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="<?= base_url(); ?>templatefunsionario/assets/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="<?= base_url(); ?>templatefunsionario/assets/vendor/pickadate/themes/default.date.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>templatefunsionario/assets/vendor/select2/css/select2.min.css">
    <link href="<?= base_url(); ?>templatefunsionario/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <?php 
            $this->db = \Config\Database::connect();
            $color = $this->db->table('color')->where('position =', 'Navigation')->where('aktivo_color =', 1)->get()->getResult();
            ?>
            <?php foreach($color as $co): ?>
            <?php if ($co->aktivo_color == 1){ ?>
                <a href="index.html" class="brand-logo" style="background-color: <?=$co->color ?>;">
            <?php }else { ?>
                <a href="index.html" class="brand-logo">
            <?php  } ?>
            <?php endforeach; ?>
                <img class="logo-abbr" src="<?= base_url(); ?>templatefunsionario/assets/images/logo-white-2.png" alt="">
                <img class="logo-compact" src="<?= base_url(); ?>templatefunsionario/assets/images/logo-text-white.png" alt="">
                <img class="brand-title" src="<?= base_url(); ?>templatefunsionario/assets/images/logo-text-white.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <?php 
            $this->db = \Config\Database::connect();
            $color = $this->db->table('color')->where('position =', 'header')->where('aktivo_color =', 1)->get()->getResult();
            ?>
            <?php foreach($color as $co): ?>
            <?php if ($co->aktivo_color == 1){ ?>
                <div class="header-content" style="background-color: <?=$co->color ?>;">
            <?php }else { ?>
                <div class="header-content">
            <?php  } ?>
            <?php endforeach; ?>
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <small><strong>D/H:<?= date('d-M-Y') ?></strong>/<strong><span id="jam"></span></strong></small>
                            </div>
                            <ul class="navbar-nav header-right">
                            <!-- <li class="nav-item dropdown notification_dropdown">
                                
                            </li> -->
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="<?= base_url(lang('homeLogin.flagPortofolio'))?>" alt="user-image" class="me-1" height="16"> <span class="align-middle d-none d-sm-inline-block"><?=lang('homeLogin.lianPortofolio') ?></span> <i class="mdi mdi-chevron-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu" aria-labelledby="topbar-languagedrop">

                                    <!-- item-->
                                    <a href="<?= base_url('/English/homefunsionario')?>" class="dropdown-item notify-item">
                                        <img src="<?= base_url()?>templateadministrator/assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                                    </a>

                                    <a href="<?= base_url('/Portuguesa/homefunsionario')?>" class="dropdown-item notify-item">
                                        <img src="<?= base_url()?>templateadministrator/assets/images/flags/portugal_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Portuguesa</span>
                                    </a>

                                    <!-- item-->
                                    <a href="<?= base_url('/Indonesia/homefunsionario')?>" class="dropdown-item notify-item">
                                        <img src="<?= base_url()?>templateadministrator/assets/images/flags/indonesia_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Indonesia</span>
                                    </a>

                                    <!-- item-->
                                    <a href="<?= base_url('/Tetum/homefunsionario')?>" class="dropdown-item notify-item">
                                        <img src="<?= base_url()?>templateadministrator/assets/images/flags/timor_leste_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Tetum</span>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
										<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
										<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
									</svg>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <?php if (session()->sistema_administrator == 2) {?>
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <img src="<?= base_url('uploads/fotoportfolio/'.helperFunsionario()->image_administrator)?>" width="20" alt="">
                                    </a>
                                 <?php }elseif (session()->sistema_administrator == 3) {?>
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <img src="<?= base_url('uploads/fotoportfolio/'.helperProfessores()->image_administrator)?>" width="20" alt="">
                                    </a>
                                <?php } ?>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <?php if (session()->sistema_administrator == 3) {?>
                                        <a href="<?= base_url('professoreslogout') ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                   <?php }elseif (session()->sistema_administrator == 2) { ?>
                                        <a href="<?= base_url('funsionariologout') ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                        </a>
                                   <?php } ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php 
        $this->db = \Config\Database::connect();
        $color = $this->db->table('color')->where('position =', 'Sidebar')->where('aktivo_color =', 1)->get()->getResult();
        ?>
        <?php foreach($color as $co): ?>
        <?php if ($co->aktivo_color == 1){ ?>
            <div class="dlabnav" style="background-color: <?=$co->color ?>;">
        <?php }else { ?>
            <div class="dlabnav">
        <?php  } ?>
        <?php endforeach; ?>
            <div class="dlabnav-scroll">
                <?=$this->include('templatefunsionario/sidebar') ?>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				<?= $this->renderSection('funsionario') ?>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div><br><br>
            <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2020</p>
            </div>
        </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url(); ?>templatefunsionario/assets/vendor/global/global.min.js"></script>
	<script src="<?= base_url(); ?>templatefunsionario/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?= base_url(); ?>templatefunsionario/assets/js/custom.min.js"></script>
		
    <!-- Chart Morris plugin files -->
    <script src="<?= base_url(); ?>templatefunsionario/assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?= base_url(); ?>templatefunsionario/assets/vendor/morris/morris.min.js"></script>
		
	
	<!-- Chart piety plugin files -->
    <script src="<?= base_url(); ?>templatefunsionario/assets/vendor/peity/jquery.peity.min.js"></script>

	
		<!-- Demo scripts -->
    <script src="<?= base_url(); ?>templatefunsionario/assets/js/dashboard/dashboard-2.js"></script>
	
	<!-- Svganimation scripts -->
    <script src="<?= base_url(); ?>templatefunsionario/assets/vendor/svganimation/vivus.min.js"></script>
    <script src="<?= base_url(); ?>templatefunsionario/assets/vendor/svganimation/svg.animation.js"></script>
    <script src="<?= base_url(); ?>templatefunsionario/assets/js/styleSwitcher.js"></script>

    <script src="<?= base_url()?>templatefunsionario/assets/js/aktivo.js"></script>

    <script src="<?= base_url() ?>templatefunsionario/assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>templatefunsionario/assets/sweetalert2/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>templatefunsionario/assets/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="<?= base_url() ?>templatefunsionario/assets/vendor/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>templatefunsionario/assets/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="<?= base_url() ?>templatefunsionario/assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="<?= base_url() ?>templatefunsionario/assets/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="<?= base_url() ?>templatefunsionario/assets/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="<?= base_url() ?>templatefunsionario/assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="<?= base_url() ?>templatefunsionario/assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="<?= base_url() ?>templatefunsionario/assets/vendor/pickadate/picker.js"></script>
    <script src="<?= base_url() ?>templatefunsionario/assets/vendor/pickadate/picker.time.js"></script>
    <script src="<?= base_url() ?>templatefunsionario/assets/vendor/pickadate/picker.date.js"></script>

      <!-- Daterangepicker -->
    <script src="<?= base_url() ?>templatefunsionario/assets/js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="<?= base_url() ?>templatefunsionario/assets/js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="<?= base_url() ?>templatefunsionario/assets/js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    <script src="<?= base_url() ?>templatefunsionario/assets/js/plugins-init/material-date-picker-init.js"></script>
    <!-- Pickdate -->
    <script src="<?= base_url() ?>templatefunsionario/assets/js/plugins-init/pickadate-init.js"></script>

    <!-- Select2 -->
     <script src="<?= base_url() ?>templatefunsionario/assets/vendor/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>templatefunsionario/assets/js/plugins-init/select2-init.js"></script>
	<script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>
	
</body>
</html>