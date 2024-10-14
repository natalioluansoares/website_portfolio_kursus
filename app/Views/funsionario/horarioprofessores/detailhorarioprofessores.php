<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.detailHorarioPortfolio')?></title>
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
<?php if ($acesso->horario_kursus == 1 && $acesso->menu_classe_horario == 1) {?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="start" name="start" placeholder="<?= date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="end" name="end" placeholder="<?= date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <a href="<?= base_url(lang('horarioProfessores.horarioFunsionarioUrlPortofolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
                            <button class="input-group-text mr-2" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                            <?php if ($acesso->aumenta_direito_acesso_autromos == 1 && $acesso->horario_kursus == 1 && $acesso->menu_classe_horario == 1) {?>
                                <a href="<?= base_url(lang('horarioProfessores.aumentaHorarioFunsionarioUrlPortfolio').$preparasaun->materia_professores) ?>" class="btn" style="background-color: darkslateblue; color:aliceblue"><i class="fa fa-plus"></i></a>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <?php 
    $jumlah_data = count($horarioprofessores);
    if ($jumlah_data > 0 )
    { ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.detailHorarioPortfolio')?></strong></h4>
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
                                <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.loronHorario') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.tempoHorario') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.osanHorario') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.estudanteHorario') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.horasMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.dataMateria') ?></strong></small></th>
                                <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->horario_kursus == 1 && $acesso->menu_classe_horario == 1) {?>
                                <th><small><strong><?=lang('materiaProfessores.hamosMateria') ?></strong></small></th>
                                <?php } ?>
                                <?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->horario_kursus == 1 && $acesso->menu_classe_horario == 1) {?>
                                <th><small><strong><?=lang('materiaProfessores.trokaMateria') ?></strong></small></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($horarioprofessores as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><small><?=$portfolio->classe?></small></td>
                                <td><small><?=$portfolio->kode_materia_professores?></small></td>
                                <td><small><?=$portfolio->materia_kursus?></small></td>
                                <td><small><?=$portfolio->naran_kompleto ?><sub class="text-danger">(<?=$portfolio->titulo_professores ?>)</sub></small></td>
                                <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioFunsionarioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="badge badge-success"><?=$portfolio->level_materia_kursus ?></span></small></strong></a></td>

                                <!-- Segunda-Feira -->
                                <?php if($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira'){ ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quinta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <!-- Terca-Feira -->
                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quarta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quinta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Quinta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <!-- Quinta Feira -->
                                <?php }elseif($portfolio->loron_horario == 'Quinta-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                
                                <?php }elseif($portfolio->loron_horario == 'Quinta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <!-- Sexta-Feira -->
                                <?php }elseif($portfolio->loron_horario == 'Sexta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.sextaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Quarta-Feira/Sexta-Feira-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                
                                <!--Terca-Feira/Quinta-Feira/Sabado-->
                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quinta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                               <?php } ?>

                                <?php if($portfolio->total_horario == 'Semana I Kompleto'){ ?>
                                    <td><small><?=lang('horarioProfessores.kompletoHorario') ?></small></td>
                                <?php }elseif($portfolio->total_horario == 'Semana Dala II') { ?>
                                    <td><small><?=lang('horarioProfessores.semanaIIHorario') ?></small></td>
                                <?php }elseif($portfolio->total_horario == 'Semana Dala III') { ?>
                                    <td><small><?=lang('horarioProfessores.semanaIIIHorario') ?></small></td>
                                <?php }elseif($portfolio->total_horario == 'Semana Dala IV') { ?>
                                    <td><small><?=lang('horarioProfessores.semanaIVHorario') ?></small></td>
                               <?php } ?>
                                <td><strong><small class="text-center"><span class="badge badge-warning">$ <?= number_format($portfolio->osan_kursus,2)?></span></small></strong></td>
                                <td><small><?=$portfolio->total_estudante ?></small></td>
                                <td><small><?=$portfolio->horas_tama_kursus ?> / <?=$portfolio->horas_sai_kursus ?></small></td>
                                <td><small><?=$portfolio->data_horario_hahu ?> / <?=$portfolio->data_horario_remata ?></small></td>

                                <?php if ($acesso->hamos_direito_acesso_autromos == 1 && $acesso->horario_kursus == 1 && $acesso->menu_classe_horario == 1) {?>
                                <td>
                                    <a href="" class="badge badge-danger btn-animation" data-animation="flipInX" data-toggle="modal" data-target=".trokahorario" id="horario" 
                                data-id="<?= $portfolio->id_horario; ?>">
                                <i class="fa fa-trash"></i>
                                </a>
                                </td>
                                <?php } ?>

                                <?php if ($acesso->troka_direito_acesso_autromos == 1 && $acesso->horario_kursus == 1 && $acesso->menu_classe_horario == 1) {?>
                                <td><a href="<?=base_url(lang('horarioProfessores.trokaHorarioFunsionarioUrlPortfolio').$portfolio->materia_professores.'/'.$portfolio->id_horario) ?>" class="badge badge-success"><i class="fa fa-pencil"></i></a></td>
                                <?php } ?>
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
<?php
    $naran = helperProfessores()->naran_kompleto;
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
<?php if ($acesso->horario_kursus == 1 && $acesso->menu_classe_horario == 1) {?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="start" name="start" placeholder="<?= date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="end" name="end" placeholder="<?= date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <a href="<?= base_url(lang('horarioProfessores.horarioFunsionarioUrlPortofolio'))?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
                            <button class="input-group-text mr-2" style="background-color: cornflowerblue;" type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Success !</b>
            <?= session()->getFlashdata('success') ?>
        </div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body" style="color: aliceblue;">
            <b>Error !</b>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <?php 
    $jumlah_data = count($horarioprofessores);
    if ($jumlah_data > 0 )
    { ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.detailHorarioPortfolio')?></strong></h4>
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
                                <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.loronHorario') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.tempoHorario') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.osanHorario') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.estudanteHorario') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.horasMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('horarioProfessores.dataMateria') ?></strong></small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1));
                            $no=1; foreach($horarioprofessores as $portfolio): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><small><?=$portfolio->classe?></small></td>
                                <td><small><?=$portfolio->kode_materia_professores?></small></td>
                                <td><small><?=$portfolio->materia_kursus?></small></td>
                                <td><small><?=$portfolio->naran_kompleto ?><sub class="text-danger">(<?=$portfolio->titulo_professores ?>)</sub></small></td>
                                <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioFunsionarioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="badge badge-success"><?=$portfolio->level_materia_kursus ?></span></small></strong></a></td>

                                <!-- Segunda-Feira -->
                                <?php if($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira'){ ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quinta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <!-- Terca-Feira -->
                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quarta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quinta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Quinta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>

                                <?php }elseif($portfolio->loron_horario == 'Quarta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <!-- Quinta Feira -->
                                <?php }elseif($portfolio->loron_horario == 'Quinta-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                
                                <?php }elseif($portfolio->loron_horario == 'Quinta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>

                                <!-- Sexta-Feira -->
                                <?php }elseif($portfolio->loron_horario == 'Sexta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.sextaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Quarta-Feira/Sexta-Feira-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                
                                <!--Terca-Feira/Quinta-Feira/Sabado-->
                                <?php }elseif($portfolio->loron_horario == 'Terca-Feira/Quinta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira/Quinta-Feira/Sexta-Feira') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Quarta-Feira/Quinta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                                <!--Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado-->
                                <?php }elseif($portfolio->loron_horario == 'Segunda-Feira/Terca-Feira/Quarta-Feira/Quinta-Feira/Sexta-Feira/Sabado') { ?>
                                    <td><small><?=lang('horarioProfessores.segundaHorario') ?>, <?=lang('horarioProfessores.tercaHorario') ?>, <?=lang('horarioProfessores.quartaHorario') ?>, <?=lang('horarioProfessores.quintaHorario') ?>, <?=lang('horarioProfessores.sextaHorario') ?>, <?=lang('horarioProfessores.sabadoHorario') ?></small></td>
                                
                               <?php } ?>

                                <?php if($portfolio->total_horario == 'Semana I Kompleto'){ ?>
                                    <td><small><?=lang('horarioProfessores.kompletoHorario') ?></small></td>
                                <?php }elseif($portfolio->total_horario == 'Semana Dala II') { ?>
                                    <td><small><?=lang('horarioProfessores.semanaIIHorario') ?></small></td>
                                <?php }elseif($portfolio->total_horario == 'Semana Dala III') { ?>
                                    <td><small><?=lang('horarioProfessores.semanaIIIHorario') ?></small></td>
                                <?php }elseif($portfolio->total_horario == 'Semana Dala IV') { ?>
                                    <td><small><?=lang('horarioProfessores.semanaIVHorario') ?></small></td>
                               <?php } ?>
                                <td><strong><small class="text-center"><span class="badge badge-warning">$ <?= number_format($portfolio->osan_kursus,2)?></span></small></strong></td>
                                <td><small><?=$portfolio->total_estudante ?></small></td>
                                <td><small><?=$portfolio->horas_tama_kursus ?> / <?=$portfolio->horas_sai_kursus ?></small></td>
                                <td><small><?=$portfolio->data_horario_hahu ?> / <?=$portfolio->data_horario_remata ?></small></td>
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


<div class="modal fade trokahorario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <br><br>
            <center>
                <h3><?=lang('hamosPortfolio.perguntasHamos') ?></h3>
            </center>
            <form action="<?=base_url(lang('horarioProfessores.deleteHorarioFunsionarioUrlPortfolio')) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <center>
                        <font size="15" style="color: red;"><i class="fa fa-question-circle-o" aria-hidden="true"></i></font>
                    </center>
                    <br>
                    <center>
                        <h3><?=lang('hamosPortfolio.perguntasData') ?></h3>
                        <p><?=lang('hamosPortfolio.seiData') ?></p>
                        <input type="hidden" name="id" id="idhorario" placeholder="Kategori"class="form-control">
                        <input type="hidden" name="horario_aktivo" value="1" placeholder="Kategori"class="form-control">
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
<script src="<?= base_url()?>templatefunsionario/assets/js/js/jquery.min.js"></script>
<script>
    $(document).on("click", "#horario", function() {
    var Id = $(this).data('id');


    $(".trokahorario #idhorario").val(Id);
})
</script>
<?= $this->endSection() ?>