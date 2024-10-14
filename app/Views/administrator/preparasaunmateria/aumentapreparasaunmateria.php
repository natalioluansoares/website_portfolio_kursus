<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaPreparaMateriaProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaPreparaMateriaProfessoresPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('preparasaunMateria.inputPreparasaunMateriaPortfolioUrlPortfolio')) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('preparasaunMateria.lianMateria')?></label>
                                    <select id="inputState" name="lian_preparasaun_materia" class="form-control">
                                        <option value=""><?=lang('preparasaunMateria.hiliLianMateria')?></option>
                                        <option value="<?=lang('preparasaunMateria.lianPreparasaun')?>"<?= old('lian_preparasaun_materia') == lang('preparasaunMateria.lianPreparasaun') ? 'selected' : null ?>><?=lang('preparasaunMateria.lianPreparasaun') ?></option>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['lian_preparasaun_materia']) ?  $errors['lian_preparasaun_materia'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('preparasaunMateria.materiaProfessores')?></label>
                                    <select id="inputState" name="level_preparasaun_materia" class="form-control">
                                        <option value=""><?=lang('preparasaunMateria.hiliMateriaProfessores')?></option>
                                        <?php foreach($materiaprofessores as $pro): ?>
                                        <option value="<?=$pro->id_materia_professores?>"<?= old('level_preparasaun_materia') == $pro->id_materia_professores ? 'selected' : null ?>><?=$pro->naran_kompleto?>(<sub><?=$pro->titulo_professores?></sub>) / <?=$pro->materia_kursus?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['level_preparasaun_materia']) ?  $errors['level_preparasaun_materia'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('preparasaunMateria.preparasaunMateria')?></label>
                                    <textarea name="preparasaun_materia" class="form-control" id="" cols="30" rows="10"><?=old('preparasaun_materia') ?></textarea>
                                    <small class="text-danger">
                                        <?=isset($errors['preparasaun_materia']) ?  $errors['preparasaun_materia'] : null ?>
                                    </small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <?php foreach($materiaprofessores as $portfolio): ?>
                            <a href="<?= base_url(lang('preparasaunMateria.preparasaunPreparasaunMateriaPortfolioUrlPortfolio').$portfolio->id_materia_professores)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                            <?php endforeach; ?>
                        </form>
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('preparasaun_materia');
</script>
<?= $this->endSection() ?>