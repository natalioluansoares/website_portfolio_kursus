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
                                <th><?=lang('aktivosistema.naranSidebar') ?></th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivoinputanUrlPortfolio').$sistema->sistema)?>">
                                        <?=lang('aktivosistema.inputSidebar') ?>
                                    </a>
                                </th>
                                <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivoupdateUrlPortfolio').$sistema->sistema)?>">
                                        <?=lang('aktivosistema.updateSidebar') ?>
                                    </a>
                                </th>
                                 <th class="text-center">
                                    <a href="<?= site_url(lang('aktivosistema.aktivodeleteUrlPortfolio').$sistema->sistema)?>">
                                        <?=lang('aktivosistema.deleteSidebar') ?>
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
                                <form action="<?= site_url(lang('aktivosistema.inputUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso_autromos  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->aumenta_direito_acesso_autromos ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->aumenta_direito_acesso_autromos ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->aumenta_direito_acesso_autromos ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.updateUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso_autromos  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->troka_direito_acesso_autromos ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->troka_direito_acesso_autromos ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->troka_direito_acesso_autromos ?'' : '' ?>
                                    </button></td>
                                </form>
                                <form action="<?= site_url(lang('aktivosistema.deleteUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso_autromos  ?>">
                                    <td align="center"><button class="btn btn-circle <?= $portfolio->hamos_direito_acesso_autromos ? 'btn-light' : 'btn-dark' ?>" title="<?= $portfolio->hamos_direito_acesso_autromos ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->hamos_direito_acesso_autromos ?'' : '' ?>
                                    </button></td>
                                </form>

                                <td align="center"><?=$portfolio->data_sistema?></td>

                                <form action="<?= site_url(lang('aktivosistema.sistemaAktivoUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_direito_acesso_autromos  ?>">
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