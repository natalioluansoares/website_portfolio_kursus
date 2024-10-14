<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.subsidioPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('funsionario') ?>
<?php if (session()->sistema_administrator == 2) : ?>
<?php
    $naran = helperFunsionario()->naran_kompleto;
    $this->db = \Config\Database::connect();
    $builder = $this->db->table('direito_acesso_autromos');
    $builder->select('*');
    $builder->join('direito_acesso', 'direito_acesso_autromos.direito_accesso_id  = direito_acesso.id_direito_acesso', 'total_saldo', 'total_osan_tama','salario_funsionario','salario_professores', 'osan_impresta_funsionario', 'osan_impresta_professores', 'funsionario', 'professores', 'materia_professores', 'estudante', 'kategorio_materia', 'materia', 'kursus_projeito', 'classe', 'horario_kursus', 'horario_kursus_hotu',  'left');

    $builder->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 'menu_profile', 'sistemmenu_finansa','menu_funsionario','menu_profesores','menu_estudante','menu_kategoria_materia','menu_kursus_projeito','menu_classe_horario', 'menu_sertifikado','left');

    $builder->join('administrator', 'menu_acesso.menu_administrator  = administrator.id_administrator', 'naran_kompleto', 'naran_ikus','naran_primeiro','email', 'status_servisu', 'left');

    $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');
    $builder->where('id_administrator', session('id_administrator'));
    $builder->where('naran_kompleto=', $naran);
    $query = $builder->get()->getResult(); 
