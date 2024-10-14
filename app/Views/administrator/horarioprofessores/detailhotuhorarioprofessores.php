<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.hotuHorarioPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.hotuHorarioPortfolio')?></h4>
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
                            
                            <a href="<?= base_url(lang('horarioProfessores.pdfDetailHorarioProfessoresUrlPortfolio'))?>" target="_blank" class="btn btn-info ms-1"><i class="mdi mdi-download"></i></a>
                            <a href="<?= base_url(lang('horarioProfessores.pdfDetailHorarioProfessoresUrlPortfolio'))?>" target="_blank" class="btn btn-warning ms-1"><i class="mdi mdi-download"></i></a>
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
    <div class="col-xl-12 col-lg-12 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="selection-datatable" class="table dt-responsive table-bordered nowrap w-100">
                        <th class="text-center"ead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center"><small><strong><?=lang('classePortfolio.classeClasse') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('materiaProfessores.kodeMateria') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></small></th>
                                <th class="text-center" style="width: 12%;"><small><strong><?=lang('materiaProfessores.materiaProfessores') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.loronHorario') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.tempoHorario') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.osanHorario') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.estudanteHorario') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.horasMateria') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('horarioProfessores.dataMateria') ?></strong></small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($horarioprofessores as $portfolio): ?>
                            <tr>
                                <td align="center"><?=$no++?></td>
                                <td align="center"><small><?=$portfolio->classe?></small></td>
                                <td align="center"><small><?=$portfolio->kode_materia_professores?></small></td>
                                <td align="center"><small><?=$portfolio->materia_kursus?></small></td>
                                <td align="center"><small><?=$portfolio->naran_kompleto ?><sub class="text-danger">(<?=$portfolio->titulo_professores ?>)</sub></small></td>
                                <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioPortfolioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="text-success"><?=$portfolio->level_materia_kursus ?></span></small></strong></a></td>

                                <!-- Segunda-Feira -->
                                <?php if($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira'){ ?>
                                    <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quinta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Sexta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Sabado') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <!-- Terca-Feira -->
                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quarta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quinta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Sexta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Sabado') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Quinta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Sexta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Sabado') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <!-- Quinta Feira -->
                                <?php }elseif($portfolio->loron_horario == 'Quinta-Feira/Sexta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                
                                <?php }elseif($portfolio->loron_horario == 'Quinta-Feira/Sabado') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <!-- Sexta-Feira -->
                                <?php }elseif($portfolio->loron_horario == 'Sexta-Feira/Sabado') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.sextaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Quarta-Feira/Sexta-Feira-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira/Sexta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                
                                <!--Terca-Feira/Quinta-Feira/Sabado-->
                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quinta-Feira/Sabado') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                               <?php } ?>

                                <?php if($portfolio->total_horario == 'Semana I Kompleto'){ ?>
                                    <td align="center"><small><?=lang('horarioProfessores.kompletoHorario') ?></small></td>
                                <?php }elseif($portfolio->total_horario == 'Semana Dala II') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.semanaIIHorario') ?></small></td>
                                <?php }elseif($portfolio->total_horario == 'Semana Dala III') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.semanaIIIHorario') ?></small></td>
                                <?php }elseif($portfolio->total_horario == 'Semana Dala IV') { ?>
                                    <td align="center"><small><?=lang('horarioProfessores.semanaIVHorario') ?></small></td>
                               <?php } ?>
                                <td align="center"><strong><small class="text-center"><span class="text-warning">$<?= number_format($portfolio->osan_kursus,2)?></span></small></strong></td>
                                <td align="center"><small><?=$portfolio->total_estudante ?></small></td>
                                <td align="center"><small><?=$portfolio->horas_tama_kursus ?> / <?=$portfolio->horas_sai_kursus ?></small></td>
                                <td align="center"><small><?=$portfolio->data_horario_hahu ?> / <?=$portfolio->data_horario_remata ?></small></td>
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
<div class="modal fade trokaclasse" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('classePortfolio.deleteClasseUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="mdi mdi-map-marker-question-outline"></i></font>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idclasse" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="aktivo_classe" value="1" placeholder="Kategori"class="form-control">
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
    $(document).on("click", "#classe", function() {
    var Id = $(this).data('id');


    $(".trokaclasse #idclasse").val(Id);
})
</script>
<?= $this->endSection() ?>