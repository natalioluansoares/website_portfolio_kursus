<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.saldoOsanSaiPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.saldoOsanSaiPortfolio')?></h4>
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
                        <a href="<?= base_url(lang('osanSaiPortfolio.saldoOsanSaiUrlPortfolio').$osansai->id_osan_sai)?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
                            <button class="input-group-text  btn-success sm-1" type="submit"><i class="uil-search-plus"></i></button>
                            
                            <div class="dropdown">
                                <button class="btn btn-danger dropdown-toggle ms-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="#" class="dropdown-item ms-1 btn-animation" data-animation="jello" data-toggle="modal" data-target=".hamoshotusaldoosansaipermanente" ><?= lang('osanSaiPortfolio.deleteOsanSaiPortfolio') ?></a>
                                    <a href="#" class="dropdown-item ms-1 btn-animation" data-animation="slideInUp" data-toggle="modal" data-target=".hamoshotuosaldosansaitemporario" id="temporariohotusaldoosansai"><?= lang('osanSaiPortfolio.restoryOsanSaiPortfolio') ?></a>
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
    <?php 
        $jumlah_data = count($saldoosansai);
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
                                <th><?=lang('osanSaiPortfolio.kodeOsanSai') ?></th>
                                <th><?=lang('osanSaiPortfolio.naranOsanSai') ?></th>
                                <th class="text-center"><?=lang('osanSaiPortfolio.montanteOsanSai') ?></th>
                                <th class="text-center"><?=lang('osanSaiPortfolio.timeOsanSai') ?></th>
                                <th><?=lang('osanSaiPortfolio.dataOsanSai') ?></th>
                                <th class="text-center"><?=lang('osanSaiPortfolio.hamosOsanSai') ?></th>
                                <th class="text-center"><?=lang('osanSaiPortfolio.temporarioOsanSai') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(10 * ($page - 1));
                            foreach($saldoosansai as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$portfolio->kode_osan_sai?></td>
                                <td><?=$portfolio->naran_osan_sai?></td>
                                <td align="center"><strong><span class="btn btn-success">$ <?=number_format($portfolio->total_saldo_sai, 2)?></span></strong></td>
                                <td align="center"><?=$portfolio->horas_saldo_sai?></td>
                                <td><?=$portfolio->data_saldo_sai?></td>
                                <td align="center">
                                    <a href="" class="btn btn-danger btn-animation" data-animation="shake" data-toggle="modal" data-target=".deletesaldoosansai" id="deletesaldoosansais" 
                                    data-id="<?= $portfolio->id_saldo_sai ; ?>">
                                    <i class="uil-trash"></i>
                                    </a>
                                </td>
                               <td align="center">
                                    <a href="" class="btn btn-warning btn-animation" data-animation="shake" data-toggle="modal" data-target=".temporariosaldoosansai" id="temporariosaldoosansais" 
                                    data-id="<?= $portfolio->id_saldo_sai ; ?>" data-total="<?= $portfolio->total_saldo_sai; ?>" data-osansai="<?= $portfolio->id_total_saldo_sai; ?>" data-portfolio="<?= $portfolio->id_total_saldo_sai_portfolio; ?>">
                                    <i class="mdi mdi-broom"></i>
                                    </a>
                                </td>
                            <?php
                            endforeach; 
                            ?>
                        </tbody>

                        <?php  $saldo =0; foreach($result as $portfolio): ?>
                        <?php
                            $saldo += $portfolio->total_saldo_sai;
                            endforeach; 
                        ?>
                        <tbody>
                        <tr>
                            <td colspan="3"><h5><strong><?=lang('osanSaiPortfolio.montanteOsanSai') ?></strong></h5></td>
                            <td align="center"><strong><span class="btn" style="background-color: gold; color:black">$ <?= number_format($saldo, 2);?></span></strong></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div> <!-- end card-body-->
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
</div>
</div>

<div class="modal fade hamoshotusaldoosansaipermanente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
              
            <form action="<?=base_url(lang('osanSaiPortfolio.hamosHotuPermanenteSaldoOsanSaiUrlPortfolio').$osansai->id_osan_sai) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.temporarioData') ?></h3>
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

<div class="modal fade temporariosaldoosansai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
              
            <form action="<?=base_url(lang('osanSaiPortfolio.temporarioSaldoOsanSaiUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.temporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idsaldo" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="total_saldo_sai" id="tamasaldo" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_saldo_sai_portfolio" id="idportfolio" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_saldo_sai" id="idprivado" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_saldo_sai" value="0" placeholder="Kategori"class="form-control">
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

<div class="modal fade hamoshotuosaldosansaitemporario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
              
            <form action="<?=base_url(lang('osanSaiPortfolio.temporarioHotuSaldoOsanSaiUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.temporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <?php foreach($saldoosansai as $portfolio): ?>
                        <input type="hidden" name="id[]" id="idsaldo" value="<?= $portfolio->id_saldo_sai ?>" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="total_saldo_sai[]" value="<?= $portfolio->total_saldo_sai ?>"  id="tamasaldo" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_saldo_sai_portfolio[]"  value="<?= $portfolio->id_total_saldo_sai_portfolio ?>"  id="idportfolio" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_saldo_sai[]" id="idprivado" value="<?= $portfolio->id_total_saldo_sai ?>" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_saldo_sai[]" value="0" placeholder="Kategori"class="form-control">
                        <?php endforeach; ?>
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

<div class="modal fade deletesaldoosansai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
              
            <form action="<?=base_url(lang('osanSaiPortfolio.permanenteSaldoOsanSaiUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="id" id="idsaldo" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#temporariosaldoosansais", function() {
    var Id = $(this).data('id');
    var Total = $(this).data('total');
    var Portfolio = $(this).data('portfolio');
    var Privado = $(this).data('osansai');


    $(".temporariosaldoosansai #idsaldo").val(Id);
    $(".temporariosaldoosansai #tamasaldo").val(Total);
    $(".temporariosaldoosansai #idportfolio").val(Portfolio);
    $(".temporariosaldoosansai #idprivado").val(Privado);
})
</script>

<script>
    $(document).on("click", "#deletesaldoosansais", function() {
    var Id = $(this).data('id');

    $(".deletesaldoosansai #idsaldo").val(Id);
})
</script>
<?= $this->endSection() ?>