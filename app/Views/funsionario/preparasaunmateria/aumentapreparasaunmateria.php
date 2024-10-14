<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.aumentaPreparaMateriaProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('funsionario') ?>
<div class="mb-3"></div>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?=lang('sidebarPortfolio.aumentaPreparaMateriaProfessoresPortfolio')?></strong></h4>
            </div>
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?=base_url(lang('preparasaunMateria.inputPreparasaunMateriaUrlPortfolio')) ?>" method="post">
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
                        <a href="<?= base_url(lang('preparasaunMateria.preparasaunPreparasaunMateriaUrlPortfolio').$portfolio->id_materia_professores)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        <?php endforeach; ?>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('preparasaun_materia');
</script>
<?= $this->endSection() ?>