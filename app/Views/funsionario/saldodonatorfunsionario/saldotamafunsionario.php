<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('saldotamaPortfolio.totalSaldo')?></title>
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
<?php if ($acesso->total_osan_tama == 1 && $acesso->menu_finansa) {?>

<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="start">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="end">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <a href="<?= base_url(lang('saldodonatorFunsionario.saldoDonatorFunsionarioUrlPortofolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
                            <button class="input-group-text mr-1" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                           <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->total_osan_tama ==1 && $acesso->menu_finansa == 1){ ?>
                            <a href="<?=base_url(lang('saldodonatorFunsionario.aumentaDonatorFunsionarioTamaUrlPortfolio').$privado->id_saldo_privado)?>" class="btn text-white mr-1" style="background-color: slateblue;">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <?php } ?>
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
                <h4 class="card-title"><strong><?=lang('saldotamaPortfolio.totalSaldo')?></strong></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                            <tr>
                            <th>No</th>
                            <th><?=lang('saldotamaPortfolio.kodeSaldo') ?></th>
                            <th><?=lang('saldotamaPortfolio.organizasaunSaldo') ?></th>
                            <th class="text-center"><?=lang('saldotamaPortfolio.totalSaldo') ?></th>
                            <th><?=lang('saldotamaPortfolio.dataSaldo') ?></th>
                            <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->total_osan_tama ==1 && $acesso->menu_finansa == 1){ ?>
                            <th class="text-center"><?=lang('saldotamaPortfolio.hamosSaldo') ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                        $saldo = 0;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 +(6 * ($page - 1));
                        $no=1; foreach($saldotama as $portfolio): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$portfolio->kode_saldo_privado?></td>
                            <td><?=$portfolio->naran_organizasaun_privado?></td>
                            <td align="center"><strong><span class="badge badge-success" style="darkorchid; color:aliceblue">$ <?=number_format($portfolio->total_saldo_tama, 2)?></span></strong></td>
                            <td><?=$portfolio->data_saldo_tama?></td>
                            <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->total_osan_tama ==1 && $acesso->menu_finansa == 1){ ?>
                                <td align="center">
                                    <a href="" class="btn btn-danger btn-animation" data-animation="rollIn" data-toggle="modal" data-target=".trokatama" id="tama" 
                                    data-id="<?= $portfolio->id_saldo_tama; ?>" data-total="<?= $portfolio->total_saldo_tama; ?>" data-privado="<?= $portfolio->id_total_privado; ?>" data-portfolio="<?= $portfolio->id_total_portfolio; ?>">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            <?php } ?>
                        <?php
                        $saldo += $portfolio->total_saldo_tama;
                         endforeach; ?>
                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="3"><h5><strong><?=lang('saldotamaPortfolio.totalSaldo') ?></strong></h5></td>
                            <td align="center"><strong><span class="badge" style="background-color: gold; color:black">$ <?= number_format($saldo, 2);?></span></strong></td>
                        </tr>
                    </tbody>
                </table>
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
                    <h2><?=helperProfessores()->naran_kompleto ?></h2>
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
<?php if ($acesso->total_osan_tama == 1 && $acesso->menu_finansa) {?>

<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="start">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="date" class="form-control form-control-light" name="end">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        
                        <a href="<?= base_url(lang('saldodonatorFunsionario.saldoDonatorFunsionarioUrlPortofolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
                            <button class="input-group-text mr-1" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
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
                <h4 class="card-title"><strong><?=lang('saldotamaPortfolio.totalSaldo')?></strong></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                            <tr>
                            <th>No</th>
                            <th><?=lang('saldotamaPortfolio.kodeSaldo') ?></th>
                            <th><?=lang('saldotamaPortfolio.organizasaunSaldo') ?></th>
                            <th class="text-center"><?=lang('saldotamaPortfolio.totalSaldo') ?></th>
                            <th><?=lang('saldotamaPortfolio.dataSaldo') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                        $saldo = 0;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 +(6 * ($page - 1));
                        $no=1; foreach($saldotama as $portfolio): ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$portfolio->kode_saldo_privado?></td>
                            <td><?=$portfolio->naran_organizasaun_privado?></td>
                            <td align="center"><strong><span class="badge badge-success" style="darkorchid; color:aliceblue">$ <?=number_format($portfolio->total_saldo_tama, 2)?></span></strong></td>
                            <td><?=$portfolio->data_saldo_tama?></td>
                        <?php
                        $saldo += $portfolio->total_saldo_tama;
                         endforeach; ?>
                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="3"><h5><strong><?=lang('saldotamaPortfolio.totalSaldo') ?></strong></h5></td>
                            <td align="center"><strong><span class="badge" style="background-color: gold; color:black">$ <?= number_format($saldo, 2);?></span></strong></td>
                        </tr>
                    </tbody>
                </table>
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
                    <h2><?=helperProfessores()->naran_kompleto ?></h2>
               <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php endforeach;?>
<?php endif; ?>

<div class="modal fade trokatama" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br><br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('saldodonatorFunsionario.deleteDonatorFunsionarioTamaUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></font>
                    </center><br>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idtama" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="total_saldo_tama" id="tamasaldo" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_portfolio" id="idportfolio" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_privado" id="idprivado" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_saldo_tama" value="1" placeholder="Kategori"class="form-control">
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
<script src="<?= base_url()?>templatefunsionario/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#tama", function() {
    var Id = $(this).data('id');
    var Total = $(this).data('total');
    var Portfolio = $(this).data('portfolio');
    var Privado = $(this).data('privado');


    $(".trokatama #idtama").val(Id);
    $(".trokatama #tamasaldo").val(Total);
    $(".trokatama #idportfolio").val(Portfolio);
    $(".trokatama #idprivado").val(Privado);
})
</script>
<?= $this->endSection() ?>