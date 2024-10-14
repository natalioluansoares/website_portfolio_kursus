<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('funsionarioPortfolio.hamosFunsionarioRegistoPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('funsionarioPortfolio.hamosFunsionarioRegistoPortfolio')?></h4>
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
                            <a href="<?= base_url(lang('funsionarioPortfolio.funsionarioUrlPortfolio'))?>" class="btn btn-dark ms-1">
                                <i class="mdi mdi-skip-previous"></i>
                            </a>
                            <a href="" class="btn btn-danger ms-1 btn-animation" data-animation="zoomIn" data-toggle="modal" data-target=".hamoshotufunsionario">
                            <i class="mdi mdi-broom"></i></a>
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
<?php 
    $jumlah_data = count($funsionario);
    if ($jumlah_data > 0 )
{ ?>
<div class="row">
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><?=lang('funsionarioPortfolio.fullNamePortfolio') ?></th>
                                <th><?=lang('funsionarioPortfolio.statusServisuPortfolio') ?></th>
                                <th><?=lang('funsionarioPortfolio.sexoPortfolio') ?></th>
                                <th><?=lang('funsionarioPortfolio.numeroTelefonePortfolio') ?></th>
                                <th><?=lang('funsionarioPortfolio.numeroEleituralPortfolio') ?></th>
                                <th><?=lang('funsionarioPortfolio.fatinPortfolio') ?></th>
                                <th><?=lang('funsionarioPortfolio.datePortfolio') ?></th>
                                <th><?=lang('funsionarioPortfolio.imagePortfolio') ?></th>
                                <th><?=lang('funsionarioPortfolio.deletePortfolio') ?></th>
                                <th><?=lang('funsionarioPortfolio.updatePortfolio') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($funsionario as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                    <td><?=$portfolio->naran_kompleto?><sub class="text-danger">(<?=$portfolio->titulo_funsionario?>)</sub></td>

                                    <?php if ($portfolio->status_servisu == 'Aktivo') { ?>
                                    <td><?=lang('funsionarioPortfolio.aktivoServisuFunsionario')?></td>
                                    <?php }else{ ?>
                                    <td><?=lang('funsionarioPortfolio.laAktivoServisuFunsionario')?></td>
                                <?php } ?>                               
                                    <?php if ($portfolio->jenero == 'Mane') { ?>
                                    <td><?=lang('funsionarioPortfolio.maneFunsionario')?></td>
                                    <?php }else{ ?>
                                    <td><?=lang('funsionarioPortfolio.fetoFunsionario')?></td>
                                <?php } ?>                               
                                    <td><?=$portfolio->numero_telefone?></td>
                                    <td><?=$portfolio->numero_eleitural?></td>
                                    <td><?=$portfolio->fatin_moris?></td>
                                    <td><?=$portfolio->loron_moris?></td>
                                     <td><img alt="image" src="<?= base_url('uploads/fotoportfolio/'.$portfolio->image_administrator)?>" style="width: 100px;"></td>
                                    <td><a href="" class="btn btn-danger btn-animation" data-animation="flipInX" data-toggle="modal" data-target=".permanentefunsionario" id="funsionario" 
                                    data-id="<?= $portfolio->id_funsionario; ?>">
                                    <i class="uil-trash"></i>
                                    </a></td>
                                    <td><a href="" class="btn btn-warning btn-animation" data-animation="flipInY" data-toggle="modal" data-target=".hamosfunsionario" id="funsionariotemporario" 
                                    data-id="<?= $portfolio->id_funsionario; ?>">
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
</div>
<?php }else{ ?>
    <div class="table-responsive">
        <center>
            <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
        </center>
    </div>
<?php } ?>
<!-- Hamos Permanente -->
<div class="modal fade permanentefunsionario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('funsionarioPortfolio.permanenteFunsionarioUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="id" id="idfunsionario" placeholder="Kategori"class="form-control">
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
<div class="modal fade hamosfunsionario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('funsionarioPortfolio.temporarioFunsionarioUrlPortfolio')) ?>" method="post">
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
<div class="modal fade hamoshotufunsionario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('funsionarioPortfolio.hamoshotutemporarioFunsionarioUrlPortfolio')) ?>" method="get">
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
    $(document).on("click", "#funsionario", function() {
    var Id = $(this).data('id');

    $(".permanentefunsionario #idfunsionario").val(Id);
})
</script>
<script>
    $(document).on("click", "#funsionariotemporario", function() {
    var Id = $(this).data('id');

    $(".hamosfunsionario #idhamos").val(Id);
})
</script>
<?= $this->endSection() ?>