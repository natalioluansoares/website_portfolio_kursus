<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.backendPortfolio')?>(<?=$categorio->categorio_backend_frontend ?>/<?=$categorio->backend_frontend ?>)</title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.backendPortfolio')?><sub class="text-danger">(<?=$categorio->categorio_backend_frontend ?>/<?=$categorio->backend_frontend ?>)</sub></h4>
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
                            <a href="<?= base_url(lang('projeitoBackendPortfolio.projeitoBackendFrontendUrlPortfolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                            <a href="<?=base_url(lang('projeitoBackendPortfolio.hamosProjeitoBackendFrontendUrlPortfolio').$categorio->lian_categorio_backend_frontend.'/'.$categorio->id_categorio_backend_frontend)?>" class="btn btn-danger ms-1">
                                <i class="mdi mdi-bucket"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <?php 
        $jumlah_data = count($backend);
        if ($jumlah_data > 0 )
    { ?>
    <div class="col-12">
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $no = 1 +(6 * ($page - 1));
            foreach($backend as $portfolio): ?>
            <div class="col">
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
                                            <a href="<?=base_url(lang('projeitoBackendPortfolio.aumentaProjeitoBackendFrontendUrlPortfolio').$portfolio->lian_backend_frontend.'/'.$portfolio->id_categorio_backend_frontend) ?>" class="btn btn-success"><i class="uil-plus"></i></a>
                                        </th>
                                        <th>
                                            <a href="<?=base_url(lang('projeitoBackendPortfolio.trokaProjeitoBackendFrontendUrlPortfolio').$portfolio->lian_backend_frontend.'/'.$portfolio->id_backend_frontend)?>" class="btn btn-primary"><i class="uil-edit-alt"></i>
                                            </a>
                                        </th>
                                        <th>
                                            <a href="" class="btn btn-danger btn-animation" data-animation="flipInX" data-toggle="modal" data-target=".trokaprojeitobackend" id="projeitobackend" 
                                            data-id="<?= $portfolio->id_backend_frontend; ?>">
                                            <i class="uil-trash"></i>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </center>
                    </div>
                </div>
            </div> <!-- end col-->
            <?php endforeach; ?>
        </div> <!-- end col-->
        <div class="left" style="float: left;">
        <span>Showing <?=  $no = 1 +(6 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
        </div>
        <div class="right" style="float: right;">
            <?= $pager->links('default','pagination') ?>
        </div>
    </div> <!-- end col-->
    <?php }else{ ?>
        <div class="table-responsive">
            <center>
                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><a class="text-white" href="<?=base_url(lang('projeitoBackendPortfolio.projeitoBackendFrontendUrlPortfolio')) ?>"><?=lang('hamosPortfolio.bukaData') ?>....<?=lang('hamosPortfolio.filaProjeitoData') ?></a></span>
            </center>
        </div>
    <?php } ?>
</div>
<div class="modal fade trokaprojeitobackend" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('projeitoBackendPortfolio.deleteProjeitoBackendFrontendUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
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
<script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#projeitobackend", function() {
    var Id = $(this).data('id');


    $(".trokaprojeitobackend #idprojeitobackend").val(Id);
})
</script>
<?= $this->endSection() ?>