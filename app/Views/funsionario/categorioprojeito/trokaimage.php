<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.trokaCategoriaPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('funsionario') ?>
<div class="mb-3"></div>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.trokaCategoriaPortfolio')?></strong></h4>
            </div>
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="basic-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="<?=base_url(lang('categorioProjeitoFunsionario.processoImageCategorioBackendFrontendUrlPortfolio').$categorio->id_categorio_backend_frontend) ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row g-2">
                                    <div class="mb-3 col-md-12">
                                        <label for="inputEmail4" class="form-label"><?=lang('registoFunsionario.imageFunsionarioPortfolio')?></label>
                                        <input type="file" name="image_categorio_projeito" class="form-control mb-2" id="inputEmail4" placeholder="<?=lang('registoFunsionario.fatinEsperiensia')?>">
                                        <small class="text-danger">
                                            <?=isset($errors['image_categorio_projeito']) ?  $errors['image_categorio_projeito'] : null ?>
                                        </small>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                                <a href="<?= base_url(lang('categorioProjeitoFunsionario.categorioBackendFrontendUrlPortfolio'))?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                            </form>   
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="form-row-preview">
                                                <div class="row g-2">
                                                    <div class="mb-3 col-md-12">
                                                        <label for="inputEmail4" class="form-label"><?=lang('registoFunsionario.imageSistemaFunsionarioPortfolio')?></label>
                                                        <img alt="image" src="<?= base_url('uploads/fotocategorioprojeito/'.$categorio->image_categorio_projeito)?>" style="height:150px ; width: 100%;">
                                                    </div>
                                                </div>
                                        </div> <!-- end preview-->
                                    </div> <!-- end preview-->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>