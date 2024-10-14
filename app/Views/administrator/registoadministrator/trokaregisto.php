<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaRegistoPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaRegistoPortfolio')?></h4>
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
                        <form action="<?= base_url(lang('registoAdministrator.updateRegistoUrlConta').$administrator->id_administrator) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('registoAdministrator.lastNameAdministrator')?></label>
                                    <input type="text" class="form-control <?=isset($errors['naran_ikus']) ? 'is-invalid' : null ?>" value="<?=old('naran_ikus',$administrator->naran_ikus) ?>" name="naran_ikus" id="inputEmail4" placeholder="<?=lang('registoAdministrator.lastNameAdministrator')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_ikus']) ?  $errors['naran_ikus'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('registoAdministrator.firstNameAdministrator')?></label>
                                    <input type="text" class="form-control <?=isset($errors['naran_primeiro']) ? 'is-invalid' : null ?>"  value="<?=old('naran_primeiro',$administrator->naran_primeiro) ?>" name="naran_primeiro" id="inputPassword4" placeholder="<?=lang('registoAdministrator.firstNameAdministrator')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_primeiro']) ?  $errors['naran_primeiro'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('registoAdministrator.fullNameAdministrator')?></label>
                                    <input type="text" class="form-control <?=isset($errors['naran_kompleto']) ? 'is-invalid' : null ?>"  value="<?=old('naran_kompleto',$administrator->naran_kompleto) ?>" name="naran_kompleto" id="inputPassword4" placeholder="<?=lang('registoAdministrator.fullNameAdministrator')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_kompleto']) ?  $errors['naran_kompleto'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('registoAdministrator.emailAdministrator')?></label>
                                    <input type="email" class="form-control <?=isset($errors['email']) ? 'is-invalid' : null ?>"  value="<?=old('email',$administrator->email )?>" name="email" id="inputEmail4" placeholder="<?=lang('registoAdministrator.emailAdministrator')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['email']) ?  $errors['email'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputState" class="form-label"><?=lang('registoAdministrator.sistemaAdministratorPortfolio')?></label>
                                    <select id="inputState" name="sistema_administrator" class="form-control <?=isset($errors['sistema_administrator']) ? 'is-invalid' : null ?>">
                                        <option value="<?=$administrator->sistema_administrator ?>"><?=$administrator->sistema ?></option>
                                        <option value=""><?=lang('registoAdministrator.hiliSistemaAdministratorPortfolio')?></option>
                                        <?php foreach($sistema as $sis): ?>
                                        <option value="<?=$sis->id_sistema?>"<?= old('sistema_administrator',  $sis->id_sistema) == $sis->id_sistema ? 'selected' : null ?>><?=$sis->sistema?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['sistema_administrator']) ?  $errors['sistema_administrator'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputState" class="form-label"><?=lang('registoAdministrator.sexoAdministrator')?></label>
                                    <select id="inputState" name="jenero" class="form-control <?=isset($errors['jenero']) ? 'is-invalid' : null ?>">
                                        <?php if ($administrator->jenero == 'Mane') {?>
                                            <option value="<?=$administrator->jenero ?>"><?=lang('registoAdministrator.maneAdministrator')?></option>
                                        <?php } else {?>
                                                <option value="<?=$administrator->jenero ?>"><?=lang('registoAdministrator.fetoAdministrator')?></option>
                                      <?php }?>
                                        <option value=""><?=lang('registoAdministrator.hiliSexoAdministrator')?></option>
                                        <option value="Mane"<?= old('jenero') == 'Mane' ? 'selected' : null ?>><?=lang('registoAdministrator.maneAdministrator')?></option>
                                        <option value="Feto"<?= old('jenero') == 'Feto' ? 'selected' : null ?>><?=lang('registoAdministrator.fetoAdministrator')?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['jenero']) ?  $errors['jenero'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputZip" class="form-label"><?=lang('registoAdministrator.fatinMorisAdministrator')?></label>
                                    <input type="text" name="fatin_moris" value="<?=old('fatin_moris',$administrator->fatin_moris) ?>" placeholder="<?=lang('registoAdministrator.fatinMorisAdministrator')?>" class="form-control <?=isset($errors['fatin_moris']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['fatin_moris']) ?  $errors['fatin_moris'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputZip" class="form-label"><?=lang('registoAdministrator.loronMorisAdministrator')?></label>
                                    <input type="date" name="loron_moris" value="<?=old('loron_moris',$administrator->loron_moris) ?>" placeholder="<?=lang('registoAdministrator.loronMorisAdministrator')?>" class="form-control <?=isset($errors['loron_moris']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['loron_moris']) ?  $errors['loron_moris'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputState" class="form-label"><?=lang('registoAdministrator.statusServisuAdministrator')?></label>
                                    <select id="inputState" name="status_servisu" class="form-control <?=isset($errors['status_servisu']) ? 'is-invalid' : null ?>">
                                        <?php if ($administrator->status_servisu == 'Aktivo') { ?>
                                            <option value="<?= $administrator->status_servisu ?>"><?=lang('registoAdministrator.aktivoServisuAdministrator')?></option>
                                       <?php }else {?>
                                        <option value="<?= $administrator->status_servisu ?>"><?=lang('registoAdministrator.laAktivoServisuAdministrator')?></option>
                                       <?php } ?>
                                        <option value=""><?=lang('registoAdministrator.hiliStatusServisuAdministrator')?></option>
                                        <option value="Aktivo"<?= old('status_servisu')  == 'Aktivo' ? 'selected' : null ?>><?=lang('registoAdministrator.aktivoServisuAdministrator')?></option>
                                        <option value="La Aktivo"<?= old('status_servisu') == 'La Aktivo' ? 'selected' : null ?>><?=lang('registoAdministrator.laAktivoServisuAdministrator')?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['status_servisu']) ?  $errors['status_servisu'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputZip" class="form-label"><?=lang('registoAdministrator.numeroTelefoneAdministrator')?></label>
                                    <input type="text" name="numero_whatsapp" value="<?=old('numero_telefone',$administrator->numero_telefone) ?>" placeholder="<?=lang('registoAdministrator.numeroTelefoneAdministrator')?>" class="form-control <?=isset($errors['numero_telefone']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['numero_telefone']) ?  $errors['numero_telefone'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputZip" class="form-label"><?=lang('registoAdministrator.numeroEleituralAdministrator')?><sub>(<?=lang('registoAdministrator.subAdministrator')?>)</sub></label>
                                    <input type="text" name="numero_eleitural" value="<?=old('numero_eleitural', $administrator->numero_eleitural) ?>" placeholder="<?=lang('registoAdministrator.numeroEleituralAdministrator')?>" class="form-control <?=isset($errors['numero_eleitural']) ? 'is-invalid' : null ?>" id="inputZip">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['numero_eleitural']) ?  $errors['numero_eleitural'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('registoAdministrator.registoUrlConta'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>