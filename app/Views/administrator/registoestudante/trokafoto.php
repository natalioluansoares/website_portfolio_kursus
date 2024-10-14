<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('registoestudante.imageUpdatePortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('registoestudante.imageUpdatePortfolio')?></h4>
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
    <div class="col-xl-6 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <?php $errors = session()->getFlashdata('errors'); ?>
                    <div class="tab-pane show active" id="form-row-preview">
                        <form action="<?=base_url(lang('registoestudante.processoImageRegistoUrlConta').$estudante->id_estudante) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputEmail4" class="form-label"><?=lang('registoestudante.imageestudantePortfolio')?></label>
                                    <input type="file" name="image_estudante" class="form-control mb-2 <?=isset($errors['image_estudante']) ? 'is-invalid' : null ?>" id="inputEmail4" placeholder="<?=lang('registoestudante.fatinEsperiensia')?>">
                                    <img alt="image" src="<?= base_url('uploads/fotoestudante/'.$estudante->image_estudante)?>" style="width: 130px;">
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
    <div class="col-xl-6 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="form-row-preview">
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputEmail4" class="form-label"><?=lang('registoestudante.imageSistemaestudantePortfolio')?></label>
                                    <img alt="image" src="<?= base_url('uploads/fotoestudante/'.$estudante->image_estudante)?>" style="height:150px ; width: 100%;">
                                </div>
                            </div>
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>