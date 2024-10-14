<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaTeachersPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaTeachersPortfolio')?></h4>
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
                        <form action="<?= base_url(lang('registoTeachers.adicionarRegistoUrlConta')) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>    
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('registoTeachers.lastNameTeachers')?></label>
                                    <input type="text" class="form-control <?=isset($errors['naran_ikus']) ? 'is-invalid' : null ?>" name="naran_ikus" id="inputEmail4" value="<?= old('naran_ikus')?>" placeholder="<?=lang('registoTeachers.lastNameTeachers')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_ikus']) ?  $errors['naran_ikus'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('registoTeachers.firstNameTeachers')?></label>
                                    <input type="text" class="form-control <?=isset($errors['naran_primeiro']) ? 'is-invalid' : null ?>" name="naran_primeiro" id="inputPassword4" value="<?= old('naran_primeiro')?>" placeholder="<?=lang('registoTeachers.firstNameTeachers')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_primeiro']) ?  $errors['naran_primeiro'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('registoTeachers.fullNameTeachers')?></label>
                                    <input type="text" class="form-control <?=isset($errors['naran_kompleto']) ? 'is-invalid' : null ?>" name="naran_kompleto" id="inputPassword4"value="<?= old('naran_kompleto')?>" placeholder="<?=lang('registoTeachers.fullNameTeachers')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_kompleto']) ?  $errors['naran_kompleto'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-3">
                                    <label for="inputEmail4" class="form-label"><?=lang('registoTeachers.emailTeachers')?></label>
                                    <input type="email" class="form-control <?=isset($errors['email']) ? 'is-invalid' : null ?>" name="email" id="inputEmail4" value="<?= old('email')?>" placeholder="<?=lang('registoTeachers.emailTeachers')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['email']) ?  $errors['email'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputPassword4" class="form-label"><?=lang('registoTeachers.passwordTeachers')?></label>
                                    <input type="password" class="form-control <?=isset($errors['password']) ? 'is-invalid' : null ?>" name="password" id="inputPassword4" placeholder="<?=lang('registoTeachers.passwordTeachers')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['password']) ?  $errors['password'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputPassword4" class="form-label"><?=lang('registoTeachers.confPasswordTeachers')?></label>
                                    <input type="password" class="form-control <?=isset($errors['confpassword']) ? 'is-invalid' : null ?>" name="confpassword" id="inputPassword4" placeholder="<?=lang('registoTeachers.confPasswordTeachers')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['confpassword']) ?  $errors['confpassword'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputState" class="form-label"><?=lang('registoTeachers.sistemaTeachersPortfolio')?></label>
                                    <select id="" name="sistema_administrator" class="form-control <?=isset($errors['sistema_administrator']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('registoTeachers.hiliSistemaTeachersPortfolio')?></option>
                                        <?php foreach($sistema as $sis): ?>
                                        <option value="<?=$sis->id_sistema?>"<?= old('sistema_administrator') == $sis->id_sistema ? 'selected' : null ?>><?=$sis->sistema?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['sistema_administrator']) ?  $errors['sistema_administrator'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-3">
                                    <label for="inputState" class="form-label"><?=lang('registoTeachers.sexoTeachers')?></label>
                                    <select id="inputState" name="jenero" class="form-control <?=isset($errors['jenero']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('registoTeachers.hiliSexoTeachers')?></option>
                                        <option value="Mane"<?= old('jenero') == 'Mane' ? 'selected' : null ?>><?=lang('registoTeachers.maneTeachers')?></option>
                                        <option value="Feto" <?= old('jenero') == 'Feto' ? 'selected' : null ?>><?=lang('registoTeachers.fetoTeachers')?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['jenero']) ?  $errors['jenero'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputZip" class="form-label"><?=lang('registoTeachers.fatinMorisTeachers')?></label>
                                    <input type="text" name="fatin_moris" value="<?=old('fatin_moris') ?>" placeholder="<?=lang('registoTeachers.fatinMorisTeachers')?>" class="form-control <?=isset($errors['fatin_moris']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['fatin_moris']) ?  $errors['fatin_moris'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputZip" class="form-label"><?=lang('registoTeachers.loronMorisTeachers')?></label>
                                    <input type="date" name="loron_moris" value="<?=old('loron_moris')?>" placeholder="<?=lang('registoTeachers.loronMorisTeachers')?>" class="form-control <?=isset($errors['loron_moris']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['loron_moris']) ?  $errors['loron_moris'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputState" class="form-label"><?=lang('registoTeachers.statusServisuTeachers')?></label>
                                    <select id="inputState" name="status_servisu" class="form-control  <?=isset($errors['status_servisu']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('registoTeachers.hiliStatusServisuTeachers')?></option>
                                        <option value="Aktivo"<?= old('status_servisu') == 'Aktivo' ? 'selected' : null ?>><?=lang('registoTeachers.aktivoServisuTeachers')?></option>
                                        <option value="La Aktivo" <?= old('status_servisu') == 'La Aktivo' ? 'selected' : null ?>><?=lang('registoTeachers.laAktivoServisuTeachers')?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['status_servisu']) ?  $errors['status_servisu'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputZip" class="form-label"><?=lang('registoTeachers.numeroTelefoneTeachers')?></label>
                                    <input type="text" name="numero_whatsapp" placeholder="<?=lang('registoTeachers.numeroTelefoneTeachers')?>" value="<?=old('numero_whatsapp')?>" class="form-control <?=isset($errors['numero_whatsapp']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['numero_whatsapp']) ?  $errors['numero_whatsapp'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-5">
                                    <label for="inputZip" class="form-label"><?=lang('registoTeachers.numeroEleituralTeachers')?><sub>(<?=lang('registoTeachers.subTeachers')?>)</sub></label>
                                    <input type="text" name="numero_eleitural" placeholder="<?=lang('registoTeachers.numeroEleituralTeachers')?>"value="<?=old('numero_eleitural')?>" class="form-control <?=isset($errors['numero_eleitural']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['numero_eleitural']) ?  $errors['numero_eleitural'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="inputZip" class="form-label"><?=lang('registoTeachers.imageSistemaTeachersPortfolio')?></label>
                                    <input type="file" name="image_administrator" placeholder="<?=lang('registoTeachers.imageSistemaTeachersPortfolio')?>" class="form-control  <?=isset($errors['image_administrator']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['image_administrator']) ?  $errors['image_administrator'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('registoTeachers.registoUrlConta'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>