<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaDonatorKursusPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaDonatorKursusPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('totalSaldoEstudante.raiTotalSaldoEstudanteUrlPortfolio')) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('totalSaldoEstudante.tipoTransaksi')?></label>
                                    <select name="naran_total_saldo_estudante" class="form-control <?=isset($errors['naran_total_saldo_estudante']) ? 'is-invalid' : null ?>">
                                        <option value="Donator Kursus"><?= lang('sidebarPortfolio.donatorKursusPortfolio')?></option>
                                        <option value="Selu Kursus"><?= lang('sidebarPortfolio.seluPortfolio')?></option>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['naran_total_saldo_estudante']) ?  $errors['naran_total_saldo_estudante'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldoprivadoPortfolio.dataSaldo')?></label>
                                    <input type="date" name="data_total_saldo_estudante" value="<?=old('data_total_saldo_estudante') ?>" class="form-control <?=isset($errors['data_total_saldo_estudante']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('saldoprivadoPortfolio.dataSaldo')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['data_total_saldo_estudante']) ?  $errors['data_total_saldo_estudante'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldoprivadoPortfolio.fotoSaldo')?></label>
                                    <input type="file" name="foto_total_saldo_estudante" value="<?=old('saldo_portfolio') ?>" class="form-control <?=isset($errors['foto_total_saldo_estudante']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('saldoprivadoPortfolio.fotoSaldo')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['foto_total_saldo_estudante']) ?  $errors['foto_total_saldo_estudante'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldoprivadoPortfolio.descripsaunSaldo')?></label>
                                    <textarea name="descripsaun_total_saldo_estudante" id="" cols="30" class="form-control <?=isset($errors['descripsaun_total_saldo_estudante']) ? 'is-invalid' : null ?>" rows="10"><?=old('descripsaun_total_saldo_estudante')?></textarea>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['descripsaun_total_saldo_estudante']) ?  $errors['descripsaun_total_saldo_estudante'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('totalSaldoEstudante.totalSaldoEstudanteUrlPortfolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('descripsaun_total_saldo_estudante');
</script>
<?= $this->endSection() ?>