?>
<?php foreach($query as $acesso): ?>
<?php if ($acesso->osan_subsidio == 1 && $acesso->menu_finansa ==1) {?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="start" name="start" placeholder="<?= date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="end" name="end" placeholder="<?= date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
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
                            <button class="input-group-text mr-2" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                            <?php if ($acesso->aumenta_direito_acesso_autromos == 1 && $acesso->salario_funsionario ==1 && $acesso->menu_finansa == 1): ?>
                                <a href="<?= base_url(lang('subsidioPortfolio.newSubsidioUrlFunsionario').$osansai->id_osan_sai) ?>" class="btn mr-1" style="background-color: darkslateblue; color:aliceblue"><i class="fa fa-plus"></i></a>

                                <div class="basic-dropdown">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        </button>
                                        <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item ms-1 btn-animation" data-animation="slideInDown" data-toggle="modal" data-target=".exportPdf" ><?=lang('subsidioPortfolio.exportPdf') ?></a>

                                        <a href="#" class="dropdown-item ms-1 btn-animation" data-animation="slideInDown" data-toggle="modal" data-target=".exportExcel" ><?=lang('subsidioPortfolio.exportExcel') ?></a>

                                        <a href="#" class="dropdown-item ms-1 btn-animation" data-animation="slideInDown" data-toggle="modal" data-target=".exportFilterPdf" ><?=lang('subsidioPortfolio.exportFilterPdf') ?></a>

                                        <a href="#" class="dropdown-item ms-1 btn-animation" data-animation="slideInDown" data-toggle="modal" data-target=".exportFilterExcel" ><?=lang('subsidioPortfolio.exportFilterExcel') ?></a>

                                        <a href="<?=base_url(lang('subsidioPortfolio.newSubsidioUrlFunsionario').$osansai->id_osan_sai) ?>" class="dropdown-item ms-1"><?=lang('sidebarPortfolio.aumentaSubsidioPortfolio')?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
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
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.subsidioPortfolio')?></strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><?=lang('subsidioPortfolio.naranSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.Subsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.totalSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.timeSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.dataHahuSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.dataRemataSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.dataSubsidio') ?></th>

                                <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->osan_subsidio ==1 && $acesso->menu_finansa == 1): ?>
                                    <th><?=lang('subsidioPortfolio.deleteSubsidio') ?></th>
                                <?php endif; ?>
                                <?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->osan_subsidio ==1 && $acesso->menu_finansa == 1): ?>
                                    <th><?=lang('subsidioPortfolio.updateSubsidio') ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $saldo = 0; 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($subsidio as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->naran_kompleto?></td>
                                <td><?=$portfolio->naran_osan_sai?></td>
                                <td>$<?= number_format($portfolio->total_subsidio,2)?></td>
                                <td><?=$portfolio->horas_foti_subsidio?></td>
                                <td><?=$portfolio->data_hahu_aktividade?></td>
                                <td><?=$portfolio->data_remata_aktividade?></td>
                                <input type="hidden" value="<?= $day = strtotime($portfolio->data_remata_aktividade) - strtotime($portfolio->data_hahu_aktividade);
                                $hari = $day / 60 / 60 / 24;
                                ?>">
                                <td><b><?= $hari ?></b> <strong class="mr-1"><?=lang('subsidioPortfolio.dataSubsidio') ?></strong></td>
                                <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->osan_subsidio ==1 && $acesso->menu_finansa == 1): ?>
                                <td>
                                    <a href="" class="btn btn-danger btn-animation" data-animation="jello" data-toggle="modal" data-target=".trokasubsidio" id="subsidio" 
                                data-id="<?= $portfolio->id_subsidio; ?>">
                                <i class="fa fa-trash"></i>
                                </a>
                                </td>
                                <?php endif; ?>
                                <?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->osan_subsidio ==1 && $acesso->menu_finansa == 1): ?>
                                <td><a href="<?=base_url(lang('subsidioPortfolio.editSubsidioUrlFunsionario').$portfolio->id_subsidio) ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-5">
            <div class="form-input-content text-center error-page">
                <h1 class="error-text font-weight-bold">404</h1>
                <h4><i class="fa fa-exclamation-triangle text-warning"></i> <?= lang('hamosPortfolio.linkSala')?></h4>
                <p><?= lang('hamosPortfolio.linkSalaKarik')?></p>
                <?php if (session()->sistema_administrator == 2) { ?>
                    <h5><strong><?=helperFunsionario()->naran_kompleto ?></strong></h5>
                    <?php if (helperFunsionario()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.admnistrasaunFunsionario')?></strong></h6>
                   <?php } ?>
                <?php }elseif (session()->sistema_administrator == 3) { ?>
                    <h5><strong><?=helperProfessores()->naran_kompleto ?></strong></h5>
                    <?php if (helperProfessores()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.professoresProfessores')?></strong></h6>
                   <?php } ?>
               <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php endforeach;?>
<?php endif; ?>

<?php if (session()->sistema_administrator == 3) : ?>
<?php
    $naran = helperProfessores()->naran_kompleto;
    $this->db = \Config\Database::connect();
    $builder = $this->db->table('direito_acesso_autromos');
    $builder->select('*');
    $builder->join('direito_acesso', 'direito_acesso_autromos.direito_accesso_id  = direito_acesso.id_direito_acesso', 'total_saldo', 'total_osan_tama','salario_funsionario','salario_professores', 'osan_impresta_funsionario', 'osan_impresta_professores', 'funsionario', 'professores', 'materia_professores', 'estudante', 'kategorio_materia', 'materia', 'kursus_projeito', 'classe', 'horario_kursus', 'horario_kursus_hotu',  'left');

    $builder->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 'menu_profile', 'sistemmenu_finansa','menu_funsionario','menu_profesores','menu_estudante','menu_kategoria_materia','menu_kursus_projeito','menu_classe_horario', 'menu_sertifikado','left');

    $builder->join('administrator', 'menu_acesso.menu_administrator  = administrator.id_administrator', 'naran_kompleto', 'naran_ikus','naran_primeiro','email', 'status_servisu', 'left');

    $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');
    $builder->where('id_administrator', session('id_administrator'));
    $builder->where('naran_kompleto=', $naran);
    $query = $builder->get()->getResult(); 
