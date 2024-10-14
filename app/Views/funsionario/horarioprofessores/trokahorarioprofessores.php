<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.trokahorarioPortfolio')?></title>
<?= $this->endSection() ?>
<?= $this->section('funsionario') ?>
<?php if (session()->sistema_administrator == 2) : ?>
<?php
    $naran = helperFunsionario()->naran_kompleto;
    $this->db = \Config\Database::connect();
    $builder = $this->db->table('direito_acesso_autromos');
    $builder->select('*');
    $builder->join('direito_acesso', 'direito_acesso_autromos.direito_accesso_id  = direito_acesso.id_direito_acesso', 'total_saldo', 'total_osan_tama','salario_funsionario','salario_professores', 'osan_impresta_funsionario', 'osan_impresta_professores', 'funsionario', 'professores', 'materia_professores', 'estudante', 'kategorio_materia', 'materia', 'kursus_projeito', 'classe', 'horario_kursus', 'horario_kursus_hotu',  'left');

    $builder->join('menu_acesso', 'direito_acesso.id_administrator_acesso  = menu_acesso.id_menu_acesso', 'menu_profile', 'sistemmenu_finansa','menu_funsionario','menu_profesores','menu_estudante','menu_kategoria_materia','menu_kursus_projeito','menu_classe_horario', 'menu_sertifikado','left');

    $builder->join('administrator', 'menu_acesso.menu_administrator  = administrator.id_administrator', 'naran_kompleto', 'naran_ikus','naran_primeiro','email', 'status_servisu', 'left');

    $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'kode_sistema', 'sistema','left');
    $builder->where('id_administrator', session('id_administrator'));
    $builder->where('naran_kompleto=', $naran);
    $query = $builder->get()->getResult(); 
