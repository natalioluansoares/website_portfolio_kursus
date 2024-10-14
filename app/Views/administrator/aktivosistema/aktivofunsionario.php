<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aturanFunsionarioPortfolioa') ?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aturanFunsionarioPortfolioa') ?></h4>
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
                            <a href="<?= site_url(lang('aktivosistema.aktivoHotuFunsionarioUrlPortfolio'))?>" class="btn btn-warning ms-1" style="color: white;" title="">
                                <i class="mdi mdi-power-standby"></i>
                            </a>
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
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="width: 20%;"><?=lang('registoAdministrator.fullNamePortfolio') ?></th>
                                <th><?=lang('registoAdministrator.statusServisuPortfolio') ?></th>
                                <th><?=lang('registoAdministrator.sexoPortfolio') ?></th>
                                <th><?=lang('registoAdministrator.datePortfolio') ?></th>
                                <th><?=lang('registoAdministrator.sistemaPortfolio') ?></th>
                                <th><?=lang('registoAdministrator.imagePortfolio') ?></th>
                                <th><?=lang('sidebarPortfolio.aktivoSistemaPortfolioa') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($administrator as $portfolio): ?>
                            <tr>
                                <?php if ($portfolio->valido_administrator == 1) { ?>
                                    <td><?=$no++?></td>
                                <?php } else {?>
                                    <td style="color: red;"><?=$no++?></td>
                                <?php } ?>


                                <?php if ($portfolio->valido_administrator == 1) { ?>
                                    <td><?=$portfolio->naran_kompleto?></td>
                                <?php }else {?>
                                        <td style="color: red;"><?=$portfolio->naran_kompleto?></td>
                                <?php } ?>


                                <?php if ($portfolio->valido_administrator == 1) { ?>
                                    <?php if ($portfolio->status_servisu == 'Aktivo') { ?>
                                    <td><?=lang('registoAdministrator.aktivoServisuAdministrator')?></td>
                                    <?php }else{ ?>
                                    <td><?=lang('registoAdministrator.laAktivoServisuAdministrator')?></td>
                                    <?php } ?> 
                                <?php }else {?>
                                        <?php if ($portfolio->status_servisu == 'Aktivo') { ?>
                                        <td style="color: red;"><?=lang('registoAdministrator.aktivoServisuAdministrator')?></td>
                                        <?php }else{ ?>
                                        <td style="color: red;"><?=lang('registoAdministrator.laAktivoServisuAdministrator')?></td>
                                        <?php } ?> 
                                <?php } ?>
                               

                                <?php if ($portfolio->valido_administrator == 1) { ?>
                                    <?php if ($portfolio->jenero == 'Mane') { ?>
                                    <td><?=lang('registoAdministrator.maneAdministrator')?></td>
                                    <?php }else{ ?>
                                    <td><?=lang('registoAdministrator.fetoAdministrator')?></td>
                                    <?php } ?>
                                <?php }else {?>
                                    <?php if ($portfolio->jenero == 'Mane') { ?>
                                    <td style="color: red;"><?=lang('registoAdministrator.maneAdministrator')?></td>
                                    <?php }else{ ?>
                                    <td style="color: red;"><?=lang('registoAdministrator.fetoAdministrator')?></td>
                                    <?php } ?>
                                <?php } ?>

                               
                                <?php if ($portfolio->valido_administrator == 1) { ?>
                                    <td><?=$portfolio->data_administrator?></td>
                                <?php }else {?>
                                    <td style="color: red;"><?=$portfolio->data_administrator?></td>
                                <?php } ?>


                                <?php if ($portfolio->valido_administrator == 1) { ?>
                                    <?php if ($portfolio->sistema) { ?>
                                        <td><?=lang('aktivosistema.funsionario')?></td>
                                    <?php } ?>
                                <?php }else {?>
                                    <?php if ($portfolio->sistema) { ?>
                                        <td style="color: red;"><?=lang('aktivosistema.funsionario')?></td>
                                    <?php } ?>
                                <?php } ?>


                                <td><a href="<?=base_url(lang('registoAdministrator.imageRegistoUrlConta').$portfolio->id_administrator) ?>"><img alt="image" src="<?= base_url('uploads/fotoportfolio/'.$portfolio->image_administrator)?>" style="width: 100px;"></a></td>
                                <form action="<?= site_url(lang('aktivosistema.aumentaAktivoUrlPortfolio'))?>" method="post" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" class="form-control" value="<?=$portfolio->id_administrator ?>">
                                    <td><button class="btn btn-circle <?= $portfolio->valido_administrator ? 'btn-light' : 'btn-danger' ?>" title="<?= $portfolio->valido_administrator ?'Aktif' : 'Tidak Aktif' ?>">
                                    <i class="mdi mdi-power-standby"></i><?= $portfolio->valido_administrator ?'' : '' ?>
                                    </button></td>
                                    
                                </form>
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
<div class="modal fade trokaadministrator" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('registoAdministrator.deleteRegistoUrlConta')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idadministrator" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_administrator" value="1" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="valido_administrator" value="0" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#administrator", function() {
    var Id = $(this).data('id');


    $(".trokaadministrator #idadministrator").val(Id);
})
</script>
<?= $this->endSection() ?>