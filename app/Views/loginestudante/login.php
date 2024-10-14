
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        
        <!-- App css -->
        <link href="<?= base_url()?>templateadministrator/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>templateadministrator/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?= base_url()?>templateadministrator/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="<?= base_url()?>templateadministrator/assets/images/logo.png" alt="" height="18"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                </div>
                                <?php if (session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <b>Error !</b>
                                            <?= session()->getFlashdata('error') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <form action="<?=base_url('processoestudante') ?>" method="post">
                                    <?= csrf_field(); ?>  
                                    <div class="mb-3">
                                        <label for="naran_kompleto" class="form-label"><?=lang('loginPortfolio.naranLogin') ?></label>
                                        <input class="form-control <?=isset($errors['naran_kompleto']) ? 'is-invalid' : null ?>" type="text" id="naran_kompleto" name="naran_kompleto" placeholder="<?=lang('loginPortfolio.naranLogin') ?>">
                                        <div class="invalid-feedback">
                                            <?=isset($errors['naran_kompleto']) ?  $errors['naran_kompleto'] : null ?>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <!-- <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a> -->
                                        <label for="sena" class="form-label"><?=lang('loginPortfolio.senaLogin') ?></label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="sena" name="sena" class="form-control <?=isset($errors['sena']) ? 'is-invalid' : null ?>" placeholder="<?=lang('loginPortfolio.senaLogin') ?>">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?=isset($errors['sena']) ?  $errors['sena'] : null ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 mb-0 text-center">
                                        <div class="login-social-title">                
                                            <h5>-----<?=lang('loginPortfolio.lianLogin') ?>-----</h5>
                                        </div>
                                        <div class="form-group">
                                                <a href="<?= base_url('/Portuguesa/loginestudante')?>"><img style="width: 30px;" src="<?= base_url()?>templateadministrator/assets/images/flags/portugal_flag.jpg" alt=""></a>
                                                <a href="<?= base_url('/Tetum/loginestudante')?>"><img style="width: 30px;" src="<?= base_url()?>templateadministrator/assets/images/flags/timor_leste_flag.jpg" alt=""></a>
                                                <a href="<?= base_url('/English/loginestudante')?>"><img style="width: 30px;" src="<?= base_url()?>templateadministrator/assets/images/flags/us.jpg" alt=""></a>
                                                <a href="<?= base_url('/Indonesia/loginestudante')?>"><img style="width: 30px;" src="<?= base_url()?>templateadministrator/assets/images/flags/indonesia_flag.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"><?=lang('loginPortfolio.tamaLogin') ?></button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <!-- bundle -->
        <script src="<?= base_url()?>templateadministrator/assets/js/vendor.min.js"></script>
        <script src="<?= base_url()?>templateadministrator/assets/js/app.min.js"></script>
        
    </body>
</html>
