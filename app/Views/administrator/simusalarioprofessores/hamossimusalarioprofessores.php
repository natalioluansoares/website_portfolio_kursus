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
                        <button class="btn btn-primary ms-1" name="filter-data">
                            <i class="uil-eye"></i>
                        </button>
                        <a href="<?=base_url(lang('salarioProfessores.simuSalarioFunsionarioProfessoresUrlPortfolio').$salario->id_salario_professores)?>" class="btn btn-dark ms-1" style="color:aliceblue">
                                <i class="mdi mdi-skip-previous"></i>
                            </a>
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
                            <div class="dropdown">
                                <button class="btn btn-danger dropdown-toggle ms-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="#" class="dropdown-item ms-1 btn-animation" data-animation="slideInDown" data-toggle="modal" data-target=".deleteHotuProfessores" ><?=lang('salarioFunsionario.deleteHotuFunsionario') ?></a>
                                    <a href="#" class="dropdown-item ms-1 btn-animation" data-animation="slideInUp" data-toggle="modal" data-target=".restoreHotuProfessores" ><?=lang('salarioFunsionario.restoreHotuFunsionario') ?></a>
                                    
                                </div>
                            </div>
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
                                <th><?=lang('imprestaSalarioFunsionario.eleituralFunsionario') ?></th>
                                <th style="width: 20%;"><?=lang('imprestaSalarioFunsionario.naranFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioFunsionario.profesaunFunsionario') ?></th>
                                <th class="text-center"><?=lang('salarioFunsionario.totalFunsionario') ?></th>
                                <th class="text-center"><?=lang('salarioFunsionario.imprestaFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioFunsionario.dataFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioFunsionario.horasFunsionario') ?></th>
                                <th><?=lang('salarioFunsionario.hamosFunsionario') ?></th>
                                <th><?=lang('salarioFunsionario.deleteFunsionario') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $saldo = 0;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            foreach($simusalarioprofessores as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->numero_eleitural	?></td>
                                <td><?=$portfolio->naran_kompleto?>. <sub class="text-danger"><?=$portfolio->titulo_professores?></sub></td>
                                <?php if ($portfolio->sistema == 'Professores') {?>
                                    <td align="center"><span class="text-info"><strong><?=lang('salarioProfessores.professoresFunsionario') ?></strong></span></td>
                                <?php } ?>
                                <?php if ($portfolio->total_simu_salario == 0) { ?>
                                    <td align="center"><strong><span style="color: red;" class="text-center"><small><?=lang('salarioFunsionario.salarioMamuk') ?></small></span></strong></td>
                                <?php }else {?>
                                    <td align="center"><strong><span class="text-success">$ <?=number_format($portfolio->total_simu_salario,2)?></span></strong></td>
                               <?php } ?>
                                <?php if ($portfolio->total_simu_salario_impresta == 0) { ?>
                                    <td align="center"><strong><span style="color: red;" class="text-center"><small><?=lang('salarioFunsionario.imprestaMamuk') ?></small></span></strong></td>
                                <?php }else { ?>
                                    <td align="center"><strong><span class="text-success">$ <?=number_format($portfolio->total_simu_salario_impresta,2)?></span></strong></td>
                              <?php } ?>
                                <td align="center"><?=$portfolio->data_salario_simu_professores?></td>
                                <td align="center"><span class="text-info"><strong><?=$portfolio->horas_salario_simu_professores?></strong></span></td>
                                <td align="center">
                                <a href="" class="btn btn-danger btn-animation" data-animation="slideInRight" data-toggle="modal" data-target=".hamossalalarioSimuProfessores" id="simusalariohamos" data-id="<?= $portfolio->id_salario_simu_professores; ?>">
                                <i class="uil-trash"></i></a>
                                </td>
                                <td><a href="" class="btn btn-warning btn-animation" data-animation="slideInLeft" data-toggle="modal" data-target=".restoresalalarioSimuProfessores" id="simusalariorestore" 
                                data-id="<?= $portfolio->id_salario_simu_professores; ?>">
                                <i class="mdi mdi-broom"></i></a></td>
                            </tr>
                            <?php
                            $saldo += $portfolio->total_simu_salario;
                            endforeach; ?>
                        </tbody>
                        <tbody>
                            <?php 
                            $saldo = 0;
                            foreach($result as $portfolio): ?>
                            <?php
                            $saldo += $portfolio->total_simu_salario;
                            endforeach; ?>
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
<div class="modal fade restoreHotuProfessores" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('salarioProfessores.restoreHotuSimuSalarioFunsionarioProfessoresUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi  mdi-map-marker-question-outline"></i></font>
                    </center>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <?php foreach($result as $portfolio): ?>
                        <input type="hidden" name="id[]" id="" value="<?= $portfolio->id_salario_simu_professores ?>" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_salario_simu_professores[]" value="0" placeholder="Kategori"class="form-control">
                        <?php endforeach;?>
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

<div class="modal fade deleteHotuProfessores" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('salarioProfessores.deleteHotuSimuSalarioFunsionarioProfessoresUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi  mdi-map-marker-question-outline"></i></font>
                    </center>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE">
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

<div class="modal fade hamossalalarioSimuProfessores" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('salarioProfessores.deleteSimuSalarioFunsionarioProfessoresUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi  mdi-map-marker-question-outline"></i></font>
                    </center>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" id="idsimusalariohamos" placeholder="Kategori"class="form-control">
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

<div class="modal fade restoresalalarioSimuProfessores" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('salarioProfessores.restoreSimuSalarioFunsionarioProfessoresUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi  mdi-map-marker-question-outline"></i></font>
                    </center>
                    <center>
                        <h3><?=lang('hamosPortfolio.temporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idsimusalariorestore" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_salario_simu_professores" value="0" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#simusalariohamos", function() {
    var Id = $(this).data('id');


    $(".hamossalalarioSimuProfessores #idsimusalariohamos").val(Id);
})
</script>
<script>
    $(document).on("click", "#simusalariorestore", function() {
    var Id = $(this).data('id');


    $(".restoresalalarioSimuProfessores #idsimusalariorestore").val(Id);
})
</script>
<?= $this->endSection() ?>