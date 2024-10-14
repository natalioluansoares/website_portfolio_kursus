<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('classePortfolio.temporarioClasse')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('classePortfolio.temporarioClasse')?></h4>
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
                            <a href="<?= base_url(lang('saldotamaPortfolio.showSaldoTamaUrlPortfolio').$privado->id_saldo_privado)?>" class="btn btn-dark ms-1">
                                <i class="mdi mdi-skip-previous"></i>
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
    <?php 
        $jumlah_data = count($saldotama);
        if ($jumlah_data > 0 )
    { ?>
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><?=lang('saldotamaPortfolio.kodeSaldo') ?></th>
                                <th><?=lang('saldotamaPortfolio.organizasaunSaldo') ?></th>
                                <th><?=lang('saldotamaPortfolio.totalSaldo') ?></th>
                                <th><?=lang('saldotamaPortfolio.dataSaldo') ?></th>
                                <th><?=lang('saldotamaPortfolio.hamosSaldo') ?></th>
                                <th><?=lang('saldotamaPortfolio.trokaSaldo') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($saldotama as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->kode_saldo_privado?></td>
                                <td><?=$portfolio->naran_organizasaun_privado?></td>
                                <td><strong>$ <?=number_format($portfolio->total_saldo_tama, 2)?></strong></td>
                                <td><?=$portfolio->data_saldo_portfolio?></td>
                               <td>
                                    <a href="" class="btn btn-danger btn-animation" data-animation="rollIn" data-toggle="modal" data-target=".permanentesaldotama" id="saldotama" 
                                    data-id="<?= $portfolio->id_saldo_tama; ?>">
                                    <i class="uil-trash"></i>
                                </a>
                            </td>
                            <td><a href="" class="btn btn-warning btn-animation" data-animation="slideInLeft" data-toggle="modal" data-target=".hamossaldotama" id="saldotamatemporario" 
                            data-id="<?= $portfolio->id_saldo_tama; ?>" data-total="<?= $portfolio->total_saldo_tama; ?>" data-privado="<?= $portfolio->id_total_privado; ?>" data-portfolio="<?= $portfolio->id_total_portfolio; ?>">
                            <i class="mdi mdi-broom"></i>
                                </a></td>
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
            </div>
        </div> <!-- end card-->
    </div> <!-- end col-->
    <?php }else{ ?>
        <div class="table-responsive">
            <center>
                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
            </center>
        </div>
    <?php } ?>
</div>
<!-- Hamos Permanente -->
<div class="modal fade permanentesaldotama" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('saldotamaPortfolio.permanenteSaldoTamaUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="id" id="idsaldotama" placeholder="Kategori"class="form-control">
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
<div class="modal fade hamossaldotama" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('saldotamaPortfolio.temporarioSaldoTamaUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.temporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idtama" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="total_saldo_tama" id="tamasaldo" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_portfolio" id="idportfolio" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_privado" id="idprivado" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#saldotama", function() {
    var Id = $(this).data('id');

    $(".permanentesaldotama #idsaldotama").val(Id);
})
</script>
<script>
    $(document).on("click", "#saldotamatemporario", function() {
    var Id = $(this).data('id');
    var Total = $(this).data('total');
    var Portfolio = $(this).data('portfolio');
    var Privado = $(this).data('privado');


    $(".hamossaldotama #idtama").val(Id);
    $(".hamossaldotama #tamasaldo").val(Total);
    $(".hamossaldotama #idportfolio").val(Portfolio);
    $(".hamossaldotama #idprivado").val(Privado);
})
</script>
<?= $this->endSection() ?>