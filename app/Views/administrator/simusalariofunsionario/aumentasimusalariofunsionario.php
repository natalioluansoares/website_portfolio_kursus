<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaImprestaSalarioFunsionarioPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaImprestaSalarioFunsionarioPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('salarioFunsionario.createSimuSalarioFunsionarioProfessoresUrlPortfolio')) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputState" class="form-label"><?=lang('salarioFunsionario.naranFunsionario')?></label>
                                    <select id="inputState" name="salario_simu_funsionario" class="form-control <?=isset($errors['salario_simu_funsionario']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('salarioFunsionario.hiliNaranFunsionario')?></option>
                                        <?php foreach($salario as $pro): ?>
                                        <?php if ($pro->sistema == 'Direktor') { ?>
                                            <option value="<?=$pro->id_salario_funsionario?>"<?= old('salario_simu_funsionario') == $pro->id_salario_funsionario ? 'selected' : null ?>><?=$pro->naran_kompleto?>. <?=$pro->titulo_funsionario?>(<sub><?=lang('salarioFunsionario.direktorFunsionario')?></sub>)</option>
                                        <?php }elseif ($pro->sistema == 'Administrasaun') { ?>
                                            <option value="<?=$pro->id_salario_funsionario?>"<?= old('salario_simu_funsionario') == $pro->id_salario_funsionario ? 'selected' : null ?>><?=$pro->naran_kompleto?>. <?=$pro->titulo_funsionario?>(<sub><?=lang('salarioFunsionario.admnistrasaunFunsionario')?></sub>)</option>
                                    <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['salario_simu_funsionario']) ?  $errors['salario_simu_funsionario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('salarioFunsionario.salarioFunsionario')?></label>
                                    <select id="inputState" name="total_simu_salario" class="form-control <?=isset($errors['total_simu_salario']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('salarioFunsionario.hiliSalarioFunsionario')?></option>
                                        <?php foreach($salario as $pro): ?>
                                            <option value="<?=$pro->total_salario?>"<?= old('total_simu_salario') == $pro->total_salario ? 'selected' : null ?>>$<?=number_format($pro->total_salario, 2)?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['total_simu_salario']) ?  $errors['total_simu_salario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('salarioFunsionario.imprestaFunsionario')?></label>
                                    <select id="inputState" name="total_simu_salario_impresta" class="form-control <?=isset($errors['total_simu_salario_impresta']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('salarioFunsionario.hiliImprestaFunsionario')?></option>
                                        <?php $saldo = 0; foreach($impresta as $pro): ?>
                                        
                                        <?php 
                                            $saldo += $pro->total_osan_impresta;
                                            endforeach; 
                                        ?>
                                        <?php if (!$saldo) { ?>
                                            <option value="0"<?= old('total_simu_salario_impresta') == 0 ? 'selected' : null ?>><?=lang('salarioFunsionario.imprestaMamuk') ?></option>

                                        <?php }else { ?>
                                            <option value="<?=$saldo?>"<?= old('total_simu_salario_impresta') == $saldo ? 'selected' : null ?>>$<?= number_format($saldo, 2);?></option>
                                    <?php } ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['total_simu_salario_impresta']) ?  $errors['total_simu_salario_impresta'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4" id="timepicker-input-group2">
                                    <label for="inputEmail4" class="form-label"><?=lang('salarioFunsionario.timeFunsionario')?></label>
                                    <input type="text" name="horas_salario_simu_funsionario" class="form-control <?=isset($errors['horas_salario_simu_funsionario']) ? 'is-invalid' : null ?>" value="<?=old('horas_salario_simu_funsionario')?>"  placeholder="<?=lang('salarioFunsionario.timeFunsionario')?>" data-provide='timepicker' data-show-meridian="false"  id="timepicker2"  data-minute-step="1">
                                    <small class="text-danger">
                                        <?=isset($errors['horas_salario_simu_funsionario']) ?  $errors['horas_salario_simu_funsionario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('salarioFunsionario.dataFunsionario')?></label>
                                    <input type="date" name="data_salario_simu_funsionario"  class="form-control <?=isset($errors['data_salario_simu_funsionario']) ? 'is-invalid' : null ?>"  value="<?=old('data_salario_simu_funsionario')?>"  placeholder="<?=lang('salarioFunsionario.dataFunsionario')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['data_salario_simu_funsionario']) ?  $errors['data_salario_simu_funsionario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputState" class="form-label"><?=lang('salarioFunsionario.salarioOsan')?></label>
                                    <select id="inputState" name="salario_osan_sai" class="form-control <?=isset($errors['salario_osan_sai']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('salarioFunsionario.hiliSalarioOsan')?></option>
                                        <?php foreach($osansai as $pro): ?>
                                        <?php if ($pro->aktivo_osan_sai == null) { ?>
                                            <option value="<?=$pro->id_osan_sai?>"<?= old('salario_osan_sai') == $pro->id_osan_sai ? 'selected' : null ?>><?=$pro->naran_osan_sai?>($ <?=$pro->total_osan_sai?>)</option>
                                        <?php }else{ ?>
                                            <option value=""><?=lang('salarioFunsionario.mamukSalarioOsan')?></option>
                                    <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['salario_osan_sai']) ?  $errors['salario_osan_sai'] : null ?>
                                    </small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <?php foreach($salario as $portfolio):?>
                            <a href="<?= base_url(lang('salarioFunsionario.simuSalarioFunsionarioProfessoresUrlPortfolio').$portfolio->id_salario_funsionario)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                            <?php endforeach; ?>
                        </form>                    
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>