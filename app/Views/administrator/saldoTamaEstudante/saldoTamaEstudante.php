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
                    <h4 class="page-title"><?=lang('sidebarPortfolio.seluPortfolio')?></h4>
                <?php }else {?>
                    <h4 class="page-title"><?=lang('sidebarPortfolio.donatorKursusPortfolio')?></h4>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
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
                <div class="table-responsive">
                        <a href="<?= base_url(lang('totalSaldoEstudante.detailValoresSaldoTamaEstudanteUrlPortfolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus)?>" class="btn btn-danger ms-1"><i class="mdi mdi-skip-previous"></i></a>

                        <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                            <a href="#" class="btn btn-success ms-1 btn-animation" data-animation="wobble" data-toggle="modal" data-target=".aumentaOsanTamaEstudantes"><i class="mdi mdi-plus"></i></a>
                        <?php }else {?>
                            <a href="#" class="btn btn-warning ms-1 btn-animation" data-animation="wobble" data-bs-toggle="modal" data-bs-target=".aumentaOsanTamaEstudantes"><i class="mdi mdi-plus"></i></a>
                        <?php } ?>

                        <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                            <a href="<?=base_url(lang('totalSaldoEstudante.temporarioSaldoTamaEstudantePropinasDonatorUrlPortfolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario_estudante.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus.'/'.'Selu Kursus') ?>" class="btn btn-dark ms-1"><i class="mdi mdi-broom"></i></a>
                        <?php }else {?>
                            <a href="<?=base_url(lang('totalSaldoEstudante.temporarioSaldoTamaEstudantePropinasDonatorUrlPortfolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario_estudante.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus.'/'.'Donator Kursus') ?>" class="btn btn-info ms-1"><i class="mdi mdi-broom"></i></a>
                        <?php } ?>
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
$jumlah_data = count($osantamaestudante);
if ($jumlah_data > 0 )
{ ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
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
                                <?php $no=1; foreach($osantamaestudante as $portfolio): ?>
                                    <?php if ($portfolio->naran_total_saldo_estudante == 'Selu Kursus') {?>
                                        <th class="text-center"><small><strong><?=lang('totalSaldoEstudante.trokaPortfolio') ?></strong></small></th>
                                   <?php } ?>
                                <?php endforeach; ?>
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
                                <td><small>$ <?=number_format($portfolio->total_saldo_tama_estudante,2) ?></small></td>
                                <td><small><?=$portfolio->data_saldo_tama_estudante ?></small></td>

                                
                                <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                                    <td class="text-center"><h3><strong><a href="#" class="badge bg-danger ms-1 btn-animation" id="osanTama" data-animation="slideInLeft" data-bs-toggle="modal" data-bs-target=".hamosOsanTamaEstudantes" data-id="<?=$portfolio->id_saldo_tama_estudante ?>" data-donator="<?=$portfolio->id_total_tama_donator  ?>" data-portfolio="<?=$portfolio->id_total_saldo_portfolio  ?>" data-total="<?=$portfolio->total_saldo_tama_estudante  ?>"><i class="uil-trash"></i></a></strong></h3></td>
                                    <td class="text-center"><h3><strong><a href="#" class="badge bg-success ms-1 btn-animation" id="trokaOsanTama" data-animation="slideInLeft" data-bs-toggle="modal" data-bs-target=".trokaOsanTamaEstudantes" data-id="<?=$portfolio->id_saldo_tama_estudante ?>" data-donator="<?=$portfolio->id_total_tama_donator  ?>" data-portfolio="<?=$portfolio->id_total_saldo_portfolio  ?>" data-data="<?=$portfolio->data_saldo_tama_estudante ?>"><i class="uil-edit-alt"></i></a></strong></h3></td>


                                <?php }else {?>
                                    <td class="text-center"><h3><strong><a href="#" class="badge bg-warning ms-1 btn-animation" id="osanTama" data-animation="slideInRight" data-bs-toggle="modal" data-bs-target=".hamosOsanTamaEstudantes" data-id="<?=$portfolio->id_saldo_tama_estudante ?>" data-donator="<?=$portfolio->id_total_tama_donator  ?>" data-portfolio="<?=$portfolio->id_total_saldo_portfolio  ?>" data-total="<?=$portfolio->total_saldo_tama_estudante  ?>"><i class="uil-trash"></i></a></strong></h3></td>
                                <?php } ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
    <div class="table-responsive">
        <center>
            <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
        </center>
    </div>
