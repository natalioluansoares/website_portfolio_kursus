<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.trokaImprestaSalarioProfessoresPortfolio')?></title>
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
<?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->osan_impresta_professores == 1 && $acesso->menu_finansa == 1) {?>
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
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.trokaImprestaSalarioProfessoresPortfolio')?></strong></h4>
            </div>
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?=base_url(lang('imprestaSalarioProfessores.updateImprestaSalarioProfessoresUrlPortfolio').$impresta->id_osan_impresta_professores) ?>" method="post">
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
                        <a href="<?= base_url(lang('imprestaSalarioProfessores.imprestaSalarioProfessoresUrlPortofolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
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