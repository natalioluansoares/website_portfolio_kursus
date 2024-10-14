<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.materiaPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.materiaPortfolio')?> <?=$categorio->categorio ?></h4>
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
                            <input type="text" class="form-control" name="keyword" placeholder="Search..." id="top-search">
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text  btn-success" type="submit"><i class="uil-search-plus"></i></button>
                            <button type="reset" class="btn btn-dark ms-1">
                                <i class="uil-sync"></i>
                            </button>
                            <a href="<?=base_url(lang('materiaPortfolio.hamosMateriaUrlPortfolio').$categorio->id_categorio)?>" class="btn btn-danger ms-2">
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
     <div class="col-12">
        <div class="row row-cols-1 row-cols-md-12 g-3">
            <div class="col">
                <?php 
                $jumlah_data = count($materia);
                if ($jumlah_data > 0 )
                { ?>
                <div class="card">
                <?php 
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $no = 1 +(20 * ($page - 1));
                foreach($materia as $portfolio): ?>
                    <div class="card-body">
                        <h5 class="card-title"><?=$portfolio->titulo_materia ?></h5>
                        <p class="card-text"><?= $portfolio->materia ?></p>
                        <p class="card-text">
                            <small class="text-muted"><?=$portfolio->data_materia ?>/(<?=$portfolio->naran_kompleto ?>(<?=$portfolio->sistema ?>)/<?=$portfolio->categorio ?>)</small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted mr-2"><a href="<?=$portfolio->youtube?>" target="_blank" class="text-danger mr-2">Youtube</a></small>
                            <small class="text-muted"><a href="<?=$portfolio->facebook ?>" target="_blank" class="text-primary mr-2">Facebook</a></small>
                            <small class="text-muted"><a href="<?=$portfolio->instagram ?>" target="_blank" style="color: hotpink;" class="mr-2">Instagram</a></small>
                            <small class="text-muted"><a href="<?=$portfolio->tiktok ?>" target="_blank" class="text-dark">TikTok</a></small>
                        </p>
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <td>
                                                <a href="" class="btn btn-danger btn-animation ms-1" data-animation="flipInX" data-toggle="modal" data-target=".trokamateria" id="materia" 
                                            data-id="<?= $portfolio->id_materia; ?>">
                                            <i class="uil-trash"></i>
                                            </a>
                                            </td>
                                        </th>
                                        <th>
                                            <a href="<?=base_url(lang('materiaPortfolio.trokaMateriaUrlPortfolio').$portfolio->id_materia) ?>" class="btn btn-success ms-1"><i class="uil-edit-alt"></i></a>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                    </div>
                <?php endforeach; ?>
                </div>
            </div> <!-- end col-->
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
                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
            </center>
        </div>
    <?php } ?>          
</div>
<div class="modal fade trokamateria" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('materiaPortfolio.deleteMateriaUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idmateria" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_materia" value="1" placeholder="Kategori"class="form-control">
                    </center>
                    <center>
                        <button type="submit" class="btn btn-primary"><?=lang('hamosPortfolio.hamosData') ?></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#materia", function() {
    var Id = $(this).data('id');


    $(".trokamateria #idmateria").val(Id);
})
</script>
<?= $this->endSection() ?>
