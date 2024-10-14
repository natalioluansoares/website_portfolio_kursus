<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.temporarioSubsidioPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.temporarioSubsidioPortfolio')?></h4>
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
                        <button class="btn btn-primary ms-1" name="filter-data">
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
                            <a href="<?= base_url(lang('subsidioPortfolio.showSubsidioUrlPortfolio').$osansai->id_osan_sai)?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                            <div class="dropdown">
                                <button class="btn btn-danger dropdown-toggle ms-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="#" class="dropdown-item ms-1 btn-animation" data-animation="slideInDown" data-toggle="modal" data-target=".deleteHotuSubsidio" ><?=lang('subsidioPortfolio.deleteHotuSubsidio') ?></a>
                                    <a href="#" class="dropdown-item ms-1 btn-animation" data-animation="slideInUp" data-toggle="modal" data-target=".restoreHotuSubsidio" ><?=lang('subsidioPortfolio.restoreHotuSubsidio') ?></a>
                                    
                                </div>
                            </div>
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
    $jumlah_data = count($subsidio);
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
                                <th><?=lang('subsidioPortfolio.naranSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.Subsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.totalSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.timeSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.dataHahuSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.dataRemataSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.dataSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.deleteSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.updateSubsidio') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($subsidio as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->naran_kompleto?></td>
                                <td><?=$portfolio->naran_osan_sai?></td>
                                <td>$<?= number_format($portfolio->total_subsidio,2)?></td>
                                <td><?=$portfolio->horas_foti_subsidio?></td>
                                <td><?=$portfolio->data_hahu_aktividade?></td>
                                <td><?=$portfolio->data_remata_aktividade?></td>
                                <input type="hidden" value="<?= $day = strtotime($portfolio->data_remata_aktividade) - strtotime($portfolio->data_hahu_aktividade);
                                $hari = $day / 60 / 60 / 24;
                                ?>">
                                <td><b><?= $hari ?></b> <strong class="mr-1"><?=lang('subsidioPortfolio.dataSubsidio') ?></strong></td>
                               <td>
                                    <a href="" class="btn btn-danger btn-animation" data-animation="slideInLeft" data-toggle="modal" data-target=".hamosPermanenteSubsidio" id="subsidioPermanente" 
                                data-id="<?= $portfolio->id_subsidio; ?>">
                                <i class="uil-trash"></i>
                                </a>
                                </td>
                               <td>
                                    <a href="" class="btn btn-warning btn-animation" data-animation="slideInRight" data-toggle="modal" data-target=".hamosRestoreSubsidio" id="subsidioRestore" 
                                data-id="<?= $portfolio->id_subsidio; ?>">
                                <i class="mdi mdi-broom"></i></a></td>
                                </a>
                                </td>
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
                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
            </center>
        </div>
    <?php } ?>
</div>
<div class="modal fade restoreHotuSubsidio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('subsidioPortfolio.hamosHotuTemporarioSubsidioUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi  mdi-map-marker-question-outline"></i></font>
                    </center>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <?php foreach($result as $portfolio): ?>
                        <input type="hidden" name="id[]" id="" value="<?= $portfolio->id_subsidio ?>" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_subsidio[]" value="1" placeholder="Kategori"class="form-control">
                        <?php endforeach;?>
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

<div class="modal fade deleteHotuSubsidio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('subsidioPortfolio.hamosHotuPermanenteSubsidioUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi  mdi-map-marker-question-outline"></i></font>
                    </center>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE">
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

<div class="modal fade hamosPermanenteSubsidio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('subsidioPortfolio.hamosPermanenteSubsidioUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi  mdi-map-marker-question-outline"></i></font>
                    </center>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" id="idsubsidiopermanente" placeholder="Kategori"class="form-control">
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

<div class="modal fade hamosRestoreSubsidio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('subsidioPortfolio.hamosTemporarioSubsidioUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi  mdi-map-marker-question-outline"></i></font>
                    </center>
                    <center>
                        <h3><?=lang('hamosPortfolio.temporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idsubsidiotemporario" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_subsidio" value="1" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#subsidioPermanente", function() {
    var Id = $(this).data('id');


    $(".hamosPermanenteSubsidio #idsubsidiopermanente").val(Id);
})
</script>
<script>
    $(document).on("click", "#subsidioRestore", function() {
    var Id = $(this).data('id');


    $(".hamosRestoreSubsidio #idsubsidiotemporario").val(Id);
})
</script>
<?= $this->endSection() ?>