<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('esperiensiaPortfolio.temporarioEsperiensia')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('esperiensiaPortfolio.temporarioEsperiensia')?></h4>
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
                            <a href="<?= base_url(lang('esperiensiaPortfolio.esperiensiaUrlPortfolio'))?>" class="btn btn-dark ms-1">
                                <i class="mdi mdi-skip-previous"></i>
                            </a>
                            <a href="" class="btn btn-danger ms-1 btn-animation" data-animation="wobble" data-toggle="modal" data-target=".hamoshotuesperiensia">
                            <i class="mdi mdi-broom"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
     <div class="col-12">
         <div class="row row-cols-1 row-cols-md-3 g-3">
            <?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $no = 1 +(6 * ($page - 1));
            foreach($esperiensia as $portfolio): ?>
            <div class="col">
                <div class="card">
                    <img src="<?= base_url('uploads/fotoesperiensia/'.$portfolio->image_esperiensia)?>" class="card-img-top" alt="Card image cap" style="width: 100%; height:200px ;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$portfolio->naran_kompleto ?></h5>
                        <p class="card-text"><?= substr($portfolio->esperiensia, 0, 300) ?></p>
                        <p class="card-text">
                            <small class="text-muted"><?=$portfolio->loron_esperiensia ?> mins ago (<?=$portfolio->fatin_esperiensia ?>)</small>
                        </p>
                        <center>
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="" class="btn btn-danger btn-animation" data-animation="slideInUp" data-toggle="modal" data-target=".permanenteesperiensia" id="esperiensia" 
                                            data-id="<?= $portfolio->id_esperiensia; ?>">
                                            <i class="uil-trash"></i>
                                            </a>
                                        </th>
                                        <th>
                                            <a href="" class="btn btn-warning btn-animation" data-animation="slideInDown" data-toggle="modal" data-target=".hamosesperiensia" id="esperiensiatemporario" 
                                            data-id="<?= $portfolio->id_esperiensia; ?>">
                                            <i class="mdi mdi-broom"></i>
                                            </a>
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
</div>

<!-- Hamos Permanente -->
<div class="modal fade permanenteesperiensia" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('esperiensiaPortfolio.permanenteEsperiensiaUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="id" id="idesperiensia" placeholder="Kategori"class="form-control">
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

<!-- Hamos Temporario -->
<div class="modal fade hamosesperiensia" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('esperiensiaPortfolio.temporarioEsperiensiaUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.temporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idhamos" placeholder="Kategori"class="form-control">
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

<!-- Hamos Hotu Temporario -->
<div class="modal fade hamoshotuesperiensia" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('esperiensiaPortfolio.hamoshotutemporarioEsperiensiaUrlPortfolio')) ?>" method="get">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.hamostemporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
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
    $(document).on("click", "#esperiensia", function() {
    var Id = $(this).data('id');

    $(".permanenteesperiensia #idesperiensia").val(Id);
})
</script>
<script>
    $(document).on("click", "#esperiensiatemporario", function() {
    var Id = $(this).data('id');

    $(".hamosesperiensia #idhamos").val(Id);
})
</script>
<?= $this->endSection() ?>