<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaMateriaPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaMateriaPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('materiaPortfolio.inputMateriaUrlPortfolio')) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.categorioMateria')?></label>
                                    <select name="categorio_materia" id="" class="form-control <?=isset($errors['categorio_materia']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('materiaPortfolio.hiliCategorioMateria')?></option>
                                        <?php foreach($categorio as $portfolio):?>
                                        <option value="<?=$portfolio->id_categorio ?>"<?= old('categorio_materia') == $portfolio->id_categorio  ? 'selected' : null ?>><?=$portfolio->categorio ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['categorio_materia']) ?  $errors['categorio_materia'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.lianMPortfolio')?></label>
                                    <select name="lian_materia" id="" class="form-control <?=isset($errors['lian_materia']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('materiaPortfolio.hiliLianMaterialPortfolio')?></option>
                                        <option value="<?=lang('materiaPortfolio.lianMaterialPortfolio')?>"<?= old('lian_materia') == lang('materiaPortfolio.lianMaterialPortfolio')  ? 'selected' : null ?>><?=lang('materiaPortfolio.lianMaterialPortfolio')?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['lian_materia']) ?  $errors['lian_materia'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.dataMateria')?></label>
                                    <input type="date" name="data_materia" value="<?=old('data_materia') ?>" class="form-control <?=isset($errors['data_materia']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('materiaPortfolio.dataMateria')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['data_materia']) ?  $errors['data_materia'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.youtubeMateria')?></label>
                                    <textarea name="youtube" id="" cols="30" rows="4" placeholder="<?=lang('materiaPortfolio.youtubeMateria')?>" class="form-control <?=isset($errors['youtube']) ? 'is-invalid' : null ?>"><?=old('youtube') ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['youtube']) ?  $errors['youtube'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.facebookMateria')?></label>
                                    <textarea name="facebook" id="" cols="30" rows="4" placeholder="<?=lang('materiaPortfolio.facebookMateria')?>" class="form-control <?=isset($errors['facebook']) ? 'is-invalid' : null ?>"><?=old('facebook') ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['facebook']) ?  $errors['facebook'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.instagramMateria')?></label>
                                    <textarea name="instagram" id="" cols="30" placeholder="<?=lang('materiaPortfolio.instagramMateria')?>" rows="4" class="form-control <?=isset($errors['instagram']) ? 'is-invalid' : null ?>"><?=old('instagram') ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['instagram']) ?  $errors['instagram'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.tiktokMateria')?></label>
                                    <textarea name="tiktok" id="" placeholder="<?=lang('materiaPortfolio.tiktokMateria')?>" cols="30" rows="4" class="form-control <?=isset($errors['tiktok']) ? 'is-invalid' : null ?>"><?=old('tiktok') ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['tiktok']) ?  $errors['tiktok'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.tituloMateria')?></label>
                                    <textarea name="titulo_materia" id="" cols="30" class="form-control <?=isset($errors['titulo_materia']) ? 'is-invalid' : null ?>" rows="10"><?=old('titulo_materia') ?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['titulo_materia']) ?  $errors['titulo_materia'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('materiaPortfolio.materiaMateria')?><sub>(<?=lang('materiaPortfolio.messageMateria')?>)</sub></label>
                                    <textarea name="materia" id="materia" cols="30" class="form-control" placeholder="<?=lang('materiaPortfolio.messageMateria') ?>" rows="10"><?=old('materia') ?></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('categorioPortfolio.categorioUrlPortfolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('titulo_materia');
    CKEDITOR.replace('materia');
    CKEDITOR.replace('source');
</script>
<?= $this->endSection() ?>