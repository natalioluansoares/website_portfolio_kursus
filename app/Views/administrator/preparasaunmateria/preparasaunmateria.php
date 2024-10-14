<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.preparaMateriaProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.preparaMateriaProfessoresPortfolio')?></h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="app-search dropdown">
                    <form>
                        <div class="input-group">
                            <a href="<?= base_url(lang('materiaProfessores.detailMateriaProfessoresPortfolioUrlPortfolio').$materiaprofessores->materia_professores)?>" class="btn btn-dark ms-1">
                                <i class="mdi mdi-skip-previous"></i>
                            </a>
                            <a href="<?= base_url(lang('preparasaunMateria.hamosPreparasaunMateriaPortfolioUrlPortfolio').$materiaprofessores->id_materia_professores) ?>" class="btn btn-danger ms-1">
                            <i class="mdi mdi-broom"></i></a>

                            <a href="<?= base_url(lang('preparasaunMateria.aumentaPreparasaunMateriaPortfolioUrlPortfolio').$materiaprofessores->id_materia_professores) ?>" class="btn btn-info ms-1">
                                <i class="mdi mdi-plus"></i>
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
<?php 
$jumlah_data = count($preparasaunmateria);
if ($jumlah_data > 0 )
{ ?>
<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$no = 1 +(6 * ($page - 1));
$no=1; foreach($preparasaunmateria as $portfolio): ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="text-center py-5" style="background-color: darkgrey;">
                <div class="profile-photo">
                    <img src="<?= base_url('uploads/fotoportfolio/'.$portfolio->image_administrator)?>" style="width: 150px; height: 23vh;" class="img-fluid rounded-circle" alt="">
                </div>
                <h3 class="mt-3 mb-1 text-white"><strong><span class="badge badge-warning">(<?=$portfolio->kode_materia_professores ?>/<?=$portfolio->materia_kursus ?>)</span></strong></h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('professoresPortfolio.fullNamePortfolio') ?></span> <strong class="text-muted"><?=$portfolio->naran_kompleto?><sub class="text-danger">(<?=$portfolio->titulo_professores?>)</sub></strong></li>
                
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('materiaProfessores.dataMateria') ?></span><?=$portfolio->data_materia_professores?></li>

                <li class="list-group-item d-flex justify-content-between"><span class="mb-0"><?=lang('materiaProfessores.levelMateria') ?></span><strong><span class="badge badge-success"><?=$portfolio->level_materia_kursus ?></span></strong></li>

                <li class="list-group-item d-flex">
                    <?=$portfolio->preparasaun_materia ?>
                </li>
            </ul>
            <div class="card-footer text-center border-0 mt-0">	
                <a href="" class="btn btn-danger btn-rounded px-2 btn-animation" data-animation="flipInX" data-toggle="modal" data-target=".trokapreparasaunmateria" id="preparasaunmateria" 
                    data-id="<?= $portfolio->id_preparasaun_materia; ?>"><i class="uil-trash"></i></a>

                <a href="<?=base_url(lang('preparasaunMateria.trokaPreparasaunMateriaPortfolioUrlPortfolio').$portfolio->level_preparasaun_materia.'/'.$portfolio->id_preparasaun_materia) ?>" class="btn btn-success btn-rounded px-2"><i class="uil-edit-alt"></i></a>

            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php }else{ ?>
    <div class="table-responsive">
        <center>
            <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData'); ?></span>
        </center>
    </div>
<?php } ?>
<div class="modal fade trokapreparasaunmateria" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('preparasaunMateria.deletePreparasaunMateriaPortfolioUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                    </center>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idpreparasaunmateria" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_preparasaun_materia" value="1" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#preparasaunmateria", function() {
    var Id = $(this).data('id');


    $(".trokapreparasaunmateria #idpreparasaunmateria").val(Id);
})
</script>
<?= $this->endSection() ?>