<?php } ?>
<div class="modal fade aumentaOsanTamaEstudantes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                    <h3><?=lang('sidebarPortfolio.aumentaSeluPortfolio') ?></h3>
                <?php }else{ ?>
                    <h3><?=lang('sidebarPortfolio.aumentaDonatorKursusPortfolio') ?></h3>
                <?php } ?>
                
            </center>
            <form action="<?=base_url(lang('totalSaldoEstudante.aumentaSaldoTamaEstudantePropinasDonatorUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="inputEmail4" class="form-label"><?=lang('horarioProfessores.estudanteHorario') ?></label>

                            <select name="id_total_tama_estudante" id="" class="form-control <?=isset($errors['id_total_tama_estudante']) ? 'is-invalid' : null ?>">
                                <option value="<?=$estudante->id_horario_estudante ?>"><?=$estudante->naran_kompleto_estudante ?></option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                                <label for="inputPassword4" class="form-label"><?=lang('sidebarPortfolio.seluPortfolio') ?></label>
                            <?php }else{ ?>
                                <label for="inputPassword4" class="form-label"><?=lang('sidebarPortfolio.donatorKursusPortfolio') ?></label>
                            <?php } ?>
                            <select name="id_total_tama_donator" id="" class="form-control <?=isset($errors['id_total_tama_donator']) ? 'is-invalid' : null ?>">
                                <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                                    <option value="<?=$privado->id_total_saldo_estudante ?>"><?=lang('sidebarPortfolio.seluPortfolio') ?></option>
                                <?php }else{ ?>
                                    <option value="<?=$privado->id_total_saldo_estudante ?>"><?=lang('sidebarPortfolio.donatorKursusPortfolio') ?></option>
                               <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="inputEmail4" class="form-label text-center"><?=lang('saldoPortfolio.Saldo') ?></label>

                            <select name="id_total_saldo_portfolio" id="" class="form-control <?=isset($errors['']) ? 'is-invalid' : null ?>">
                                <?php foreach($saldo as $osan):?>
                                    <option value="<?=$osan->id_saldo_portfolio	?>"><?=$osan->saldo_portfolio ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?=isset($errors['id_total_saldo_portfolio']) ?  $errors['id_total_saldo_portfolio'] : null ?>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label"><?=lang('totalSaldoEstudante.dataPortfolio')?></label>
                            <input type="date" name="data_saldo_tama_estudante" value="<?=old('data_saldo_tama_estudante') ?>" class="form-control <?=isset($errors['data_saldo_tama_estudante']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('saldoprivadoPortfolio.dataSaldo')?>" required>
                            <div class="invalid-feedback">
                                <?=isset($errors['data_saldo_tama_estudante']) ?  $errors['data_saldo_tama_estudante'] : null ?>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label"><?=lang('totalSaldoEstudante.osanPortfolio')?></label>
                            <input type="number" name="total_saldo_tama_estudante" value="<?=old('total_saldo_tama_estudante') ?>" class="form-control <?=isset($errors['total_saldo_tama_estudante']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('totalSaldoEstudante.osanPortfolio')?>" required>
                            <div class="invalid-feedback">
                                <?=isset($errors['total_saldo_tama_estudante']) ?  $errors['total_saldo_tama_estudante'] : null ?>
                            </div>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="mdi mdi-skip-previous"></i></button>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade trokaOsanTamaEstudantes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                    <h3><?=lang('sidebarPortfolio.trokaSeluPortfolio') ?></h3>
                <?php }else{ ?>
                    <h3><?=lang('sidebarPortfolio.trokaDonatorKursusPortfolio') ?></h3>
                <?php } ?>
                
            </center>
            <form action="<?=base_url(lang('totalSaldoEstudante.trokaSaldoTamaEstudantePropinasDonatorUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="inputEmail4" class="form-label"><?=lang('horarioProfessores.estudanteHorario') ?></label>
                            <input type="hidden" class="form-control" id="idosantotal" name="id_saldo_tama_estudante">
                            <select name="id_total_tama_estudante" id="" class="form-control <?=isset($errors['id_total_tama_estudante']) ? 'is-invalid' : null ?>">
                                <option value="<?=$estudante->id_horario_estudante ?>"><?=$estudante->naran_kompleto_estudante ?></option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                                <label for="inputPassword4" class="form-label"><?=lang('sidebarPortfolio.seluPortfolio') ?></label>
                            <?php }else{ ?>
                                <label for="inputPassword4" class="form-label"><?=lang('sidebarPortfolio.donatorKursusPortfolio') ?></label>
                            <?php } ?>
                            <select name="id_total_tama_donator" id="" class="form-control <?=isset($errors['id_total_tama_donator']) ? 'is-invalid' : null ?>">
                                <?php if ($privado->naran_total_saldo_estudante == 'Selu Kursus') { ?>
                                    <option value="<?=$privado->id_total_saldo_estudante ?>"><?=lang('sidebarPortfolio.seluPortfolio') ?></option>
                                <?php }else{ ?>
                                    <option value="<?=$privado->id_total_saldo_estudante ?>"><?=lang('sidebarPortfolio.donatorKursusPortfolio') ?></option>
                               <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="inputEmail4" class="form-label text-center"><?=lang('saldoPortfolio.Saldo') ?></label>

                            <select name="id_total_saldo_portfolio" id="" class="form-control <?=isset($errors['']) ? 'is-invalid' : null ?>">
                                <?php foreach($saldo as $osan):?>
                                    <option value="<?=$osan->id_saldo_portfolio	?>"><?=$osan->saldo_portfolio ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?=isset($errors['id_total_saldo_portfolio']) ?  $errors['id_total_saldo_portfolio'] : null ?>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label"><?=lang('totalSaldoEstudante.dataPortfolio')?></label>
                            <input type="date" name="data_saldo_tama_estudante" id="dataosan" value="<?=old('data_saldo_tama_estudante') ?>" class="form-control <?=isset($errors['data_saldo_tama_estudante']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('saldoprivadoPortfolio.dataSaldo')?>" required>
                            <div class="invalid-feedback">
                                <?=isset($errors['data_saldo_tama_estudante']) ?  $errors['data_saldo_tama_estudante'] : null ?>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="inputPassword4" class="form-label"><?=lang('totalSaldoEstudante.osanPortfolio')?></label>
                            <input type="number" name="total_saldo_tama_estudante" value="<?=old('total_saldo_tama_estudante') ?>" class="form-control <?=isset($errors['total_saldo_tama_estudante']) ? 'is-invalid' : null ?>" id="inputPassword4" placeholder="<?=lang('totalSaldoEstudante.osanPortfolio')?>" required>
                            <div class="invalid-feedback">
                                <?=isset($errors['total_saldo_tama_estudante']) ?  $errors['total_saldo_tama_estudante'] : null ?>
                            </div>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="mdi mdi-skip-previous"></i></button>
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
            <form action="<?=base_url(lang('totalSaldoEstudante.deleteSaldoTamaEstudantePropinasDonatorUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idosantama" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_tama_donator" id="iddonator" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="id_total_saldo_portfolio" id="idportfolio" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="total_saldo_tama_estudante" id="idtotal" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_total_saldo_estudantes" value="1" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#trokaOsanTama", function() {
    var Id = $(this).data('id');
    var Donator = $(this).data('donator');
    var Data = $(this).data('data');


    $(".trokaOsanTamaEstudantes #idosantotal").val(Id);
    $(".trokaOsanTamaEstudantes #dataosan").val(Data);
})
</script>
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
<?= $this->endSection() ?>
