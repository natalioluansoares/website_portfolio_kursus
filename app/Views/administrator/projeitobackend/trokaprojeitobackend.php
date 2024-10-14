<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.backendAumentaPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.backendAumentaPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('projeitoBackendPortfolio.updateProjeitoBackendFrontendUrlPortfolio').$backend->id_backend_frontend) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.categorioProjeitoBackendFrontend')?></label>
                                    <select name="projeito_backend_frontend" id="" class="form-control <?=isset($errors['projeito_backend_frontend']) ? 'is-invalid' : null ?>">     
                                        <option value="<?=$backend->projeito_backend_frontend ?>"<?= old('projeito_backend_frontend') == $backend->projeito_backend_frontend  ? 'selected' : null ?>><?=$backend->categorio_backend_frontend ?>
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['projeito_backend_frontend']) ?  $errors['projeito_backend_frontend'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.lianMPortfolio')?></label>
                                    <input type="text" name="lian_backend_frontend" value="<?=lang('projeitoBackendPortfolio.lianProjeitoBackendFrontendlPortfolio')?>" class="form-control" id="inputPassword4" readonly>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['lian_backend_frontend']) ?  $errors['lian_backend_frontend'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.dataProjeitoBackendFrontend')?></label>
                                    <input type="date" name="data_backend_frontend" value="<?=old('data_backend_frontend', $backend->data_backend_frontend) ?>" class="form-control <?=isset($errors['data_backend_frontend']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('projeitoBackendPortfolio.dataProjeitoBackendFrontend')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['data_backend_frontend']) ?  $errors['data_backend_frontend'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.youtubeProjeitoBackendFrontend')?></label>
                                    <textarea name="youtube" id="" cols="30" rows="4" placeholder="<?=lang('projeitoBackendPortfolio.youtubeProjeitoBackendFrontend')?>" class="form-control <?=isset($errors['youtube']) ? 'is-invalid' : null ?>"><?=old('youtube',$backend->youtube) ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['youtube']) ?  $errors['youtube'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.facebookProjeitoBackendFrontend')?></label>
                                    <textarea name="facebook" id="" cols="30" rows="4" placeholder="<?=lang('projeitoBackendPortfolio.facebookProjeitoBackendFrontend')?>" class="form-control <?=isset($errors['facebook']) ? 'is-invalid' : null ?>"><?=old('facebook', $backend->facebook) ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['facebook']) ?  $errors['facebook'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.instagramProjeitoBackendFrontend')?></label>
                                    <textarea name="instagram" id="" cols="30" placeholder="<?=lang('projeitoBackendPortfolio.instagramProjeitoBackendFrontend')?>" rows="4" class="form-control <?=isset($errors['instagram']) ? 'is-invalid' : null ?>"><?=old('instagram', $backend->instagram) ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['instagram']) ?  $errors['instagram'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.tiktokProjeitoBackendFrontend')?></label>
                                    <textarea name="tiktok" id="" placeholder="<?=lang('projeitoBackendPortfolio.tiktokProjeitoBackendFrontend')?>" cols="30" rows="4" class="form-control <?=isset($errors['tiktok']) ? 'is-invalid' : null ?>"><?=old('tiktok', $backend->tiktok) ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['tiktok']) ?  $errors['tiktok'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.tituloProjeitoBackendFrontend')?></label>
                                    <textarea name="titulo_backend_frontend" id="" cols="30" class="form-control <?=isset($errors['titulo_backend_frontend']) ? 'is-invalid' : null ?>" rows="10"><?=old('titulo_backend_frontend', $backend->titulo_backend_frontend) ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['titulo_backend_frontend']) ?  $errors['titulo_backend_frontend'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.descripsaunProjeitoBackendFrontend')?></label>
                                    <textarea name="descripsaun_backend_frontend" id="" cols="30" class="form-control <?=isset($errors['descripsaun_backend_frontend']) ? 'is-invalid' : null ?>" rows="10"><?=old('descripsaun_backend_frontend', $backend->descripsaun_backend_frontend) ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['descripsaun_backend_frontend']) ?  $errors['descripsaun_backend_frontend'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.materiaProjeitoBackendFrontend')?><sub>(<?=lang('projeitoBackendPortfolio.messageProjeitoBackendFrontend')?>)</sub></label>
                                    <textarea name="materia_backend_frontend" id="materia" cols="30" class="form-control" placeholder="<?=lang('projeitoBackendPortfolio.messageMateria') ?>" rows="10"><?=old('materia_backend_frontend', $backend->materia_backend_frontend)?></textarea>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.sourceProjeitoBackendFrontend')?><sub>(<?=lang('projeitoBackendPortfolio.messageProjeitoBackendFrontend')?>)</sub></label>
                                    <textarea name="source_projeito" id="source" cols="30" class="form-control" rows="10"><?=old('source_projeito') ?></textarea>
                                </div>
                            </div>
                             <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('projeitoBackendPortfolio.showProjeitoBackendFrontendUrlPortfolio').$backend->projeito_backend_frontend)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('titulo_backend_frontend');
    CKEDITOR.replace('descripsaun_backend_frontend');
    CKEDITOR.replace('materia_backend_frontend');
    CKEDITOR.replace('source_projeito');
</script>
<?= $this->endSection() ?>