?>
<?php foreach($query as $acesso): ?>
<?php if ($acesso->osan_subsidio == 1 && $acesso->menu_finansa ==1) {?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="start" name="start" placeholder="<?= date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="end" name="end" placeholder="<?= date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
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
                            <button class="input-group-text mr-2" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
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
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.subsidioPortfolio')?></strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>No</th>
                                <th><?=lang('subsidioPortfolio.naranSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.Subsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.totalSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.timeSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.dataHahuSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.dataRemataSubsidio') ?></th>
                                <th><?=lang('subsidioPortfolio.dataSubsidio') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $saldo = 0; 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($subsidio as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->naran_kompleto?></td>
                                <td><?=$portfolio->naran_osan_sai?></td>
                                <td>$<?= number_format($portfolio->total_subsidio,2)?></td>
                                <td><?=$portfolio->horas_foti_subsidio?></td>
                                <td><?=$portfolio->data_hahu_aktividade?></td>
                                <td><?=$portfolio->data_remata_aktividade?></td>
                                <input type="hidden" value="<?= $day = strtotime($portfolio->data_remata_aktividade) - strtotime($portfolio->data_hahu_aktividade);
                                $hari = $day / 60 / 60 / 24;
                                ?>">
                                <td><b><?= $hari ?></b> <strong class="mr-1"><?=lang('subsidioPortfolio.dataSubsidio') ?></strong></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-5">
            <div class="form-input-content text-center error-page">
                <h1 class="error-text font-weight-bold">404</h1>
                <h4><i class="fa fa-exclamation-triangle text-warning"></i> <?= lang('hamosPortfolio.linkSala')?></h4>
                <p><?= lang('hamosPortfolio.linkSalaKarik')?></p>
                <?php if (session()->sistema_administrator == 2) { ?>
                    <h5><strong><?=helperFunsionario()->naran_kompleto ?></strong></h5>
                    <?php if (helperFunsionario()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.admnistrasaunFunsionario')?></strong></h6>
                   <?php } ?>
                <?php }elseif (session()->sistema_administrator == 3) { ?>
                    <h5><strong><?=helperProfessores()->naran_kompleto ?></strong></h5>
                    <?php if (helperProfessores()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.professoresProfessores')?></strong></h6>
                   <?php } ?>
               <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php endforeach;?>
<?php endif; ?>

<div class="modal fade trokasubsidio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center><br>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('subsidioPortfolio.trokaSubsidioUrlFunsionario')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                    <font size="15" style="color: red;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></font><br><br>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idsubsidio" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_subsidio" value="0" placeholder="Kategori"class="form-control">
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

<div class="modal fade exportPdf" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <h4 style="color: darkgray;">Download All File Pdf</h4>
                </center>
                <center>
                    <a href="<?=base_url(lang('subsidioPortfolio.exportPdfSubsidioUrlFunsionario').$osansai->id_osan_sai) ?>" class="btn btn-danger mb-2" target="_blank"><font size="20"><i  class="fa fa-file"></i></font></a>
            </center>
            <br>
            <center>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button
            </center>
            </div>
        </div>
        <br><br>
        </div>
    </div>
</div>

<div class="modal fade exportExcel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <h4 style="color: darkgray;">Download All File Excel</h4>
                </center>
                <center>
                    <a href="<?=base_url(lang('subsidioPortfolio.exportExcelSubsidioUrlFunsionario').$osansai->id_osan_sai) ?>" class="btn btn-success mb-2"><font size="20"><i class="fa fa-file"></i></font></a>
                </center>
                <br>
                <center>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                </center>
            </div>
        </div>
    </div>
</div>

<div class="modal fade exportFilterPdf" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?=base_url(lang('subsidioPortfolio.exportPdfSubsidioUrlFunsionario').$osansai->id_osan_sai) ?>"  method="get" target="_blank">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <h4 style="color: darkgray;">Filter Download File Pdf</h4>
                    </center>
                    <div class="row gy-2 gx-2 align-items-center">
                        <div class="col-lg-5">
                            <input type="date" name="start" class="form-control mb-2" id="inlineFormInput">
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group mb-2">
                                <input type="date" name="end" class="form-control" id="inlineFormInputGroup">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" name="filter-data"  class="btn btn-primary mb-2"><i class="mdi mdi-download"></i></button>
                        </div>
                    </div>
                    <small>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                    </small>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade exportFilterExcel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?=base_url(lang('subsidioPortfolio.exportExcelSubsidioUrlFunsionario').$osansai->id_osan_sai) ?>"  method="get">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <h4 style="color: darkgray;">Filter Download File Excel</h4>
                    </center>
                    <div class="row gy-2 gx-2 align-items-center">
                        <div class="col-lg-5">
                            <input type="date" name="start" class="form-control mb-2" id="inlineFormInput">
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group mb-2">
                                <input type="date" name="end" class="form-control" id="inlineFormInputGroup">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" name="filter-data" class="btn btn-success mb-2"><i class="mdi mdi-download"></i></button>
                        </div>
                    </div>
                    <small>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                    </small>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#subsidio", function() {
    var Id = $(this).data('id');


    $(".trokasubsidio #idsubsidio").val(Id);
})
</script>
<?= $this->endSection() ?>