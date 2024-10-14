<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.trokaSubsidioPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.trokaSubsidioPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('subsidioPortfolio.updateSubsidioUrlPortfolio').$subsidio->id_subsidio) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputState" class="form-label"><?=lang('subsidioPortfolio.naranSubsidio')?></label>
                                    <select id="inputState" name="salario_subsidio_funsionario" class="form-control <?=isset($errors['salario_subsidio_funsionario']) ? 'is-invalid' : null ?>" data-toggle="select2">
                                        <?php if ($subsidio->sistema == 'Direktor') { ?>
                                            <option value="<?=$subsidio->salario_subsidio_funsionario?>"<?= old('salario_subsidio_funsionario') == $subsidio->salario_subsidio_funsionario ? 'selected' : null ?>><?=$subsidio->naran_kompleto?>(<sub><?=lang('subsidioPortfolio.direktor')?></sub>)</option>
                                        <?php }elseif ($subsidio->sistema == 'Administrasaun') { ?>
                                            <option value="<?=$subsidio->salario_subsidio_funsionario?>"<?= old('salario_subsidio_funsionario') == $subsidio->salario_subsidio_funsionario ? 'selected' : null ?>><?=$subsidio->naran_kompleto?>(<sub><?=lang('subsidioPortfolio.funsionario')?></sub>)</option>
                                        <?php }elseif ($subsidio->sistema == 'Professores') { ?>
                                            <option value="<?=$subsidio->salario_subsidio_funsionario?>"<?= old('salario_subsidio_funsionario') == $subsidio->salario_subsidio_funsionario ? 'selected' : null ?>><?=$subsidio->naran_kompleto?>(<sub><?=lang('subsidioPortfolio.professores')?></sub>)</option>
                                        <?php } ?>
                                        <option value=""><?=lang('subsidioPortfolio.hilNaranSubsidio')?></option>
                                        <?php foreach($administrator as $pro): ?>
                                        <?php if ($pro->sistema == 'Direktor') { ?>
                                            <option value="<?=$pro->id_administrator?>"<?= old('salario_subsidio_funsionario') == $pro->id_administrator ? 'selected' : null ?>><?=$pro->naran_kompleto?>(<sub><?=lang('subsidioPortfolio.direktor')?></sub>)</option>
                                        <?php }elseif ($pro->sistema == 'Administrasaun') { ?>
                                            <option value="<?=$pro->id_administrator?>"<?= old('salario_subsidio_funsionario') == $pro->id_administrator ? 'selected' : null ?>><?=$pro->naran_kompleto?>(<sub><?=lang('subsidioPortfolio.funsionario')?></sub>)</option>
                                        <?php }elseif ($pro->sistema == 'Professores') { ?>
                                            <option value="<?=$pro->id_administrator?>"<?= old('salario_subsidio_funsionario') == $pro->id_administrator ? 'selected' : null ?>><?=$pro->naran_kompleto?>(<sub><?=lang('subsidioPortfolio.professores')?></sub>)</option>
                                        <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['salario_subsidio_funsionario']) ?  $errors['salario_subsidio_funsionario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputState" class="form-label"><?=lang('subsidioPortfolio.Subsidio')?></label>
                                    <select id="inputState" name="salario_subsidio_osan_sai" class="form-control <?=isset($errors['salario_subsidio_osan_sai']) ? 'is-invalid' : null ?>">
                                        <?php if ($subsidio->total_osan_sai != 0 ) { ?>
                                            <option value="<?=$subsidio->salario_subsidio_osan_sai?>"<?= old('salario_subsidio_osan_sai') == $subsidio->salario_subsidio_osan_sai ? 'selected' : null ?>><?=$subsidio->naran_osan_sai?></option>
                                        <?php }else{ ?>
                                            <option value=""><?=lang('subsidioPortfolio.subsidioMamuk')?></option>
                                        <?php } ?>
                                        <option value=""><?= lang('subsidioPortfolio.hiliSubsidio') ?></option>
                                        <?php if ($subsidio->total_osan_sai != 0 ) { ?>
                                            <option value="<?=$subsidio->salario_subsidio_osan_sai?>"<?= old('salario_subsidio_osan_sai') == $subsidio->salario_subsidio_osan_sai ? 'selected' : null ?>><?=$subsidio->naran_osan_sai?></option>
                                        <?php }else{ ?>
                                            <option value=""><?=lang('subsidioPortfolio.subsidioMamuk')?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['salario_subsidio_osan_sai']) ?  $errors['salario_subsidio_osan_sai'] : null ?>
                                    </small>
                                </div>
                                
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('subsidioPortfolio.totalSubsidio')?></label>
                                    <input type="number" name="total_subsidio" class="form-control <?=isset($errors['total_subsidio']) ? 'is-invalid' : null ?>" value="<?=old('total_subsidio', $subsidio->total_subsidio)?>"  placeholder="<?=lang('subsidioPortfolio.totalSubsidio')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['total_subsidio']) ?  $errors['total_subsidio'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4" id="timepicker-input-group2">
                                    <label for="inputEmail4" class="form-label"><?=lang('subsidioPortfolio.timeSubsidio')?></label>
                                    <input type="text" name="horas_foti_subsidio" class="form-control <?=isset($errors['horas_foti_subsidio']) ? 'is-invalid' : null ?>" value="<?=old('horas_foti_subsidio', $subsidio->horas_foti_subsidio)?>"  placeholder="<?=lang('subsidioPortfolio.timeSubsidio')?>" data-provide='timepicker' data-show-meridian="false"  id="timepicker2"  data-minute-step="1">
                                    <small class="text-danger">
                                        <?=isset($errors['horas_foti_subsidio']) ?  $errors['horas_foti_subsidio'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('subsidioPortfolio.dataHahuSubsidio')?></label>
                                    <input type="date" name="data_hahu_aktividade"  class="form-control <?=isset($errors['data_hahu_aktividade']) ? 'is-invalid' : null ?>"  value="<?=old('data_hahu_aktividade', $subsidio->data_hahu_aktividade)?>"  placeholder="<?=lang('subsidioPortfolio.dataHahuSubsidio')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['data_hahu_aktividade']) ?  $errors['data_hahu_aktividade'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('subsidioPortfolio.dataRemataSubsidio')?></label>
                                    <input type="date" name="data_remata_aktividade"  class="form-control <?=isset($errors['data_remata_aktividade']) ? 'is-invalid' : null ?>"  value="<?=old('data_remata_aktividade', $subsidio->data_remata_aktividade)?>"  placeholder="<?=lang('subsidioPortfolio.dataRemataSubsidio')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['data_remata_aktividade']) ?  $errors['data_remata_aktividade'] : null ?>
                                    </small>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('subsidioPortfolio.showSubsidioUrlPortfolio').$subsidio->salario_subsidio_osan_sai)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                    
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>