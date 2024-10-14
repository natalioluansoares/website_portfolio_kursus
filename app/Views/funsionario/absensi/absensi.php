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
                    <form action="<?=base_url(lang('valoresEstudanteFunsionario.aumentaAbsensiEstudanteFUnsionarioUrlPortofolio')) ?>" method="post">
                    <?= csrf_field(); ?>
                    <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th><small>No</small></th>
                                    <th><small><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></small></th>
                                    <th style="width: 12%;"><small><strong><?=lang('materiaProfessores.materiaProfessores') ?></strong></small></th>
                                    <th><small><strong><?=lang('horarioProfessores.estudanteHorario') ?></strong></small></th>
                                    <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                    <th class="text-center" style="width: 10%;"><small><strong><?=lang('valoresEstudanteFunsionario.absensiEstudante') ?></strong></small></th>
                            </thead>
                        <tbody>
                            <?php 
                            $no=1; foreach($horarioestudante as $portfolio): ?>
                            <tr>
                                <input type="hidden" name="absensi_estudantes[]"  value="<?= $portfolio->id_horario_estudante ?>">
                                <input type="hidden" name="data_absensi_estudante[]"  value="<?= date('Y-m-d'); ?>">
                                <input type="hidden" name="aktivo_absensi[]"  value="null">
                                <td><small><?=$no++?></small></td>
                                <td><small><?=$portfolio->materia_horario_estudante?></small></td>
                                <td><small><?=$portfolio->naran_kompleto_professores ?><sub class="text-danger">(<?=$portfolio->titulo_professores ?>)</sub></small></td>
                                <td><small><?=$portfolio->naran_kompleto_estudante?></small></td>
                                <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioFunsionarioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="badge badge-success"><?=$portfolio->level_horario_estudante ?></span></small></strong></a></td>
                                <td><small><select name="absensi[]" id="" class="form-control">
                                    <option value="Tama"><?= lang('valoresEstudanteFunsionario.tamaEstudante') ?></option>
                                    <option value="La Tama"><?= lang('valoresEstudanteFunsionario.laTamaEstudante') ?></option>
                                    <option value="Lisensa"><?= lang('valoresEstudanteFunsionario.lisensaEstudante') ?></option>
                                </select></small></td>
                                <small><input type="hidden" class="form-control" name="numero_absensi[]" value="1"></small>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                        <a href="<?=base_url(lang('valoresEstudanteFunsionario.detailValoresEstudanteFunsionarioUrlPortofolio').$horario->data_horario_hahu.'/'.$horario->data_horario_remata.'/'.$horario->id_horario.'/'.$horario->materia_kursus.'/'.$horario->level_materia_kursus) ?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                    </form>
                </div><br>
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
                    <form action="<?=base_url(lang('valoresEstudanteFunsionario.aumentaAbsensiEstudanteFUnsionarioUrlPortofolio')) ?>" method="post">
                        <?= csrf_field(); ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><small>No</small></th>
                                    <th><small><strong><?=lang('materiaProfessores.materiaMateria') ?></strong></small></th>
                                    <th style="width: 12%;"><small><strong><?=lang('materiaProfessores.materiaProfessores') ?></strong></small></th>
                                    <th><small><strong><?=lang('horarioProfessores.estudanteHorario') ?></strong></small></th>
                                    <th class="text-center"><small><strong><?=lang('materiaProfessores.levelMateria') ?></strong></small></th>
                                    <th class="text-center" style="width: 10%;"><small><strong><?=lang('valoresEstudanteFunsionario.absensiEstudante') ?></strong></small></th>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1; foreach($horarioestudante as $portfolio): ?>
                                <?php if ($portfolio->naran_kompleto_professores == helperProfessores()->naran_kompleto) { ?>
                                <tr>
                                    <input type="hidden" name="absensi_estudantes[]"  value="<?= $portfolio->id_horario_estudante ?>">
                                    <input type="hidden" name="data_absensi_estudante[]"  value="<?= date('Y-m-d'); ?>">
                                    <input type="hidden" name="aktivo_absensi[]"  value="null">
                                    <td><small><?=$no++?></small></td>
                                    <td><small><?=$portfolio->materia_horario_estudante?></small></td>
                                    <td><small><?=$portfolio->naran_kompleto_professores ?><sub class="text-danger">(<?=$portfolio->titulo_professores ?>)</sub></small></td>
                                    <td><small><?=$portfolio->naran_kompleto_estudante?></small></td>
                                    <td align="center"><a href="<?=base_url(lang('horarioProfessores.detailHorarioFunsionarioUrlPortfolio').$portfolio->id_materia_professores) ?>"><strong><small class="text-center"><span class="badge badge-success"><?=$portfolio->level_horario_estudante ?></span></small></strong></a></td>
                                    <td><small><select name="absensi[]" id="" class="form-control">
                                        <option value="Tama"><?= lang('valoresEstudanteFunsionario.tamaEstudante') ?></option>
                                        <option value="La Tama"><?= lang('valoresEstudanteFunsionario.laTamaEstudante') ?></option>
                                        <option value="Lisensa"><?= lang('valoresEstudanteFunsionario.lisensaEstudante') ?></option>
                                    </select></small></td>
                                    <small><input type="hidden" class="form-control" name="numero_absensi[]" value="1"></small>
                                </tr>
                                <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-outline"></i></button>
                        <a href="<?=base_url(lang('valoresEstudanteFunsionario.detailValoresEstudanteFunsionarioUrlPortofolio').$horario->data_horario_hahu.'/'.$horario->data_horario_remata.'/'.$horario->id_horario.'/'.$horario->materia_kursus.'/'.$horario->level_materia_kursus) ?>" class="btn btn-dark ms-1"><i class="mdi mdi-skip-previous"></i></a>
                    </form>
                </div><br>
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