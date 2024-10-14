<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaMembroRegistoPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaMembroRegistoPortfolio')?></h4>
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
                        <form action="<?= base_url(lang('registoestudante.adicionarRegistoUrlConta')) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>    
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('registoestudante.lastNameestudante')?></label>
                                    <input type="text" class="form-control <?=isset($errors['naran_ikus']) ? 'is-invalid' : null ?>" name="naran_ikus" id="inputEmail4" value="<?= old('naran_ikus')?>" placeholder="<?=lang('registoestudante.lastNameestudante')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_ikus']) ?  $errors['naran_ikus'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('registoestudante.firstNameestudante')?></label>
                                    <input type="text" class="form-control <?=isset($errors['naran_primeiro']) ? 'is-invalid' : null ?>" name="naran_primeiro" id="inputPassword4" value="<?= old('naran_primeiro')?>" placeholder="<?=lang('registoestudante.firstNameestudante')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_primeiro']) ?  $errors['naran_primeiro'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('registoestudante.fullNameestudante')?></label>
                                    <input type="text" class="form-control <?=isset($errors['naran_kompletos']) ? 'is-invalid' : null ?>" name="naran_kompletos" id="inputPassword4"value="<?= old('naran_kompletos')?>" placeholder="<?=lang('registoestudante.fullNameestudante')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_kompletos']) ?  $errors['naran_kompletos'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-3">
                                    <label for="inputEmail4" class="form-label"><?=lang('registoestudante.emailsestudante')?></label>
                                    <input type="email" class="form-control <?=isset($errors['emails']) ? 'is-invalid' : null ?>" name="emails" id="inputEmail4" value="<?= old('emails')?>" placeholder="<?=lang('registoestudante.emailsestudante')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['emails']) ?  $errors['emails'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputPassword4" class="form-label"><?=lang('registoestudante.passwordestudante')?></label>
                                    <input type="password" class="form-control <?=isset($errors['password']) ? 'is-invalid' : null ?>" name="password" id="inputPassword4" placeholder="<?=lang('registoestudante.passwordestudante')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['password']) ?  $errors['password'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputPassword4" class="form-label"><?=lang('registoestudante.confPasswordestudante')?></label>
                                    <input type="password" class="form-control <?=isset($errors['confpassword']) ? 'is-invalid' : null ?>" name="confpassword" id="inputPassword4" placeholder="<?=lang('registoestudante.confPasswordestudante')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['confpassword']) ?  $errors['confpassword'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputState" class="form-label"><?=lang('registoestudante.sistemaestudantePortfolio')?></label>
                                    <select id="" name="sistema_estudante" class="form-control <?=isset($errors['sistema_estudante']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('registoestudante.hiliSistemaestudantePortfolio')?></option>
                                        <?php foreach($sistema as $sis): ?>
                                        <option value="<?=$sis->id_sistema?>"<?= old('sistema_estudante') == $sis->id_sistema ? 'selected' : null ?>><?=$sis->sistema?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['sistema_estudante']) ?  $errors['sistema_estudante'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-3">
                                    <label for="inputState" class="form-label"><?=lang('registoestudante.sexoestudante')?></label>
                                    <select id="inputState" name="jenero" class="form-control <?=isset($errors['jenero']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('registoestudante.hiliSexoestudante')?></option>
                                        <option value="Mane"<?= old('jenero') == 'Mane' ? 'selected' : null ?>><?=lang('registoestudante.maneestudante')?></option>
                                        <option value="Feto" <?= old('jenero') == 'Feto' ? 'selected' : null ?>><?=lang('registoestudante.fetoestudante')?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['jenero']) ?  $errors['jenero'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputZip" class="form-label"><?=lang('registoestudante.fatinMorisestudante')?></label>
                                    <input type="text" name="fatin_moris" value="<?=old('fatin_moris') ?>" placeholder="<?=lang('registoestudante.fatinMorisestudante')?>" class="form-control <?=isset($errors['fatin_moris']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['fatin_moris']) ?  $errors['fatin_moris'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputZip" class="form-label"><?=lang('registoestudante.loronMorisestudante')?></label>
                                    <input type="date" name="loron_moris" value="<?=old('loron_moris')?>" placeholder="<?=lang('registoestudante.loronMorisestudante')?>" class="form-control <?=isset($errors['loron_moris']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['loron_moris']) ?  $errors['loron_moris'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputState" class="form-label"><?=lang('registoestudante.statusServisuestudante')?></label>
                                    <select id="inputState" name="status_servisu" class="form-control  <?=isset($errors['status_servisu']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('registoestudante.hiliStatusServisuestudante')?></option>
                                        <option value="Aktivo"<?= old('status_servisu') == 'Aktivo' ? 'selected' : null ?>><?=lang('registoestudante.aktivoServisuestudante')?></option>
                                        <option value="La Aktivo" <?= old('status_servisu') == 'La Aktivo' ? 'selected' : null ?>><?=lang('registoestudante.laAktivoServisuestudante')?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['status_servisu']) ?  $errors['status_servisu'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputZip" class="form-label"><?=lang('registoestudante.numeroTelefoneestudante')?></label>
                                    <input type="text" name="numero_whatsapp" placeholder="<?=lang('registoestudante.numeroTelefoneestudante')?>" value="<?=old('numero_whatsapp')?>" class="form-control <?=isset($errors['numero_whatsapp']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['numero_whatsapp']) ?  $errors['numero_whatsapp'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-5">
                                    <label for="inputZip" class="form-label"><?=lang('registoestudante.numeroEleituralestudante')?><sub>(<?=lang('registoestudante.subestudante')?>)</sub></label>
                                    <input type="text" name="numero_eleitural" placeholder="<?=lang('registoestudante.numeroEleituralestudante')?>"value="<?=old('numero_eleitural')?>" class="form-control <?=isset($errors['numero_eleitural']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['numero_eleitural']) ?  $errors['numero_eleitural'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputZip" class="form-label"><?=lang('registoestudante.imageestudantePortfolio')?></label>
                                    <input type="file" name="image_estudante" placeholder="<?=lang('registoestudante.imageSistemaestudantePortfolio')?>" class="form-control  <?=isset($errors['image_estudante']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['image_estudante']) ?  $errors['image_estudante'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('registoestudante.registoUrlConta'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>