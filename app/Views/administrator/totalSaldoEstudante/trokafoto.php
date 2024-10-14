<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.trokaSaldoPrivadoPicture')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.trokaSaldoPrivadoPicture')?></h4>
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
                        <form action="<?=base_url(lang('totalSaldoEstudante.trokaFotoRaiTotalSaldoEstudanteUrlPortfolio').$privado->id_total_saldo_estudante) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-12">
                                    <label for="inputEmail4" class="form-label"><?=lang('saldoprivadoPortfolio.fotoSaldo')?></label>
                                    <input type="file" name="foto_total_saldo_estudante" class="form-control mb-2 <?=isset($errors['foto_total_saldo_estudante']) ? 'is-invalid' : null ?>" id="inputEmail4">
                                    <img alt="image" src="<?= base_url('uploads/fotosaldoprivado/'.$privado->foto_total_saldo_estudante)?>" style="width: 130px;">
                                    <div class="invalid-feedback">
                                       <?=isset($errors['foto_total_saldo_estudante']) ?  $errors['foto_total_saldo_estudante'] : null ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="uil-edit-alt"></i></button>
                            <a href="<?= base_url(lang('totalSaldoEstudante.totalSaldoEstudanteUrlPortfolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
                                    <label for="inputEmail4" class="form-label"><?=lang('saldoprivadoPortfolio.organizasaunFoto')?></label>
                                    <img alt="image" src="<?= base_url('uploads/fotosaldoprivado/'.$privado->foto_total_saldo_estudante)?>" style="height:150px ; width: 100%;">
                                </div>
                            </div>
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>