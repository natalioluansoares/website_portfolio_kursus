<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.projetosCategoriaPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('funsionario') ?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" name="start" id="start" placeholder="<?=date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="end" name="end" placeholder="<?=date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
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
                            <button class="input-group-text mr-2" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                            <a href="<?= base_url(lang('categorioProjeitoFunsionario.aumentaCategorioBackendFrontendUrlPortfolio')) ?>" class="btn" style="background-color: darkslateblue;color:aliceblue"><i class="fa fa-plus"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <h4 class="card-title"><strong><?=lang('sidebarPortfolio.projetosCategoriaPortfolio')?></strong></h4>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $no = 1 +(10 * ($page - 1));
    ?>
    <?php foreach($categorio as $portfolio): ?>
    <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
        <div class="card">
            <img class="img-fluid" src="<?= base_url('uploads/fotocategorioprojeito/'.$portfolio->image_categorio_projeito)?>" alt="" style="width: 100%;height: 30vh;">
            <div class="card-body">
                <center>
                    <h4><strong><?= $portfolio->categorio_backend_frontend ?></strong></h4>
                </center>
                
                <h5><strong><i class="fa fa-file mr-1"></i><?=lang('categorioPortfolio.descripsaunCategorio') ?><sub style="color: royalblue;">(<?=$portfolio->data_categorio_backend_frontend	 ?>)</sub></strong></h5>
                <?=$portfolio->descripsaun_categorio ?>
                 <span class="card-text">
                    <small class="text-muted"><strong style="color: red;">* <?=$portfolio->backend_frontend ?></strong></small>
                </span>
                 <p class="card-text">
                    <small class="text-muted" style="color: black;"><strong>* <?=$portfolio->naran_ikus ?> (<?=$portfolio->sistema ?>)</strong></small>
                </p>
            </div>
            <center>
                <a href="<?=base_url(lang('categorioProjeitoFunsionario.aumentaCategorioBackendFrontendUrlPortfolio').$portfolio->lian_categorio_backend_frontend.'/'.$portfolio->id_categorio_backend_frontend.'/'.$portfolio->backend_frontend) ?>" class="btn btn-success mb-4"><i class="fa fa-plus"></i></a>

                <a href="<?=base_url(lang('categorioProjeitoFunsionario.showCategorioBackendFrontendUrlPortfolio').$portfolio->lian_categorio_backend_frontend.'/'.$portfolio->id_categorio_backend_frontend) ?>" class="btn btn-info mb-4"><i class="fa fa-folder-open"></i></a>
            </center>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="left" style="float: left;">
    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
</div>
<div class="right" style="float: right;">
    <?= $pager->links('default','pagination') ?>
</div><br><br><br>
<?= $this->endSection() ?>