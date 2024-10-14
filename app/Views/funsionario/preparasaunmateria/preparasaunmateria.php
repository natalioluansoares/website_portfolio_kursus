<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.preparaMateriaProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('funsionario') ?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="text" placeholder="<?=date('Y-M-d') ?>" class="form-control form-control-light" name="start" id="start">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="text" placeholder="<?=date('Y-M-d') ?>" class="form-control form-control-light" name="end" id="end">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <a href="<?= base_url(lang('materiaProfessores.detailMateriaProfessoresUrlPortfolio').$materiaprofessores->materia_professores)?>" class="btn btn-dark"><i class="mdi mdi-skip-previous"></i></a>
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
                            <a href="<?= base_url(lang('preparasaunMateria.aumentaPreparasaunMateriaUrlPortfolio').$materiaprofessores->id_materia_professores) ?>" class="btn" style="background-color: black; color:aliceblue"><i class="fa fa-plus"></i></a>
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
            <h4 class="card-title"><strong><?=lang('sidebarPortfolio.preparaMateriaProfessoresPortfolio')?></strong></h4>
        </div>
    </div>
</div>
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
                <a href="<?=base_url(lang('preparasaunMateria.trokaPreparasaunMateriaUrlPortfolio').$portfolio->level_preparasaun_materia.'/'.$portfolio->id_preparasaun_materia) ?>" class="btn btn-success btn-rounded px-3"><i class="fa fa-pencil"></i></a>

                <a href="" class="btn btn-danger btn-rounded px-3" data-animation="flipInX" data-toggle="modal" data-target=".trokapreparasaunmateria" id="preparasaunmateria" 
                    data-id="<?= $portfolio->id_preparasaun_materia; ?>"><i class="fa fa-trash"></i></a>
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
            <br><br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('preparasaunMateria.deletePreparasaunMateriaUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></font>
                    </center>
                    <br>
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
<script src="<?= base_url()?>templatefunsionario/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#preparasaunmateria", function() {
    var Id = $(this).data('id');


    $(".trokapreparasaunmateria #idpreparasaunmateria").val(Id);
})
</script>
<?= $this->endSection() ?>