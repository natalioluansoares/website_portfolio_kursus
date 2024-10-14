<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('projeitoBackendPortfolio.temporarioCategorio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('projeitoBackendPortfolio.temporarioCategorio')?></h4>
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
                            <?php 
                                $jumlah_data = count($backend);
                                if ($jumlah_data > 0 )
                            { ?>
                            <a href="<?=base_url(lang('projeitoBackendPortfolio.showProjeitoBackendFrontendUrlPortfolio').$categorio->lian_categorio_backend_frontend.'/'.$categorio->id_categorio_backend_frontend)?>" class="btn btn-dark ms-1">
                                <i class="mdi mdi-skip-previous"></i>
                            </a>
                            <?php } ?>
                            
                            <a href="" class="btn btn-danger ms-1 btn-animation" data-animation="rubberBand" data-toggle="modal" data-target=".hamoshotuprojeitobackend">
                            <i class="mdi mdi-broom"></i></a>
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
                    <img src="<?= base_url()?>templateadministrator/assets/images/backend/backend.jpg" class="card-img-top" alt="Card image cap" style="width: 100%; height:200px ;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$portfolio->titulo_backend_frontend ?></h5>
                        <p class="card-text"><?= $portfolio->descripsaun_backend_frontend ?></p>
                        <sub class="text-danger"><?=$portfolio->categorio_backend_frontend ?></sub>
                        <p class="card-text">
                            <small class="text-muted"><?=$portfolio->data_categorio_backend_frontend ?> (<?=$portfolio->backend_frontend ?>)</small>
                        </p>
                        <center>
                            <table>
                                <thead>
                                   <tr>
                                        <th>
                                            <td><a href="" class="btn btn-danger btn-animation ms-1" data-animation="slideInUp" data-toggle="modal" data-target=".permanenteprojeitobackend" id="projeitobackend" 
                                            data-id="<?= $portfolio->id_backend_frontend; ?>">
                                            <i class="uil-trash"></i>
                                            </a></td>
                                        </th>
                                        <th>
                                            <td><a href="" class="btn btn-warning btn-animation ms-1" data-animation="slideInDown" data-toggle="modal" data-target=".hamosprojeitobackend" id="projeitobackendtemporario" 
                                            data-id="<?= $portfolio->id_backend_frontend; ?>">
                                            <i class="mdi mdi-broom"></i>
                                            </a></td>
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
                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><a class="text-white" href="<?=base_url(lang('projeitoBackendPortfolio.showProjeitoBackendFrontendUrlPortfolio').$categorio->lian_categorio_backend_frontend.'/'.$categorio->id_categorio_backend_frontend) ?>"><?=lang('hamosPortfolio.bukaData') ?>....<?=lang('hamosPortfolio.filaProjeitoData') ?></a></span>
            </center>
        </div>
    <?php } ?>
</div>
<!-- Hamos Permanente -->
<div class="modal fade permanenteprojeitobackend" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('projeitoBackendPortfolio.permanenteProjeitoBackendFrontendUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="id" id="idprojeitobackend" placeholder="Kategori"class="form-control">
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

<!-- Hamos Temporario -->
<div class="modal fade hamosprojeitobackend" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('projeitoBackendPortfolio.temporarioProjeitoBackendFrontendUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.temporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idhamos" placeholder="Kategori"class="form-control">
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

<!-- Hamos Hotu Temporario -->
<div class="modal fade hamoshotuprojeitobackend" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('projeitoBackendPortfolio.hamoshotutemporarioProjeitoBackendFrontendUrlPortfolio')) ?>" method="get">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.hamostemporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
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

    $(".permanenteprojeitobackend #idprojeitobackend").val(Id);
})
</script>
<script>
    $(document).on("click", "#projeitobackendtemporario", function() {
    var Id = $(this).data('id');

    $(".hamosprojeitobackend #idhamos").val(Id);
})
</script>
<?= $this->endSection() ?>