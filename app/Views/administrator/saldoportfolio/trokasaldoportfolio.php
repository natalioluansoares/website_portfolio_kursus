<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.editAulaPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.editAulaPortfolio')?></h4>
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
                        <form action="<?=base_url(lang('saldoPortfolio.updateSaldoPortfolioUrlPortfolio').$saldo->id_saldo_portfolio) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-4">
                                    <label for="inputEmail4" class="form-label"><?=lang('saldoPortfolio.kodeSaldo')?></label>
                                    <input type="text" name="kode_saldo_portfolio" class="form-control <?=isset($errors['kode_saldo_portfolio']) ? 'is-invalid' : null ?>" value="<?=old('kode_saldo_portfolio',$saldo->kode_saldo_portfolio) ?>" placeholder="<?=lang('saldoPortfolio.kodesaldo_portfolio')?>">
                                    <div class="invalid-feedback">
                                        <?=isset($errors['kode_saldo_portfolio']) ?  $errors['kode_saldo_portfolio'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldoPortfolio.Saldo')?></label>
                                    <input type="text" name="saldo_portfolio" class="form-control <?=isset($errors['saldo_portfolio']) ? 'is-invalid' : null ?>" value="<?=old('saldo_portfolio', $saldo->saldo_portfolio) ?>" placeholder="<?=lang('saldoPortfolio.Saldo')?>">
                                    <div class="invalid-feedback">
                                        <?=isset($errors['saldo_portfolio']) ?  $errors['saldo_portfolio'] : null ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('saldoPortfolio.dataSaldo')?></label>
                                    <input type="date" name="data_saldo_portfolio" class="form-control <?=isset($errors['data_saldo_portfolio']) ? 'is-invalid' : null ?>" value="<?=old('data_saldo_portfolio', $saldo->data_saldo_portfolio )?>" placeholder="<?=lang('saldoPortfolio.dataSaldo')?>">
                                    <div class="invalid-feedback">
                                        <?=isset($errors['data_saldo_portfolio']) ?  $errors['data_saldo_portfolio'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('saldoPortfolio.saldoPortfolioUrlPortfolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>