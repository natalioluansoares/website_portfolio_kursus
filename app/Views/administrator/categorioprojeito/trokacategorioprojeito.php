<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('categoriobackendfrontendPortfolio.addCategorio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('categoriobackendfrontendPortfolio.addCategorio')?></h4>
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
                        <form action="<?=base_url(lang('categoriobackendfrontendPortfolio.updateCategorioBackendFrontendUrlPortfolio').$categorio->id_categorio_backend_frontend) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <input type="hidden" name="administrator_projeito_categorio" value="<?=helperSistema()->id_administrator ?>" name="" id="">
                                    <label for="inputEmail4" class="form-label"><?=lang('categoriobackendfrontendPortfolio.kodeCategorio')?></label>
                                    <input type="text" name="kode_categorio_backend_frontend" value="<?= old('kode_categorio_backend_frontend', $categorio->kode_categorio_backend_frontend) ?>" class="form-control <?=isset($errors['kode_categorio_backend_frontend']) ? 'is-invalid' : null ?>" id="inputEmail4" placeholder="<?=lang('categoriobackendfrontendPortfolio.kodeCategorio')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['kode_categorio_backend_frontend']) ?  $errors['kode_categorio_backend_frontend'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('categoriobackendfrontendPortfolio.categorioCategorio')?></label>
                                    <input type="text" name="categorio_backend_frontend" value="<?= old('categorio_backend_frontend', $categorio->categorio_backend_frontend) ?>" class="form-control <?=isset($errors['categorio_backend_frontend']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('categoriobackendfrontendPortfolio.categorioCategorio')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['categorio_backend_frontend']) ?  $errors['categorio_backend_frontend'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('categoriobackendfrontendPortfolio.projectCategorio')?></label>
                                    <select name="backend_frontend" id="" class="form-control <?=isset($errors['backend_frontend']) ? 'is-invalid' : null ?>">
                                        <option value="<?=$categorio->backend_frontend?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.backendCategorio') ? 'selected' : null ?>><?=$categorio->backend_frontend?></option>
                                        <option value=""><?=lang('categoriobackendfrontendPortfolio.hiliProjectCategorio')?></option>
                                        <option value="<?=lang('categoriobackendfrontendPortfolio.backendCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.backendCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.backendCategorio')?></option>

                                        <option value="<?=lang('categoriobackendfrontendPortfolio.frontendCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.frontendCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.frontendCategorio')?></option>

                                        <option value="<?=lang('categoriobackendfrontendPortfolio.fullstackCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.fullstackCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.fullstackCategorio')?></option>

                                        <option value="<?=lang('categoriobackendfrontendPortfolio.cyberCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.cyberCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.cyberCategorio')?></option>

                                        <option value="<?=lang('categoriobackendfrontendPortfolio.jaringanCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.jaringanCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.jaringanCategorio')?></option>

                                        <option value="<?=lang('categoriobackendfrontendPortfolio.hardwareCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.hardwareCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.hardwareCategorio')?></option>

                                        <option value="<?=lang('categoriobackendfrontendPortfolio.microsoftCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.microsoftCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.microsoftCategorio')?></option>

                                        <option value="<?=lang('categoriobackendfrontendPortfolio.englishCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.englishCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.englishCategorio')?></option>

                                        <option value="<?=lang('categoriobackendfrontendPortfolio.portuguesaCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.portuguesaCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.portuguesaCategorio')?></option>

                                        <option value="<?=lang('categoriobackendfrontendPortfolio.indonesiaCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.indonesiaCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.indonesiaCategorio')?></option>

                                        <option value="<?=lang('categoriobackendfrontendPortfolio.tetumCategorio')?>"<?=old('backend_frontend') == lang('categoriobackendfrontendPortfolio.tetumCategorio') ? 'selected' : null ?>><?=lang('categoriobackendfrontendPortfolio.tetumCategorio')?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['backend_frontend']) ?  $errors['backend_frontend'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('categoriobackendfrontendPortfolio.hiliLianCategorio')?></label>
                                    <input type="text" name="lian_categorio_backend_frontend" class="form-control <?=isset($errors['lian_categorio_backend_frontend']) ? 'is-invalid' : null ?>" id="inputPassword4" value="<?=lang('categoriobackendfrontendPortfolio.lianCategorio')?>" readonly>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['lian_categorio_backend_frontend']) ?  $errors['lian_categorio_backend_frontend'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('categoriobackendfrontendPortfolio.dataCategorio')?></label>
                                    <input type="date" name="data_categorio_backend_frontend" value="<?= old('data_categorio_backend_frontend', $categorio->data_categorio_backend_frontend) ?>" class="form-control <?=isset($errors['data_categorio_backend_frontend']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('categoriobackendfrontendPortfolio.dataCategorio')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['data_categorio_backend_frontend']) ?  $errors['data_categorio_backend_frontend'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('categoriobackendfrontendPortfolio.descripsaunCategorio')?></label>
                                    <textarea name="descripsaun_categorio" id="descripsaun_categorio" cols="30" class="form-control <?=isset($errors['descripsaun_categorio']) ? 'is-invalid' : null ?>" rows="10"><?=old('descripsaun_categorio', $categorio->descripsaun_categorio) ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['descripsaun_categorio']) ?  $errors['descripsaun_categorio'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('categoriobackendfrontendPortfolio.categorioBackendFrontendUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('descripsaun_categorio');
</script>
<?= $this->endSection() ?>