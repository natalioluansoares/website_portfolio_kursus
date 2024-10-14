<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.imprestasalarioProfessoresPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.imprestasalarioProfessoresPortfolio')?></h4>
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
                            <a href="<?=base_url(lang('imprestaSalarioProfessores.imprestaSalarioProfessoresPortfolioUrlPortofolio'))?>" class="btn btn-dark ms-2" style="color:aliceblue">
                                <i class="mdi mdi-skip-previous"></i>
                            </a>
                            <a href="<?=base_url(lang('imprestaSalarioProfessores.aumentaImprestaSalarioProfessoresPortfolioUrlPortfolio').$salario->id_salario_professores)?>" class="btn btn-info ms-2" style="color:aliceblue">
                                <i class="mdi mdi-plus"></i>
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
                                <th><?=lang('imprestaSalarioProfessores.eleituralFunsionario') ?></th>
                                <th style="width: 20%;"><?=lang('imprestaSalarioProfessores.naranFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioProfessores.profesaunFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioProfessores.totalFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioProfessores.dataFunsionario') ?></th>
                                <th class="text-center"><?=lang('imprestaSalarioProfessores.horasFunsionario') ?></th>
                                <th><?=lang('imprestaSalarioProfessores.hamosFunsionario') ?></th>
                                <th><?=lang('imprestaSalarioProfessores.trokaFunsionario') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $saldo = 0;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($imprestasalarioprofessores as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->numero_eleitural	?></td>
                                <td><?=$portfolio->naran_kompleto?>. <sub class="text-danger"><?=$portfolio->titulo_professores?></sub></td>
                                <?php if ($portfolio->sistema == 'Professores') {?>
                                    <td align="center"><span style="color:darkred;"><strong><?=lang('imprestaSalarioProfessores.professoresFunsionario') ?></strong></span></td>
                                <?php } ?>
                                <?php if ($portfolio->total_salario == 0) { ?>
                                    <td align="center"><strong><span style="color: red;" class="text-center"><?=lang('imprestaSalarioProfessores.salarioMamuk') ?></span></strong></td>
                                <?php }else { ?>
                                    <td align="center"><strong><span class="text-success">$ <?=number_format($portfolio->total_osan_impresta,2)?></span></strong></td>
                              <?php } ?>
                                <td align="center"><?=$portfolio->data_osan_impresta?></td>
                                <td align="center"><span class="text-info"><strong><?=$portfolio->horas_osan_impresta?></strong></span></td>
                                <td align="center">
                                <a href="" class="btn btn-danger btn-animation" data-animation="flipInX" data-toggle="modal" data-target=".trokaimpresta" id="impresta" 
                                data-id="<?= $portfolio->id_osan_impresta_professores; ?>" data-total="<?= $portfolio->total_osan_impresta; ?>" data-naran="<?= $portfolio->osan_impresta_professores ; ?>">
                                <i class="uil-trash"></i>
                                </a>
                                </td>
                                <td align="center"><a href="<?=base_url(lang('imprestaSalarioProfessores.trokaImprestaSalarioProfessoresPortfolioUrlPortfolio').$portfolio->id_osan_impresta_professores.'/'.$portfolio->osan_impresta_professores) ?>" class="btn btn-success"><i class="uil-edit-alt"></i></a>
                                </td>
                            </tr>
                            <?php
                            $saldo += $portfolio->total_osan_impresta;
                            endforeach; ?>
                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="4"><h5><strong><?=lang('imprestaSalarioProfessores.totalsFunsionario') ?></strong></h5></td>
                                <?php if ($saldo == 0) { ?>
                                    <td align="center"><strong><span style="color: red;"><?= lang('imprestaSalarioProfessores.osanMamuk')?></span></strong></td>
                               <?php }else{ ?>
                                <td align="center"><strong><span style="color: gold;">$ <?= number_format($saldo, 2);?></span></strong></td>
                               <?php } ?>
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
<div class="modal fade trokaimpresta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br><br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('imprestaSalarioProfessores.deleteImprestaSalarioProfessoresPortfolioUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></font>
                    </center>
                    <br>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idimpresta" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_osan_impresta_professores" value="1" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="osan_impresta_professores" id="naran" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="total_osan_impresta" id="total" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#impresta", function() {
    var Id = $(this).data('id');
    var Total = $(this).data('total');
    var Naran = $(this).data('naran');


    $(".trokaimpresta #idimpresta").val(Id);
    $(".trokaimpresta #naran").val(Naran);
    $(".trokaimpresta #total").val(Total);
})
</script>
<?= $this->endSection() ?>