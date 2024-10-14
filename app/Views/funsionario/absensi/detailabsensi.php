<?= $this->extend('templatefunsionario/header') ?>

<?= $this->section('funsionario') ?>
    <title><?=lang('sidebarPortfolio.detailPortfolio')?></title>
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
<?php if ($acesso->absence == 1 && $acesso->menu_estudante == 1) {?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" name="start" id="start" placeholder="<?=date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="end" name="end" placeholder="<?=date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <a href="<?=base_url(lang('valoresEstudanteFunsionario.detailValoresEstudanteFunsionarioUrlPortofolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus) ?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
    $jumlah_data = count($absensiestudante);
    if ($jumlah_data > 0 )
    { ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong><?=lang('sidebarPortfolio.detailPortfolio')?></strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?= csrf_field(); ?>
                    <table class="table table-bordered">
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
                                    <td><strong><small class="badge badge-success"><?=lang('valoresEstudanteFunsionario.tamaEstudante') ?></small></strong></td>
                                <?php } ?>
                                <?php if ($portfolio->absensi == 'La Tama') { ?>
                                    <td><strong><small class="badge badge-danger"><?=lang('valoresEstudanteFunsionario.laTamaEstudante') ?></small></strong></td>
                                <?php } ?>
                                <?php if ($portfolio->absensi == 'Lisensa') { ?>
                                    <td><strong><small class="badge badge-warning"><?=lang('valoresEstudanteFunsionario.lisensaEstudante') ?></small></strong></td>
                                <?php } ?>
                                <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioPortfolioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="text-success"><?=$portfolio->level_materia_kursus ?></span></small></strong></a></td>
                                <td><small><?=$portfolio->data_absensi_estudante ?></small></td>
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
<?php if ($acesso->absence == 1 && $acesso->menu_estudante == 1) {?>
<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <div class="page-title-right">
                <div class="table-responsive">
                    <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" name="start" id="start" placeholder="<?=date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="end" name="end" placeholder="<?=date('Y-M-d')?>">
                                <span class="input-group-text badge badge-info text-white mr-2">
                                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                                </span>
                            </div>
                        <button class="btn btn-primary mr-2" name="filter-data">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <a href="<?=base_url(lang('valoresEstudanteFunsionario.detailValoresEstudanteFunsionarioUrlPortofolio').$estudante->data_horario_hahu.'/'.$estudante->data_horario_remata.'/'.$estudante->id_horario.'/'.$estudante->materia_kursus.'/'.$estudante->level_materia_kursus) ?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
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
                                <th><small><strong><?=lang('valoresEstudanteFunsionario.absensiEstudante') ?></strong></small></th>
                                <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                <th><small><strong><?=lang('valoresEstudanteFunsionario.dataEstudante') ?></strong></small></th>
                        </thead>
                        <tbody>
                            <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $no = 1 +(6 * ($page - 1)); 
                            $no=1; foreach($absensiestudante as $portfolio): ?>
                            <?php if ($portfolio->naran_kompleto_professores == helperProfessores()->naran_kompleto) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><small><?=$portfolio->horario_classe_estudante?></small></td>
                                <td><small><?=$portfolio->kode_materia_estudante?></small></td>
                                <td><small><?=$portfolio->materia_horario_estudante?></small></td>
                                <td><small><?=$portfolio->naran_kompleto_professores ?><sub class="text-danger">(<?=$portfolio->titulo_professores ?>)</sub></small></td>
                                <td><small><?=$portfolio->naran_kompleto_estudante?></small></td>
                                <?php if ($portfolio->absensi == 'Tama') { ?>
                                    <td><strong><small class="badge badge-success"><?=lang('valoresEstudanteFunsionario.tamaEstudante') ?></small></strong></td>
                                <?php } ?>
                                <?php if ($portfolio->absensi == 'La Tama') { ?>
                                    <td><strong><small class="badge badge-danger"><?=lang('valoresEstudanteFunsionario.laTamaEstudante') ?></small></strong></td>
                                <?php } ?>
                                <?php if ($portfolio->absensi == 'Lisensa') { ?>
                                    <td><strong><small class="badge badge-warning"><?=lang('valoresEstudanteFunsionario.lisensaEstudante') ?></small></strong></td>
                                <?php } ?>
                                <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioPortfolioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="text-success"><?=$portfolio->level_materia_kursus ?></span></small></strong></a></td>
                                <td><small><?=$portfolio->data_absensi_estudante ?></small></td>
                            </tr>
                            <?php } ?>
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

<?= $this->endSection() ?>