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
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaSistemaPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('sistemaPortfolio.inputSistemaUrlPortfolio')) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('sistemaPortfolio.kodeSistema')?></label>
                                    <input type="text" name="kode_sistema" value="<?=old('kode_sistema') ?>" class="form-control <?=isset($errors['kode_sistema']) ? 'is-invalid' : null ?>" id="inputEmail4" placeholder="<?=lang('sistemaPortfolio.kodeSistema')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['kode_sistema']) ?  $errors['kode_sistema'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('sistemaPortfolio.sistemaSistema')?></label>
                                    <input type="text" name="sistema" value="<?=old('sistema') ?>" class="form-control <?=isset($errors['sistema']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('sistemaPortfolio.sistemaSistema')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['sistema']) ?  $errors['sistema'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('sistemaPortfolio.dataSistema')?></label>
                                    <input type="date" name="data_sistema" value="<?=old('data_sistema') ?>" class="form-control <?=isset($errors['data_sistema']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('sistemaPortfolio.dataSistema')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['data_sistema']) ?  $errors['data_sistema'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('sistemaPortfolio.sistemaUrlPortfolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>