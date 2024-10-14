<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('esperiensiaPortfolio.detailEsperiensialPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('esperiensiaPortfolio.detailEsperiensialPortfolio')?></h4>
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
     <div class="col-12">
         <div class="row row-cols-1 row-cols-md-12 g-3">
            <div class="col">
                <div class="card">
                    <img src="<?= base_url('uploads/fotoesperiensia/'.$esperiensia->image_esperiensia)?>" class="card-img-top" alt="Card image cap" style="width: 100%; height:200px ;">
                    <div class="card-body">
                        <p class="card-text">
                            <small class="text-muted"><?=$esperiensia->loron_esperiensia ?> mins ago (<?=$esperiensia->fatin_esperiensia ?>)</small>
                        </p>
                        <h5 class="card-title"><?=$esperiensia->naran_kompleto ?></h5>
                        <p class="card-text"><?= $esperiensia->esperiensia ?></p>
                    <a href="<?=base_url(lang('esperiensiaPortfolio.esperiensiaUrlPortfolio')) ?>" class="btn btn-success"><i class="mdi mdi-skip-previous"></i></a>
                </div>
            </div> <!-- end col-->
        </div> <!-- end col-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>