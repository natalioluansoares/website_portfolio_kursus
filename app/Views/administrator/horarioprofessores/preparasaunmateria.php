<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.preparaMateriaProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.preparaMateriaProfessoresPortfolio')?></h4>
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
                            <a href="<?= base_url(lang('horarioProfessores.showHorarioPortfolioUrlPortfolio').$preparasaun->materia_professores)?>" class="btn btn-dark ms-2"><i class="mdi mdi-skip-previous"></i></a>
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
<?php $jumlah_data = count($preparasaunmateria);
if ($jumlah_data > 0 )
{ ?>
<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$no = 1 +(6 * ($page - 1));
$no=1; foreach($preparasaunmateria as $portfolio): ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="text-center py-5" style="background-color: darkgrey;">
                <div class="profile-photo">
                    <img src="<?= base_url('uploads/fotoportfolio/'.$portfolio->image_administrator)?>" style="width: 150px; height: 23vh;" class="img-fluid rounded-circle" alt="">
                </div>
                <h3 class="mt-3 mb-1 text-white"><strong><span class="badge badge-warning"><ins>(<?=$portfolio->kode_materia_professores ?>/<?=$portfolio->materia_kursus ?>)</ins></span></strong></h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.fullNamePortfolio') ?></span> <strong class="text-muted"><?=$portfolio->naran_kompleto?><sub class="text-danger">(<?=$portfolio->titulo_professores?>)</sub></strong></li>

                <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.profesaunProfessores') ?></span> <strong class="text-muted">
                                
                <?php if ($portfolio->sistema == 'Direktor') { ?>
                <?=lang('professoresPortfolio.direktorFunsionario')?>
                <?php }elseif($portfolio->sistema == 'Administrasaun'){ ?>
                <?=lang('professoresPortfolio.admnistrasaunFunsionario')?>
                <?php }elseif($portfolio->sistema == 'Professores'){ ?>
                <?=lang('professoresPortfolio.professoresProfessores')?>
                <?php }elseif($portfolio->sistema == 'Administrator'){ ?>
                <?=lang('professoresPortfolio.admnistratorFunsionario')?>
                <?php } ?></strong></li>
                
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('materiaProfessores.dataMateria') ?></span><strong class="text-muted"><?=$portfolio->data_materia_professores?></strong></li>

                <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('materiaProfessores.levelMateria') ?></span><strong><span class="text-success"><?=$portfolio->level_materia_kursus ?></span></strong></li>

                <li class="list-group-item d-flex">
                    <?=$portfolio->preparasaun_materia ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php }else{ ?>
    <div class="table-responsive">
        <center>
            <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData'); ?></span>
        </center>
    </div>
<?php } ?>
<?= $this->endSection() ?>