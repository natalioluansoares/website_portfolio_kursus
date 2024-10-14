<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaAulaPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaAulaPortfolio')?></h4>
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
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="form-row-preview">
                        <form action="<?=base_url(lang('classePortfolio.inputClasseUrlPortfolio')) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('classePortfolio.kodeClasse')?></label>
                                    <input type="text" name="kode_classe" value="<?=old('kode_classe') ?>" class="form-control <?=isset($errors['kode_classe']) ? 'is-invalid' : null ?>" id="inputEmail4" placeholder="<?=lang('classePortfolio.kodeClasse')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['kode_classe']) ?  $errors['kode_classe'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('classePortfolio.classeClasse')?></label>
                                    <input type="text" name="classe" value="<?=old('classe') ?>" class="form-control <?=isset($errors['classe']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('classePortfolio.classeClasse')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['classe']) ?  $errors['classe'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('classePortfolio.dataClasse')?></label>
                                    <input type="date" name="data_classe" value="<?=old('data_classe') ?>" class="form-control <?=isset($errors['data_classe']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('classePortfolio.dataClasse')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['data_classe']) ?  $errors['data_classe'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('classePortfolio.classeUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>