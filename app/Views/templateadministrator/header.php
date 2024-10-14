
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <?= $this->renderSection('title'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url()?>templateadministrator/assets/images/favicon.ico">

        <!-- third party css -->
        <link href="<?= base_url()?>templateadministrator/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
        <!-- third party css end -->

        <!-- App css -->
        <link href="<?= base_url()?>templateadministrator/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>templateadministrator/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="<?= base_url()?>templateadministrator/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

        <link rel="stylesheet" href="<?= base_url() ?>templateadministrator/assets/sweetalert2/sweetalert.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>templateadministrator/assets/sweetalert2/animate.min.css">

        
        <link href="<?= base_url() ?>templateadministrator/assets/animate/animate.css" rel="stylesheet" type="text/css">

    </head>

    <body class="loading" data-layout="topnav" data-layout-config='{"topSideBarTheme":"dark","layoutBoxed":false, "topSidebarCondensed":false, "topSidebarScrollable":false,"darkMode":false, "showBottomSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom topnav-navbar">
                        <div class="container-fluid">
                            
                            <!-- LOGO -->
                            <ul class="list-unstyled topbar-menu float-end mb-0">
                                <a class="navbar-toggle open-left" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>

                                <?= $this->include('templateadministrator/active')?>    
                                <li class="dropdown notification-list">
                                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span class="account-user-avatar"> 
                                            <img src="<?= base_url('uploads/fotoportfolio/'.helperSistema()->image_administrator)?>" alt="user-image" class="rounded-circle">
                                        </span>
                                        <span>
                                            <span class="account-user-name"><?=helperSistema()->naran_primeiro ?></span>
                                            <span class="account-position"><?=helperSistema()->naran_ikus ?></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                                        <!-- item-->
                                        <div class=" dropdown-header noti-title">
                                            <h6 class="text-overflow m-0">Welcome !</h6>
                                        </div>
    
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="mdi mdi-account-circle me-1"></i>
                                            <span>My Account <sub class="text-danger"><?=helperSistema()->naran_primeiro ?></sub></span>
                                        </a>
    
                                        <!-- item-->
                                        <a href="<?=base_url(lang('aktivosistema.aktivoProfessoresUrlPortfolio')) ?>" class="dropdown-item notify-item">
                                            <i class="mdi mdi-account-edit me-1"></i>
                                            <span><?=lang('sidebarPortfolio.aturanProfessoresPortfolioa') ?></span>
                                        </a>
                                        <a href="<?=base_url(lang('aktivosistema.aktivoFunsionarioUrlPortfolio')) ?>" class="dropdown-item notify-item">
                                            <i class="mdi mdi-account-edit me-1"></i>
                                            <span><?=lang('sidebarPortfolio.aturanFunsionarioPortfolioa') ?></span>
                                        </a>

                                        <a href="<?=base_url(lang('aktivosistema.menuAktivoUrlPortfolio')) ?>" class="dropdown-item notify-item">
                                            <i class="mdi mdi-power-settings me-1"></i>
                                            <span><?=lang('sidebarPortfolio.menuPortfolio') ?></span>
                                        </a>

                                        <a href="<?=base_url(lang('aktivosistema.menuSidebarUrlPortfolio')) ?>" class="dropdown-item notify-item">
                                            <i class="mdi mdi-power-settings me-1"></i>
                                            <span><?=lang('sidebarPortfolio.sidebarPortfolio') ?></span>
                                        </a>

                                        <a href="<?=base_url(lang('aktivosistema.inputupdatedeleteUrlPortfolio')) ?>" class="dropdown-item notify-item">
                                            <i class="mdi mdi-power-settings me-1"></i>
                                            <span><?=lang('sidebarPortfolio.inUpDePortfolio') ?></span>
                                        </a>
    
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="mdi mdi-lifebuoy me-1"></i>
                                            <span>Support</span>
                                        </a>
    
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="mdi mdi-lock-outline me-1"></i>
                                            <span>Lock Screen</span>
                                        </a>
    
                                        <!-- item-->
                                        <a href="<?= base_url('administratorlogout') ?>" class="dropdown-item notify-item">
                                            <i class="mdi mdi-logout me-1"></i>
                                            <span>Logout</span>
                                        </a>
    
                                    </div>
                                </li>

                            </ul>
                            
                            <!-- <button class="button-menu-mobile ">
                            <i class="mdi mdi-menu"></i>
                        </button> -->
                        </div>
                    </div>
                    </div>
                    <!-- end Topbar -->
                    <div class="topnav">
                        <div class="container">
                            <nav class="navbar navbar-dark navbar-expand-lg topnav-menu">
        
                                <div class="collapse navbar-collapse" id="topnav-menu-content">
                                   <?= $this->include('templateadministrator/sidebar')?>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body" style="background-color: gainsboro;color:black">
                                    <div class="table-responsive">
                                        <center>
                                            <table width ="100%">
                                                <tbody>
                                                    <tr>
                                                        <td align="center">
                                                            <img src="<?=base_url('uploads/imagewebsite/backend.jpg') ?>" class="rounded-circle" style="width: 60%;height: 19vh;">
                                                        </td>
                                                        <td data-priority="1">
                                                            <div align="center" style="font-size: 18px;">
                                                                <font size="4" style="font-family:Wide Latin">
                                                                    <b>Website Haburas Matenek Liu Husi Kursus</b><br>
                                                                    <b>Timor-Leste</b><br>
                                                                    <span style="font-family:Times New Roman">Bairo Pite, Dili, Timor-Leste <br>
                                                                    Telp.(0380)833395- 831194</span>
                                                                </font><br>
                                                                Web:<span style="font-family:Times New Roman; color:#3366cc">
                                                                http//www.wehamak-tl.ac.id</span>
                                                                Email:<span style="font-family:Times New Roman; color:#3366cc">
                                                                bairopite.websitehaburasmatenekliuhusikursus@gmail.com</span>
                                                                <hr class="line-title">
                                                            </div>
                                                        </td>
                                                        <td align="center">
                                                            <img src="<?=base_url('uploads/imagewebsite/frontend.png') ?>" class="rounded-circle" style="width: 53%;height: 19vh;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </center>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    
                    
                    
                    <!-- Start Content-->
                    <div class="container">

                        <?= $this->renderSection('administrator') ?>
                        
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar="">
                <?= $this->include('templateadministrator/setting')?>
            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="<?= base_url()?>templateadministrator/assets/js/vendor.min.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/app.min.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/aktivo.js"></script>
        <script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
        <!-- third party js -->
        <!-- <script src="<?= base_url()?>templateadministrator/assets/js/vendor/apexcharts.min.js"></script> -->
        <!-- <script src="<?= base_url()?>templateadministrator/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script> -->
        <!-- third party js ends -->
        <!-- demo app -->
        <!-- <script src="<?= base_url()?>templateadministrator/assets/js/pages/demo.dashboard.js"></script> -->
        <!-- end demo js-->

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

        <!-- Timepicker -->
        <script src="<?= base_url()?>templateadministrator/assets/js/pages/demo.timepicker.js"></script>

        <script type="text/javascript">
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var nana = $(this).attr('href');


                Swal.fire({
                    title: 'Apakah Anda Yakin ?',
                    text: "Data akan Di Hapus !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete!',
                    showClass: {
                        popup: 'animate__animated animate__swing'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = nana;
                    }
                })
            })
        </script>
        <script>
            $('.btn-animation').on('click', function(br) {
           //adding animation
           $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + $(this).data("animation") + '  animated');
           });
       </script>
    </body>
<!-- </html> -->