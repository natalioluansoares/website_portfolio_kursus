<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.trokaSaldoPrivado')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.trokaSaldoPrivado')?></h4>
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
                        <form action="<?=base_url(lang('saldoprivadoPortfolio.updateSaldoPrivadoUrlPortfolio').$privado->id_saldo_privado) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('saldoprivadoPortfolio.kodeSaldo')?></label>
                                    <input type="text" name="kode_saldo_privado" value="<?=old('kode_saldo_privado',$privado->kode_saldo_privado) ?>" class="form-control <?=isset($errors['kode_saldo_privado']) ? 'is-invalid' : null ?>" id="kode_saldo_portfolio" placeholder="<?=lang('saldoprivadoPortfolio.kodeSaldo')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['kode_saldo_privado']) ?  $errors['kode_saldo_privado'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldoprivadoPortfolio.organizasaunSaldo')?></label>
                                    <input type="text" name="naran_organizasaun_privado" value="<?=old('naran_organizasaun_privado',$privado->naran_organizasaun_privado) ?>" class="form-control <?=isset($errors['naran_organizasaun_privado']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('saldoprivadoPortfolio.organizasaunSaldo')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_organizasaun_privado']) ?  $errors['naran_organizasaun_privado'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldoprivadoPortfolio.dataSaldo')?></label>
                                    <input type="date" name="data_saldo_privado" value="<?=old('data_saldo_privado',$privado->data_saldo_privado) ?>" class="form-control <?=isset($errors['data_saldo_privado']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('saldoprivadoPortfolio.dataSaldo')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['data_saldo_privado']) ?  $errors['data_saldo_privado'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldoprivadoPortfolio.descripsaunSaldo')?></label>
                                    <textarea name="descripsaun_saldo_privado" id="" cols="30" class="form-control <?=isset($errors['descripsaun_saldo_privado']) ? 'is-invalid' : null ?>" rows="10"><?=old('descripsaun_saldo_privado', $privado->descripsaun_saldo_privado)?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['descripsaun_saldo_privado']) ?  $errors['descripsaun_saldo_privado'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('saldoprivadoPortfolio.saldoPrivadoUrlPortfolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('descripsaun_saldo_privado');
</script>
<?= $this->endSection() ?>