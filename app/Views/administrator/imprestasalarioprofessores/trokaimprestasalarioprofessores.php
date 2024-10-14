<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.trokaImprestaSalarioProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.trokaImprestaSalarioProfessoresPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('imprestaSalarioProfessores.updateImprestaSalarioProfessoresPortfolioUrlPortfolio').$impresta->id_osan_impresta_professores) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('imprestaSalarioProfessores.naranFunsionario')?></label>
                                    <select id="inputState" name="osan_impresta_professores" class="form-control">
                                        <?php if ($impresta->sistema == 'Professores') { ?>
                                            <option value="<?=$impresta->osan_impresta_professores?>"><?=$impresta->naran_kompleto?>. <?=$impresta->titulo_professores?>(<sub><?=lang('imprestaSalarioProfessores.professoresFunsionario')?></sub>)</option>
                                    <?php } ?>

                                        <option value=""><?=lang('imprestaSalarioProfessores.hiliNaranFunsionario')?></option>
                                        <?php foreach($salario as $pro): ?>
                                        <?php if ($pro->sistema == 'Professores') { ?>
                                            <option value="<?=$pro->id_salario_professores?>"<?= old('osan_impresta_professores') == $pro->id_salario_professores ? 'selected' : null ?>><?=$pro->naran_kompleto?>. <?=$pro->titulo_professores?>(<sub><?=lang('imprestaSalarioProfessores.professoresFunsionario')?></sub>)</option>
                                    <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['osan_impresta_professores']) ?  $errors['osan_impresta_professores'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label"><?=lang('imprestaSalarioProfessores.totalFunsionario')?></label>
                                    <input type="number" name="total_osan_impresta" min="0" class="form-control" value="<?=old('total_osan_impresta', $impresta->total_osan_impresta)?>" id="inputEmail4" placeholder="<?=lang('imprestaSalarioProfessores.totalFunsionario')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['total_osan_impresta']) ?  $errors['total_osan_impresta'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label"><?=lang('imprestaSalarioProfessores.dataFunsionario')?></label>
                                    <input type="text" name="data_osan_impresta"  class="form-control"  value="<?=old('data_osan_impresta', $impresta->data_osan_impresta)?>" id="mdate" placeholder="<?=lang('imprestaSalarioProfessores.dataFunsionario')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['data_osan_impresta']) ?  $errors['data_osan_impresta'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label"><?=lang('imprestaSalarioProfessores.horasFunsionario')?></label>
                                    <input type="text" name="horas_osan_impresta" min="0" class="form-control" value="<?=old('horas_osan_impresta', $impresta->horas_osan_impresta)?>" id="startpicker" placeholder="<?=lang('imprestaSalarioProfessores.horasFunsionario')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['horas_osan_impresta']) ?  $errors['horas_osan_impresta'] : null ?>
                                    </small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('imprestaSalarioProfessores.showImprestaSalarioProfessoresPortfolioUrlPortfolio').$impresta->osan_impresta_professores)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>