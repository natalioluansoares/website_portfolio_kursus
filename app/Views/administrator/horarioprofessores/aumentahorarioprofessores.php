<?= $this->extend('templateadministrator/header') ?>

<?= $this->section('administrator') ?>
    <title><?=lang('sidebarPortfolio.aumentahorarioPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('administrator') ?>
<!-- start page title -->
<div class="mb-3"></div>
<div class="row">
    <div class="col-lg-3">
        <div class="mb-3">
            <div class="page-title-right">
            <h4 class="page-title"><?=lang('sidebarPortfolio.aumentahorarioPortfolio')?></h4>
            </div>
        </div>
    </div>
</div>
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
                <div class="tab-content">
                    <?php $errors = session()->getFlashdata('errors'); ?>
                    <div class="tab-pane show active" id="form-row-preview">
                        <form action="<?=base_url(lang('horarioProfessores.inputHorarioPortfolioUrlPortfolio')) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="row g-2">
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('materiaProfessores.materiaProfessores')?></label>
                                    <select id="inputState" name="horario_professores" class="form-control">
                                        <option value=""><?=lang('professoresPortfolio.hiliContaProfessores')?></option>
                                        <option value="<?=$row->materia_professores?>"<?= old('horario_professores') == $row->materia_professores ? 'selected' : null ?>><?=$row->naran_kompleto?>(<sub><?=$row->titulo_professores?></sub>)</option>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['horario_professores']) ?  $errors['horario_professores'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('horarioProfessores.classeHorario')?></label>
                                    <select id="inputState" name="horario_classe" class="form-control">
                                        <option value=""><?=lang('horarioProfessores.hiliClasseHorario')?></option>
                                        <?php foreach($classe as $pro): ?>
                                        <option value="<?=$pro->id_classe?>"<?= old('horario_classe') == $pro->id_classe ? 'selected' : null ?>><?=$pro->classe?>(<span><?=$pro->kode_classe?></span>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['horario_classe']) ?  $errors['horario_classe'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('horarioProfessores.materiaMateria')?></label>
                                    <select id="inputState" name="materia_horario" class="form-control">
                                        <option value=""><?=lang('horarioProfessores.hiliMateriaMateria')?></option>
                                        <?php foreach($preparasaun as $pro): ?>
                                        <option value="<?=$pro->id_preparasaun_materia ?>"<?= old('materia_horario') == $pro->id_preparasaun_materia  ? 'selected' : null ?>><?=$pro->materia_kursus?>(<sub><?=$pro->kode_materia_professores?></sub>)(<sub><?=$pro->level_materia_kursus?></sub>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['materia_horario']) ?  $errors['materia_horario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('horarioProfessores.tempoHorario')?></label>
                                    <select id="inputState" name="total_horario" class="form-control">
                                        <option value=""><?=lang('horarioProfessores.hiliTempoHorario')?></option>
                                        <option value="Semana I Kompleto"<?= old('total_horario') == 'Semana I Kompleto' ? 'selected' : null ?>><?=lang('horarioProfessores.kompletoHorario')?></option>
                                        <option value="Semana Dala II"<?= old('total_horario') == 'Semana Dala II' ? 'selected' : null ?>><?=lang('horarioProfessores.semanaIIHorario')?></option>
                                        <option value="Semana Dala III"<?= old('total_horario') == 'Semana Dala III' ? 'selected' : null ?>><?=lang('horarioProfessores.semanaIIIHorario')?></option>
                                        <option value="Semana Dala IV"<?= old('total_horario') == 'Semana Dala IV' ? 'selected' : null ?>><?=lang('horarioProfessores.semanaIVHorario')?></option>
                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['total_horario']) ?  $errors['total_horario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputState" class="form-label"><?=lang('horarioProfessores.loronHorario')?></label>
                                    <select id="single-select" name="loron_horario" class="form-control">
                                        <option value=""><?=lang('horarioProfessores.hiliLoronHorario')?></option>
                                        <option value="Segunda-Feira/Terca-Feira"<?= old('loron_horario') == 'Segunda-Feira/Terca-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.tercaHorario')?></option>
                                        <option value="Segunda-Feira/Quarta-Feira"<?= old('loron_horario') == 'Segunda-Feira/Quarta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.quartaHorario')?></option>
                                        <option value="Segunda-Feira/Quinta-Feira"<?= old('loron_horario') == 'Segunda-Feira/Quinta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?></option>
                                        <option value="Segunda-Feira/Sexta-Feira"<?= old('loron_horario') == 'Segunda-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>
                                        <option value="Segunda-Feira/Sabado"<?= old('loron_horario') == 'Segunda-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                        <option value="Terca-Feira/Quarta-Feira"<?= old('loron_horario') == 'Terca-Feira/Quarta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.quartaHorario')?></option>
                                        <option value="Terca-Feira/Quinta-Feira"<?= old('loron_horario') == 'Terca-Feira/Quinta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?></option>
                                        <option value="Terca-Feira/Sexta-Feira"<?= old('loron_horario') == 'Terca-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>
                                        <option value="Terca-Feira/Sabado"<?= old('loron_horario') == 'Terca-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                        <option value="Quarta-Feira/Quinta-Feira"<?= old('loron_horario') == 'Quarta-Feira/Quinta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?></option>
                                        <option value="Quarta-Feira/Sexta-Feira"<?= old('loron_horario') == 'Quarta-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>
                                        <option value="Quarta-Feira/Sabado"<?= old('loron_horario') == 'Quarta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                        <option value="Quinta-Feira/Sexta-Feira"<?= old('loron_horario') == 'Quinta-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>
                                        <option value="Quinta-Feira/Sabado"<?= old('loron_horario') == 'Quinta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                        <option value="Sexta-Feira/Sabado"<?= old('loron_horario') == 'Sexta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.sextaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                        <option value="Segunda-Feira/Quarta-Feira/Sexta-Feira"<?= old('loron_horario') == 'Segunda-Feira/Quarta-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>

                                        <option value="Terca-Feira/Quinta-Feira/Sabado"<?= old('loron_horario') == 'Terca-Feira/Quinta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                        <option value="Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira"<?= old('loron_horario') == 'Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>

                                        <option value="Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado"<?= old('loron_horario') == 'Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                        <option value="Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado"<?= old('loron_horario') == 'Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>


                                    </select>
                                    <small class="text-danger">
                                        <?=isset($errors['loron_horario']) ?  $errors['loron_horario'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.totalEstudanteHorario')?></label>
                                    <input type="number" name="total_estudante" min="0" value="<?=old('total_estudante') ?>" class="form-control" placeholder="<?=lang('horarioProfessores.totalEstudanteHorario')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['total_estudante']) ?  $errors['total_estudante'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.dataHahuHorario')?></label>
                                    <input type="date" name="data_horario_hahu" value="<?=old('data_horario_hahu') ?>" class="form-control"  placeholder="<?=date('Y-M-d')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['data_horario_hahu']) ?  $errors['data_horario_hahu'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.dataRemataHorario')?></label>
                                    <input type="date" name="data_horario_remata" value="<?=old('data_horario_remata') ?>" class="form-control"  placeholder="<?=date('Y-M-d')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['data_horario_remata']) ?  $errors['data_horario_remata'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.orasHahuHorario')?></label>
                                    <input type="time" name="horas_tama_kursus"  value="<?=old('horas_tama_kursus') ?>" class="form-control" placeholder="<?=lang('horarioProfessores.orasHahuHorario')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['horas_tama_kursus']) ?  $errors['horas_tama_kursus'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.orasRemataHorario')?></label>
                                    <input type="time" name="horas_sai_kursus"  value="<?=old('horas_sai_kursus') ?>" class="form-control" placeholder="<?=lang('horarioProfessores.orasRemataHorario')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['horas_sai_kursus']) ?  $errors['horas_sai_kursus'] : null ?>
                                    </small>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.orasRemataHorario')?></label>
                                    <input type="number" name="osan_kursus" min="0" value="<?=old('osan_kursus') ?>" class="form-control" placeholder="<?=lang('horarioProfessores.orasRemataHorario')?>">
                                    <small class="text-danger">
                                        <?=isset($errors['osan_kursus']) ?  $errors['osan_kursus'] : null ?>
                                    </small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                            <a href="<?= base_url(lang('horarioProfessores.showHorarioPortfolioUrlPortfolio').$row->materia_professores)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                        </form>                      
                    </div> <!-- end preview-->
                </div> <!-- end preview-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<?= $this->endSection() ?>