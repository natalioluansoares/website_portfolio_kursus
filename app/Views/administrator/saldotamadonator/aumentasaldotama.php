<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentaSaldoPrivado')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentaSaldoPrivado')?></h4>
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
                        <form action="<?=base_url(lang('saldotamaPortfolio.inputSaldoTamaUrlPortfolio')) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldotamaPortfolio.organizasaunSaldo')?></label>
                                    <select name="id_total_privado" id="" class="form-control <?=isset($errors['id_total_privado']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('saldotamaPortfolio.hiliOrganizasaunSaldo')?></option>
                                        <?php foreach($privado  as $pri): ?>
                                        <option value="<?= $pri->id_saldo_privado?>"<?= old('id_total_privado') == $pri->id_saldo_privado ? 'selected' : null ?>><?= $pri->naran_organizasaun_privado?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['id_total_privado']) ?  $errors['id_total_privado'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldotamaPortfolio.balanceSaldo')?></label>
                                    <select name="id_total_portfolio" id="" class="form-control <?=isset($errors['id_total_portfolio']) ? 'is-invalid' : null ?>">
                                        <option value=""><?=lang('saldotamaPortfolio.hiliBalanceSaldo')?></option>
                                        <?php foreach($saldo  as $pri): ?>
                                        <option value="<?= $pri->id_saldo_portfolio?>"<?= old('id_total_portfolio') == $pri->id_saldo_portfolio ? 'selected' : null ?>><?= $pri->saldo_portfolio?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                       <?=isset($errors['id_total_portfolio']) ?  $errors['id_total_portfolio'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldoprivadoPortfolio.dataSaldo')?></label>
                                    <input type="date" name="data_saldo_tama" value="<?=old('data_saldo_tama') ?>" class="form-control <?=isset($errors['data_saldo_tama']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('saldoprivadoPortfolio.dataSaldo')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['data_saldo_tama']) ?  $errors['data_saldo_tama'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldotamaPortfolio.totalSaldo')?></label>
                                    <input type="number" name="total_saldo_tama" min="0" value="<?=old('total_saldo_tama') ?>" class="form-control <?=isset($errors['data_saldo_tama']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('saldotamaPortfolio.totalSaldo')?>">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['total_saldo_tama']) ?  $errors['total_saldo_tama'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('saldotamaPortfolio.showSaldoTamaUrlPortfolio').$row->id_saldo_privado)?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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