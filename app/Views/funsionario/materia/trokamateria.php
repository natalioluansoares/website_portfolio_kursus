<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.trokaMateriaPortfolio')?></title>
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
<?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
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
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.trokaMateriaPortfolio')?></strong></h4>
            </div>
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?=base_url(lang('sciensieFunsionario.updateSciensieFunsionarioUrlPortfolio').$materia->id_materia) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row g-2">
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.categorioMateria')?></label>
                                <select name="categorio_materia" id="" class="form-control">
                                    <option value="<?=$materia->categorio_materia ?>"><?=$materia->categorio ?></option>
                                    <option value=""><?=lang('materiaPortfolio.hiliCategorioMateria')?></option>
                                    <?php foreach($categorio as $portfolio):?>
                                    <option value="<?=$portfolio->id_categorio ?>"><?=$portfolio->categorio ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['categorio_materia']) ?  $errors['categorio_materia'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.lianMPortfolio')?></label>
                                <select name="lian_materia" id="" class="form-control">
                                    <option value="<?=$materia->lian_materia ?>"><?=$materia->lian_materia ?></option>
                                    <option value=""><?=lang('materiaPortfolio.hiliLianMaterialPortfolio')?></option>
                                    <option value="<?=lang('materiaPortfolio.lianMaterialPortfolio')?>"><?=lang('materiaPortfolio.lianMaterialPortfolio')?></option>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['lian_materia']) ?  $errors['lian_materia'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.dataMateria')?></label>
                                <input type="date" name="data_materia" value="<?=old('data_materia', $materia->data_materia) ?>" class="form-control" id="inputPassword4" placeholder="<?=lang('materiaPortfolio.dataMateria')?>">
                                <small class="text-danger">
                                    <?=isset($errors['data_materia']) ?  $errors['data_materia'] : null ?>
                                </small>
                            </div>
                        </div>
                            <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.youtubeMateria')?></label>
                                <textarea name="youtube" id="" cols="30" rows="4" placeholder="<?=lang('materiaPortfolio.youtubeMateria')?>" class="form-control"><?=old('youtube', $materia->youtube) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['youtube']) ?  $errors['youtube'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.facebookMateria')?></label>
                                <textarea name="facebook" id="" cols="30" rows="4" placeholder="<?=lang('materiaPortfolio.facebookMateria')?>" class="form-control"><?=old('facebook', $materia->facebook) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['facebook']) ?  $errors['facebook'] : null ?>
                                </small>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.instagramMateria')?></label>
                                <textarea name="instagram" id="" cols="30" placeholder="<?=lang('materiaPortfolio.instagramMateria')?>" rows="4" class="form-control"><?=old('instagram', $materia->instagram) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['instagram']) ?  $errors['instagram'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.tiktokMateria')?></label>
                                <textarea name="tiktok" id="" placeholder="<?=lang('materiaPortfolio.tiktokMateria')?>" cols="30" rows="4" class="form-control"><?=old('tiktok', $materia->tiktok) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['tiktok']) ?  $errors['tiktok'] : null ?>
                                </small>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.tituloMateria')?></label>
                                <textarea name="titulo_materia" id="" cols="30" class="form-control" rows="10"><?=old('titulo_materia', $materia->titulo_materia) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['titulo_materia']) ?  $errors['titulo_materia'] : null ?>
                                </small>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.materiaMateria')?></label>
                                <textarea name="materia" id="materia" placeholder="<?=lang('materiaPortfolio.messageMateria')?>" cols="30" class="form-control" rows="10"><?=old('materia', $materia->materia) ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                        <a href="<?= base_url(lang('sciensieFunsionario.showSciensieFunsionarioUrlPortfolio').$materia->lian_materia.'/'.$materia->categorio_materia)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
