<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.saldoPrivado')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.saldoPrivado')?></h4>
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
                            <button type="reset" class="btn btn-dark ms-1">
                                <i class="uil-sync"></i>
                            </button>
                            <a href="<?=base_url(lang('totalSaldoEstudante.hamosTotalSaldoEstudanteUrlPortfolio')) ?>" class="btn btn-danger ms-1"><i class="mdi mdi-bucket"></i></a>
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
<?php 
    $jumlah_data = count($osantotal);
    if ($jumlah_data > 0 )
{ ?>
<div class="row row-cols-1 row-cols-md-3 g-3">
    <?php foreach($osantotal as $portfolio): ?>
        <div class="col">
            <div class="card">
                <img src="<?= base_url('uploads/fotosaldoprivado/'.$portfolio->foto_total_saldo_estudante)?>" class="card-img-top" alt="Card image cap" style="width: 100%; height:200px ;">
                <div class="card-body">
                    <?php if ($portfolio->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                        <h5 class="card-title"><p class="card-text"><strong><?=lang('sidebarPortfolio.seluPortfolio') ?></strong></p></h5>  
                    <?php }else { ?>
                            <h5 class="card-title"><p class="card-text"><strong><?=lang('sidebarPortfolio.donatorKursusPortfolio') ?></strong></p></h5>  
                    <?php } ?>
                    <p class="card-text" title="<?=lang('saldoprivadoPortfolio.descripsaunSaldo') ?>"><?=$portfolio->descripsaun_total_saldo_estudante?></p>
                    <center>
                        <?php if ($portfolio->total_saldo_estudante) { ?>
                            <h3><strong>$ <?= number_format($portfolio->total_saldo_estudante,2)?></strong></h3>
                        <?php }else {?>
                            <p class="card-text" style="color: red;"><strong><?=lang('saldoprivadoPortfolio.mamukSaldo') ?></strong></p>
                        <?php } ?>
                        <p class="card-text">
                            <small class="text-muted">(<?=$portfolio->data_total_saldo_estudante ?>)</small>
                        </p>
                    </center><br>
                    <center>
                        <table>
                            <thead>
                                <tr>
                                    <?php if ($portfolio->naran_total_saldo_estudante != 'Selu Kursus') {?>
                                        <th>
                                            <a href="" class="btn btn-danger btn-animation" data-animation="rubberBand" data-toggle="modal" data-target=".totalsaldoestudante" id="privado" 
                                            data-id="<?= $portfolio->id_total_saldo_estudante; ?>">
                                            <i class="uil-trash"></i>
                                            </a>
                                        </th>
                                   <?php } ?>
                                    <th>
                                        <a href="<?=base_url(lang('totalSaldoEstudante.trokaTotalSaldoEstudanteUrlPortfolio').$portfolio->id_total_saldo_estudante) ?>" class="btn btn-success"><i class="uil-edit-alt"></i></a>
                                    </th>
                                    <th>
                                        <a href="<?=base_url(lang('totalSaldoEstudante.trokaFotoTotalSaldoEstudanteUrlPortfolio').$portfolio->id_total_saldo_estudante) ?>" class="btn btn-info"><i class="mdi mdi-image-multiple"></i></a>
                                    </th>
                                    <th>
                                        <a href="<?=base_url(lang('totalSaldoEstudante.SaldoTamaEstudanteUrlPortfolio')) ?>" class="btn btn-primary"><i class="mdi mdi-folder"></i></a>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    </div> <!-- end col-->
</div>
<?php }else{ ?>
    <div class="table-responsive">
        <center>
            <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
        </center>
    </div>
<?php } ?>
<div class="modal fade totalsaldoestudante" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('totalSaldoEstudante.deleteTotalSaldoEstudanteUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idprivado" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_total_saldo_estudante" value="1" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#privado", function() {
    var Id = $(this).data('id');


    $(".totalsaldoestudante #idprivado").val(Id);
})
</script>
<?= $this->endSection() ?>