<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.trokaSubsidioPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('funsionario') ?>
<?php if (session()->sistema_administrator == 2) : ?>
<?php
    $naran = helperFunsionario()->naran_kompleto;
    $this->db = \Config\Database::connect();
    $builder = $this->db->table('direito_acesso_autromos');
    $builder->select('*');
    $builder->join('direito_acesso', 'direito_acesso_autromos.direito_accesso_id  = direito_acesso.id_direito_acesso', 'total_saldo', 'total_osan_tama','salario_funsionario','salario_professores', 'osan_impresta_funsionario', 'osan_impresta_professores', 'funsionario', 'professores', 'materia_professores', 'estudante', 'kategorio_materia', 'materia', 'kursus_projeito', 'classe', 'horario_kursus', 'horario_kursus_hotu',  'left');

    $builder->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 'menu_profile', 'sistemmenu_finansa','menu_funsionario','menu_profesores','menu_estudante','menu_kategoria_materia','menu_kursus_projeito','menu_classe_horario', 'menu_sertifikado','left');

    $builder->join('administrator', 'menu_acesso.menu_administrator  = administrator.id_administrator', 'naran_kompleto', 'naran_ikus','naran_primeiro','email', 'status_servisu', 'left');

    $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');

    $builder->where('id_administrator', session('id_administrator'));
    $builder->where('naran_kompleto=', $naran);
    $query = $builder->get()->getResult(); 
?>
<?php foreach($query as $acesso): ?>
<?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->osan_subsidio ==1 && $acesso->menu_finansa == 1){ ?>
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
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.trokaSubsidioPortfolio')?></strong></h4>
            </div>
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="basic-form">
                <form action="<?=base_url(lang('subsidioPortfolio.updateSubsidioUrlFunsionario').$subsidio->id_subsidio) ?>" method="post">
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
                        <div class="mb-3 col-md-4 clockpicker">
                            <label for="inputEmail4" class="form-label"><?=lang('subsidioPortfolio.timeSubsidio')?></label>
                            <input type="text" name="horas_foti_subsidio" class="form-control <?=isset($errors['horas_foti_subsidio']) ? 'is-invalid' : null ?>" value="<?=old('horas_foti_subsidio', $subsidio->horas_foti_subsidio)?>"  placeholder="<?=lang('subsidioPortfolio.timeSubsidio')?>" data-provide='timepicker' data-show-meridian="false"  id="timepicker2"  data-minute-step="1">
                            <small class="text-danger">
                                <?=isset($errors['horas_foti_subsidio']) ?  $errors['horas_foti_subsidio'] : null ?>
                            </small>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="inputEmail4" class="form-label"><?=lang('subsidioPortfolio.dataHahuSubsidio')?></label>
                            <input type="date" name="data_hahu_aktividade" id="start" class="form-control <?=isset($errors['data_hahu_aktividade']) ? 'is-invalid' : null ?>"  value="<?=old('data_hahu_aktividade', $subsidio->data_hahu_aktividade)?>"  placeholder="<?=lang('subsidioPortfolio.dataHahuSubsidio')?>">
                            <small class="text-danger">
                                <?=isset($errors['data_hahu_aktividade']) ?  $errors['data_hahu_aktividade'] : null ?>
                            </small>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="inputEmail4" class="form-label"><?=lang('subsidioPortfolio.dataRemataSubsidio')?></label>
                            <input type="date" name="data_remata_aktividade" id="end" class="form-control <?=isset($errors['data_remata_aktividade']) ? 'is-invalid' : null ?>"  value="<?=old('data_remata_aktividade', $subsidio->data_remata_aktividade)?>"  placeholder="<?=lang('subsidioPortfolio.dataRemataSubsidio')?>">
                            <small class="text-danger">
                                <?=isset($errors['data_remata_aktividade']) ?  $errors['data_remata_aktividade'] : null ?>
                            </small>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                    <a href="<?= base_url(lang('subsidioPortfolio.showSubsidioUrlPortfolio').$subsidio->salario_subsidio_osan_sai)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-5">
            <div class="form-input-content text-center error-page">
                <h1 class="error-text font-weight-bold">404</h1>
                <h4><i class="fa fa-exclamation-triangle text-warning"></i> <?= lang('hamosPortfolio.linkSala')?></h4>
                <p><?= lang('hamosPortfolio.linkSalaKarik')?></p>
                <?php if (session()->sistema_administrator == 2) { ?>
                    <h5><strong><?=helperFunsionario()->naran_kompleto ?></strong></h5>
                    <?php if (helperFunsionario()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.admnistrasaunFunsionario')?></strong></h6>
                   <?php } ?>
                <?php }elseif (session()->sistema_administrator == 3) { ?>
                    <h5><strong><?=helperProfessores()->naran_kompleto ?></strong></h5>
                    <?php if (helperProfessores()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.professoresProfessores')?></strong></h6>
                   <?php } ?>
               <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php endforeach;?>
<?php endif; ?>

<?php if (session()->sistema_administrator == 3) : ?>
<div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-5">
            <div class="form-input-content text-center error-page">
                <h1 class="error-text font-weight-bold">404</h1>
                <h4><i class="fa fa-exclamation-triangle text-warning"></i> <?= lang('hamosPortfolio.linkSala')?></h4>
                <p><?= lang('hamosPortfolio.linkSalaKarik')?></p>
                <?php if (session()->sistema_administrator == 2) { ?>
                    <h5><strong><?=helperFunsionario()->naran_kompleto ?></strong></h5>
                    <?php if (helperFunsionario()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.admnistrasaunFunsionario')?></strong></h6>
                   <?php } ?>
                <?php }elseif (session()->sistema_administrator == 3) { ?>
                    <h5><strong><?=helperProfessores()->naran_kompleto ?></strong></h5>
                    <?php if (helperProfessores()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.professoresProfessores')?></strong></h6>
                   <?php } ?>
               <?php } ?>
            </div>
        </div>
    </div>
<?php endif; ?>


<?= $this->endSection() ?>