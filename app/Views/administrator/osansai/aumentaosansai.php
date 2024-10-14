<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaOsanSaiPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaOsanSaiPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('osanSaiPortfolio.inputOsanSaiUrlPortfolio')) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label"><?=lang('osanSaiPortfolio.kodeOsanSai')?></label>
                                    <input type="text" name="kode_osan_sai" value="<?=old('kode_osan_sai') ?>" class="form-control <?=isset($errors['kode_osan_sai']) ? 'is-invalid' : null ?>" id="kode_saldo_portfolio" placeholder="<?=lang('osanSaiPortfolio.kodeOsanSai')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['kode_osan_sai']) ?  $errors['kode_osan_sai'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('osanSaiPortfolio.naranOsanSai')?></label>
                                    <input type="text" name="naran_osan_sai" value="<?=old('naran_osan_sai') ?>" class="form-control <?=isset($errors['naran_osan_sai']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('osanSaiPortfolio.naranOsanSai')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_osan_sai']) ?  $errors['naran_osan_sai'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('osanSaiPortfolio.dataOsanSai')?></label>
                                    <input type="date" name="data_osan_sai" value="<?=old('data_osan_sai') ?>" class="form-control <?=isset($errors['data_osan_sai']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('osanSaiPortfolio.dataOsanSai')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['data_osan_sai']) ?  $errors['data_osan_sai'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('osanSaiPortfolio.timeOsanSai')?></label>
                                    <input type="time" name="horas_osan_sai" value="<?=old('horas_osan_sai') ?>" class="form-control <?=isset($errors['horas_osan_sai']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('osanSaiPortfolio.timeOsanSai')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['horas_osan_sai']) ?  $errors['horas_osan_sai'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('osanSaiPortfolio.gambarOsanSai')?></label>
                                    <input type="file" name="image_osan_sai" value="<?=old('saldo_portfolio') ?>" class="form-control <?=isset($errors['image_osan_sai']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('osanSaiPortfolio.gambarOsanSai')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['image_osan_sai']) ?  $errors['image_osan_sai'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('osanSaiPortfolio.osanSaiUrlPortfolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>