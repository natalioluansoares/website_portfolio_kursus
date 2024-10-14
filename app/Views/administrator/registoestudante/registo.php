<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio..registoMembroPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.registoMembroPortfolio')?></h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex" method="get">
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
                    <form method="get" >
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search..." id="top-search">
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text  btn-success" type="submit"><i class="uil-search-plus"></i></button>
                            <button type="reset" class="btn btn-dark ms-1">
                                <i class="uil-sync"></i>
                            </button>
                            <a href="<?=base_url(lang('registoestudante.hamosRegistoUrlConta')) ?>" class="btn btn-danger ms-2">
                                <i class="mdi mdi-broom"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php if (session()->getFlashdata('success')): ?>
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
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><?=lang('registoestudante.fullNamePortfolio') ?></th>
                                <th><?=lang('registoestudante.statusServisuPortfolio') ?></th>
                                <th><?=lang('registoestudante.sexoPortfolio') ?></th>
                                <th><?=lang('registoestudante.numeroTelefonePortfolio') ?></th>
                                <th><?=lang('registoestudante.numeroEleituralPortfolio') ?></th>
                                <th><?=lang('registoestudante.datePortfolio') ?></th>
                                <th><?=lang('registoestudante.sistemaPortfolio') ?></th>
                                <th><?=lang('registoestudante.imagePortfolio') ?></th>
                                <th><?=lang('registoestudante.deletePortfolio') ?></th>
                                <th><?=lang('registoestudante.updatePortfolio') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($estudante as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->naran_kompletos?></td>

                                <?php if ($portfolio->status_servisu == 'Aktivo') { ?>
                                <td><?=lang('registoestudante.aktivoServisuestudante')?></td>
                                <?php }else{ ?>
                                <td><?=lang('registoestudante.laAktivoServisuestudante')?></td>
                               <?php } ?>                               
                                <?php if ($portfolio->jenero == 'Mane') { ?>
                                <td><?=lang('registoestudante.maneestudante')?></td>
                                <?php }else{ ?>
                                <td><?=lang('registoestudante.fetoestudante')?></td>
                               <?php } ?>                               
                                <td><?=$portfolio->numero_telefone?></td>
                                <td><?=$portfolio->numero_eleitural?></td>
                                <td><?=$portfolio->data_estudante?></td>
                                <td><?=$portfolio->sistema?></td>
                                <td><a href="<?=base_url(lang('registoestudante.imageRegistoUrlConta').$portfolio->id_estudante) ?>"><img alt="image" src="<?= base_url('uploads/fotoestudante/'.$portfolio->image_estudante)?>" style="width: 100px;"></a></td>
                                <td>
                                    <a href="" class="btn btn-danger btn-animation" data-animation="jello" data-toggle="modal" data-target=".trokaestudante" id="estudante" 
                                data-id="<?= $portfolio->id_estudante; ?>">
                                <i class="uil-trash"></i>
                                </a>
                                </td>
                                <td><a href="<?=base_url(lang('registoestudante.trokaRegistoUrlConta').$portfolio->id_estudante) ?>" class="btn btn-success"><i class="uil-edit-alt"></i></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(6 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<div class="modal fade trokaestudante" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('registoestudante.deleteRegistoUrlConta')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idestudante" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_estudante" value="1" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="valido_estudante" value="0" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#estudante", function() {
    var Id = $(this).data('id');


    $(".trokaestudante #idestudante").val(Id);
})
</script>
<?= $this->endSection() ?>