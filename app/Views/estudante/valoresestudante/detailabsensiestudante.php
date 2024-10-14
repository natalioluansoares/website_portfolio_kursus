<?= $this->extend('templateestudante/header') ?>

<?= $this->section('estudante') ?>
    <title><?=lang('sidebarPortfolio.jadwalPortfolio')?></title>
<?= $this->endSection() ?>

<?= $this->section('estudante') ?>
 <!-- START HERO -->

    <!-- START SERVICES -->
    <section class="py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-1">
                    <div class="page-title-right">
                    <h4 class="page-title text-center"><?=lang('sidebarPortfolio.jadwalPortfolio')?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-3 ml-auto">
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
                                <a href="<?=base_url(lang('valoresEstudanteFunsionario.detailValoresEstudanteUrlPortofolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario_estudante.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus) ?>" class="btn btn-success ms-2"><i class="mdi mdi-keyboard-backspace"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th><small><strong><?=lang('classePortfolio.classeClasse') ?></strong></small></th>
                                        <th><small><strong><?=lang('materiaProfessores.kodeMateria') ?></strong></small></th>
                                        <th><small><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></small></th>
                                        <th style="width: 12%;"><small><strong><?=lang('materiaProfessores.materiaProfessores') ?></strong></small></th>
                                        <th><small><strong><?=lang('horarioProfessores.estudanteHorario') ?></strong></small></th>
                                        <th><small><strong><?=lang('valoresEstudanteFunsionario.absensiEstudante') ?></strong></small></th>
                                        <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                        <th><small><strong><?=lang('valoresEstudanteFunsionario.dataEstudante') ?></strong></small></th>
                                </thead>
                                <tbody>
                                    <?php 
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $no = 1 +(6 * ($page - 1));
                                    $no=1; foreach($absensiestudante as $portfolio): ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><small><?=$portfolio->horario_classe_estudante?></small></td>
                                        <td><small><?=$portfolio->kode_materia_estudante?></small></td>
                                        <td><small><?=$portfolio->materia_horario_estudante?></small></td>
                                        <td><small><?=$portfolio->naran_kompleto_professores ?><sub class="text-danger">(<?=$portfolio->titulo_professores ?>)</sub></small></td>
                                        <td><small><?=$portfolio->naran_kompleto_estudante?></small></td>
                                        <?php if ($portfolio->absensi == 'Tama') { ?>
                                            <td><strong><small class="text-primary"><?=lang('valoresEstudanteFunsionario.tamaEstudante') ?></small></strong></td>
                                        <?php } ?>
                                        <?php if ($portfolio->absensi == 'La Tama') { ?>
                                            <td><strong><small class="text-danger"><?=lang('valoresEstudanteFunsionario.laTamaEstudante') ?></small></strong></td>
                                        <?php } ?>
                                        <?php if ($portfolio->absensi == 'Lisensa') { ?>
                                            <td><strong><small class="text-warning"><?=lang('valoresEstudanteFunsionario.lisensaEstudante') ?></small></strong></td>
                                        <?php } ?>
                                        <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioPortfolioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="text-success"><?=$portfolio->level_materia_kursus ?></span></small></strong></a></td>
                                        <td><small><?=$portfolio->data_absensi_estudante ?></small></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div><br>
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
    </section>
<script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<?= $this->endSection() ?>
