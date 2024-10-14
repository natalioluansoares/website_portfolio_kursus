<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.trokaMateriaProfessoresPortfolio')?></title>
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
<?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->materia_professores == 1 && $acesso->menu_profesores == 1) {?>
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
                <h4 class="card-title"><?=lang('sidebarPortfolio.trokaMateriaProfessoresPortfolio')?></strong></h4>
            </div>
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?=base_url(lang('materiaProfessores.updateMateriaProfessoresUrlPortfolio').$materia->id_materia_professores) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputEmail4" class="form-label"><?=lang('materiaProfessores.kodeMateria')?></label>
                                <input type="text" name="kode_materia_professores" value="<?=old('kode_materia_professores',$materia->kode_materia_professores) ?>" class="form-control" id="inputEmail4" placeholder="<?=lang('materiaProfessores.kodeMateria')?>">
                                <small class="text-danger">
                                    <?=isset($errors['kode_materia_professores']) ?  $errors['kode_materia_professores'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaProfessores.materiaMateria')?></label>
                                <select id="inputState" name="materia_kursus_professores" class="form-control">
                                    <option value="<?=$materia->materia_kursus_professores?>"><?=$materia->materia_kursus?></option>
                                    <option value=""><?=lang('materiaProfessores.hiliMateriaMateria')?></option>
                                    <?php foreach($kursus as $pro): ?>
                                    <option value="<?=$pro->id_materia_kursus?>"<?= old('materia_kursus_professores') == $pro->id_materia_kursus ? 'selected' : null ?>><?=$pro->materia_kursus?>(<sub><?=$pro->level_materia_kursus?></sub>)</option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['materia_kursus_professores']) ?  $errors['materia_kursus_professores'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputState" class="form-label"><?=lang('materiaProfessores.materiaProfessores')?></label>
                                <select id="inputState" name="materia_professores" class="form-control">
                                    <option value="<?=$materia->materia_professores?>"><?=$materia->naran_kompleto?>. <?=$materia->titulo_professores?>(<sub><?=$materia->sistema?></sub>)</option>
                                    <option value=""><?=lang('professoresPortfolio.hiliContaProfessores')?></option>
                                    <?php foreach($professores as $pro): ?>
                                    <option value="<?=$pro->id_professores?>"<?= old('materia_professores') == $pro->id_professores ? 'selected' : null ?>><?=$pro->naran_kompleto?>. <?=$materia->titulo_professores?>(<sub><?=$pro->sistema?></sub>)</option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['materia_professores']) ?  $errors['materia_professores'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaProfessores.dataMateria')?></label>
                                <input type="text" name="data_materia_professores" value="<?=old('data_materia_professores',$materia->data_materia_professores) ?>" class="form-control" id="mdate" placeholder="<?=date('Y-M-d')?>">
                                <small class="text-danger">
                                    <?=isset($errors['data_materia_professores']) ?  $errors['data_materia_professores'] : null ?>
                                </small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                        <?php foreach($professores as $portfolio): ?>
                        <a href="<?= base_url(lang('materiaProfessores.detailMateriaProfessoresUrlPortfolio').$portfolio->id_professores)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        <?php endforeach; ?>
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