<?php
    $naran = helperProfessores()->naran_kompleto;
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
<?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->materia == 1 && $acesso->menu_kategoria_materia == 1) {?>
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
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.trokaMateriaPortfolio')?></strong></h4>
            </div>
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?=base_url(lang('sciensieFunsionario.updateSciensieFunsionarioUrlPortfolio').$materia->id_materia) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row g-2">
                            <div class="mb-3 col-md-4">
                                <input type="hidden" name="naran_professores" value="<?= helperProfessores()->id_administrator ?>" class="form-control" id="inputEmail4" placeholder="<?=lang('categorioPortfolio.kodeCategorio')?>">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.categorioMateria')?></label>
                                <select name="categorio_materia" id="" class="form-control">
                                    <option value="<?=$materia->categorio_materia ?>"><?=$materia->categorio ?></option>
                                    <option value=""><?=lang('materiaPortfolio.hiliCategorioMateria')?></option>
                                    <?php foreach($categorio as $portfolio):?>
                                    <option value="<?=$portfolio->id_categorio ?>"><?=$portfolio->categorio ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['categorio_materia']) ?  $errors['categorio_materia'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.lianMPortfolio')?></label>
                                <select name="lian_materia" id="" class="form-control">
                                    <option value="<?=$materia->lian_materia ?>"><?=$materia->lian_materia ?></option>
                                    <option value=""><?=lang('materiaPortfolio.hiliLianMaterialPortfolio')?></option>
                                    <option value="<?=lang('materiaPortfolio.lianMaterialPortfolio')?>"><?=lang('materiaPortfolio.lianMaterialPortfolio')?></option>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['lian_materia']) ?  $errors['lian_materia'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.dataMateria')?></label>
                                <input type="date" name="data_materia" value="<?=old('data_materia', $materia->data_materia) ?>" class="form-control" id="inputPassword4" placeholder="<?=lang('materiaPortfolio.dataMateria')?>">
                                <small class="text-danger">
                                    <?=isset($errors['data_materia']) ?  $errors['data_materia'] : null ?>
                                </small>
                            </div>
                        </div>
                            <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.youtubeMateria')?></label>
                                <textarea name="youtube" id="" cols="30" rows="4" placeholder="<?=lang('materiaPortfolio.youtubeMateria')?>" class="form-control"><?=old('youtube', $materia->youtube) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['youtube']) ?  $errors['youtube'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.facebookMateria')?></label>
                                <textarea name="facebook" id="" cols="30" rows="4" placeholder="<?=lang('materiaPortfolio.facebookMateria')?>" class="form-control"><?=old('facebook', $materia->facebook) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['facebook']) ?  $errors['facebook'] : null ?>
                                </small>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.instagramMateria')?></label>
                                <textarea name="instagram" id="" cols="30" placeholder="<?=lang('materiaPortfolio.instagramMateria')?>" rows="4" class="form-control"><?=old('instagram', $materia->instagram) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['instagram']) ?  $errors['instagram'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.tiktokMateria')?></label>
                                <textarea name="tiktok" id="" placeholder="<?=lang('materiaPortfolio.tiktokMateria')?>" cols="30" rows="4" class="form-control"><?=old('tiktok', $materia->tiktok) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['tiktok']) ?  $errors['tiktok'] : null ?>
                                </small>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.tituloMateria')?></label>
                                <textarea name="titulo_materia" id="" cols="30" class="form-control" rows="10"><?=old('titulo_materia', $materia->titulo_materia) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['titulo_materia']) ?  $errors['titulo_materia'] : null ?>
                                </small>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.materiaMateria')?></label>
                                <textarea name="materia" id="materia" placeholder="<?=lang('materiaPortfolio.messageMateria')?>" cols="30" class="form-control" rows="10"><?=old('materia', $materia->materia) ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                        <a href="<?= base_url(lang('sciensieFunsionario.showSciensieFunsionarioUrlPortfolio').$materia->lian_materia.'/'.$materia->categorio_materia)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
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

<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('titulo_materia');
    CKEDITOR.replace('materia');
</script>
<?= $this->endSection() ?>