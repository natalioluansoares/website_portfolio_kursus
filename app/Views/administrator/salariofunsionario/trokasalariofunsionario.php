<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.trokaSalarioFunionarioPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.trokaSalarioFunionarioPortfolio')?></h4>
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
                    <form action="<?=base_url(lang('salarioFunsionario.updateSalarioFunsionarioProfessoresUrlPortfolio').$salario->id_salario_funsionario) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputState" class="form-label"><?=lang('salarioFunsionario.naranFunsionario')?></label>
                                <select id="inputState" name="salario_funsionario" class="form-control">

                                    <?php if ($salario->sistema == 'Direktor') { ?>
                                        <option value="<?=$salario->salario_funsionario?>"><?=$salario->naran_kompleto?>. <?=$salario->titulo_funsionario?>(<sub><?=lang('salarioFunsionario.direktorFunsionario')?></sub>)</option>
                                    <?php } elseif ($salario->sistema == 'Administrasaun') { ?>
                                            <option value="<?=$salario->salario_funsionario?>"><?=$salario->naran_kompleto?>. <?=$salario->titulo_funsionario?>(<sub><?=lang('salarioFunsionario.admnistrasaunFunsionario')?></sub>)</option>
                                   <?php } ?>


                                    <option value=""><?=lang('salarioFunsionario.hiliNaranFunsionario')?></option>
                                    <?php foreach($funsionario as $pro): ?>
                                    <?php if ($pro->sistema == 'Direktor') { ?>
                                        <option value="<?=$pro->id_funsionario?>"<?= old('salario_funsionario') == $pro->id_funsionario ? 'selected' : null ?>><?=$pro->naran_kompleto?>. <?=$pro->titulo_funsionario?>(<sub><?=lang('salarioFunsionario.direktorFunsionario')?></sub>)</option>
                                    <?php }elseif ($pro->sistema == 'Administrasaun') { ?>
                                        <option value="<?=$pro->id_funsionario?>"<?= old('salario_funsionario') == $pro->id_funsionario ? 'selected' : null ?>><?=$pro->naran_kompleto?>. <?=$pro->titulo_funsionario?>(<sub><?=lang('salarioFunsionario.admnistrasaunFunsionario')?></sub>)</option>
                                   <?php } ?>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['salario_funsionario']) ?  $errors['salario_funsionario'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputEmail4" class="form-label"><?=lang('salarioFunsionario.totalFunsionario')?></label>
                                <input type="number" name="total_salario" min="0" value="<?=old('total_salario', $salario->total_salario) ?>" class="form-control" id="inputEmail4" placeholder="<?=lang('salarioFunsionario.totalFunsionario')?>">
                                <small class="text-danger">
                                    <?=isset($errors['total_salario']) ?  $errors['total_salario'] : null ?>
                                </small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                        <a href="<?= base_url(lang('salarioFunsionario.salarioFunsionarioProfessoresUrlPortofolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                    </form>                    
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>