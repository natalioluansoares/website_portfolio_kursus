<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('professoresPortfolio.registoProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('professoresPortfolio.registoProfessoresPortfolio')?></h4>
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
                            <a href="<?=base_url(lang('professoresPortfolio.hamosProfessoresUrlPortfolio')) ?>" class="btn btn-danger ms-1">
                                <i class="mdi mdi-broom"></i>
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
<?php 
    $jumlah_data = count($professores);
    if ($jumlah_data > 0 )
{ ?>
<div class="row">
        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $no = 1 +(6 * ($page - 1));
        $no=1; foreach($professores as $portfolio): ?>
        <div class="col-xl-6 col-xxl-6 col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="text-center p-3" style="background-color: mediumseagreen;">
                            <div class="profile-photo">
                                <img src="<?= base_url('uploads/fotoportfolio/'.$portfolio->image_administrator)?>" style="width: 100px; height: 13vh;" class="img-fluid rounded-circle" alt="">
                            </div>
                            <h3 class="mt-3 mb-1 text-white"><?= $portfolio->naran_primeiro?></h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.fullNamePortfolio') ?></span> <strong class="text-muted"><?=$portfolio->naran_kompleto?><sub class="text-danger">(<?=$portfolio->titulo_professores?>)</sub></strong></li>
                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.statusServisuPortfolio') ?></span> <strong class="text-muted"> <?php if ($portfolio->status_servisu == 'Aktivo') { ?>
                            <?=lang('professoresPortfolio.aktivoServisuProfessores')?>
                            <?php }else{ ?>
                            <?=lang('professoresPortfolio.laAktivoServisuProfessores')?>
                            <?php } ?></strong></li>
                            <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.sexoPortfolio') ?></span> <strong class="text-muted"><?php if ($portfolio->jenero == 'Mane') { ?>
                                    <td><?=lang('professoresPortfolio.maneProfessores')?></td>
                                    <?php }else{ ?>
                                    <td><?=lang('professoresPortfolio.fetoProfessores')?></td>
                                <?php } ?>  
                        </strong></li>

                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.fatinPortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->fatin_moris?></strong></li>

                        
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.numeroEleituralPortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->numero_telefone?></strong></li>

                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.numeroTelefonePortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->numero_eleitural?></strong></li>
                        
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><th><?=lang('professoresPortfolio.datePortfolio') ?></th></span> <strong class="text-muted"><?=$portfolio->loron_moris?></strong></li>
                        </ul>
                        <div class="card-footer text-center border-0 mt-0">								
                            <a href="" class="btn btn-danger btn-animation btn-rounded px-2" data-animation="swing" data-toggle="modal" data-target=".trokaprofessores" id="professores" 
                            data-id="<?= $portfolio->id_professores; ?>">
                            <i class="uil-trash"></i>
                            </a>
                            <a href="<?=base_url(lang('teacherFunsionario.trokaTeacherUrlPortfolio').$portfolio->id_professores) ?>"
                            class="btn btn-success btn-rounded px-2"><i class="uil-edit-alt"></i></a>
                        </div>
                    </div>
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
    </div>
</div>
<?php }else{ ?>
    <div class="table-responsive">
        <center>
            <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
        </center>
    </div>
<?php } ?>
<div class="modal fade trokaprofessores" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('professoresPortfolio.deleteProfessoresUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idprofessores" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_professores" value="1" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#professores", function() {
    var Id = $(this).data('id');


    $(".trokaprofessores #idprofessores").val(Id);
})
</script>
<?= $this->endSection() ?>