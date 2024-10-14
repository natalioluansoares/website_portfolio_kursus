<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('professoresPortfolio.aumentaProfessoresRegistoPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('professoresPortfolio.aumentaProfessoresRegistoPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('professoresPortfolio.inputProfessoresUrlPortfolio')) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label"><?=lang('professoresPortfolio.tituloProfessores')?></label>
                                    <input type="text" name="titulo_professores" class="form-control <?=isset($errors['titulo_professores']) ? 'is-invalid' : null ?>" id="inputEmail4" value="<?=old('titulo_professores')?>" placeholder="<?=lang('professoresPortfolio.tituloProfessores')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['titulo_professores']) ?  $errors['titulo_professores'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('professoresPortfolio.contaProfessores')?></label>
                                    <select id="inputState" name="conta_administrator" class="form-control <?=isset($errors['conta_administrator']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('professoresPortfolio.hiliContaProfessores')?></option>
                                        <?php foreach($professores as $pro): ?>
                                        <option value="<?=$pro->id_administrator?>"<?= old('conta_administrator') == $pro->id_administrator ? 'selected' : null ?>><?=$pro->naran_kompleto?>(<sub><?=$pro->sistema?></sub>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['conta_administrator']) ?  $errors['conta_administrator'] : null ?>
                                    </div>
                                </div>
                            </div>
                             <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('professoresPortfolio.professoresUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>