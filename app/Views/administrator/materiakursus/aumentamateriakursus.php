<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaMateriaKursus')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaMateriaKursus')?></h4>
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
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="form-row-preview">
                        <form action="<?=base_url(lang('materiaKursusFunsionario.inputmateriaKursussUrlPortfolio')) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputEmail4" class="form-label"><?=lang('materiaKursusFunsionario.materia')?></label>
                                <input type="text" name="materia_kursus" value="<?=old('materia_kursus') ?>" class="form-control" id="inputEmail4" placeholder="<?=lang('materiaKursusFunsionario.materia')?>">
                                <small class="text-danger">
                                    <?=isset($errors['materia_kursus']) ?  $errors['materia_kursus'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaKursusFunsionario.level')?></label>
                                <input type="text" name="level_materia_kursus" value="<?=old('level_materia_kursus') ?>" class="form-control" id="inputPassword4" placeholder="<?=lang('materiaKursusFunsionario.level')?>">
                                <small class="text-danger">
                                    <?=isset($errors['level_materia_kursus']) ?  $errors['level_materia_kursus'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaKursusFunsionario.osan')?></label>
                                <input type="number" name="preso_materia_kursus" value="<?=old('preso_materia_kursus') ?>" class="form-control" id="inputPassword4" placeholder="<?=lang('materiaKursusFunsionario.osan')?>">
                                <small class="text-danger">
                                    <?=isset($errors['preso_materia_kursus']) ?  $errors['preso_materia_kursus'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaKursusFunsionario.data')?></label>
                                <input type="date" name="data_materia_kursus" value="<?=old('data_materia_kursus') ?>" class="form-control"  placeholder="<?=date('Y-M-d')?>">
                                <small class="text-danger">
                                    <?=isset($errors['data_materia_kursus']) ?  $errors['data_materia_kursus'] : null ?>
                                </small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                        <a href="<?= base_url(lang('materiaKursusFunsionario.materiaKursussUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                    </form>                     
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>