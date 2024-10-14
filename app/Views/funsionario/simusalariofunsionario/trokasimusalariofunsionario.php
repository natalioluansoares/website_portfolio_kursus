<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.trokaSimuSalarioFunsionario')?></title>
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
<?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->simu_salario_funsionario ==1 && $acesso->menu_finansa == 1) {?>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.trokaSimuSalarioFunsionario')?></h4>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
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
                        <form action="<?=base_url(lang('salarioFunsionario.updateSimuSalarioFunsionarioUrl').$simusalario->id_salario_simu_funsionario ) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('salarioFunsionario.naranFunsionario')?></label>
                                    <select id="inputState" name="salario_simu_funsionario" class="form-control <?=isset($errors['salario_simu_funsionario']) ? 'is-invalid' : null ?>">
                                        <?php if($simusalario->sistema =='Direktor'){ ?>
                                        <option value="<?=$simusalario->salario_simu_funsionario ?>"><?=$simusalario->naran_kompleto?>. <?=$simusalario->titulo_funsionario?>(<sub><?=lang('salarioFunsionario.direktorFunsionario')?></sub>)</option>
                                        <?php }elseif ($simusalario->sistema =='administrasaun') { ?>
                                            <option value="<?=$simusalario->salario_simu_funsionario ?>"><?=$pro->naran_kompleto?>. <?=$pro->titulo_funsionario?>(<sub><?=lang('salarioFunsionario.admnistrasaunFunsionario')?></sub>)</option>
                                       <?php } ?>
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
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label"><?=lang('salarioFunsionario.salarioFunsionario')?></label>
                                    <select id="inputState" name="total_simu_salario" class="form-control <?=isset($errors['total_simu_salario']) ? 'is-invalid' : null ?>">
                                        <?php if ($simusalario->total_simu_salario == 0) { ?>
                                            <option value=""><?=lang('salarioFunsionario.mamukSalarioOsan') ?></option>
                                        <?php }else {?>
                                            <option value="<?=$simusalario->total_simu_salario ?>">$<?=number_format($simusalario->total_simu_salario, 2)?></option>
                                            <option value="0"><?=lang('salarioFunsionario.salarioMamuk') ?></option>
                                            <?php foreach($salario as $pro): ?>
                                                <option value="<?=$pro->total_salario?>"<?= old('total_simu_salario') == $pro->total_salario ? 'selected' : null ?>>$<?=number_format($pro->total_salario, 2)?></option>
                                               
                                            <?php endforeach; ?>
                                        <?php } ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['total_simu_salario']) ?  $errors['total_simu_salario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('salarioFunsionario.dataFunsionario')?></label>
                                    <input type="date" name="data_salario_simu_funsionario"  class="form-control <?=isset($errors['data_salario_simu_funsionario']) ? 'is-invalid' : null ?>"  value="<?=old('data_salario_simu_funsionario', $simusalario->data_salario_simu_funsionario)?>"  placeholder="<?=lang('salarioFunsionario.dataFunsionario')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['data_salario_simu_funsionario']) ?  $errors['data_salario_simu_funsionario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('salarioFunsionario.timeFunsionario')?></label>
                                    <input type="time" name="horas_salario_simu_funsionario" class="form-control <?=isset($errors['horas_salario_simu_funsionario']) ? 'is-invalid' : null ?>" value="<?=old('horas_salario_simu_funsionario', $simusalario->horas_salario_simu_funsionario)?>"  placeholder="<?=lang('salarioFunsionario.horasFunsionario')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['horas_salario_simu_funsionario']) ?  $errors['horas_salario_simu_funsionario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputState" class="form-label"><?=lang('salarioFunsionario.salarioOsan')?></label>
                                    <select id="inputState" name="salario_osan_sai" class="form-control <?=isset($errors['salario_osan_sai']) ? 'is-invalid' : null ?>">
                                        <option value="<?=$simusalario->salario_osan_sai ?>"><?=$simusalario->naran_osan_sai?>($ <?=$simusalario->total_osan_sai?>)</option>
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
                            <a href="<?= base_url(lang('salarioFunsionario.simuSalarioFunsionarioUrl').$portfolio->id_salario_funsionario)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                            <?php endforeach; ?>
                        </form>                    
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
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