<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('categorioPortfolio.addCategorio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('categorioPortfolio.addCategorio')?></h4>
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
                        <form action="<?=base_url(lang('categorioPortfolio.inputCategorioUrlPortfolio')) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('categorioPortfolio.kodeCategorio')?></label>
                                    <input type="text" name="kode_categorio" value="<?= old('kode_categorio') ?>" class="form-control <?=isset($errors['kode_categorio']) ? 'is-invalid' : null ?>" id="inputEmail4" placeholder="<?=lang('categorioPortfolio.kodeCategorio')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['kode_categorio']) ?  $errors['kode_categorio'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('categorioPortfolio.categorioCategorio')?></label>
                                    <input type="text" name="categorio" value="<?= old('categorio') ?>" class="form-control <?=isset($errors['kode_categorio']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('categorioPortfolio.categorioCategorio')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['kode_categorio']) ?  $errors['kode_categorio'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('categorioPortfolio.dataCategorio')?></label>
                                    <input type="date" name="data_categorio" value="<?= old('data_categorio') ?>" class="form-control <?=isset($errors['kode_categorio']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('categorioPortfolio.dataCategorio')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['kode_categorio']) ?  $errors['kode_categorio'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('categorioPortfolio.categorioUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>