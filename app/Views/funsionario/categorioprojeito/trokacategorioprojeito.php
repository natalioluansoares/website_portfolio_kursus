<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.aumentaCategoriaPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('funsionario') ?>
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
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.aumentaCategoriaPortfolio')?></strong></h4>
            </div>
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?=base_url(lang('categorioProjeitoFunsionario.updateCategorioBackendFrontendUrlPortfolio').$backend->id_backend_frontend) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row g-2">
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.categorioProjeitoBackendFrontend')?></label>
                                <select name="projeito_backend_frontend" id="" class="form-control">     
                                    <option value="<?=$backend->projeito_backend_frontend ?>"<?= old('projeito_backend_frontend') == $backend->projeito_backend_frontend  ? 'selected' : null ?>><?=$backend->categorio_backend_frontend ?>
                                    </option>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['projeito_backend_frontend']) ?  $errors['projeito_backend_frontend'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.lianMPortfolio')?></label>
                                <select name="lian_backend_frontend" id="" class="form-control">
                                    <option value="<?=lang('projeitoBackendPortfolio.lianProjeitoBackendFrontendlPortfolio')?>"<?=old('lian_backend_frontend') == lang('projeitoBackendPortfolio.lianProjeitoBackendFrontendlPortfolio') ? 'selected' : null ?>><?=lang('projeitoBackendPortfolio.lianProjeitoBackendFrontendlPortfolio')?></option>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['lian_backend_frontend']) ?  $errors['lian_backend_frontend'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.dataProjeitoBackendFrontend')?></label>
                                <input type="date" name="data_backend_frontend" value="<?=old('data_backend_frontend', $backend->data_backend_frontend) ?>" class="form-control" id="inputPassword4" placeholder="<?=lang('projeitoBackendPortfolio.dataProjeitoBackendFrontend')?>">
                                <small class="text-danger">
                                    <?=isset($errors['data_backend_frontend']) ?  $errors['data_backend_frontend'] : null ?>
                                </small>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.youtubeProjeitoBackendFrontend')?></label>
                                <textarea name="youtube" id="" cols="30" rows="4" placeholder="<?=lang('projeitoBackendPortfolio.youtubeProjeitoBackendFrontend')?>" class="form-control"><?=old('youtube',$backend->youtube) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['youtube']) ?  $errors['youtube'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.facebookProjeitoBackendFrontend')?></label>
                                <textarea name="facebook" id="" cols="30" rows="4" placeholder="<?=lang('projeitoBackendPortfolio.facebookProjeitoBackendFrontend')?>" class="form-control"><?=old('facebook', $backend->facebook) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['facebook']) ?  $errors['facebook'] : null ?>
                                </small>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.instagramProjeitoBackendFrontend')?></label>
                                <textarea name="instagram" id="" cols="30" placeholder="<?=lang('projeitoBackendPortfolio.instagramProjeitoBackendFrontend')?>" rows="4" class="form-control"><?=old('instagram', $backend->instagram) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['instagram']) ?  $errors['instagram'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.tiktokProjeitoBackendFrontend')?></label>
                                <textarea name="tiktok" id="" placeholder="<?=lang('projeitoBackendPortfolio.tiktokProjeitoBackendFrontend')?>" cols="30" rows="4" class="form-control"><?=old('tiktok', $backend->tiktok) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['tiktok']) ?  $errors['tiktok'] : null ?>
                                </small>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.tituloProjeitoBackendFrontend')?></label>
                                <textarea name="titulo_backend_frontend" id="" cols="30" class="form-control" rows="10"><?=old('titulo_backend_frontend', $backend->titulo_backend_frontend) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['titulo_backend_frontend']) ?  $errors['titulo_backend_frontend'] : null ?>
                                </small>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="mb-3 col-md-12">
                                <label for="inputPassword4" class="form-label"><?=lang('projeitoBackendPortfolio.descripsaunProjeitoBackendFrontend')?></label>
                                <textarea name="descripsaun_backend_frontend" id="" cols="30" class="form-control" rows="10"><?=old('descripsaun_backend_frontend', $backend->descripsaun_backend_frontend) ?></textarea>
                                <small class="text-danger">
                                    <?=isset($errors['descripsaun_backend_frontend']) ?  $errors['descripsaun_backend_frontend'] : null ?>
                                </small>
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
                        <a href="<?= base_url(lang('categorioProjeitoFunsionario.categorioBackendFrontendUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('descripsaun_categorio');
</script>
<?= $this->endSection() ?>