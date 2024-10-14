<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.trokaMateriaProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.trokaMateriaProfessoresPortfolio')?></h4>
            </div>
        </div>
    </div>
</div>
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
                <div class="tab-content">
                    <?php $errors = session()->getFlashdata('errors'); ?>
                    <div class="tab-pane show active" id="form-row-preview">
                        <form action="<?=base_url(lang('materiaProfessores.updateMateriaProfessoresPortfolioUrlPortfolio').$materia->id_materia_professores) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label"><?=lang('materiaProfessores.kodeMateria')?></label>
                                    <input type="text" name="kode_materia_professores" value="<?=old('kode_materia_professores',$materia->kode_materia_professores) ?>" class="form-control" id="inputEmail4" placeholder="<?=lang('materiaProfessores.kodeMateria')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['kode_materia_professores']) ?  $errors['kode_materia_professores'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaProfessores.materiaMateria')?></label>
                                    <select id="inputState" name="materia_kursus_professores" class="form-control">
                                        <option value="<?=$materia->materia_kursus_professores?>"><?=$materia->materia_kursus?></option>
                                        <option value=""><?=lang('materiaProfessores.hiliMateriaMateria')?></option>
                                        <?php foreach($kursus as $pro): ?>
                                        <option value="<?=$pro->id_materia_kursus?>"<?= old('materia_kursus_professores') == $pro->id_materia_kursus ? 'selected' : null ?>><?=$pro->materia_kursus?>(<sub><?=$pro->level_materia_kursus?></sub>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['materia_kursus_professores']) ?  $errors['materia_kursus_professores'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('materiaProfessores.materiaProfessores')?></label>
                                    <select id="inputState" name="materia_professores" class="form-control">
                                        <option value="<?=$materia->materia_professores?>"><?=$materia->naran_kompleto?>. <?=$materia->titulo_professores?>(<sub><?=$materia->sistema?></sub>)</option>
                                        <option value=""><?=lang('professoresPortfolio.hiliContaProfessores')?></option>
                                        <?php foreach($professores as $pro): ?>
                                        <option value="<?=$pro->id_professores?>"<?= old('materia_professores') == $pro->id_professores ? 'selected' : null ?>><?=$pro->naran_kompleto?>. <?=$materia->titulo_professores?>(<sub><?=$pro->sistema?></sub>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['materia_professores']) ?  $errors['materia_professores'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaProfessores.dataMateria')?></label>
                                    <input type="text" name="data_materia_professores" value="<?=old('data_materia_professores',$materia->data_materia_professores) ?>" class="form-control" id="mdate" placeholder="<?=date('Y-M-d')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['data_materia_professores']) ?  $errors['data_materia_professores'] : null ?>
                                    </small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <?php foreach($professores as $portfolio): ?>
                            <a href="<?= base_url(lang('materiaProfessores.detailMateriaProfessoresPortfolioUrlPortfolio').$portfolio->id_professores)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                            <?php endforeach; ?>
                        </form>                     
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>