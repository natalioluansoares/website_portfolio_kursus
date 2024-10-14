<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('esperiensiaPortfolio.TrokaEsperiensiaImage')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('esperiensiaPortfolio.TrokaEsperiensiaImage')?></h4>
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
                        <form action="<?=base_url(lang('esperiensiaPortfolio.updateEsperiensiaProcessoImageUrlPortfolio').$esperiensia->id_esperiensia) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputEmail4" class="form-label"><?=lang('esperiensiaPortfolio.imageEsperiensia')?></label>
                                    <input type="file" name="image_esperiensia" class="form-control mb-2 <?=isset($errors['image_esperiensia']) ? 'is-invalid' : null ?>" id="inputEmail4" placeholder="<?=lang('esperiensiaPortfolio.fatinEsperiensia')?>">
                                    <img alt="image" src="<?= base_url('uploads/fotoesperiensia/'.$esperiensia->image_esperiensia)?>" style="width: 130px;">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['image_esperiensia']) ?  $errors['image_esperiensia'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
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
                                    <label for="inputEmail4" class="form-label"><?=lang('esperiensiaPortfolio.esperiensiaImage')?></label>
                                    <img alt="image" src="<?= base_url('uploads/fotoesperiensia/'.$esperiensia->image_esperiensia)?>" style="height:150px ; width: 100%;">
                                </div>
                            </div>
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('esperiensia');
</script>
<?= $this->endSection() ?>