<li class="dropdown notification-list topbar-dropdown">
    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" id="topbar-languagedrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="<?= base_url(lang('homeLogin.flagPortofolio'))?>" alt="user-image" class="me-1" height="16"> <span class="align-middle d-none d-sm-inline-block"><?=lang('homeLogin.lianPortofolio') ?></span> <i class="mdi mdi-chevron-down"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu" aria-labelledby="topbar-languagedrop">

        <!-- item-->
        <a href="<?= base_url('/English/homeadministrator')?>" class="dropdown-item notify-item">
            <img src="<?= base_url()?>templateadministrator/assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
        </a>

        <a href="<?= base_url('/Portuguesa/homeadministrator')?>" class="dropdown-item notify-item">
            <img src="<?= base_url()?>templateadministrator/assets/images/flags/portugal_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Portuguesa</span>
        </a>

        <!-- item-->
        <a href="<?= base_url('/Indonesia/homeadministrator')?>" class="dropdown-item notify-item">
            <img src="<?= base_url()?>templateadministrator/assets/images/flags/indonesia_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Indonesia</span>
        </a>

        <!-- item-->
        <a href="<?= base_url('/Tetum/homeadministrator')?>" class="dropdown-item notify-item">
            <img src="<?= base_url()?>templateadministrator/assets/images/flags/timor_leste_flag.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Tetum</span>
        </a>
    </div>
</li>

<li class="dropdown notification-list">
    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="dripicons-bell noti-icon"></i>
        <span class="noti-icon-badge"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg" aria-labelledby="topbar-notifydrop">

        <!-- item-->
        <div class="dropdown-item noti-title">
            <h5 class="m-0">
                <span class="float-end">
                    <a href="javascript: void(0);" class="text-dark">
                        <small>Clear All</small>
                    </a>
                </span>Notification
            </h5>
        </div>

        <div style="max-height: 230px;" data-simplebar="">
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-primary">
                    <i class="mdi mdi-comment-account-outline"></i>
                </div>
                <p class="notify-details">Caleb Flakelar commented on Admin
                    <small class="text-muted">1 min ago</small>
                </p>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-info">
                    <i class="mdi mdi-account-plus"></i>
                </div>
                <p class="notify-details">New user registered.
                    <small class="text-muted">5 hours ago</small>
                </p>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon">
                    <img src="<?= base_url()?>templateadministrator/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt=""> </div>
                <p class="notify-details">Cristina Pride</p>
                <p class="text-muted mb-0 user-msg">
                    <small>Hi, How are you? What about our next meeting</small>
                </p>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-primary">
                    <i class="mdi mdi-comment-account-outline"></i>
                </div>
                <p class="notify-details">Caleb Flakelar commented on Admin
                    <small class="text-muted">4 days ago</small>
                </p>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon">
                    <img src="<?= base_url()?>templateadministrator/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt=""> </div>
                <p class="notify-details">Karen Robinson</p>
                <p class="text-muted mb-0 user-msg">
                    <small>Wow ! this admin looks good and awesome design</small>
                </p>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-info">
                    <i class="mdi mdi-heart"></i>
                </div>
                <p class="notify-details">Carlos Crouch liked
                    <b>Admin</b>
                    <small class="text-muted">13 days ago</small>
                </p>
            </a>
        </div>

        <!-- All-->
        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
            View All
        </a>

    </div>
</li>

<li class="dropdown notification-list">
    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <i class="dripicons-view-apps noti-icon"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

        <div class="p-2">
            <div class="row g-0">
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="<?= base_url()?>templateadministrator/assets/images/brands/slack.png" alt="slack">
                        <span>Slack</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="<?= base_url()?>templateadministrator/assets/images/brands/github.png" alt="Github">
                        <span>GitHub</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="<?= base_url()?>templateadministrator/assets/images/brands/dribbble.png" alt="dribbble">
                        <span>Dribbble</span>
                    </a>
                </div>
            </div>

            <div class="row g-0">
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="<?= base_url()?>templateadministrator/assets/images/brands/bitbucket.png" alt="bitbucket">
                        <span>Bitbucket</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="<?= base_url()?>templateadministrator/assets/images/brands/dropbox.png" alt="dropbox">
                        <span>Dropbox</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="<?= base_url()?>templateadministrator/assets/images/brands/g-suite.png" alt="G Suite">
                        <span>G Suite</span>
                    </a>
                </div>

            </div>
        </div>

    </div>
</li>

<li class="notification-list">
    <a class="nav-link end-bar-toggle" href="javascript: void(0);">
        <i class="dripicons-gear noti-icon"></i>
    </a>
</li>