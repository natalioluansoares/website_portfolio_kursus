<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('projeitoBackendPortfolio.detailsProjeitoBackendFrontend')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('projeitoBackendPortfolio.detailsProjeitoBackendFrontend')?><sub class="text-danger">(<?=$portfolio->categorio_backend_frontend ?>)</sub></h4>
            </div>
        </div>
    </div>
</div>
 <div class="row">
     <div class="col-12">
         <div class="row row-cols-1 row-cols-md-12 g-3">
            <div class="col">
                <div class="card">
                    <img src="<?= base_url()?>templateadministrator/assets/images/backend/backend.jpg" class="card-img-top" alt="Card image cap" style="width: 100%; height:200px ;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$portfolio->titulo_backend_frontend ?></h5>
                        <p class="card-text"><?= $portfolio->descripsaun_backend_frontend ?></p>
                        <p class="card-text"><?= $portfolio->materia_backend_frontend ?></p>
                        <div class="table-responsive">
                        <?php if (!$portfolio->projeito_backend_frontend) { ?>
                            <p class="card-text"><?= $portfolio->source_projeito ?></p>
                        <?php }else { ?>
                                <p class="card-text"><?= $portfolio->source_projeito ?></p>
                         <?php } ?>
                        </div>
                        <h5 class="card-text">
                            <small class="text-muted mr-2"><a href="<?=$portfolio->youtube?>" target="_blank" class="text-danger mr-2">Youtube</a></small>
                            <small class="text-muted"><a href="<?=$portfolio->facebook ?>" target="_blank" class="text-primary mr-2">Facebook</a></small>
                            <small class="text-muted"><a href="<?=$portfolio->instagram ?>" target="_blank" style="color: hotpink;" class="mr-2">Instagram</a></small>
                            <small class="text-muted"><a href="<?=$portfolio->tiktok ?>" target="_blank" class="text-dark">TikTok</a></small>
                        </h5>
                        <sub class="text-danger"><?=$portfolio->categorio_backend_frontend ?></sub>
                        <p class="card-text">
                            <small class="text-muted"><?=$portfolio->data_categorio_backend_frontend ?> (<?=$portfolio->backend_frontend ?>)</small>
                        </p>
                        <a href="<?=base_url(lang('projeitoBackendPortfolio.showProjeitoBackendFrontendUrlPortfolio').$portfolio->projeito_backend_frontend)?>" class="btn btn-dark ms-1">
                                <i class="mdi mdi-skip-previous"></i>
                            </a>
                    </div>
                </div>
            </div> <!-- end col-->
        </div> <!-- end col-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>