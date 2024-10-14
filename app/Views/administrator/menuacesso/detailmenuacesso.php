<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.registoPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.sistemaPortfolio')?></h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
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
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search..." id="top-search">
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text  btn-success" type="submit"><i class="uil-search-plus"></i></button>
                            <button type="reset" class="btn btn-dark ms-1">
                                <i class="uil-sync"></i>
                            </button>
                            <a href="<?= base_url(lang('aktivosistema.menuAktivoUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
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
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Sistema</th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivofinansaUrlPortfolio').$sistema->sistema)?>">
                                    <?=lang('sidebarPortfolio.saldoFinanca') ?>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivofunsionarioUrlPortfolio').$sistema->sistema)?>">
                                    <?=lang('sidebarPortfolio.employeePortfolio') ?>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivoprofessoresUrlPortfolio').$sistema->sistema)?>">
                                    <?=lang('sidebarPortfolio.teachersPortfolio') ?>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivoestudanteUrlPortfolio').$sistema->sistema)?>">
                                    <?=lang('sidebarPortfolio.estudantePortfolio') ?>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivocategoriomateriaUrlPortfolio').$sistema->sistema)?>">
                                    <?=lang('sidebarPortfolio.materiaPortfolio') ?>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivoprojeitokursusUrlPortfolio').$sistema->sistema)?>">
                                    <?=lang('sidebarPortfolio.projeitokursusPortfolio') ?>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivoclasseUrlPortfolio').$sistema->sistema)?>">
                                    <?=lang('sidebarPortfolio.aulaPortfolio') ?>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivocertifikadoUrlPortfolio').$sistema->sistema)?>">
                                    <?=lang('sidebarPortfolio.certifikadoPortfolio') ?>
                                    </a>
                                </th>
                                <th class="text-center"><?=lang('aktivosistema.dateAktivo') ?></th>
                                <th class="text-center"><?=lang('aktivosistema.sistemaSidebar') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(10 * ($page - 1));
                            $no=1; foreach($menu as $portfolio): ?>
                            <tr>
                                <td align="center"><?=$no++?></td>
                                <td><?=$portfolio->naran_kompleto?><sub class="text-danger">(<?=$portfolio->sistema?>)</sub></td>
                                <form action="<?= site_url(lang('aktivosistema.finansaUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_menu_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->menu_finansa ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->menu_finansa ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->menu_finansa ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.funsionarioUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_menu_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->menu_funsionario ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->menu_funsionario ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->menu_funsionario ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.professoresUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_menu_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->menu_profesores ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->menu_profesores ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->menu_profesores ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.estudanteUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_menu_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->menu_estudante ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->menu_estudante ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->menu_estudante ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.categoriamateriaUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_menu_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->menu_kategoria_materia ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->menu_kategoria_materia ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->menu_kategoria_materia ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.projeitokursusUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_menu_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->menu_kursus_projeito ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->menu_kursus_projeito ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->menu_kursus_projeito ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.classeUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_menu_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->menu_classe_horario ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->menu_classe_horario ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->menu_classe_horario ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.certifikadoUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_menu_acesso  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->menu_sertifikado ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->menu_sertifikado ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->menu_sertifikado ?'' : '' ?>
                                    </button></td>
                                </form>
                                <td align="center"><?=$portfolio->data_sistema?></td>
                                <form action="<?= site_url(lang('aktivosistema.sistemaAktivoMenuUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_menu_acesso  ?>">
                                    <td align="center"><button class="btn btn-danger">
                                    <i class="mdi mdi-power-standby"></i>
                                    </button></td>
                                </form>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>