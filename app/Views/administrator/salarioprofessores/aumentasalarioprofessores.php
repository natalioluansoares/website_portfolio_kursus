<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaSalarioProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaSalarioProfessoresPortfolio')?></h4>
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
                    <form action="<?=base_url(lang('salarioProfessores.inputSalarioFunsionarioProfessoresUrlPortfolio')) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputState" class="form-label"><?=lang('salarioProfessores.naranFunsionario')?></label>
                                <select id="inputState" name="salario_professores" class="form-control">
                                    <option value=""><?=lang('salarioProfessores.hiliNaranFunsionario')?></option>
                                    <?php foreach($professores as $pro): ?>
                                    <?php if ($pro->sistema =='Professores') { ?>
                                        <option value="<?=$pro->id_professores?>"<?= old('salario_professores') == $pro->id_professores ? 'selected' : null ?>><?=$pro->naran_kompleto?>. <?=$pro->titulo_professores?>(<sub><?=lang('salarioProfessores.professoresFunsionario')?></sub>)</option>
                                    <?php } ?>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['salario_professores']) ?  $errors['salario_professores'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputEmail4" class="form-label"><?=lang('salarioProfessores.totalFunsionario')?></label>
                                <input type="number" name="total_salario" min="0" class="form-control" value="<?=old('total_salario')?>" id="inputEmail4" placeholder="<?=lang('salarioProfessores.totalFunsionario')?>">
                                <small class="text-danger">
                                    <?=isset($errors['total_salario']) ?  $errors['total_salario'] : null ?>
                                </small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                        <a href="<?= base_url(lang('salarioProfessores.salarioFunsionarioProfessoresUrlPortofolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                    </form>                    
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>