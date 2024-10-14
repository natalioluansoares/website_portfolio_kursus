<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('categoriobackendfrontendPortfolio.temporarioCategorio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('categoriobackendfrontendPortfolio.temporarioCategorio')?></h4>
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
                            <select name="keyword" id="" class="form-control">
                                <option value="">Pilih Categorio Project</option>
                                <?php foreach($categorio as $portfolio): ?>
                                    <option value="<?=$portfolio->categorio_backend_frontend ?>"><?=$portfolio->categorio_backend_frontend ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text  btn-success" type="submit"><i class="uil-search-plus"></i></button>
                            <a href="<?= base_url(lang('categoriobackendfrontendPortfolio.categorioBackendFrontendUrlPortfolio'))?>" class="btn btn-dark ms-1">
                                <i class="mdi mdi-skip-previous"></i>
                            </a>
                            <a href="" class="btn btn-danger ms-1 btn-animation" data-animation="wobble" data-toggle="modal" data-target=".hamoshotucategorio">
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
    $jumlah_data = count($categorio);
    if ($jumlah_data > 0 )
    { ?>
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><?= lang('categoriobackendfrontendPortfolio.kodeCategorio') ?></th>
                                <th><?= lang('categoriobackendfrontendPortfolio.categorioCategorio') ?></th>
                                <th><?= lang('categoriobackendfrontendPortfolio.projectCategorio') ?></th>
                                <th><?= lang('categoriobackendfrontendPortfolio.dataCategorio') ?></th>
                                <th><?= lang('categoriobackendfrontendPortfolio.deleteCategorio') ?></th>
                                <th><?= lang('categoriobackendfrontendPortfolio.hamosTemporarioCategorio') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($categorio as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->kode_categorio_backend_frontend?></td>
                                <td><?=$portfolio->categorio_backend_frontend?></td>
                                <td><?=$portfolio->backend_frontend?></td>
                                <td><?=$portfolio->data_categorio_backend_frontend?></td>
                                <td><a href="" class="btn btn-danger btn-animation" data-animation="flipInX" data-toggle="modal" data-target=".permanentecategorio" id="categorio" 
                                data-id="<?= $portfolio->id_categorio_backend_frontend; ?>">
                                <i class="uil-trash"></i>
                                </a></td>
                                <td><a href="" class="btn btn-warning btn-animation" data-animation="flipInY" data-toggle="modal" data-target=".hamoscategorio" id="categoriotemporario" 
                                data-id="<?= $portfolio->id_categorio_backend_frontend; ?>">
                                <i class="mdi mdi-broom"></i>
                                </a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(6 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <?php }else{ ?>
        <div class="table-responsive">
            <center>
                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData'); ?></span>
            </center>
        </div>
    <?php } ?>
</div>
<!-- Hamos Permanente -->
<div class="modal fade permanentecategorio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('categoriobackendfrontendPortfolio.permanenteCategorioBackendFrontendUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="id" id="idcategorio" placeholder="Kategori"class="form-control">
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
<div class="modal fade hamoscategorio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('categoriobackendfrontendPortfolio.temporarioCategorioBackendFrontendUrlPortfolio')) ?>" method="post">
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
<div class="modal fade hamoshotucategorio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('categoriobackendfrontendPortfolio.hamoshotutemporarioCategorioBackendFrontendUrlPortfolio')) ?>" method="get">
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
    $(document).on("click", "#categorio", function() {
    var Id = $(this).data('id');

    $(".permanentecategorio #idcategorio").val(Id);
})
</script>
<script>
    $(document).on("click", "#categoriotemporario", function() {
    var Id = $(this).data('id');

    $(".hamoscategorio #idhamos").val(Id);
})
</script>
<?= $this->endSection() ?>