<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('professoresPortfolio.registoProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('professoresPortfolio.registoProfessoresPortfolio')?></h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex" method="get">
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="start">
                                <span class="input-group-text bg-primary border-primary text-white mr-2">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="end">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary ms-2" name="filter-data">
                            <i class="uil-eye"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="app-search dropdown">
                    <form method="get" >
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search..." id="top-search">
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text  btn-success" type="submit"><i class="uil-search-plus"></i></button>
                            <button type="reset" class="btn btn-dark ms-1">
                                <i class="uil-sync"></i>
                            </button>
                            <a href="<?=base_url(lang('professoresPortfolio.hamosProfessoresUrlPortfolio')) ?>" class="btn btn-danger ms-2">
                                <i class="mdi mdi-broom"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<div class="row">
        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $no = 1 +(6 * ($page - 1));
        $no=1; foreach($sistema as $portfolio): ?>
        <div class="col-xl-4 col-xxl-4 col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <?php if ($portfolio->sistema == 'Direktor') { ?>
                            <a href="<?=base_url(lang('aktivosistema.showMenuAktivoUrlPortfolio')).$portfolio->sistema ?>">
                                <div class="text-center p-3" style="background-color: crimson;">
                                    <div class="profile-photo">
                                        <h1 style="color: aliceblue;"><i class="mdi mdi-power-settings me-1"></i></h1>
                                    </div>
                                    <h3 class="mt-3 mb-1" style="color: aliceblue;"><?= lang('aktivosistema.direktor')?></h3>
                                </div>
                            </a>
                        <?php  }elseif($portfolio->sistema == 'Administrasaun') { ?>
                            <a href="<?=base_url(lang('aktivosistema.showMenuAktivoUrlPortfolio')).$portfolio->sistema ?>">
                                <div class="text-center p-3" style="background-color: blueviolet;">
                                    <div class="profile-photo">
                                        <h1 style="color: aliceblue;"><i class="mdi mdi-power-settings me-1"></i></h1>
                                    </div>
                                    <h3 class="mt-3 mb-1" style="color: aliceblue;"><?= lang('aktivosistema.funsionario')?></h3>
                                </div>
                            </a>
                        <?php  }elseif($portfolio->sistema == 'Professores') { ?>
                            <a href="<?=base_url(lang('aktivosistema.showMenuAktivoUrlPortfolio')).$portfolio->sistema ?>">
                                <div class="text-center p-3" style="background-color: goldenrod;">
                                    <div class="profile-photo">
                                        <h1 style="color: aliceblue;"><i class="mdi mdi-power-settings me-1"></i></h1>
                                    </div>
                                    <h3 class="mt-3 mb-1" style="color: aliceblue;"><?= lang('aktivosistema.professores')?></h3>
                                </div>
                            </a>
                       <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="left" style="float: left;">
        <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
    </div>
    <div class="right" style="float: right;">
        <?= $pager->links('default','pagination') ?>
    </div>
</div>

<?= $this->endSection() ?>