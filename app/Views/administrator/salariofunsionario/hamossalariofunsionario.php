<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('salarioFunsionario.temporarioFunsionario')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('salarioFunsionario.temporarioFunsionario')?></h4>
            </div>
        </div>
    </div>
</div>
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
                            <a href="<?= base_url(lang('salarioFunsionario.salarioFunsionarioProfessoresUrlPortofolio'))?>" class="btn btn-dark ms-1">
                                <i class="mdi mdi-skip-previous"></i>
                            </a>
                            <a href="" class="btn btn-danger ms-1 btn-animation" data-animation="slideInUp" data-toggle="modal" data-target=".hamoshotusalario">
                            <i class="mdi mdi-broom"></i></a>
                            </a>
                        </div>
                    </form>
                </div>
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
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><?=lang('salarioFunsionario.eleituralFunsionario') ?></th>
                                <th><?=lang('salarioFunsionario.naranFunsionario') ?></th>
                                <th class="text-center"><?=lang('salarioFunsionario.profesaunFunsionario') ?></th>
                                <th><?=lang('salarioFunsionario.totalFunsionario') ?></th>
                                <th class="text-center"><?=lang('salarioFunsionario.dataFunsionario') ?></th>
                                <th><?=lang('salarioFunsionario.hamosFunsionario') ?></th>
                                <th><?=lang('salarioFunsionario.trokaFunsionario') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $saldo = 0;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($salariofunsionario as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->numero_eleitural	?></td>
                                <td><?=$portfolio->naran_kompleto?>. <sub class="text-danger"><?=$portfolio->titulo_funsionario?></sub></td>
                                <?php if ($portfolio->sistema == 'Direktor') {?>
                                    <td align="center"><span class="text-info"><?=lang('salarioFunsionario.direktorFunsionario') ?></span></td>
                                <?php }elseif ($portfolio->sistema == 'Administrasaun') { ?>
                                    <td align="center"><span style="color: crimson;"><?=lang('salarioFunsionario.admnistrasaunFunsionario') ?></span></td>
                                <?php } ?>
                                <?php if ($portfolio->total_salario == 0) { ?>
                                    <td align="center"><strong><span class="text-danger"><?=lang('salarioFunsionario.salarioMamuk') ?></span></strong></td>
                                <?php }else { ?>
                                    <td align="center"><strong><span class="text-success">$ <?=number_format($portfolio->total_salario,2)?></span></strong></td>
                              <?php } ?>
                                <td><?=$portfolio->data_administrator?></td>
                                <td align="center">
                                    <a href="" class="btn btn-danger btn-animation" data-animation="zoomInLeft" data-toggle="modal" data-target=".permanentesalario" id="salario" 
                                data-id="<?= $portfolio->id_salario_funsionario; ?>">
                                <i class="uil-trash"></i>
                                </a>
                                </td>
                                <td><a href="" class="btn btn-warning btn-animation" data-animation="zoomInRight" data-toggle="modal" data-target=".hamossalario" id="salariotemporario" 
                                data-id="<?= $portfolio->id_salario_funsionario; ?>">
                                <i class="mdi mdi-broom"></i>
                                </a></td>

                            </tr>
                            <?php
                            $saldo += $portfolio->total_salario;
                            endforeach; ?>
                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="4"><h5><strong><?=lang('imprestaSalarioFunsionario.totalFunsionario') ?></strong></h5></td>
                                <td align="center"><strong><span style="color: gold;">$ <?= number_format($saldo, 2);?></span></strong></td>
                            </tr>
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
<!-- Hamos Permanente -->
<div class="modal fade permanentesalario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('salarioFunsionario.permanenteSalarioFunsionarioProfessoresUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="id" id="idsalario" placeholder="Kategori"class="form-control">
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
<div class="modal fade hamossalario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('salarioFunsionario.temporarioSalarioFunsionarioProfessoresUrlPortfolio')) ?>" method="post">
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
<div class="modal fade hamoshotusalario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('salarioFunsionario.hamoshotuTemporarioSalarioFunsionarioProfessoresUrlPortfolio')) ?>" method="get">
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
    $(document).on("click", "#salario", function() {
    var Id = $(this).data('id');

    $(".permanentesalario #idsalario").val(Id);
})
</script>
<script>
    $(document).on("click", "#salariotemporario", function() {
    var Id = $(this).data('id');

    $(".hamossalario #idhamos").val(Id);
})
</script>
<?= $this->endSection() ?>