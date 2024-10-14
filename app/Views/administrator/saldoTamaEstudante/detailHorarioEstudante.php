<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.detailPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex" method="get">
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
                        <button class="btn btn-primary ms-2" type="submit" name="filter-data">
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
                            <a href="<?= base_url(lang('totalSaldoEstudante.mateiraProfessoresSaldoTamaEstudanteUrlPortfolio').$horario->id_professores)?>" class="btn btn-danger ms-1"><i class="mdi mdi-skip-previous"></i></a>
                            
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
    $jumlah_data = count($horarioestudante);
    if ($jumlah_data > 0 )
    { ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.detailPortfolio')?></strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th><small><strong><?=lang('classePortfolio.classeClasse') ?></strong></small></th>
                                <th><small><strong><?=lang('materiaProfessores.kodeMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></small></th>
                                <th style="width: 12%;"><small><strong><?=lang('materiaProfessores.materiaProfessores') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.estudanteHorario') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('totalSaldoEstudante.osanPortfolio') ?></strong></small></th>
                                <th><small><strong><?=lang('totalSaldoEstudante.horasPortfolio') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.dataMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('totalSaldoEstudante.donatorKursusPortfolio') ?></strong></small></th>
                                <th><small><strong><?=lang('totalSaldoEstudante.seluPortfolio') ?></strong></small></th>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($horarioestudante as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><small><?=$portfolio->horario_classe_estudante?></small></td>
                                <td><small><?=$portfolio->kode_materia_estudante?></small></td>
                                <td><small><?=$portfolio->materia_horario_estudante?></small></td>
                                <td><small><?=$portfolio->naran_kompleto_professores ?><sub class="text-danger">(<?=$portfolio->titulo_professores ?>)</sub></small></td>
                                <td><small><?=$portfolio->naran_kompleto_estudante?></small></td>
                                <td align="center"><strong><small class="text-center"><span class="text-success"><?=$portfolio->level_horario_estudante ?></span></small></strong></td>
                                <td align="center"><strong><small class="text-center"><span class="text-warning">$<?= number_format($portfolio->propinas_estudante,2)?></span></small></strong></td>
                                <td><small><?=$portfolio->horas_horario_estudante	 ?></small></td>
                                <td><small><?=$portfolio->data_horario_estudante ?></small></td>
                                
                                <td class="text-center"><h3><strong><a href="<?=base_url(lang('totalSaldoEstudante.SaldoTamaEstudantePropinasDonatorUrlPortfolio').$portfolio->data_horario_hahu.'/'.$portfolio->data_horario_remata.'/'.$portfolio->id_horario_estudante.'/'.$portfolio->materia_kursus.'/'.$portfolio->level_materia_kursus.'/'.'Donator Kursus') ?>" class="badge bg-warning"><i class="mdi mdi-folder-open"></i></a></strong></h3></td>

                                <td class="text-center"><h3><strong><a href="<?=base_url(lang('totalSaldoEstudante.SaldoTamaEstudantePropinasDonatorUrlPortfolio').$portfolio->data_horario_hahu.'/'.$portfolio->data_horario_remata.'/'.$portfolio->id_horario_estudante.'/'.$portfolio->materia_kursus.'/'.$portfolio->level_materia_kursus.'/'.'Selu Kursus') ?>" class="badge bg-success"><i class="mdi mdi-folder-open"></i></a></strong></h3></td>

                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><br>
                <div class="left" style="float: left;">
                    <span>Showing <?=  $no = 1 +(10 * ($page - 1)); ?> to <?= $no-1 ?> of <?= $pager->getTotal()?> Entries </span>
                </div>
                <div class="right" style="float: right;">
                    <?= $pager->links('default','pagination') ?>
                </div>
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <div class="table-responsive" style="margin-top: 15lvh;">
            <center>
                <span class="badge bg-danger"><i class="mdi mdi-account-cancel-outline"></i><?=lang('hamosPortfolio.bukaData') ?></span>
            </center>
        </div>
    <?php } ?>
</div>
<?= $this->endSection() ?>