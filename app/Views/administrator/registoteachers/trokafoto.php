<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('registoTeachers.imageUpdatePortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('registoTeachers.imageUpdatePortfolio')?></h4>
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
                        <form action="<?=base_url(lang('registoTeachers.processoImageRegistoUrlConta').$administrator->id_administrator) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputEmail4" class="form-label"><?=lang('registoTeachers.imageTeachersPortfolio')?></label>
                                    <input type="file" name="image_administrator" class="form-control mb-2 <?=isset($errors['image_administrator']) ? 'is-invalid' : null ?>" id="inputEmail4" placeholder="<?=lang('registoTeachers.fatinEsperiensia')?>">
                                    <img alt="image" src="<?= base_url('uploads/fotoportfolio/'.$administrator->image_administrator)?>" style="width: 130px;">
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
    <div class="col-xl-6 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="form-row-preview">
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputEmail4" class="form-label"><?=lang('registoTeachers.imageSistemaTeachersPortfolio')?></label>
                                    <img alt="image" src="<?= base_url('uploads/fotoportfolio/'.$administrator->image_administrator)?>" style="height:150px ; width: 100%;">
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