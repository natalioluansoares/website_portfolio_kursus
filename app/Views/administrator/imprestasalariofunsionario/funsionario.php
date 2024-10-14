<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('imprestaSalarioFunsionario.hiliFunsionario')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('imprestaSalarioFunsionario.hiliFunsionario')?></h4>
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
        $no=1; foreach($salariofunsionario as $portfolio): ?>
        <div class="col-xl-6 col-xxl-6 col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="text-center p-3" style="background-color: mediumseagreen;">
                            <div class="profile-photo">
                                <img src="<?= base_url('uploads/fotoportfolio/'.$portfolio->image_administrator)?>" style="width: 100px; height: 13vh;" class="img-fluid rounded-circle" alt="">
                            </div>
                            <h3 class="mt-3 mb-1 text-white"><?= $portfolio->naran_primeiro?></h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('funsionarioPortfolio.fullNamePortfolio') ?></span> <strong class="text-muted"><?=$portfolio->naran_kompleto?><sub class="text-danger">(<?=$portfolio->titulo_funsionario?>)</sub></strong></li>

                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('funsionarioPortfolio.profesaunFunsionario') ?></span> <strong class="text-muted">
                            <?php if ($portfolio->sistema == 'Direktor') { ?>
                            <?=lang('funsionarioPortfolio.direktorFunsionario')?>
                            <?php }elseif($portfolio->sistema == 'Administrasaun'){ ?>
                            <?=lang('funsionarioPortfolio.admnistrasaunFunsionario')?>
                            <?php } ?></strong></li>

                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('funsionarioPortfolio.statusServisuPortfolio') ?></span> <strong class="text-muted">
                            <?php if ($portfolio->status_servisu == 'Aktivo') { ?>
                            <?=lang('funsionarioPortfolio.aktivoServisuFunsionario')?>
                            <?php }else{ ?>
                            <?=lang('funsionarioPortfolio.laAktivoServisuFunsionario')?>
                            <?php } ?></strong></li>

                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('funsionarioPortfolio.sexoPortfolio') ?></span> <strong class="text-muted"><?php if ($portfolio->jenero == 'Mane') { ?>
                            <td><?=lang('funsionarioPortfolio.maneFunsionario')?></td>
                            <?php }else{ ?>
                            <td><?=lang('funsionarioPortfolio.fetoFunsionario')?></td>
                                <?php } ?>  
                            </strong></li>

                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('funsionarioPortfolio.fatinPortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->fatin_moris?></strong></li>

                        

                        
                        </ul>
                        <div class="card-footer text-left border-0 mt-0">								
                            <a href="<?=base_url(lang('imprestaSalarioFunsionario.showImprestaSalarioFunsionarioPortfolioUrlPortfolio').$portfolio->id_salario_funsionario) ?>"
                            class="btn btn-dark btn-rounded px-2"><i class=" uil-folder-plus"></i></a>
                            <a href="<?=base_url(lang('imprestaSalarioFunsionario.hamosImprestaSalarioFunsionarioPortfolioUrlPortfolio').$portfolio->id_salario_funsionario) ?>" class="btn btn-warning btn-rounded px-2"><i class="mdi mdi-broom"></i></a>
                        </div>
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