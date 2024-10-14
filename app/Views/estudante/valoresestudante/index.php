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
                                    <a href="<?=base_url(lang('categorioPortfolio.hamosCategorioUrlPortfolio'))?>" class="btn btn-danger ms-2">
                                        <i class="mdi mdi-bucket"></i>
                                    </a>
                                </div>
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
                                        <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                        <th><small><strong><?=lang('horarioProfessores.loronHorario') ?></strong></small></th>
                                        <th><small><strong><?=lang('horarioProfessores.tempoHorario') ?></strong></small></th>
                                        <th><small><strong><?=lang('horarioProfessores.horasMateria') ?></strong></small></th>
                                        <th><small><strong><?=lang('horarioProfessores.dataMateria') ?></strong></small></th>
                                        <th><small><strong><?=lang('horarioProfessores.detailsvalueMateria') ?></strong></small></th>
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
                                        <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioPortfolioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="text-success"><?=$portfolio->level_materia_kursus ?></span></small></strong></a></td>

                                        <!-- Segunda-Feira -->
                                        <?php if($portfolio->loron_horario_estudante == 'Segunda-Feira/Terca-Feira'){ ?>
                                            <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Terca-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.tercaHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Segunda-Feira/Quarta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Segunda-Feira/Quinta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Segunda-Feira/Sexta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Segunda-Feira/Sabado') { ?>
                                            <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                        <!-- Terca-Feira -->
                                        <?php }elseif($portfolio->loron_horario_estudante == 'Terca-Feira/Quarta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Terca-Feira/Quinta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Terca-Feira/Sexta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Terca-Feira/Sabado') { ?>
                                            <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Quarta-Feira/Quinta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Quarta-Feira/Sexta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                        <?php }elseif($portfolio->loron_horario_estudante == 'Quarta-Feira/Sabado') { ?>
                                            <td><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                        <!-- Quinta Feira -->
                                        <?php }elseif($portfolio->loron_horario_estudante == 'Quinta-Feira/Sexta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                        
                                        <?php }elseif($portfolio->loron_horario_estudante == 'Quinta-Feira/Sabado') { ?>
                                            <td><small><?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                        <!-- Sexta-Feira -->
                                        <?php }elseif($portfolio->loron_horario_estudante == 'Sexta-Feira/Sabado') { ?>
                                            <td><small><?=lang('horarioProfessores.sextaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                        
                                        <!--Segunda-Feira/Quarta-Feira/Sexta-Feira-->
                                        <?php }elseif($portfolio->loron_horario_estudante == 'Segunda-Feira/Quarta-Feira/Sexta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                        
                                        <!--Terca-Feira/Quinta-Feira/Sabado-->
                                        <?php }elseif($portfolio->loron_horario_estudante == 'Terca-Feira/Quinta-Feira/Sabado') { ?>
                                            <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                        
                                        <!--Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira-->
                                        <?php }elseif($portfolio->loron_horario_estudante == 'Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira') { ?>
                                            <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                        
                                        <!--Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado-->
                                        <?php }elseif($portfolio->loron_horario_estudante == 'Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado') { ?>
                                            <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                        
                                        <!--Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado-->
                                        <?php }elseif($portfolio->loron_horario_estudante == 'Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado') { ?>
                                            <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                        
                                    <?php } ?>

                                        <?php if($portfolio->total_horario_estudante == 'Semana I Kompleto'){ ?>
                                            <td><small><?=lang('horarioProfessores.kompletoHorario') ?></small></td>
                                        <?php }elseif($portfolio->total_horario_estudante == 'Semana Dala II') { ?>
                                            <td><small><?=lang('horarioProfessores.semanaIIHorario') ?></small></td>
                                        <?php }elseif($portfolio->total_horario_estudante == 'Semana Dala III') { ?>
                                            <td><small><?=lang('horarioProfessores.semanaIIIHorario') ?></small></td>
                                        <?php }elseif($portfolio->total_horario_estudante == 'Semana Dala IV') { ?>
                                            <td><small><?=lang('horarioProfessores.semanaIVHorario') ?></small></td>
                                    <?php } ?>
                                        <td><small><?=$portfolio->horas_horario_estudante ?></small></td>
                                        <td><small><?=$portfolio->data_horario_estudante ?></small></td>

                                        <td class="text-center"><h3><strong><a href="<?=base_url(lang('valoresEstudanteFunsionario.detailValoresEstudanteUrlPortofolio').$portfolio->data_horario_hahu.'/'.$portfolio->data_horario_remata.'/'.$portfolio->id_horario_estudante.'/'.$portfolio->materia_kursus.'/'.$portfolio->level_materia_kursus) ?>" class="badge bg-success"><i class="mdi mdi-folder-open"></i></a></strong></h3></td>
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
    <!-- END SERVICES -->
     <div class="modal fade trokacategorio" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: forestgreen;">
                <center>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-1">
                                <div class="page-title-right">
                                <h1 class="page-title text-center text-white"><?=lang('sidebarPortfolio.jadwalPortfolio')?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-1">
                                <div class="page-title-right">
                                <h1 style="font-size: 600%; color:white"><strong><i class="mdi mdi-check-all"></i></strong></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                    <div class="modal-body">
                        <form action="<?=base_url(lang('horarioEstudante.aumentaHorarioEstudanteUrlPortfolio')) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                    <center>
                                        <div class="col-lg-6">
                                            <input type="text" name="materia" class="form-control text-center mb-1" id="materia" readonly>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="kodemateria" class="form-control text-center" id="kodemateria" readonly>
                                        </div>
                                    </center>
                                    <input type="hidden" name="classe" class="form-control" id="classe">
                                    <input type="hidden" name="level"  class="form-control" id="level">
                                    <input type="hidden" name="loron"  class="form-control" id="loron">
                                    <input type="hidden" name="total"  class="form-control" id="total">
                                    <input type="hidden" name="propinas"  class="form-control" id="propinas">
                                    <input type="hidden" name="horas"  class="form-control" id="horas">
                                    <input type="hidden" name="dia"  class="form-control" id="dia">
                                    <input type="hidden" name="horario"  class="form-control" id="horario">

                            </div><br>
                            <center>
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                                <button type="button" class="btn btn-dark ms-1" data-dismiss="modal"><i class="mdi mdi-skip-previous"></i></button>
                            </center>
                        </form>  
                    </div>
            </div>
        </div>
    </div>
<script src="<?= base_url()?>templateadministrator/assets/js/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    $(document).on("click", "#categorio", function() {
    var Id = $(this).data('id');
    var Kode = $(this).data('kode');
    var Materia = $(this).data('materia');
    var Classe = $(this).data('classe');
    var Level = $(this).data('level');
    var Loron = $(this).data('loron');
    var Total = $(this).data('total');
    var Propinas = $(this).data('propinas');
    var Horas = $(this).data('horas');
    var Dia = $(this).data('dia');
    var Horario = $(this).data('horario');


    $(".trokacategorio #idcategorio").val(Id);
    $(".trokacategorio #kodemateria").val(Kode);
    $(".trokacategorio #materia").val(Materia);
    $(".trokacategorio #classe").val(Classe);
    $(".trokacategorio #level").val(Level);
    $(".trokacategorio #total").val(Total);
    $(".trokacategorio #loron").val(Loron);
    $(".trokacategorio #propinas").val(Propinas);
    $(".trokacategorio #horas").val(Horas);
    $(".trokacategorio #dia").val(Dia);
    $(".trokacategorio #horario").val(Horario);
})
</script>
<?= $this->endSection() ?>
