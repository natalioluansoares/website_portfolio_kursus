<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
<?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
    <title><?=lang('sidebarPortfolio.seluPortfolio')?></title>
<?php }else {?>
    <title><?=lang('sidebarPortfolio.donatorKursusPortfolio')?></title>
<?php } ?>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
                <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                    <h4 class="page-title"><?=lang('classePortfolio.temporarioClasse')?></h4>
                <?php }else {?>
                    <h4 class="page-title"><?=lang('classePortfolio.temporarioClasse')?></h4>
                <?php } ?>
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


                        <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                            <a href="<?=base_url(lang('totalSaldoEstudante.SaldoTamaEstudantePropinasDonatorUrlPortfolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario_estudante.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus.'/'.'Selu Kursus') ?>"class="btn btn-warning ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        <?php }else {?>
                            <a href="<?=base_url(lang('totalSaldoEstudante.SaldoTamaEstudantePropinasDonatorUrlPortfolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario_estudante.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus.'/'.'Donator Kursus') ?>" class="btn btn-warning ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        <?php } ?>

                        <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                            <a href="#" class="btn btn-dark ms-1 btn-animation"  data-animation="slideInDown" data-bs-toggle="modal" data-bs-target=".updateOsanTamaEstudantes"><i class="mdi mdi-broom"></i></a>
                        <?php }else {?>
                            <a href="#" class="btn btn-dark ms-1 btn-animation"  data-animation="slideInUp" data-bs-toggle="modal" data-bs-target=".updateOsanTamaEstudantes"><i class="mdi mdi-broom"></i></a>
                        <?php } ?>

                        <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                            <a href="#" class="btn btn-danger ms-1 btn-animation"  data-animation="slideInDown" data-bs-toggle="modal" data-bs-target=".deleteOsanTamaEstudantes"><i class="uil-trash"></i></a>
                        <?php }else {?>
                            <a href="#" class="btn btn-danger ms-1 btn-animation"  data-animation="slideInUp" data-bs-toggle="modal" data-bs-target=".deleteOsanTamaEstudantes"><i class="uil-trash"></i></a>
                        <?php } ?>

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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <?php 
                    $jumlah_data = count($osantamaestudante);
                    if ($jumlah_data > 0 )
                    { ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><small><strong><?=lang('classePortfolio.classeClasse') ?></strong></small></th>
                                <th><small><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.estudanteHorario') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('totalSaldoEstudante.seluPortfolio') ?></strong></small></th>
                                <th><small><strong><?=lang('totalSaldoEstudante.osanPortfolio') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.dataMateria') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('totalSaldoEstudante.hamosPortfolio') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('totalSaldoEstudante.temporarioEstudantePortfolio') ?></strong></small></th>
                        </thead>
                        <tbody>
                            <?php 
                            $no=1; foreach($osantamaestudante as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><small><?=$portfolio->horario_classe_estudante?></small></td>
                                <td><small><?=$portfolio->materia_horario_estudante?></small></td>
                                <td><small><?=$portfolio->naran_kompleto_estudante?></small></td>
                                <td align="center"><strong><small class="text-center"><span class="text-success"><?=$portfolio->level_horario_estudante ?></span></small></strong></td>
                                <?php if ($portfolio->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                                    <td><small style="color: goldenrod;"><?=lang('sidebarPortfolio.seluPortfolio') ?></small></td>
                                <?php }else { ?>
                                    <td><small style="color: goldenrod;"><?=lang('sidebarPortfolio.donatorKursusPortfolio') ?></small></td>
                                <?php } ?>
                                <td><small class="text-danger">$ <?=number_format($portfolio->total_saldo_tama_estudante,2) ?></small></td>
                                <td><small><?=$portfolio->data_saldo_tama_estudante ?></small></td>

                                
                                <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                                    <td class="text-center"><h3><strong><a href="#" class="badge bg-success ms-1 btn-animation" id="permanenteSaldoTamaEstudante" data-animation="slideInRight" data-bs-toggle="modal" data-bs-target=".permanenteSaldoTama" data-id="<?=$portfolio->id_saldo_tama_estudante ?>" data-donator="<?=$portfolio->id_total_tama_donator  ?>" data-portfolio="<?=$portfolio->id_total_saldo_portfolio  ?>" data-total="<?=$portfolio->total_saldo_tama_estudante  ?>"><i class="uil-trash"></i></a></strong></h3></td>
                                <?php }else {?>
                                    <td class="text-center"><h3><strong><a href="#" class="badge bg-warning ms-1 btn-animation" id="permanenteSaldoTamaEstudante" data-animation="slideInLeft" data-bs-toggle="modal" data-bs-target=".permanenteSaldoTama" data-id="<?=$portfolio->id_saldo_tama_estudante ?>" data-donator="<?=$portfolio->id_total_tama_donator  ?>" data-portfolio="<?=$portfolio->id_total_saldo_portfolio  ?>" data-total="<?=$portfolio->total_saldo_tama_estudante  ?>"><i class="uil-trash"></i></a></strong></h3></td>
                                <?php } ?>
                                <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                                    <td class="text-center"><h3><strong><a href="#" class="badge bg-danger ms-1 btn-animation" id="osanTama" data-animation="slideInLeft" data-bs-toggle="modal" data-bs-target=".hamosOsanTamaEstudantes" data-id="<?=$portfolio->id_saldo_tama_estudante ?>" data-donator="<?=$portfolio->id_total_tama_donator  ?>" data-portfolio="<?=$portfolio->id_total_saldo_portfolio  ?>" data-total="<?=$portfolio->total_saldo_tama_estudante  ?>"><i class="mdi mdi-broom"></a></strong></h3></td>
                                <?php }else {?>
                                    <td class="text-center"><h3><strong><a href="#" class="badge bg-danger ms-1 btn-animation" id="osanTama" data-animation="slideInRight" data-bs-toggle="modal" data-bs-target=".hamosOsanTamaEstudantes" data-id="<?=$portfolio->id_saldo_tama_estudante ?>" data-donator="<?=$portfolio->id_total_tama_donator  ?>" data-portfolio="<?=$portfolio->id_total_saldo_portfolio  ?>" data-total="<?=$portfolio->total_saldo_tama_estudante  ?>"><i class="mdi mdi-broom"></a></strong></h3></td>
                                <?php } ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php }else{ ?>
                        <div class="table-responsive" style="margin-top: 15lvh;">
                            <center>
                                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
                            </center>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade deleteOsanTamaEstudantes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                    <h3><?=lang('sidebarPortfolio.seluPortfolio') ?></h3>
                <?php }else{ ?>
                    <h3><?=lang('sidebarPortfolio.donatorKursusPortfolio') ?></h3>
                <?php } ?>
                
            </center>
            <form action="<?=base_url(lang('totalSaldoEstudante.permanenteHotuSaldoTamaEstudantePropinasDonatorUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('totalSaldoEstudante.hamosHotuTransaksi') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE"> 
                        <?php foreach($osantamaestudante as $portfolio): ?>
                        <input type="hidden" name="id[]" id="idosantama" placeholder="Kategori"class="form-control" value="<?=$portfolio->id_saldo_tama_estudante ?>">
                        <?php endforeach; ?>
                    </center>
                    <center>
                        <button type="submit" class="btn btn-primary"><?=lang('hamosPortfolio.hamosData') ?></button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade updateOsanTamaEstudantes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                    <h3><?=lang('sidebarPortfolio.seluPortfolio') ?></h3>
                <?php }else{ ?>
                    <h3><?=lang('sidebarPortfolio.donatorKursusPortfolio') ?></h3>
                <?php } ?>
                
            </center>
            <form action="<?=base_url(lang('totalSaldoEstudante.hamosHotuTemporarioSaldoTamaEstudantePropinasDonatorUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.hamostemporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <?php foreach($osantamaestudante as $portfolio): ?>
                        <input type="hidden" name="id[]" id="idosantama" placeholder="Kategori"class="form-control" value="<?=$portfolio->id_saldo_tama_estudante ?>">
                        <input type="hidden" name="id_total_tama_donator[]" id="iddonator" placeholder="Kategori"class="form-control" value="<?=$portfolio->id_total_tama_donator ?>">
                        <input type="hidden" name="id_total_saldo_portfolio[]" id="idportfolio" placeholder="Kategori"class="form-control" value="<?=$portfolio->id_total_saldo_portfolio ?>">
                        <input type="hidden" name="total_saldo_tama_estudante[]" id="idtotal" placeholder="Kategori"class="form-control" value="<?=$portfolio->total_saldo_tama_estudante ?>">
                        <?php endforeach; ?>
                    </center>
                    <center>
                        <button type="submit" class="btn btn-primary"><?=lang('hamosPortfolio.hamosData') ?></button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade hamosOsanTamaEstudantes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('totalSaldoEstudante.hamosTemporarioSaldoTamaEstudantePropinasDonatorUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.temporarioData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idosantama" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_tama_donator" id="iddonator" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_saldo_portfolio" id="idportfolio" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="total_saldo_tama_estudante" id="idtotal" placeholder="Kategori"class="form-control">
                    </center>
                    <center>
                        <button type="submit" class="btn btn-primary"><?=lang('hamosPortfolio.hamosData') ?></button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade permanenteSaldoTama" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('totalSaldoEstudante.permanenteSaldoTamaEstudantePropinasDonatorUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="_method" value="DELETE"> 
                        <input type="hidden" name="id" id="idSaldoTamaEstudante" placeholder="Kategori"class="form-control">
                    </center>
                    <center>
                        <button type="submit" class="btn btn-primary"><?=lang('hamosPortfolio.hamosData') ?></button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?=lang('hamosPortfolio.batalData') ?></button>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#osanTama", function() {
    var Id = $(this).data('id');
    var Donator = $(this).data('donator');
    var Portfolio = $(this).data('portfolio');
    var Total = $(this).data('total');


    $(".hamosOsanTamaEstudantes #idosantama").val(Id);
    $(".hamosOsanTamaEstudantes #iddonator").val(Donator);
    $(".hamosOsanTamaEstudantes #idportfolio").val(Portfolio);
    $(".hamosOsanTamaEstudantes #idtotal").val(Total);
})
</script>

<script>
    $(document).on("click", "#permanenteSaldoTamaEstudante", function() {
    var Id = $(this).data('id');

    $(".permanenteSaldoTama #idSaldoTamaEstudante").val(Id);
})
</script>
<?= $this->endSection() ?>
