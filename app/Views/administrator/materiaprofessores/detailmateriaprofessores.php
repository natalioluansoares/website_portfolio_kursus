<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.detailMateriaProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.detailMateriaProfessoresPortfolio')?></h4>
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
                            
                            <a href="<?=base_url(lang('materiaProfessores.materiaProfessoresPortfolioUrlPortfolio'))?>" class="btn btn-dark ms-1">
                                <i class="mdi mdi-skip-previous"></i>
                            </a>
                            <a href="<?=base_url(lang('materiaProfessores.aumentaMateriaProfessoresPortfolioUrlPortfolio').$professores->id_professores)?>" class="btn btn-info ms-1">
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
<div class="row">
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><?=lang('materiaProfessores.kodeMateria') ?></th>
                                <th><?=lang('materiaProfessores.materiaMateria') ?></th>
                                <th><?=lang('materiaProfessores.materiaProfessores') ?></th>
                                <th class="text-center"><?=lang('materiaProfessores.levelMateria') ?></th>
                                <th class="text-center"><?=lang('materiaProfessores.osanMateria') ?></th>
                                <th><?=lang('materiaProfessores.dataMateria') ?></th>
                                <th class="text-center"><?=lang('materiaProfessores.hamosMateria') ?></th>
                                <th class="text-center"><?=lang('materiaProfessores.trokaMateria') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($materia as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->kode_materia_professores?></td>
                                <td><?=$portfolio->materia_kursus?></td>
                                <td><?=$portfolio->naran_kompleto ?><sub class="text-danger">(<?=$portfolio->titulo_professores ?>)</sub></td>

                                <td align="center"><a href="<?=base_url(lang('preparasaunMateria.preparasaunPreparasaunMateriaPortfolioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="btn btn-warning btn-sm"><?=$portfolio->level_materia_kursus ?></span></small></strong></a></td>
                                <td align="center"><strong><small class="text-center"><span class="btn btn-info">$ <?=number_format($portfolio->preso_materia_kursus, 2) ?></span></small></strong></td>
                                <td><?=$portfolio->data_materia_professores ?></td>
                                <td align="center">
                                    <a href="" class="btn btn-danger btn-animation" data-animation="flipInX" data-toggle="modal" data-target=".trokamateriaprofessores" id="materiaprofessores" 
                                data-id="<?= $portfolio->id_materia_professores; ?>">
                                <i class="uil-trash"></i>
                                </a>
                                </td>
                                <td align="center"><a href="<?=base_url(lang('materiaProfessores.trokaMateriaProfessoresPortfolioUrlPortfolio').$portfolio->materia_professores.'/'.$portfolio->id_materia_professores) ?>" class="btn btn-success"><i class="uil-edit-alt"></i></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><br>
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
<div class="modal fade trokamateriaprofessores" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('materiaProfessores.deleteMateriaProfessoresPortfolioUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                    </center>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idmateriaprofessores" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_materia_professores" value="1" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#materiaprofessores", function() {
    var Id = $(this).data('id');


    $(".trokamateriaprofessores #idmateriaprofessores").val(Id);
})
</script>
<?= $this->endSection() ?>