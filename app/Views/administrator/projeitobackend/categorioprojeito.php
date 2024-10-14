<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.backendPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.backendPortfolio')?></h4>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="start">
                                <span class="input-group-text bg-primary border-primary text-white mr-2">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="end">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary ms-2" name="filter-data">
                            <i class="uil-eye"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="app-search dropdown">
                    <form>
                        <div class="input-group">
                            <select name="keyword" id="" class="form-control">
                                <option value="">Pilih Categorio Project</option>
                                <?php foreach($categorio as $portfolio): ?>
                                    <option value="<?=$portfolio->categorio_backend_frontend ?>"><?=$portfolio->categorio_backend_frontend ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text  btn-success" type="submit"><i class="uil-search-plus"></i></button>
                            <button type="reset" class="btn btn-dark ms-1">
                                <i class="uil-sync"></i>
                            </button>
                            <a href="<?=base_url(lang('categoriobackendfrontendPortfolio.hamosCategorioBackendFrontendUrlPortfolio'))?>" class="btn btn-danger ms-1">
                                <i class="mdi mdi-bucket"></i>
                            </a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="row">
    <?php 
    $jumlah_data = count($categorio);
    if ($jumlah_data > 0 )
    { ?>
     <div class="col-12">
         <div class="row row-cols-1 row-cols-md-3 g-3">
            <?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $no = 1 +(6 * ($page - 1));
            foreach($categorio as $portfolio): ?>
            <div class="col">
                <div class="card">
                    <img src="<?= base_url('uploads/fotocategorioprojeito/').$portfolio->image_categorio_projeito ?>" class="card-img-top" alt="Card image cap" style="width: 100%; height:200px ;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$portfolio->categorio_backend_frontend ?></h5>
                        <p class="card-text"><a href="<?=base_url(lang('projeitoBackendPortfolio.showProjeitoBackendFrontendUrlPortfolio').$portfolio->id_categorio_backend_frontend) ?>" title="<?=lang('projeitoBackendPortfolio.detailProjeitoBackendFrontend')?>" class="text-dark"><?= substr($portfolio->descripsaun_categorio, 0, 300) ?></a></p>
                        <sub class="text-danger"><?=$portfolio->categorio_backend_frontend ?></sub>
                        <p class="card-text">
                            <small class="text-muted"><?=$portfolio->data_categorio_backend_frontend ?> (<?=$portfolio->backend_frontend ?>)</small>
                        </p>
                        
                        <center>
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="<?=base_url(lang('projeitoBackendPortfolio.aumentaProjeitoBackendFrontendUrlPortfolio').$portfolio->lian_categorio_backend_frontend.'/'.$portfolio->id_categorio_backend_frontend) ?>" class="btn btn-success"><i class="uil-plus"></i></a>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </center>
                    </div>
                </div>
            </div> <!-- end col-->
            <?php endforeach; ?>
        </div> <!-- end col-->
        <div class="left" style="float: left;">
        <span>Showing <?=  $no = 1 +(6 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
        </div>
        <div class="right" style="float: right;">
            <?= $pager->links('default','pagination') ?>
        </div>
    </div> <!-- end col-->
    <?php }else{ ?>
        <div class="table-responsive">
            <center>
                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData'); ?></span>
            </center>
        </div>
    <?php } ?>
</div>
<?= $this->endSection() ?>