?>
<?php foreach($query as $acesso): ?>
<?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->horario_kursus == 1 && $acesso->menu_classe_horario == 1) {?>
<div class="mb-3"></div>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?=lang('sidebarPortfolio.trokahorarioPortfolio')?></strong></h4>
            </div>
            <?php $errors = session()->getFlashdata('errors'); ?>
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?=base_url(lang('horarioProfessores.updateHorarioFunsionarioUrlPortfolio').$horario->id_horario) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="inputState" class="form-label"><?=lang('materiaProfessores.materiaProfessores')?></label>
                                <select id="inputState" name="horario_professores" class="form-control">
                                    <option value="<?=$horario->horario_professores ?>"><?=$row->naran_kompleto?>(<sub><?=$row->titulo_professores?></sub>)</option>
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
                                    <option value="<?=$horario->horario_classe ?>"><?=$horario->classe ?></option>
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
                                    <option value="<?=$horario->materia_horario ?>"><?=$horario->materia_kursus?>(<sub><?=$horario->kode_materia_professores?></sub>)(<sub><?=$horario->level_materia_kursus?></sub>)</option>
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

                                    <?php if ($horario->total_horario == 'Semana I Kompleto') { ?>
                                        <option value="Semana I Kompleto"<?= old('total_horario') == 'Semana I Kompleto' ? 'selected' : null ?>><?=lang('horarioProfessores.kompletoHorario')?></option>

                                   <?php }elseif ($horario->total_horario == 'Semana Dala II') {?>
                                        <option value="Semana Dala II"<?= old('total_horario') == 'Semana Dala II' ? 'selected' : null ?>><?=lang('horarioProfessores.semanaIIHorario')?></option>

                                   <?php }elseif ($horario->total_horario == 'Semana Dala III') {?>
                                        <option value="Semana Dala III"<?= old('total_horario') == 'Semana Dala III' ? 'selected' : null ?>><?=lang('horarioProfessores.semanaIIIHorario')?></option>

                                   <?php }elseif ($horario->total_horario == 'Semana Dala IV') {?>
                                        <option value="Semana Dala IV"<?= old('total_horario') == 'Semana Dala IV' ? 'selected' : null ?>><?=lang('horarioProfessores.semanaIVHorario')?></option>

                                   <?php } ?>

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
                                    <?php if ($horario->loron_horario =='Segunda-Feira/Terca-Feira') { ?>
                                        <option value="Segunda-Feira/Terca-Feira"<?= old('loron_horario') == 'Segunda-Feira/Terca-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.tercaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Segunda-Feira/Quarta-Feira') { ?>
                                        <option value="Segunda-Feira/Quarta-Feira"<?= old('loron_horario') == 'Segunda-Feira/Quarta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.quartaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Segunda-Feira/Quinta-Feira') { ?>
                                        <option value="Segunda-Feira/Quinta-Feira"<?= old('loron_horario') == 'Segunda-Feira/Quinta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Segunda-Feira/Sexta-Feira') { ?>
                                        <option value="Segunda-Feira/Sexta-Feira"<?= old('loron_horario') == 'Segunda-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Segunda-Feira/Sabado') { ?>
                                        <option value="Segunda-Feira/Sabado"<?= old('loron_horario') == 'Segunda-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Terca-Feira/Quarta-Feira') { ?>
                                        <option value="Terca-Feira/Quarta-Feira"<?= old('loron_horario') == 'Terca-Feira/Quarta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.quartaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Terca-Feira/Quinta-Feira') { ?>
                                        <option value="Terca-Feira/Quinta-Feira"<?= old('loron_horario') == 'Terca-Feira/Quinta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Terca-Feira/Sexta-Feira') { ?>
                                        <option value="Terca-Feira/Sexta-Feira"<?= old('loron_horario') == 'Terca-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Terca-Feira/Sabado') { ?>
                                        <option value="Terca-Feira/Sabado"<?= old('loron_horario') == 'Terca-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Quarta-Feira/Quinta-Feira') { ?>
                                        <option value="Quarta-Feira/Quinta-Feira"<?= old('loron_horario') == 'Quarta-Feira/Quinta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Quarta-Feira/Sexta-Feira') { ?>
                                        <option value="Quarta-Feira/Sexta-Feira"<?= old('loron_horario') == 'Quarta-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>
                                        
                                   <?php }elseif ($horario->loron_horario == 'Quarta-Feira/Sabado') { ?>
                                        <option value="Quarta-Feira/Sabado"<?= old('loron_horario') == 'Quarta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Quinta-Feira/Sexta-Feira') { ?>
                                        <option value="Quinta-Feira/Sexta-Feira"<?= old('loron_horario') == 'Quinta-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Quinta-Feira/Sabado') { ?>
                                        <option value="Quinta-Feira/Sabado"<?= old('loron_horario') == 'Quinta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Sexta-Feira/Sabado') { ?>
                                        <option value="Sexta-Feira/Sabado"<?= old('loron_horario') == 'Sexta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.sextaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Segunda-Feira/Quarta-Feira/Sexta-Feira') { ?>
                                        <option value="Segunda-Feira/Quarta-Feira/Sexta-Feira"<?= old('loron_horario') == 'Segunda-Feira/Quarta-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Terca-Feira/Quinta-Feira/Sabado') { ?>
                                        <option value="Terca-Feira/Quinta-Feira/Sabado"<?= old('loron_horario') == 'Terca-Feira/Quinta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira') { ?>
                                        <option value="Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira"<?= old('loron_horario') == 'Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado') { ?>
                                        <option value="Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado"<?= old('loron_horario') == 'Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                   <?php }elseif ($horario->loron_horario == 'Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado') { ?>
                                        <option value="Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado"<?= old('loron_horario') == 'Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado' ? 'selected' : null ?>><?=lang('horarioProfessores.segundaHorario')?>/<?=lang('horarioProfessores.tercaHorario')?>/<?=lang('horarioProfessores.quartaHorario')?>/<?=lang('horarioProfessores.quintaHorario')?>/<?=lang('horarioProfessores.sextaHorario')?>/<?=lang('horarioProfessores.sabadoHorario')?></option>

                                   <?php } ?>
                                   
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
                                <input type="number" name="total_estudante" min="0" value="<?=old('total_estudante', $horario->total_estudante) ?>" class="form-control" placeholder="<?=lang('horarioProfessores.totalEstudanteHorario')?>">
                                <small class="text-danger">
                                    <?=isset($errors['total_estudante']) ?  $errors['total_estudante'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.dataHahuHorario')?></label>
                                <input type="text" name="data_horario_hahu" value="<?=old('data_horario_hahu', $horario->data_horario_hahu) ?>" class="form-control" id="start" placeholder="<?=date('Y-M-d')?>">
                                <small class="text-danger">
                                    <?=isset($errors['data_horario_hahu']) ?  $errors['data_horario_hahu'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.dataRemataHorario')?></label>
                                <input type="text" name="data_horario_remata" value="<?=old('data_horario_remata', $horario->data_horario_remata) ?>" class="form-control" id="end" placeholder="<?=date('Y-M-d')?>">
                                <small class="text-danger">
                                    <?=isset($errors['data_horario_remata']) ?  $errors['data_horario_remata'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.orasHahuHorario')?></label>
                                <input type="text" name="horas_tama_kursus" id="startpicker" value="<?=old('horas_tama_kursus', $horario->horas_tama_kursus) ?>" class="form-control" placeholder="<?=lang('horarioProfessores.orasHahuHorario')?>">
                                <small class="text-danger">
                                    <?=isset($errors['horas_tama_kursus']) ?  $errors['horas_tama_kursus'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.orasRemataHorario')?></label>
                                <input type="text" name="horas_sai_kursus" id="finishpicker" value="<?=old('horas_sai_kursus', $horario->horas_sai_kursus) ?>" class="form-control" placeholder="<?=lang('horarioProfessores.orasRemataHorario')?>">
                                <small class="text-danger">
                                    <?=isset($errors['horas_sai_kursus']) ?  $errors['horas_sai_kursus'] : null ?>
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="inputPassword4" class="form-label"><?=lang('horarioProfessores.osanHorario')?></label>
                                <select id="inputState" name="osan_kursus" class="form-control">
                                    <option value="<?=$horario->horas_sai_kursus?>">$<?=number_format($horario->preso_materia_kursus, 2)?>(<sub><?=$horario->materia_kursus?>/<?=$horario->level_materia_kursus?></sub>)</option>
                                    <option value=""><?=lang('horarioProfessores.hiliOsanHorario')?></option>
                                    <?php foreach($preparasaun as $pro): ?>
                                    <option value="<?=$pro->preso_materia_kursus ?>"<?= old('osan_kursus') == $pro->preso_materia_kursus  ? 'selected' : null ?>>$<?=number_format($pro->preso_materia_kursus, 2)?>(<sub><?=$pro->materia_kursus?>/<?=$pro->level_materia_kursus?></sub>)</option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="text-danger">
                                    <?=isset($errors['osan_kursus']) ?  $errors['osan_kursus'] : null ?>
                                </small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                        <a href="<?= base_url(lang('horarioProfessores.showHorarioFunsionarioUrlPortfolio').$row->materia_professores)?>" class="btn btn-info ms-1"><i class="mdi mdi-skip-previous"></i></a>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{ ?>
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-5">
            <div class="form-input-content text-center error-page">
                <h1 class="error-text font-weight-bold">404</h1>
                <h4><i class="fa fa-exclamation-triangle text-warning"></i> <?= lang('hamosPortfolio.linkSala')?></h4>
                <p><?= lang('hamosPortfolio.linkSalaKarik')?></p>
                <?php if (session()->sistema_administrator == 2) { ?>
                    <h5><strong><?=helperFunsionario()->naran_kompleto ?></strong></h5>
                    <?php if (helperFunsionario()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.admnistrasaunFunsionario')?></strong></h6>
                    <?php } ?>
                <?php }elseif (session()->sistema_administrator == 3) { ?>
                    <h5><strong><?=helperProfessores()->naran_kompleto ?></strong></h5>
                    <?php if (helperProfessores()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.professoresProfessores')?></strong></h6>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php endforeach;?>
<?php endif; ?>

<?php if (session()->sistema_administrator == 3) : ?>
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-5">
            <div class="form-input-content text-center error-page">
                <h1 class="error-text font-weight-bold">404</h1>
                <h4><i class="fa fa-exclamation-triangle text-warning"></i> <?= lang('hamosPortfolio.linkSala')?></h4>
                <p><?= lang('hamosPortfolio.linkSalaKarik')?></p>
                <?php if (session()->sistema_administrator == 2) { ?>
                    <h5><strong><?=helperFunsionario()->naran_kompleto ?></strong></h5>
                    <?php if (helperFunsionario()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.admnistrasaunFunsionario')?></strong></h6>
                   <?php } ?>
                <?php }elseif (session()->sistema_administrator == 3) { ?>
                    <h5><strong><?=helperProfessores()->naran_kompleto ?></strong></h5>
                    <?php if (helperProfessores()->sistema) {?>
                        <h6><strong><?=lang('professoresPortfolio.professoresProfessores')?></strong></h6>
                   <?php } ?>
               <?php } ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<script src="<?= base_url(); ?>templateadministrator/assets/ckeditores/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('preparasaun_materia_professores');
</script>
<?= $this->endSection() ?>