<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.projeitoPortfolio')?> <?=$categorio->backend_frontend ?></title>
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
                        <a href="<?= base_url(lang('categorioProjeitoFunsionario.categorioBackendFrontendUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
                            <a href="<?=base_url(lang('categorioProjeitoFunsionario.aumentaCategorioBackendFrontendUrlPortfolio').$categorio->lian_categorio_backend_frontend.'/'.$categorio->id_categorio_backend_frontend.'/'.$categorio->backend_frontend) ?>" class="btn" style="background-color: darkslateblue;color:aliceblue"><i class="fa fa-plus"></i></a>
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
            <h4 class="card-title"><strong><?=lang('sidebarPortfolio.projeitoPortfolio')?> <?=$categorio->backend_frontend ?></strong></h4>
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
    <?php foreach($backend as $portfolio): ?>
    <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
        <div class="card">
            <iframe style="width: 100%; height:200px ;" src="<?=$portfolio->youtube ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <div class="card-body">
                <h5 class="card-title"><?=$portfolio->titulo_backend_frontend ?></h5>
                <p class="card-text"><a href="<?=base_url(lang('projeitoBackendPortfolio.detailProjeitoBackendFrontendUrlPortfolio').$portfolio->id_backend_frontend) ?>" title="<?=lang('projeitoBackendPortfolio.detailProjeitoBackendFrontend') ?>" class="text-dark"><?= $portfolio->descripsaun_backend_frontend ?></a></p>
                <h5 class="card-text">
                    <small class="text-muted mr-2"><a href="<?=$portfolio->youtube?>" target="_blank" class="text-danger mr-2">Youtube</a></small>
                    <small class="text-muted"><a href="<?=$portfolio->facebook ?>" target="_blank" class="text-primary mr-2">Facebook</a></small>
                    <small class="text-muted"><a href="<?=$portfolio->instagram ?>" target="_blank" style="color: hotpink;" class="mr-2">Instagram</a></small>
                    <small class="text-muted"><a href="<?=$portfolio->tiktok ?>" target="_blank" class="text-dark">TikTok</a></small>
                </h5>
                <sub class="text-danger"><?=$portfolio->categorio_backend_frontend ?></sub>
                <p class="card-text">
                    <small class="text-muted"><?=$portfolio->data_backend_frontend ?> (<?=$portfolio->backend_frontend ?>)</small>
                </p>
                <center>
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <a href="<?=base_url(lang('categorioProjeitoFunsionario.trokaCategorioBackendFrontendUrlPortfolio').$portfolio->lian_backend_frontend.'/'.$portfolio->id_backend_frontend.'/'.$portfolio->backend_frontend)?>" class="btn btn-success mr-1"><i class="fa fa-pencil"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="" class="btn btn-danger btn-animation ms-1" data-animation="flipInX" data-toggle="modal" data-target=".trokaprojeitobackend" id="projeitobackend" 
                                    data-id="<?= $portfolio->id_backend_frontend; ?>">
                                    <i class="fa fa-trash"></i>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </center>
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
</div><br><br><br>
<div class="modal fade trokaprojeitobackend" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br><br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('categorioProjeitoFunsionario.deleteCategorioBackendFrontendUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></font>
                    </center><br>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idprojeitobackend" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_backend_frontend" value="1" placeholder="Kategori"class="form-control">
                    </center>
                    <center>
                        <button type="submit" class="btn btn-primary"><?=lang('hamosPortfolio.hamosData') ?></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url()?>templatefunsionario/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#projeitobackend", function() {
        var Id = $(this).data('id');


    $(".trokaprojeitobackend #idprojeitobackend").val(Id);
})
</script>
<?= $this->endSection() ?>