<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('funsionarioPortfolio.trokaFunsionarioRegistoPortfolio')?></title>
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
<?php if($acesso->aumenta_direito_acesso_autromos == 1 && $acesso->funsionario == 1 && $acesso->menu_funsionario ==1){ ?>
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
                <h4 class="card-title"><strong><?=lang('funsionarioPortfolio.trokaFunsionarioRegistoPortfolio')?></strong></h4>
            </div>
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?=base_url(lang('employeeFunsionario.updateEmployeeUrlPortfolio').$profe->id_funsionario) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputEmail4" class="form-label"><?=lang('funsionarioPortfolio.tituloFunsionario')?></label>
                                <input type="text" name="titulo_funsionario" class="form-control" id="inputEmail4" value="<?=old('titulo_funsionario',$profe->titulo_funsionario) ?>"
                                placeholder="<?=lang('funsionarioPortfolio.tituloFunsionario')?>">
                                <small class="text-danger">
                                    <?=isset($errors['titulo_funsionario']) ?  $errors['titulo_funsionario'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputState" class="form-label"><?=lang('funsionarioPortfolio.contaFunsionario')?></label>
                                <select id="inputState" name="conta_administrator" class="form-control">
                                    <option value="<?=$profe->conta_administrator?>"><?=$profe->naran_kompleto?>(<sub><?=$profe->sistema?></sub>)</option>
                                    <option value=""><?=lang('funsionarioPortfolio.hiliContaFunsionario')?></option>
                                    <?php foreach($funsionario as $pro): ?>
                                    <option value="<?=$pro->id_administrator?>"<?= old('conta_administrator') == $pro->id_administrator ? 'selected' : null ?>><?=$pro->naran_kompleto?>(<sub><?=$pro->sistema?></sub>)</option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['conta_administrator']) ?  $errors['conta_administrator'] : null ?>
                                </small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                        <a href="<?= base_url(lang('funsionarioPortfolio.funsionarioUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
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